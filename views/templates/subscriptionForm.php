<section class="connection-form-page">

  <div class="container-connection-form">
    <div class="connection-form">
      <h2>Inscription</h2>
      <form action="index.php?action=subscribeUser" method="post">
        <p>Pseudo</p>
        <input type="username" name="username" placeholder="" required>
        <p>Adresse email</p>
        <input type="email" name="email" placeholder="" required>
        <p>Mot de passe</p>
        <input type="password" name="password" placeholder="" required>
        <button type="submit">S'inscrire</button>
      </form>
      <p class="signup-prompt">Déjà inscrit ? <a href="index.php?action=connectionForm"> Connectez-vous</a></p>
    </div>
    <div class="connection-form-image">
      <img src="images/Mask-group.png" alt="">
    </div>
  </div>
</section>