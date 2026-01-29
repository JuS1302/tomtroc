<section class="account-page">
  <div class="container">

    <div class="account-top">

      <!-- PROFIL PUBLIC -->
      <div class="account-card profile-card">

        <div class="avatar-container">
          <?php if ($user->getAvatar()) : ?>
            <img
              src="<?= UPLOAD_AVATAR_PATH . htmlspecialchars($user->getAvatar()) ?>"
              alt="Avatar"
              class="avatar-image"
            >
          <?php else : ?>
            <div class="avatar-placeholder">
              <?= strtoupper(substr($user->getUsername(), 0, 1)) ?>
            </div>
          <?php endif; ?>
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

        <?php if (isset($_SESSION['user'])) : ?>
          <a
            href="?page=messages&to=<?= $user->getId() ?>"
            class="btn btn-primary"
          >
            Écrire un message
          </a>
        <?php endif; ?>

      </div>

      <!-- LISTE DES LIVRES -->
      <div class="account-library">
        <table class="books-table">
          <thead>
            <tr>
              <th>PHOTO</th>
              <th>TITRE</th>
              <th>AUTEUR</th>
              <th>DESCRIPTION</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($books as $book) : ?>
              <tr>
                <td>
                  <img
                    src="<?= UPLOAD_BOOK_PATH . htmlspecialchars($book->getImage()) ?>"
                    class="book-thumb"
                  >
                </td>
                <td><?= htmlspecialchars($book->getTitle()) ?></td>
                <td><?= htmlspecialchars($book->getAuthor()) ?></td>
                <td>
                  <?= htmlspecialchars(substr($book->getDescription() ?? '', 0, 120)) ?>…
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</section>
