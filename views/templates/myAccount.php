
<section class="my-account">
        <div class="my-account-container">
            <h2 class="my-account-title">Mon compte</h2>
            <div class="my-account-details">
              <div class="my-account-details-content">
                <div class="my-account-details-photo">
                <img src="<?= $user->getImage() ?>" alt="Profile Picture">
                </div>
                <div class="modify-photo">
                    <label for="new_photo" class="modify-link">modifier</label>
                    <input type="file" id="new_photo" name="new_photo" accept="image/*" style="display: none;">
                </div>
                <div class="my-account-name">
                  <p><?= $user->getUsername() ?></p>
                </div>
                <div class="my-account-date">
                  <p>Membre depuis <?= $user->getMembershipDuration() ?> </p>
                </div>
                <div class="my-account-library">
                  <p class="my-account-library-biblioteque">BIBLIOTHEQUE</p>
                  <p class="my-account-library-livres"><img src="images/Vector.svg" alt="Book icones"><?= ($totalBooks) ?> livres</p>
                </div>
                </div>
                <div class="my-account-update">
                  <h2>Vos informations personnelles</h2>
                    <form action="" method="post">
                      <p>Adresse email</p>
                      <input type="email" name="email" placeholder="" required>
                      <p>Mot de passe</p>
                      <input type="password" name="password" placeholder="" required>
                      <p>Pseudo</p>
                      <input type="username" name="username" placeholder="" required>
                      <button type="submit">Enregistrer</button>
                    </form>
                </div>
            </div>
            <div class="my-account-books">
                <table class="my-account-books-table">
                  <thead class="table-header-book">
                    <tr>
                      <th>PHOTO</th>
                      <th>TITRE</th>
                      <th>AUTEUR</th>
                      <th>DESCRIPTION</th>
                      <th>DISPONIBILITE</th>
                      <th>ACTION</th>
                    </tr>
                  </thead>
                  <tbody class="table-book">
                  <?php foreach ($userBooks as $book): ?>
                    <tr>
                      <td><img src="<?= $book->getImage() ?>" alt=""></td>
                      <td><p><?= $book->getTitle() ?></p></td>
                      <td><p><?= $book->getAuthor() ?></p></td>
                      <td><p><?= $book->getDescription(100) ?></p></td>
                      <td>
                      <p class="<?= $book->isAvailable() ? 'available' : 'not-available'; ?>">
                      <?= $book->isAvailable() ? 'disponible' : 'non dispo.'; ?>
                    </p>
                      
                    </td>
                      <td class ="action-table">
                        <div class="modify-book">
                            <a href="index.php?action=editBook" class="modify-book-link">Éditer</a>
                        </div>
                          <button type="delete">Supprimer</button>
                        </div>
                      </td>                     
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                </div>
        </div>
    </section>