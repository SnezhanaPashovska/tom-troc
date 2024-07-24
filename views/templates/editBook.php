<section class="edit-book">
  <div class="container-edit-book">
    <a href="index.php?action=myAccount"><img src="images/Line6.svg" alt="An image of an arrow">retour</a>
    <h1 class="edit-book-headline">Modifier les informations</h1>
    <div class="edit-book-information">
      <div class="edit-book-photo">
        <form action="<?= htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post" class="edit-form-input"
          enctype="multipart/form-data">
          <p>Photo</p>
          <img src="<?= $book->getImage(); ?>" alt="An image of the book">
          <div class="edit-photo">
            <label for="new_photo" class="edit-photo-link">Modifier la photo</label>
            <input type="file" id="new_photo" name="new_photo" accept="image/*" style="display: none;">
          </div>
      </div>
      <div class="edit-form">
        <label for="title">Titre</label>
        <input type="text" name="title" id="title" placeholder="<?= $book->getTitle() ?>">
        <label for="author">Auteur</label>
        <input type="text" name="author" id="author" placeholder="<?= $book->getAuthor() ?>">
        <label for="description">Commentaire</label>
        <textarea name="description" id="description" placeholder="<?= nl2br($book->getDescription()) ?>"></textarea>
        <label for="availability">Disponibilité</label>
        <select name="availability" id="availability">
          <option value="1">disponible</option>
          <option value="0">non disponible</option>
        </select>
        <button type="submit">Valider</button>
      </div>
      </form>
    </div>
  </div>

</section>