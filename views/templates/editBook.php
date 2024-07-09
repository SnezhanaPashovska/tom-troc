<section class="edit-book">
  <div class="container-edit-book">
    <a href="index.php?action=myAccount"><img src="images/Line 6.svg" alt="">retour</a>
    <h2 class="edit-book-headline">Modifier les informations</h2>
    <div class="edit-book-information">
      <div class="edit-book-photo">
      <form action="" method="post" class="edit-form-input" enctype="multipart/form-data">
        <p>Photo</p>
        <img src="<?php echo $book->getImage(); ?>" alt="">
        <div class="edit-photo">
            <label for="new_photo" class="edit-photo-link">Modifier la photo</label>
            <input type="file" id="new_photo" name="new_photo" accept="image/*" style="display: none;">
        </div>
      </div>
      <div class="edit-form">
        
        <p>Titre</p>
        <input type="title" name="title" placeholder="" required>
        <p>Auteur</p>
        <input type="author" name="author" placeholder="" required>
        <p>Commentaire</p>
        <textarea name="description" placeholder=""></textarea>
        <p>Disponibilité</p>
        <select name="availability">
            <option value="1">disponible</option>
            <option value="0">non disponible</option>
        </select>
        
        <button type="submit">Valider</button>
        </form>
      </div>

    </div>
  </div>

</section>