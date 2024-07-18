<section class="messages">
  <div class="messages-main-container">
    <div class="messages-inbox">
      <h2 class="messages-title">Messagerie</h2>
      <?php foreach ($latestMessages as $message) :
        $isActive = ($message['user_id_receiver'] == $user_id_receiver) ? 'active' : ''; ?>
        <a href="index.php?action=messages&receiver_id=<?= $message['user_id_receiver']; ?>" class="message-user <?= $isActive; ?>">

          <img src="<?= $message['receiver_image']; ?>" alt="Photo of the user" class="message-user-image">
          <div class="message-user-details">
            <p class="message-user-name"><?= $message['receiver_username']; ?></p>
            <p class="message-time"><?= ($message['created_at'])->format('H:i'); ?></p>
            <p class="message-content"><?= $message['text']; ?></p>
          </div>
        </a>
      <?php endforeach; ?>
    </div>

    <div class="message-area">
      <?php if ($receiver) : ?>
        <div class="message-header">
          <img src="<?= $receiver->getImage(); ?>" alt="Photo of the user" class="message-header-image">
          <p class="message-receiver"><?= $receiver->getUsername(); ?></p>
        </div>
      <?php endif; ?>

      <div class="messages-content">
        <?php foreach ($messages as $message) : ?>
          <?php if ($message['user_id_sender'] == $_SESSION['idUser']) : ?>

            <div class="message-sent">
              <span class="message-sent-timestamp"><?= ($message['created_at'])->format('d.m H:i'); ?></span>
              <p><?= $message['text']; ?></p>
            </div>
          <?php else : ?>

            <div class="message-received">
              <img src="<?= $receiver->getImage(); ?>" alt="Photo of the user" class="message-received-image">
              <span class="message-received-timestamp"><?= ($message['created_at'])->format('d.m H:i'); ?></span>
              <div class="message-received-text">
                <p><?= $message['text']; ?></p>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>

      <?php if ($receiver) : ?>
        <div>
          <form action="index.php?action=createMessage" method="post" class="message-send_message">
            <input type="hidden" name="user_id_sender" value="<?= $_SESSION['idUser']; ?>">
            <input type="hidden" name="user_id_receiver" value="<?= $user_id_receiver; ?>">
            <label for="text" class="visually-hidden">Text</label>
            <textarea name="text" id="text" placeholder="Tapez votre message ici" required></textarea>
            <button type="submit">Envoyer</button>
          </form>
        </div>
      <?php endif; ?>

    </div>
  </div>
</section>