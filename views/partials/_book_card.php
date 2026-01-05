<li>
  <a href="index.php?page=book&id=<?= $book['id'] ?>" class="book-card">
    <div class="book-image-wrapper">
      <?php if (!empty($book['image'])) : ?>
        <img
          src="assets/images/books/<?= htmlspecialchars($book['image']) ?>"
          alt="<?= htmlspecialchars($book['title']) ?>"
          class="book-image"
        >
      <?php else : ?>
        <div class="book-image book-placeholder">
          <span>📚</span>
        </div>
      <?php endif; ?>
    </div>

    <div class="book-info">
      <strong><?= htmlspecialchars($book['title']) ?></strong>
      <p class="book-author"><?= htmlspecialchars($book['author']) ?></p>
      <p class="book-seller">
        Vendu par : <?= htmlspecialchars($book['username']) ?>
      </p>
    </div>
  </a>
</li>
