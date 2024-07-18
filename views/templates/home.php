<section class="home-template">
  <div class="home-container">
    <div class="home-main">
      <div class="home-main-text">
        <h1>Rejoignez nos lecteurs passionnés</h1>
        <p>Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture. Nous croyons en la magie du partage de connaissances et d'histoires à travers les livres.</p>
        <a href="index.php?action=ourBooks">Découvrir</a>
      </div>
      <div class="home-main-image">
        <img src="images/hamza-nouasria-KXrvPthkmYQ-unsplash1.jpg" alt="Photo of a man reading a book">
        <p>Hamza</p>
      </div>
    </div>
    <div class="home-last-books">
      <div class="home-last-books-title">
        <h2>Les derniers livres ajoutés</h2>
      </div>
      <div class="home-last-books-list">

        <?php foreach ($latestBooks as $book) : ?>

          <div class="home-last-book">
            <img src="<?= $book->getImage(); ?>" alt="A photo of the book">
            <p class="last-book-title"> <?php $book->getTitle(); ?> </p>
            <p class="last-book-author"><?= $book->getAuthor(); ?></p>
            <p class="last-book-seller">Vendu par: <?= $book->getUserName()  ?></p>
          </div>
        <?php endforeach; ?>

      </div>
      <a href="index.php?action=ourBooks">Voir tous les livres</a>
    </div>
    <div class="home-details">
      <div class="home-details-text">
        <h3>Comment ça marche ?</h3>
        <p>Échanger des livres avec TomTroc c’est simple et amusant ! Suivez ces étapes pour commencer :</p>
      </div>
      <div class="home-details-cards">
        <p>Inscrivez-vous gratuitement sur notre plateforme.</p>
        <p>Ajoutez les livres que vous souhaitez échanger à votre profil.</p>
        <p>Parcourez les livres disponibles chez d'autres membres.</p>
        <p>Proposez un échange et discutez avec d'autres passionnés de lecture.</p>
      </div>
      <div class="home-details-button">
        <a href="index.php?action=ourBooks">Voir tous les livres</a>
      </div>
    </div>
    <div class="home-banner">
      <img src="images/Maskgroup-1.jpg" alt="Banner">
    </div>
    <div class="home-values">
      <h3>Nos valeurs</h3>
      <p>Chez Tom Troc, nous mettons l'accent sur le partage, la découverte et la communauté. Nos valeurs sont ancrées dans notre passion pour les livres et notre désir de créer des liens entre les lecteurs. Nous croyons en la puissance des histoires pour rassembler les gens et inspirer des conversations enrichissantes.
        <br><br>Notre association a été fondée avec une conviction profonde : chaque livre mérite d'être lu et partagé.
        <br><br>Nous sommes passionnés par la création d'une plateforme conviviale qui permet aux lecteurs de se connecter,
        de partager leurs découvertes littéraires et d'échanger des livres qui attendent patiemment sur les étagères.
      </p>
      <p class="home-values-equipe">L’équipe Tom Troc</p>
      <img src="images/Vector2-1.svg" alt="Heart ">
    </div>
  </div>
</section>