<?php

class BookManager {

    public function home(): array
    {
        $pdo = getPDO();

        $sql = "
            SELECT
                books.id,
                books.user_id,
                books.title,
                books.author,
                books.description,
                books.image,
                books.is_available,
                books.created_at,
                users.username
            FROM books
            JOIN users ON books.user_id = users.id
            WHERE books.is_available = 1
            ORDER BY books.created_at DESC
            LIMIT 4
        ";

        $request = $pdo->prepare($sql);
        $request->execute();

        $books = [];
        while ($row = $request->fetch(PDO::FETCH_ASSOC)) {
            $books[] = new Book($row);
        }

        return $books;
    }

    public function getAllAvailableWithUser(): array
    {
        $pdo = getPDO();

        $sql = "
            SELECT
                books.id,
                books.user_id,
                books.title,
                books.author,
                books.description,
                books.image,
                books.is_available,
                books.created_at,
                users.username
            FROM books
            JOIN users ON users.id = books.user_id
            WHERE books.is_available = 1
            ORDER BY books.created_at DESC
        ";

        $request = $pdo->prepare($sql);
        $request->execute();

        $books = [];
        while ($row = $request->fetch(PDO::FETCH_ASSOC)) {
            $books[] = new Book($row);
        }

        return $books;
    }

    public function searchByTitle(string $query): array
    {
        $pdo = getPDO();

        $sql = "
            SELECT
                books.id,
                books.user_id,
                books.title,
                books.author,
                books.description,
                books.image,
                books.is_available,
                books.created_at,
                users.username
            FROM books
            JOIN users ON users.id = books.user_id
            WHERE books.is_available = 1
              AND books.title LIKE :query
            ORDER BY books.created_at DESC
        ";

        $request = $pdo->prepare($sql);
        $request->execute(['query' => '%' . $query . '%']);

        $books = [];
        while ($row = $request->fetch(PDO::FETCH_ASSOC)) {
            $books[] = new Book($row);
        }

        return $books;
    }

    public function getById(int $id): ?Book
    {
        $pdo = getPDO();

        $sql = "
            SELECT
                books.id,
                books.title,
                books.author,
                books.image,
                books.description,
                books.is_available,
                books.created_at,
                books.user_id,
                users.username,
                users.email,
                users.created_at as user_created_at
            FROM books
            JOIN users ON users.id = books.user_id
            WHERE books.id = :id
        ";

        $request = $pdo->prepare($sql);
        $request->execute(['id' => $id]);

        $row = $request->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Book($row);
    }

    public function getByUserId(int $userId): array
    {
        $pdo = getPDO();

        $sql = "
            SELECT
                id,
                user_id,
                title,
                author,
                description,
                image,
                is_available,
                created_at
            FROM books
            WHERE user_id = :user_id
            ORDER BY created_at DESC
        ";

        $request = $pdo->prepare($sql);
        $request->execute(['user_id' => $userId]);

        $books = [];
        while ($row = $request->fetch(PDO::FETCH_ASSOC)) {
            $books[] = new Book($row);
        }

        return $books;
    }

    public function update(Book $book): bool
  {
      $pdo = getPDO();

      $sql = "
          UPDATE books
          SET
              title = :title,
              author = :author,
              description = :description,
              image = :image,
              is_available = :is_available
          WHERE id = :id
      ";

      $request = $pdo->prepare($sql);

      return $request->execute([
          'title'        => $book->getTitle(),
          'author'       => $book->getAuthor(),
          'description'  => $book->getDescription(),
          'image'        => $book->getImage(),
          'is_available' => $book->isAvailable() ? 1 : 0,
          'id'           => $book->getId(),
      ]);
  }

  public function delete(int $id): bool
  {
      $pdo = getPDO();

      $sql = "DELETE FROM books WHERE id = :id";

      $request = $pdo->prepare($sql);

      return $request->execute(['id' => $id]);
  }
}
