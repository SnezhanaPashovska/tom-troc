<?php 
$userManager = new UserManager();
$user = null;

if (isset($_SESSION['idUser'])) {
    $user = $userManager->getUserById($_SESSION['idUser']);
}
?>
<section class="public-profile account">

<div class="container-profile-public">
  <div class="profile-public-info">
    <div class="profile-public-photo">
      <img src="<?= htmlspecialchars($user->getImage()) ?>" alt="User Image">
    </div>
    <div class="profile-public-name">
      <p><?= htmlspecialchars($user->getUsername()) ?></p>
    </div>
    <div class="profile-public-date">
      <p>Membre depuis <?= htmlspecialchars($user->getMembershipDuration()) ?> </p>
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
        <tr>
          <td><img src="" alt=""></td>
          <td><p></p></td>
          <td><p></p></td>
          <td><p></p></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</section>


