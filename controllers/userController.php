<?php

class UserController
{
  private UserManager $userManager;
  private BookManager $bookManager;
  private uploadImage $uploadImage;

  public function __construct()
  {
    $this->userManager = new UserManager();
    $this->bookManager = new BookManager();
    $this->uploadImage = new uploadImage();
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

  public function publicAccount(): void
  {
    $userId = $_GET['id'] ?? null;

    if (!$userId || !is_numeric($userId)) {
        header('Location: ?page=books');
        exit;
    }

    // on interdit l’accès à son propre profil public
    if (isset($_SESSION['user']) && $_SESSION['user']['id'] == $userId) {
        header('Location: ?page=account');
        exit;
    }

    $user = $this->userManager->findById((int) $userId);

    if (!$user) {
        header('Location: ?page=books');
        exit;
    }

    $books = $this->bookManager->getByUserId($user->getId());
    $bookCount = $this->userManager->countBooks($user->getId());

    $view = ROOT . '/views/user/public_account.php';
    require ROOT . '/views/layout.php';
  }


  public function uploadAvatar(): void
  {
    if (!isset($_SESSION['user'])) {
        header('Location: ?page=login');
        exit;
    }

    // le service attend "image"
    if (!isset($_FILES['avatar'])) {
        header('Location: ?page=account');
        exit;
    }

    $_FILES['image'] = $_FILES['avatar'];

    // upload physique
    $this->uploadImage->uploadImage('avatars/');

    // mise à jour utilisateur
    $user = $this->userManager->findById($_SESSION['user']['id']);
    $user->setAvatar($_FILES['avatar']['name']);
    $this->userManager->update($user);

    // mise à jour session
    $_SESSION['user']['avatar'] = $_FILES['avatar']['name'];

    header('Location: ?page=account');
    exit;
  }

}
