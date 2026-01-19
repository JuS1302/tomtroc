<?php

class MessageManager
{
    /**
     * Récupère toutes les conversations d'un utilisateur
     * (groupées par interlocuteur)
     */
    public function getUserConversations(int $userId): array
  {
      $pdo = getPDO();

      // Étape 1 : Récupérer tous les interlocuteurs distincts
      $sql = "
          SELECT DISTINCT
              CASE
                  WHEN sender_id = :user_id THEN receiver_id
                  ELSE sender_id
              END as other_user_id
          FROM messages
          WHERE sender_id = :user_id OR receiver_id = :user_id
      ";

      $stmt = $pdo->prepare($sql);
      $stmt->execute(['user_id' => $userId]);
      $userIds = $stmt->fetchAll(PDO::FETCH_COLUMN);

      if (empty($userIds)) {
          return [];
      }

      $conversations = [];

      // Étape 2 : Pour chaque interlocuteur, récupérer les infos
      foreach ($userIds as $otherUserId) {
          // Infos utilisateur
          $sqlUser = "SELECT id, username, avatar FROM users WHERE id = :id";
          $stmtUser = $pdo->prepare($sqlUser);
          $stmtUser->execute(['id' => $otherUserId]);
          $user = $stmtUser->fetch(PDO::FETCH_ASSOC);

          if (!$user) {
              continue;
          }

          // Dernier message
          $sqlLastMsg = "
              SELECT content, created_at
              FROM messages
              WHERE (sender_id = :user1 AND receiver_id = :user2)
                OR (sender_id = :user2 AND receiver_id = :user1)
              ORDER BY created_at DESC
              LIMIT 1
          ";
          $stmtLastMsg = $pdo->prepare($sqlLastMsg);
          $stmtLastMsg->execute(['user1' => $userId, 'user2' => $otherUserId]);
          $lastMsg = $stmtLastMsg->fetch(PDO::FETCH_ASSOC);

          // Messages non lus
          $sqlUnread = "
              SELECT COUNT(*) as count
              FROM messages
              WHERE sender_id = :sender AND receiver_id = :receiver AND is_read = 0
          ";
          $stmtUnread = $pdo->prepare($sqlUnread);
          $stmtUnread->execute(['sender' => $otherUserId, 'receiver' => $userId]);
          $unread = $stmtUnread->fetch(PDO::FETCH_ASSOC);

          $conversations[] = [
              'other_user_id' => $user['id'],
              'other_username' => $user['username'],
              'other_avatar' => $user['avatar'],
              'last_message' => $lastMsg['content'] ?? null,
              'last_message_date' => $lastMsg['created_at'] ?? null,
              'unread_count' => $unread['count'] ?? 0
          ];
      }

      // Trier par date du dernier message (plus récent en premier)
      usort($conversations, function($a, $b) {
          if (!$a['last_message_date']) return 1;
          if (!$b['last_message_date']) return -1;
          return strtotime($b['last_message_date']) - strtotime($a['last_message_date']);
      });

      return $conversations;
  }

    /**
     * Récupère tous les messages entre deux utilisateurs
     */
    public function getMessagesBetweenUsers(int $user1Id, int $user2Id): array
    {
        $pdo = getPDO();

        $sql = "
            SELECT
                m.*,
                sender.username as sender_username,
                sender.avatar as sender_avatar,
                receiver.username as receiver_username,
                receiver.avatar as receiver_avatar
            FROM messages m
            JOIN users sender ON m.sender_id = sender.id
            JOIN users receiver ON m.receiver_id = receiver.id
            WHERE (m.sender_id = :user1 AND m.receiver_id = :user2)
               OR (m.sender_id = :user2 AND m.receiver_id = :user1)
            ORDER BY m.created_at ASC
        ";

        $request = $pdo->prepare($sql);
        $request->execute([
            'user1' => $user1Id,
            'user2' => $user2Id
        ]);

        $messages = [];
        while ($row = $request->fetch(PDO::FETCH_ASSOC)) {
            $messages[] = new Message($row);
        }

        return $messages;
    }

    /**
     * Envoie un nouveau message
     */
    public function sendMessage(int $senderId, int $receiverId, string $content): bool
    {
        $pdo = getPDO();

        $sql = "
            INSERT INTO messages (sender_id, receiver_id, content)
            VALUES (:sender_id, :receiver_id, :content)
        ";

        $request = $pdo->prepare($sql);
        return $request->execute([
            'sender_id' => $senderId,
            'receiver_id' => $receiverId,
            'content' => $content
        ]);
    }

    /**
     * Marque les messages d'un expéditeur comme lus
     */
    public function markAsRead(int $senderId, int $receiverId): bool
    {
        $pdo = getPDO();

        $sql = "
            UPDATE messages
            SET is_read = 1
            WHERE sender_id = :sender_id
            AND receiver_id = :receiver_id
            AND is_read = 0
        ";

        $request = $pdo->prepare($sql);
        return $request->execute([
            'sender_id' => $senderId,
            'receiver_id' => $receiverId
        ]);
    }

    /**
     * Compte le nombre total de messages non lus
     */
    public function countUnreadMessages(int $userId): int
    {
        $pdo = getPDO();

        $sql = "
            SELECT COUNT(*)
            FROM messages
            WHERE receiver_id = :user_id
            AND is_read = 0
        ";

        $request = $pdo->prepare($sql);
        $request->execute(['user_id' => $userId]);

        return (int) $request->fetchColumn();
    }
}
