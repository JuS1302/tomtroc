<section class="book-detail-section">
  <div class="container">
    <!-- Fil d'Ariane -->
    <nav class="breadcrumb">
      <a href="?page=home">Accueil</a>
      <span class="separator">›</span>
      <a href="?page=books">Nos livres</a>
      <span class="separator">›</span>
      <span class="current"><?= htmlspecialchars($book->getTitle()) ?></span>
    </nav>

    <div class="book-detail-content">
      <!-- Colonne gauche : Image -->
      <div class="book-detail-image">
        <?php if ($book->getImage()) : ?>
         <img
          src="assets/images/books/<?= htmlspecialchars($book->getImage()) ?>"
          alt="<?= htmlspecialchars($book->getTitle()) ?>"
          class="book-image"
        >
        <?php else : ?>
          <div class="book-placeholder">📚</div>
        <?php endif; ?>
      </div>

      <!-- Colonne droite : Informations -->
      <div class="book-detail-info">
        <h1><?= htmlspecialchars($book->getTitle()) ?></h1>

        <p class="book-author">
          par <?= htmlspecialchars($book->getAuthor()) ?>
        </p>

        <hr class="divider">

        <!-- Description -->
        <div class="book-description">
          <h2>DESCRIPTION</h2>
          <?php if ($book->getDescription()) : ?>
            <p><?= nl2br(htmlspecialchars($book->getDescription())) ?></p>
          <?php else : ?>
            <p class="no-description">Aucune description disponible pour ce livre.</p>
          <?php endif; ?>
        </div>

        <hr class="divider">

        <!-- Propriétaire -->
        <div class="book-owner">
          <h2>PROPRIÉTAIRE</h2>
            <a href="?page=user&id=<?= $book->getUserId() ?>">
              <div class="owner-card">
                <div class="owner-avatar">
                  <?php if ($user->getAvatar()) : ?>
                    <img
                      src="assets/images/<?= htmlspecialchars($user->getAvatar()) ?>"
                      alt="Avatar"
                    >
                  <?php else : ?>
                    <div class="avatar-placeholder">
                      <?= strtoupper(substr($user->getUsername(), 0, 1)) ?>
                    </div>
                  <?php endif; ?>
                </div>
                <div class="owner-info">
                    <?= htmlspecialchars($book->getUsername()) ?>
                  <p class="owner-member-since">
                    Membre depuis <?= date('Y', strtotime($book->getUserCreatedAt())) ?>
                  </p>
                </div>
              </div>
            </a>
        </div>

        <!-- Bouton d'action -->
        <?php if (isset($_SESSION['user'])) : ?>
          <?php if ($_SESSION['user']['id'] == $book->getUserId()) : ?>
            <a href="?page=account&action=edit_book&id=<?= $book->getId() ?>" class="btn btn-outline">
              Modifier ce livre
            </a>
          <?php else : ?>
            <a href="?page=messages&user_id=<?= $book->getUserId() ?>&book_id=<?= $book->getId() ?>" class="btn btn-primary btn-large">
              Envoyer un message
            </a>
          <?php endif; ?>
        <?php else : ?>
          <a href="?page=login" class="btn btn-primary btn-large">
            Connectez-vous pour contacter le propriétaire
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
