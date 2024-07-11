<section class="our-books">
  <div class="our-books-container">
    <div class="our-books-title">
      <h2>Nos livres à l’échange</h2>
      <div class="search-container">
        <form action="index.php?action=searchBooks" method="post">
          <img src="images/Union.svg" alt="Search magnifying glass">
          <input type="text" name="search_query" class="search_query" placeholder="Rechercher un livre">
        </form>
      </div>
    </div>
    <div class="books">
      <?php if (!empty($books) && is_array($books)) { ?>
        <?php foreach ($books as $book) { ?>
          <div class="books-list">
            <div class="books-list-details">
              <a href="index.php?action=bookDetail&id=<?= $book->getId() ?>" class="book-card">
                <img src="<?= $book->getImage() ?>" alt="">
                <h3><?= $book->getTitle() ?></h3>
                <p><?= $book->getAuthor() ?></p>
                <p class="books-list-seller">Vendu par : <?= $book->getUserName()  ?> </p>
              </a>
            </div>
          </div>
        <?php } ?>
      <?php } else { ?>
        <p>Aucun livre trouvé.</p>
      <?php } ?>
    </div>

  </div>
</section>