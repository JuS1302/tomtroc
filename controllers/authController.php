<?php

class AuthController
{

  private UserManager $userManager;

  public function __construct()
  {
    $this->userManager = new UserManager();
  }
    /**
     * Page de connexion
     */
    public function login(): void
    {
        // Rediriger si déjà connecté
        if (isset($_SESSION['user'])) {
            header('Location: ?page=home');
            exit;
        }

        // Initialiser la variable d'erreur
        $error = null;

        // Traiter la soumission du formulaire
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            // Validation basique
            if (empty($email) || empty($password)) {
                $error = "Tous les champs sont obligatoires";
            } else {
                // Vérifier les identifiants
                $user = $this->userManager->findByEmail($email);

                if ($user && password_verify($password, $user['password'])) {
                    // Connexion réussie
                    $_SESSION['user'] = [
                        'id' => $user['id'],
                        'username' => $user['username'],
                        'email' => $user['email']
                    ];

                    header('Location: ?page=home');
                    exit;
                } else {
                    $error = "Identifiants incorrects";
                }
            }
        }

        // Afficher la vue (avec ou sans erreur)
        $view = ROOT . '/views/auth/login.php';
        require ROOT . '/views/layout.php';
    }

    /**
     * Page d'inscription
     */
    public function register(): void
    {
        // Rediriger si déjà connecté
        if (isset($_SESSION['user'])) {
            header('Location: ?page=home');
            exit;
        }

        // Initialiser la variable d'erreur
        $error = null;

        // Traiter la soumission du formulaire
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            // Validation complète
            if (empty($username) || empty($email) || empty($password)) {
                $error = "Tous les champs sont obligatoires";
            } elseif (strlen($username) < 3) {
                $error = "Le pseudo doit contenir au moins 3 caractères";
            } elseif (strlen($password) < 6) {
                $error = "Le mot de passe doit contenir au moins 6 caractères";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "L'adresse email n'est pas valide";
            } elseif ($this->userManager->findByEmail($email)) {
                $error = "Cet email est déjà utilisé";
            } else {
                // Créer l'utilisateur
                if ($this->userManager->create($username, $email, $password)) {
                    // Récupérer l'utilisateur créé pour la connexion automatique
                    $user = $this->userManager->findByEmail($email);

                    // Connexion automatique
                    $_SESSION['user'] = [
                        'id' => $user['id'],
                        'username' => $user['username'],
                        'email' => $user['email']
                    ];

                    header('Location: ?page=home');
                    exit;
                } else {
                    $error = "Une erreur est survenue lors de l'inscription";
                }
            }
        }

        // Afficher la vue (avec ou sans erreur)
        $view = ROOT . '/views/auth/register.php';
        require ROOT . '/views/layout.php';
    }

    /**
     * Déconnexion
     */
    public function logout(): void
    {
        session_destroy();
        header('Location: ?page=home');
        exit;
    }
}
