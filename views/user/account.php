<section class="account-page">
  <div class="container">
  <h1>Mon compte</h1>

  <!-- Haut de page -->
  <div class="account-top">

    <!-- Carte profil -->
    <div class="account-card profile-card">
      <div class="avatar-container">
        <img src="assets/images/avatar-placeholder.jpg" alt="Avatar" class="avatar-image">
        <a href="#" class="edit-avatar">modifier</a>
      </div>

      <h2 class="username"><?= htmlspecialchars($user->getUsername()) ?></h2>
      <p class="member-since">
        Membre depuis <?= $user->getCreatedAt()->diff(new DateTime())->y ?> an
      </p>

      <div class="library-section">
        <span class="library-label">BIBLIOTHÈQUE</span>
        <div class="library-count">
          <span class="book-icon">📚</span>
          <strong><?= $bookCount ?> livres</strong>
        </div>
      </div>
    </div>

    <!-- Infos personnelles -->
    <div class="account-card info-card">
      <h3>Vos informations personnelles</h3>

      <form method="POST" action="">
        <div class="form-group">
          <label>Adresse email</label>
          <input type="email" name="email" value="<?= htmlspecialchars($user->getEmail()) ?>" class="form-input">
        </div>

        <div class="form-group">
          <label>Mot de passe</label>
          <input type="password" name="password" value="••••••••" class="form-input">
        </div>

        <div class="form-group">
          <label>Pseudo</label>
          <input type="text" name="username" value="<?= htmlspecialchars($user->getUsername()) ?>" class="form-input">
        </div>

        <button type="submit" class="btn-save">Enregistrer</button>
      </form>
    </div>

  </div>

  <!-- Bibliothèque -->
  <div class="account-library">
    <table class="books-table">
      <thead>
        <tr>
          <th>PHOTO</th>
          <th>TITRE</th>
          <th>AUTEUR</th>
          <th>DESCRIPTION</th>
          <th>DISPONIBILITÉ</th>
          <th>ACTION</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($books as $book) : ?>
          <tr>
            <td>
              <img
                src="assets/images/books/<?= htmlspecialchars($book->getImage()) ?>"
                alt="<?= htmlspecialchars($book->getTitle()) ?>"
                class="book-thumb"
              >
            </td>
            <td class="book-title"><?= htmlspecialchars($book->getTitle()) ?></td>
            <td class="book-author"><?= htmlspecialchars($book->getAuthor()) ?></td>
            <td class="book-description">
              <?= htmlspecialchars(substr($book->getDescription() ?? '', 0, 80)) ?>...
            </td>
            <td>
              <span class="badge <?= $book->isAvailable() ? 'badge-available' : 'badge-unavailable' ?>">
                <?= $book->isAvailable() ? 'disponible' : 'non dispo.' ?>
              </span>
            </td>
            <td class="book-actions">
              <a href="edit_book.php?id=<?= $book->getId() ?>" class="action-link">Éditer</a>
              <a href="delete_book.php?id=<?= $book->getId() ?>" class="action-link action-delete"
                 onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?')">
                Supprimer
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
        </div>
</section>
