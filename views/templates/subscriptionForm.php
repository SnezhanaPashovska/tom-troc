<section class="connection-form-page">

  <div class="container-connection-form">
    <div class="connection-form">
      <h1>Inscription</h1>
      <form action="index.php?action=subscribeUser" method="post">
        <label for="username">Pseudo</label>
        <input type="text" name="username" id="username" placeholder="" required>
        <label for="email">Adresse email</label>
        <input type="email" name="email" id="email" placeholder="" required>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" placeholder="" required>
        <button type="submit">S'inscrire</button>
      </form>
      <p class="signup-prompt">Déjà inscrit ? <a href="index.php?action=connectionForm"> Connectez-vous</a></p>
    </div>
    <div class="connection-form-image">
      <img src="images/Mask-group.png" alt="A photo of books">
    </div>
  </div>
</section>