<?php

class BookController {

  private BookManager $bookManager;

  public function __construct()
  {
    $this->bookManager = new BookManager();
  }

    public function index(): void
    {
        $query = $_GET['title'] ?? null;

        if (!empty($query)) {
            $books = $this->bookManager->searchByTitle($query);
        } else {
            $books = $this->bookManager->getAllAvailableWithUser();
        }

        $view = ROOT . '/views/book/index.php';
        require ROOT . '/views/layout.php';
    }


    public function show(): void
    {
        $id = $_GET['id'] ?? null;

        if (!$id || !is_numeric($id)) {
            $_SESSION['error'] = "Livre introuvable";
            header('Location: ?page=books');
            exit;
        }

        $book = $this->bookManager->getById((int)$id);

        if (!$book) {
            $_SESSION['error'] = "Ce livre n'existe pas";
            header('Location: ?page=books');
            exit;
        }

        $view = ROOT . '/views/book/show.php';
        require ROOT . '/views/layout.php';
    }
}
