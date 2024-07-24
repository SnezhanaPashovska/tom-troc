<section class="single-book">
  <div class="single-book-container">
    <div class="single-book-main-container">
      <div class="breadcrumb">
        <a href="index.php?action=ourBooks">Nos livres</a> > <?= $book->getTitle() ?>
      </div>
      <div class="single-book-detail">
        <img src="<?= $book->getImage() ?>" alt="<?= $book->getTitle() ?>">
        <div class="single-book-text">
          <h1><?= $book->getTitle() ?></h1>
          <p class="single-book-author">par Author <?= $book->getAuthor() ?></p>
          <hr class="styled-hr">
          <p class="single-book-description">DESCRIPTION</p>
          <P class="single-book-txt-desc">
            <?= nl2br($book->getDescription()) ?>
          </P>
          <div class="single-book-owner">
            <p class="sb-owner">PROPRIÉTAIRE</p>
            <a href="index.php?action=profilePublic&id=<?= $book->getIdUser() ?>" class="sb-owner-name">
              <img src="<?= $user->getImage() ?: 'images/default_profile_image.jpg' ?>"
                alt="<?= $user->getUsername() ?>">
              <?= $user->getUsername() ?>
            </a>
          </div>
          <a href="index.php?action=messages&receiver_id=<?= $user->getId(); ?>" class="single-book-envoyer">Envoyer un
            message</a>
        </div>


      </div>
    </div>

  </div>

</section>