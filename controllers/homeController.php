<?php

require_once ROOT . '/models/Book.php';

class HomeController {

  function home(): void
  {
      $books = Book::home();

      $view = ROOT . '/views/home.php';
      require ROOT . '/views/layout.php';
  }
}
