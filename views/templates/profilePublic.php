
<section class="public-profile account">

<div class="container-profile-public">
  <div class="profile-public-info">
    <div class="profile-public-photo">
      <img src="<?= ($user->getImage()) ?>" alt="User Image">
    </div>
    <div class="profile-public-name">
      <p><?= $user->getUserName()  ?></p>
    </div>
    <div class="profile-public-date">
      <p>Membre depuis <?= $user->getMembershipDuration() ?> </p>
    </div>
    <div class="profile-public-library">
      <p class="profile-public-library-biblioteque">BIBLIOTHEQUE</p>
      <p class="profile-public-library-livres"><img src="images/Vector.svg" alt="Book icones"> livres</p>
    </div>
    <div class="profile-public-button">
      <button>Écrire un message</button>
    </div>
  </div>

  <div class="profile-public-uploads">
    <table class="profile-public-uploads-table">
      <thead class="table-header">
        <tr>
          <th>PHOTO</th>
          <th>TITRE</th>
          <th>AUTEUR</th>
          <th>DESCRIPTION</th>
        </tr>
      </thead>
      <tbody class="table-content">
      <?php foreach ($userBooks as $book): ?>
        <tr>
          <td><img src="<?= $book->getImage() ?>" alt=""></td>
          <td><p><?= $book->getTitle() ?></p></td>
          <td><p><?= $book->getAuthor() ?></p></td>
          <td><p class="book-description"><?= $book->getDescription(100) ?></p></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
</section>


