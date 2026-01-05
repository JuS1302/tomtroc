<?php

class HomeController {

  function index()
  {
      $pdo = getPDO();

      $request = $pdo->query("
          SELECT
              books.id,
              books.title,
              books.author,
              books.image,
              users.username
          FROM books
          JOIN users ON books.user_id = users.id
          ORDER BY books.created_at DESC
          LIMIT 4
      ");

      $books = $request->fetchAll(PDO::FETCH_ASSOC);

      $view = 'views/home.php';
      require 'views/layout.php';
  }
}
