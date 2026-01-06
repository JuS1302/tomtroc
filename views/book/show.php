<section class="book-detail-section">
  <div class="container">
    <!-- Fil d'Ariane -->
    <nav class="breadcrumb">
      <a href="?page=home">Accueil</a>
      <span class="separator">›</span>
      <a href="?page=books">Nos livres</a>
      <span class="separator">›</span>
      <span class="current"><?= htmlspecialchars($book['title']) ?></span>
    </nav>

    <div class="book-detail-content">
      <!-- Colonne gauche : Image -->
      <div class="book-detail-image">
        <?php if (!empty($book['image'])) : ?>
         <img
          src="assets/images/books/<?= htmlspecialchars($book['image']) ?>"
          alt="<?= htmlspecialchars($book['title']) ?>"
          class="book-image"
        >
        <?php else : ?>
          <div class="book-placeholder">📚</div>
        <?php endif; ?>
      </div>

      <!-- Colonne droite : Informations -->
      <div class="book-detail-info">
        <h1><?= htmlspecialchars($book['title']) ?></h1>

        <p class="book-author">
          par <?= htmlspecialchars($book['author']) ?>
        </p>

        <hr class="divider">

        <!-- Description -->
        <div class="book-description">
          <h2>DESCRIPTION</h2>
          <?php if (!empty($book['description'])) : ?>
            <p><?= nl2br(htmlspecialchars($book['description'])) ?></p>
          <?php else : ?>
            <p class="no-description">Aucune description disponible pour ce livre.</p>
          <?php endif; ?>
        </div>

        <hr class="divider">

        <!-- Propriétaire -->
        <div class="book-owner">
          <h2>PROPRIÉTAIRE</h2>
          <div class="owner-card">
            <div class="owner-avatar">
              <?= strtoupper(substr($book['username'], 0, 1)) ?>
            </div>
            <div class="owner-info">
              <p class="owner-name"><?= htmlspecialchars($book['username']) ?></p>
              <p class="owner-member-since">
                Membre depuis <?= date('Y', strtotime($book['created_at'])) ?>
              </p>
            </div>
          </div>
        </div>

        <!-- Bouton d'action -->
        <?php if (isset($_SESSION['user_id'])) : ?>
          <?php if ($_SESSION['user_id'] == $book['user_id']) : ?>
            <a href="?page=account&action=edit_book&id=<?= $book['id'] ?>" class="btn btn-outline">
              Modifier ce livre
            </a>
          <?php else : ?>
            <a href="?page=messages&user_id=<?= $book['user_id'] ?>&book_id=<?= $book['id'] ?>" class="btn btn-primary btn-large">
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
