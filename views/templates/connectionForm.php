<?php
/*Connect user*/
?>

<section class="connection-form-page">

  <div class="container-connection-form">
    <div class="connection-form">
      <h1>Connexion</h1>
      <form action="index.php?action=connectUser" method="post">
        <label for="email">Adresse email</label>
        <input type="email" name="email" id="email" placeholder="" required>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" placeholder="" required>
        <button type="submit">S'inscrire</button>
      </form>
      <p class="signup-prompt">Pas de compte ? <a href="index.php?action=subscriptionForm">Inscrivez-vous</a></p>
    </div>
    <div class="connection-form-image">
      <img src="images/Mask-group.png" alt="An image of books">
    </div>
  </div>
</section>