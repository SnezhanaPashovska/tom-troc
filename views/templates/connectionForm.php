<?php
 /*Connect user*/
?>

<section class="connection-form-page"></section>

<div class="container-connection-form">
  <div class="connection-form">
  <h2>Connexion</h2>
  <form action="index.php?action=connectUser" method="post">
    <p>Adresse email</p>
    <input type="email" name="email" placeholder="" required>
    <p>Mot de passe</p>
    <input type="password" name="password" placeholder="" required>
    <button type="submit">S'inscrire</button>
  </form>
  <p class="signup-prompt">Pas de compte ? <a href="index.php?action=subscriptionForm">Inscrivez-vous</a></p>
  </div>
  <div class="connection-form-image">
    <img src="images/Mask-group.png" alt="">
  </div>
</div>