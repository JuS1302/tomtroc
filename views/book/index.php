<section class="books-section container">
  <div class="books-header">
    <h1>Nos livres à l'échange</h1>
    <search>
      <form method="GET" class="books-search" action="">
        <input type="hidden" name="page" value="books">
        <input
          type="search"
          name="title"
          placeholder="Rechercher un livre"
          value="<?= htmlspecialchars($_GET['title'] ?? '') ?>"
          aria-label="Rechercher un livre"
        >
        <button type="submit" class="search-btn" aria-label="Rechercher">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="11" cy="11" r="8"></circle>
            <path d="m21 21-4.35-4.35"></path>
          </svg>
        </button>
      </form>
    </search>
  </div>

  <?php if (isset($_GET['title']) && !empty($_GET['title'])) : ?>
    <div class="search-info">
      <p>
        <?= count($books) ?> résultat<?= count($books) > 1 ? 's' : '' ?>
        pour "<?= htmlspecialchars($_GET['title']) ?>"
      </p>
      <?php if (!empty($books)) : ?>
        <a href="?page=books" class="clear-search">Voir tous les livres</a>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  <?php if (empty($books)) : ?>
    <p class="empty-message">
      <?php if (isset($_GET['title']) && !empty($_GET['title'])) : ?>
        Aucun livre trouvé pour "<?= htmlspecialchars($_GET['title']) ?>".
        <br><a href="?page=books" class="btn-link">Voir tous les livres</a>
      <?php else : ?>
        Aucun livre disponible pour le moment.
      <?php endif; ?>
    </p>
  <?php else : ?>
    <ul class="books-grid">
      <?php foreach ($books as $book) : ?>
        <?php include __DIR__ . '/../partials/_book_card.php'; ?>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</section>
