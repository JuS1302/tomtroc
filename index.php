<?php
session_start();

/**
 * Autoload des classes (models + controllers)
 */
spl_autoload_register(function ($class) {
    if (file_exists('models/' . $class . '.php')) {
        require 'models/' . $class . '.php';
    }

    if (file_exists('controllers/' . $class . '.php')) {
        require 'controllers/' . $class . '.php';
    }
});

require 'models/database.php';

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'home':
        $controller = new HomeController();
        $controller->index();
        break;

    default:
        echo 'Page non trouvée';
}
