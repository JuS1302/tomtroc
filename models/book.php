<?php

require_once ROOT . '/config/database.php';
require_once ROOT . '/models/database.php';

class Book {

   public static function home()
  {
      $pdo = getPDO();

      $sql = "
          SELECT
              books.id,
              books.title,
              books.author,
              books.image,
              users.username
          FROM books
          JOIN users ON books.user_id = users.id
          WHERE books.is_available = 1
          ORDER BY books.created_at ASC
          LIMIT 4
      ";

      $request = $pdo->prepare($sql);
      $request->execute();

      return $request->fetchAll(PDO::FETCH_ASSOC);
  }


    public static function getAllAvailableWithUser(): array
    {
        $pdo = getPDO();

        $sql = "
            SELECT
                books.id,
                books.title,
                books.author,
                books.image,
                users.username
            FROM books
            JOIN users ON users.id = books.user_id
            WHERE books.is_available = 1
            ORDER BY books.created_at DESC
        ";

        $request = $pdo->prepare($sql);
        $request->execute();

        return $request->fetchAll(PDO::FETCH_ASSOC);
    }
}
