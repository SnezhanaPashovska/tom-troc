<section class="our-books">
  <div class="our-books-container">
    <div class="our-books-title">
      <h1>Nos livres à l’échange</h1>
      <div class="search-container">
        <form action="index.php?action=searchBooks" method="post">
          <label for="search_query" class="visually-hidden">Search query</label>
          <img src="images/Union.svg" alt="Search magnifying glass">
          <input type="text" name="search_query" id="search_query" class="search_query"
            placeholder="Rechercher un livre">
        </form>
      </div>
    </div>
    <div class="books">
      <?php if (!empty($books) && is_array($books)) { ?>
        <?php foreach ($books as $book) { ?>
          <div class="books-list">
            <div class="books-list-details">
              <a href="index.php?action=bookDetail&id=<?= $book->getId() ?>" class="book-card">
                <img src="<?= $book->getImage() ?>" alt="Photo of the book">
                <h2><?= $book->getTitle() ?></h2>
                <p><?= $book->getAuthor() ?></p>
                <p class="books-list-seller">Vendu par : <?= $book->getUserName() ?> </p>
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