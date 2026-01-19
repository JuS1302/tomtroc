<?php

class BookController {

  private BookManager $bookManager;
  private uploadImage $uploadImage;
  private UserManager $userManager;

  public function __construct()
  {
    $this->bookManager = new BookManager();
    $this->uploadImage = new uploadImage();
    $this->userManager = new UserManager();
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

      $user = $this->userManager->findById($book->getUserId());

      if (!$user) {
          $_SESSION['error'] = "Propriétaire introuvable";
          header('Location: ?page=books');
          exit;
      }

      $view = ROOT . '/views/book/show.php';
      require ROOT . '/views/layout.php';
  }

  public function edit(): void
  {
    if (!isset($_SESSION['user'])) {
        header('Location: ?page=login');
        exit;
    }

    $bookId = $_GET['id'] ?? null;

    if (!$bookId || !is_numeric($bookId)) {
        header('Location: ?page=account');
        exit;
    }

    $book = $this->bookManager->getById((int) $bookId);

    if (!$book || $book->getUserId() !== $_SESSION['user']['id']) {
        header('Location: ?page=account');
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $book->setTitle(trim($_POST['title']));
        $book->setAuthor(trim($_POST['author']));
        $book->setDescription(trim($_POST['description']));
        $book->setIsAvailable($_POST['is_available'] === '1');

            // Upload image si fournie
          if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {

              // le service attend "image", déjà OK ici
              $this->uploadImage->uploadImage('books/');

              // on persiste le nom du fichier
              $book->setImage($_FILES['image']['name']);
          }

        $this->bookManager->update($book);

        header('Location: ?page=account');
        exit;
    }

    $view = ROOT . '/views/book/edit.php';
    require ROOT . '/views/layout.php';
  }

  public function delete(): void
  {
    if (!isset($_SESSION['user'])) {
        header('Location: ?page=login');
        exit;
    }

    $bookId = $_GET['id'] ?? null;

    if (!$bookId || !is_numeric($bookId)) {
        header('Location: ?page=account');
        exit;
    }

    $book = $this->bookManager->getById((int) $bookId);

    if (!$book || $book->getUserId() !== $_SESSION['user']['id']) {
        header('Location: ?page=account');
        exit;
    }

    $this->bookManager->delete($book->getId());

    header('Location: ?page=account');
    exit;
  }
}
