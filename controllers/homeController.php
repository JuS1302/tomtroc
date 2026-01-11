<?php

require_once ROOT . '/models/Book.php';

class HomeController {

  private BookManager $bookManager;

  public function __construct()
  {
    $this->bookManager = new BookManager();
  }

  function home(): void
  {
      $books = $this->bookManager->home();

      $view = ROOT . '/views/home.php';
      require ROOT . '/views/layout.php';
  }
}
