<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/1fff66d8ed.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/css/style.css">
  <title>Tom Troc</title>
</head>
<body>
  <header class="header">
    <div class="header-logo">
      <img class="logo" src="/images/logo@2x.png" alt="Logo Tom Troc">
    </div>
    <div class="header-menu">
      <nav class="menu-list">
        <ul class="menu-list-nav">
          <li><a href="index.php?action=home">Accueil</a></li>
          <li><a href="#">Nos livres à l'echange</a></li>
        </ul>
      </nav>
      <div></div>
      <nav class="menu-list">
        <ul class="menu-list-nav">
          <li><a href="#">Messagerie</a></li>
          <li><a href="index.php?action=profilePublic">Mon compte</a></li>
          <li><a href="#">Connexion</a></li>
          <li><a href="#">Deconnexion</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main>
  <?= $content; /* Ici est affiché le contenu réel de la page. */ ?>
  </main>

  <footer>
    <nav class="nav-footer">
      <ul class="menu-list-footer">
        <li><a href="">Politique de confidentialité</a></li>
        <li><a href="">Mentions légales</a></li>
        <li><a href=""> Tom Troc©</a></li>
      </ul>
      <img src="/images/logo_tom_troc_simple.png" alt="Logo TT" class="logo-footer">
    </nav>
  </footer>
  
</body>
</html>