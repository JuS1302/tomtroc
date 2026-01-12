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

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {

          $username = trim($_POST['username'] ?? '');
          $email    = trim($_POST['email'] ?? '');

          if ($username !== '' && $email !== '') {

              $user = $this->userManager->findById($userId);

              if ($user) {
                  $user->setUsername($username);
                  $user->setEmail($email);

                  $this->userManager->update($user);

                  $_SESSION['user']['username'] = $username;
                  $_SESSION['user']['email']    = $email;
              }

              header('Location: ?page=account');
              exit;
          }
      }

      $user = $this->userManager->findById($userId);
      $books = $this->bookManager->getByUserId($userId);
      $bookCount = $this->userManager->countBooks($userId);

      $view = ROOT . '/views/user/account.php';
      require ROOT . '/views/layout.php';
  }
}
