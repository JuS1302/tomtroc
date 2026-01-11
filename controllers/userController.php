<?php

class UserController
{
  private UserManager $userManager;
  private BookManager $bookManager;

    public function __construct()
    {
      $this->userManager = new UserManager();
      $this->bookManager = new BookManager();
    }

    public function account(): void
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ?page=login');
            exit;
        }

        $userId = $_SESSION['user']['id'];

        $user = $this->userManager->findById($userId);
        $books = $this->bookManager->getByUserId($userId);
        $bookCount = $this->userManager->countBooks($userId);

        $view = ROOT . '/views/user/account.php';
        require ROOT . '/views/layout.php';
    }
}
