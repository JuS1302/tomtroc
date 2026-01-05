<section class="books-section container">
  <h1>Nos livres à l'échange</h1>

  <?php if (empty($books)) : ?>
    <p class="empty-message">Aucun livre disponible pour le moment.</p>
  <?php else : ?>
    <ul class="books-grid">
      <?php foreach ($books as $book) : ?>
        <?php include __DIR__ . '/../partials/_book_card.php'; ?>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</section>
