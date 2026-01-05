<!-- SECTION HERO -->
<section class="hero-section">
    <div class="hero-content">
        <div class="hero-text">
            <h1>Rejoignez nos lecteurs passionnés</h1>
            <p>
                Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture. Nous croyons en la magie du partage de connaissances et d'histoires à travers les livres.
            </p>
            <a href="index.php?page=register" class="btn btn-primary">Découvrir</a>
        </div>

        <div class="hero-image">
            <!-- IMAGE : Photo de livres empilés devant une porte -->
            <img src="assets/images/hero-books.jpg" alt="Livres empilés devant une porte ancienne">
        </div>
    </div>
</section>

<!-- SECTION LES DERNIERS LIVRES AJOUTÉS -->
<section class="books-section container">
    <h2>Les derniers livres ajoutés</h2>

    <?php if (empty($books)) : ?>
        <p class="empty-message">Aucun livre n'a encore été ajouté.</p>
    <?php else : ?>
        <ul class="books-grid">
            <?php foreach ($books as $book) : ?>
                <?php include __DIR__ . '/partials/_book_card.php'; ?>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <div class="view-all-container">
        <a href="index.php?page=books" class="btn btn-primary">Voir tous les livres</a>
    </div>
</section>

<!-- SECTION COMMENT ÇA MARCHE -->
<section class="how-it-works-section">
    <div class="container">
        <h2>Comment ça marche ?</h2>
        <p class="subtitle">
            Échanger des livres avec TomTroc c'est simple et amusant ! Suivez ces étapes pour commencer :
        </p>

        <div class="steps-grid">
            <div class="step-card">
                <div class="step-icon">📝</div>
                <h3>Inscrivez-vous gratuitement sur notre plateforme</h3>
            </div>

            <div class="step-card">
                <div class="step-icon">📚</div>
                <h3>Ajoutez les livres que vous souhaitez échanger</h3>
            </div>

            <div class="step-card">
                <div class="step-icon">🔍</div>
                <h3>Parcourez les livres disponibles chez d'autres</h3>
            </div>

            <div class="step-card">
                <div class="step-icon">💬</div>
                <h3>Proposez un échange et discutez avec d'autres passionnés</h3>
            </div>
        </div>

        <div class="view-all-container">
            <a href="index.php?page=books" class="btn btn-outline">Voir tous les livres</a>
        </div>
    </div>
</section>

<section class="full-width-image">
  <img src="assets/images/image-pleine-home.jpg" alt="Bibliothèque pleine de livres">
</section>

<!-- SECTION VALEURS -->
<section class="values-section">
  <div class="values-container">
    <h2>Nos valeurs</h2>

    <div class="values-text">
      <p>
        Chez Tom Troc, nous mettons l'accent sur le partage, la découverte et la communauté.
        Nos valeurs sont ancrées dans notre passion pour les livres et notre désir de créer
        des liens entre les lecteurs.
      </p>

      <p>
        Nous croyons en la puissance des histoires pour rassembler les gens et inspirer
        des conversations enrichissantes.
      </p>

      <p>
        Notre association a été créée avec une conviction profonde : chaque livre mérite
        d’être lu et partagé.
      </p>

      <p>
        Nous sommes passionnés par la création d'une plateforme conviviale qui permet aux
        lecteurs de se connecter et d’échanger des livres qui attendent patiemment sur
        les étagères.
      </p>

      <p class="values-signature">L’équipe Tom Troc</p>
    </div>

    <div class="values-icon">
      <img src="assets/images/heart.svg" alt="">
    </div>
  </div>
</section>
