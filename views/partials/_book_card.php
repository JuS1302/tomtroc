<li>
  <a href="index.php?page=book&id=<?= $book->getId() ?>" class="book-card">
    <div class="book-image-wrapper">
      <?php if ($book->getImage()) : ?>
        <img
          src="assets/images/books/<?= htmlspecialchars($book->getImage()) ?>"
          alt="<?= htmlspecialchars($book->getTitle()) ?>"
          class="book-image"
        >
      <?php else : ?>
        <div class="book-image book-placeholder">
          <span>📚</span>
        </div>
      <?php endif; ?>
    </div>

    <div class="book-info">
      <strong><?= htmlspecialchars($book->getTitle()) ?></strong>
      <p class="book-author"><?= htmlspecialchars($book->getAuthor()) ?></p>
      <p class="book-seller">
        Vendu par : <?= htmlspecialchars($book->getUsername()) ?>
      </p>
    </div>
  </a>
</li>
