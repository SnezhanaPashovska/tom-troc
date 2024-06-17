<?php if (isset($user)) : ?>
<section class="public-profile account"></section>
<h2>Profile of <?= htmlspecialchars($user->getUsername()); ?></h2>

<div class="container-profile-public">
  <div class="profile-public-info">
    <div class="profile-public-photo">
      <img src="<?= htmlspecialchars($user->getImage()); ?>" alt="User Image">
    </div>
    <div class="profile-public-name">
      <p><?= htmlspecialchars($user->getUsername()); ?></p>
    </div>
    <div class="profile-public-date">
      <p>Membre depuis <?= htmlspecialchars($user->getCreationDate()->format('Y-m-d H:i:s')); ?></p>
    </div>
    <div class="profile-public-library">
      <p class="profile-public-library-biblioteque">BIBLIOTHEQUE</p>
      <p class="profile-public-library-livres"> livres</p>
    </div>
    <div class="profile-public-button">
      <button>Ecrire un message</button>
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
<?php endif; ?>

