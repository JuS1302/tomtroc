<section class="account-page">
  <div class="container">

    <a href="?page=account" class="back-link">← retour</a>

    <h1>Modifier les informations</h1>

    <form method="POST" enctype="multipart/form-data" class="book-edit-form">

      <div class="book-edit-grid">

        <!-- IMAGE -->
        <div>
          <img
            src="assets/images/books/<?= htmlspecialchars($book->getImage()) ?>"
            class="book-image-preview"
          >

          <input type="file" name="image" accept="image/*">
        </div>

        <!-- FORM -->
        <div>

          <label>Titre</label>
          <input type="text" name="title" value="<?= htmlspecialchars($book->getTitle()) ?>" required>

          <label>Auteur</label>
          <input type="text" name="author" value="<?= htmlspecialchars($book->getAuthor()) ?>" required>

          <label>Commentaire</label>
          <textarea name="description" rows="8"><?= htmlspecialchars($book->getDescription()) ?></textarea>

          <label>Disponibilité</label>
          <select name="is_available">
            <option value="1" <?= $book->isAvailable() ? 'selected' : '' ?>>disponible</option>
            <option value="0" <?= !$book->isAvailable() ? 'selected' : '' ?>>non disponible</option>
          </select>

          <button type="submit" class="btn btn-primary">
            Valider
          </button>

        </div>

      </div>
    </form>

  </div>
</section>
