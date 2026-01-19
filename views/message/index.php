<main class="messaging-page">
  <div class="container messaging-layout">

    <!-- COLONNE GAUCHE -->
    <aside class="conversations-sidebar">
      <h1 class="messaging-title">Messagerie</h1>

      <div class="conversations-list">
        <?php foreach ($conversations as $conversation): ?>
          <a
            href="?page=messages&id=<?= $conversation['other_user_id'] ?>"
            class="conversation-item <?= $conversation['unread_count'] ? 'unread' : '' ?>"
          >
            <div class="conversation-avatar">
              <?php if ($conversation['other_avatar']): ?>
                <img src="assets/images/<?= htmlspecialchars($conversation['other_avatar']) ?>">
              <?php else: ?>
                <div class="avatar-initial">
                  <?= strtoupper($conversation['other_username'][0]) ?>
                </div>
              <?php endif; ?>
            </div>

            <div class="conversation-info">
              <div class="conversation-header">
                <strong><?= htmlspecialchars($conversation['other_username']) ?></strong>
                <span class="conversation-time">
                  <?= $conversation['last_message_date']
                    ? (new DateTime($conversation['last_message_date']))->format('H:i')
                    : '' ?>
                </span>
              </div>

              <div class="conversation-preview">
                <?= htmlspecialchars($conversation['last_message'] ?? '') ?>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </aside>

    <!-- COLONNE DROITE -->
    <section class="thread-container">
      <?php if (!$activeUser): ?>
        <div class="thread-empty">
          Sélectionnez une conversation
        </div>
      <?php else: ?>

        <header class="thread-header">
          <div class="thread-user">
            <strong><?= htmlspecialchars($activeUser->getUsername()) ?></strong>
          </div>
        </header>

        <div class="messages-container">
          <?php foreach ($messages as $message): ?>
            <div class="message <?= $message->getSenderId() === $_SESSION['user']['id']
              ? 'message-sent'
              : 'message-received' ?>">

              <!-- AVATAR + HEURE -->
              <div class="message-meta">
                <div class="message-avatar">
                  <?php if ($message->getSenderAvatar()): ?>
                    <img
                      src="assets/images/<?= htmlspecialchars($message->getSenderAvatar()) ?>"
                      alt=""
                    >
                  <?php else: ?>
                    <?= strtoupper($message->getSenderUsername()[0]) ?>
                  <?php endif; ?>
                </div>

                <span class="message-time">
                  <?= $message->getCreatedAt()->format('d.m H:i') ?>
                </span>
              </div>

              <!-- BULLE -->
              <div class="message-content">
                <?= nl2br(htmlspecialchars($message->getContent())) ?>
              </div>
            </div>
          <?php endforeach; ?>

        </div>


        <form method="POST" action="?page=message_send" class="message-form">
          <input type="hidden" name="receiver_id" value="<?= $activeUser->getId() ?>">
          <textarea name="content" placeholder="Tapez votre message ici"></textarea>
          <button>Envoyer</button>
        </form>

      <?php endif; ?>
    </section>

  </div>
</main>
