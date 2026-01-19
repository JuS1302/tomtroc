<?php

class MessageController
{
  private MessageManager $messageManager;
  private UserManager $userManager;

  public function __construct()
  {
      $this->messageManager = new MessageManager();
      $this->userManager = new UserManager();
  }

  public function index(): void
  {
    if (!isset($_SESSION['user'])) {
        header('Location: ?page=login');
        exit;
    }

    $userId = $_SESSION['user']['id'];

    // Colonne gauche
    $conversations = $this->messageManager->getUserConversations($userId);

    // Colonne droite (optionnelle)
    $activeUser = null;
    $messages = [];

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $activeUser = $this->userManager->findById((int) $_GET['id']);

        if ($activeUser) {
            $messages = $this->messageManager
                ->getMessagesBetweenUsers($userId, $activeUser->getId());

            $this->messageManager
                ->markAsRead($activeUser->getId(), $userId);
        }
    }

    $view = ROOT . '/views/message/index.php';
    require ROOT . '/views/layout.php';
  }

    /**
     * Envoyer un message
     */
    public function send(): void
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ?page=login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ?page=messages');
            exit;
        }

        $receiverId = $_POST['receiver_id'] ?? null;
        $content = trim($_POST['content'] ?? '');

        if (!$receiverId || $content === '') {
            header('Location: ?page=messages');
            exit;
        }

        $userId = $_SESSION['user']['id'];

        // Envoyer le message
        $this->messageManager->sendMessage($userId, (int) $receiverId, $content);

        // Rediriger vers la conversation
        header('Location: ?page=messages&id=' . $receiverId);
        exit;
    }
}
