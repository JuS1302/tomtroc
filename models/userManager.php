<?php

class UserManager {

  public function create(string $username, string $email, string $password): bool
  {
      $pdo = getPDO();

      $sql = "
          INSERT INTO users (
              username,
              email,
              password
          ) VALUES (
              :username,
              :email,
              :password
          )
      ";

      $request = $pdo->prepare($sql);

      return $request->execute([
          'username' => $username,
          'email'    => $email,
          'password' => password_hash($password, PASSWORD_DEFAULT),
      ]);
  }

  public function findByEmail(string $email): ?array
  {
      $pdo = getPDO();

      $sql = "
          SELECT
              id,
              username,
              email,
              password,
              created_at
          FROM users
          WHERE email = :email
      ";

      $request = $pdo->prepare($sql);
      $request->execute(['email' => $email]);

      return $request->fetch(PDO::FETCH_ASSOC) ?: null;
  }

  public function findById(int $id): ?User
  {
      $pdo = getPDO();

      $sql = "
          SELECT
              id,
              username,
              email,
              avatar,
              created_at
          FROM users
          WHERE id = :id
      ";

      $request = $pdo->prepare($sql);
      $request->execute(['id' => $id]);

      $row = $request->fetch(PDO::FETCH_ASSOC);

      if (!$row) {
          return null;
      }

      // On ajoute un password vide pour le constructeur
      $row['password'] = '';

      return new User($row);
  }

  public function countBooks(int $userId): int
  {
      $pdo = getPDO();

      $sql = "
          SELECT COUNT(*)
          FROM books
          WHERE user_id = :user_id
      ";

      $request = $pdo->prepare($sql);
      $request->execute(['user_id' => $userId]);

      return (int) $request->fetchColumn();
  }

  public function update(User $user): bool
  {
    $pdo = getPDO();

    $sql = "
        UPDATE users
        SET
            username = :username,
            email = :email,
            avatar = :avatar
        WHERE id = :id
    ";

    $request = $pdo->prepare($sql);

    return $request->execute([
        'username' => $user->getUsername(),
        'email'    => $user->getEmail(),
        'id'       => $user->getId(),
        'avatar' => $user->getAvatar(),
    ]);
  }

}
