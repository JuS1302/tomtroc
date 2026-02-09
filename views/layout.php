<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TomTroc</title>
    <link rel="stylesheet" href="/tomtroc/assets/css/styles.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

<!-- HEADER / NAVIGATION -->
<header>
  <div class="header-content">

    <!-- LOGO -->
    <a href="index.php?page=home" class="logo">
      <img src="assets/images/logo.svg" alt="TomTroc">
    </a>

    <!-- NAVIGATION -->
    <nav>
      <ul class="nav-list">

        <!-- GAUCHE -->
        <li class="nav-group nav-left">
          <ul>
            <li><a href="index.php?page=home">Accueil</a></li>
            <li><a href="index.php?page=books">Nos livres à l’échange</a></li>
          </ul>
        </li>

        <!-- DROITE -->
        <li class="nav-group nav-right">
          <ul>

            <?php if (isset($_SESSION['user'])) : ?>
              <?php

                $messageManager = new MessageManager();
                $unreadCount = $messageManager->countUnreadMessages($_SESSION['user']['id']);
              ?>
              <li>
                <a href="index.php?page=messages" class="nav-messages">
                  <span class="icon">
                    <img src="assets/images/Icon-messagerie.svg" alt="Icon de la messagerie">
                  </span>
                  Messagerie
                  <?php if ($unreadCount > 0) : ?>
                    <span class="badge"><?= $unreadCount ?></span>
                  <?php endif; ?>
                </a>
              </li>

              <li>
                <a href="index.php?page=account">
                  <span class="icon">
                    <img src="assets/images/Icon-mon-compte.svg" alt="Icon mon compte">
                  </span>
                  Mon compte
                </a>
              </li>

              <li>
                <a href="index.php?page=logout" class="btn btn-outline btn-sm">
                  Déconnexion
                </a>
              </li>

            <?php else : ?>
              <li>
                <a href="index.php?page=login" class="btn btn-outline btn-sm">
                  Connexion
                </a>
              </li>
            <?php endif; ?>

          </ul>
        </li>

      </ul>
    </nav>

  </div>
</header>


<!-- CONTENU PRINCIPAL (vue dynamique) -->
<main>
    <?php require $view; ?>
</main>

<!-- FOOTER -->
<footer>
    <div class="footer-content">
        <div class="footer-links">
            <a href="index.php?page=politique">Politique de confidentialité</a>
            <a href="index.php?page=mentions">Mentions légales</a>
            <a href="index.php?page=contact">Tom Troc©</a>
        </div>

        <div class="footer-logo">
            <img src="assets/images/TT-icon-footer.svg" alt="TomTroc">
        </div>
    </div>
</footer>

</body>
</html>
