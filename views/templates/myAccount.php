
<section class="my-account">
        <div class="my-account-container">
            <h2 class="my-account-title">Mon compte</h2>
            <div class="my-account-details">
              <div class="my-account-details-content">
                <img src="<?= $user->getImage() ?>" alt="Profile Picture">
                <div class="modify-photo">
                    <label for="new_photo" class="modify-link">modifier</label>
                    <input type="file" id="new_photo" name="new_photo" accept="image/*" style="display: none;">
                </div>
                <div class="my-account-name">
                  <p><?= htmlspecialchars($user->getUsername()) ?></p>
                </div>
                <div class="my-account-date">
                  <p>Membre depuis <?= htmlspecialchars($user->getMembershipDuration()) ?> </p>
                </div>
                <div class="my-account-library">
                  <p class="my-account-library-biblioteque">BIBLIOTHEQUE</p>
                  <p class="my-account-library-livres"><img src="images/Vector.svg" alt="Book icones"> livres</p>
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
                    <tr>
                      <td><img src="" alt=""></td>
                      <td><p></p></td>
                      <td><p></p></td>
                      <td><p></p></td>
                      <td><p></p></td>
                      <td class ="action-table">
                        <div class="modify-book">
                          <label for="book-update" class="modify-link">Éditer</label>
                          <input type="" id="book-update" name="book-update" accept="" style="display: none;">
                        </div>
                        <button type="delete">Supprimer</button>
                      </td>
                    </tr>
                  </tbody>
                </table>

                </div>
        </div>
    </section>