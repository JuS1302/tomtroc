<?php
session_start();

// Définir la racine du projet
define('ROOT', __DIR__);

/**
 * Autoload des classes (models + controllers)
 */
spl_autoload_register(function ($class) {
    if (file_exists(ROOT . '/models/' . $class . '.php')) {
        require_once ROOT . '/models/' . $class . '.php';
        return;
    }

    if (file_exists(ROOT . '/controllers/' . $class . '.php')) {
        require_once ROOT . '/controllers/' . $class . '.php';
        return;
    }

    if (file_exists(ROOT . '/services/' . $class . '.php')) {
        require_once ROOT . '/services/' . $class . '.php';
        return;
    }
});

require_once ROOT . '/models/database.php';

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'home':
        $controller = new HomeController();
        $controller->home();
        break;

    case 'books':
        $controller = new BookController();
        $controller->index();
        break;

    case 'book':
        $controller = new BookController();
        $controller->show();
        break;

    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;

    case 'register':
        $controller = new AuthController();
        $controller->register();
        break;

    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;

    case 'account':
        $controller = new UserController();
        $controller->account();
        break;

    case 'upload_avatar':
        $controller = new UserController();
        $controller->uploadAvatar();
        break;

    case 'user':
        $controller = new UserController();
        $controller->publicAccount();
        break;

    case 'book_edit':
        $controller = new BookController();
        $controller->edit();
        break;

    case 'book_delete':
        $controller = new BookController();
        $controller->delete();
        break;

    case 'messages':
        $controller = new MessageController();
        $controller->index();
        break;

    case 'message_send':
        $controller = new MessageController();
        $controller->send();
        break;

    default:
        http_response_code(404);
        echo 'Page non trouvée';
        break;
}
