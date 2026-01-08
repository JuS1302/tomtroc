<div class="auth-page">
  <div class="auth-layout">
    <!-- Partie gauche : Formulaire -->
    <div class="auth-form-section">
      <div class="auth-form-container">
        <h1>Inscription</h1>

        <?php if (isset($error)) : ?>
          <div class="error-message">
            <?= htmlspecialchars($error) ?>
          </div>
        <?php endif; ?>

        <form method="POST" action="?page=register">
          <div class="form-field">
            <label for="username">Pseudo</label>
            <input
              type="text"
              id="username"
              name="username"
              value="<?= htmlspecialchars($_POST['username'] ?? '') ?>"
              required
            >
          </div>

          <div class="form-field">
            <label for="email">Adresse email</label>
            <input
              type="email"
              id="email"
              name="email"
              value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
              required
            >
          </div>

          <div class="form-field">
            <label for="password">Mot de passe</label>
            <input
              type="password"
              id="password"
              name="password"
              required
            >
          </div>

          <button type="submit" class="btn-submit">S'inscrire</button>

          <p class="auth-switch-text">
            Déjà inscrit ? <a href="?page=login">Connectez-vous</a>
          </p>
        </form>
      </div>
    </div>

    <!-- Partie droite : Image -->
    <div class="auth-image-section">
      <img src="assets/images/image-pleine-home.jpg" alt="Bibliothèque de livres">
    </div>
  </div>
</div>
