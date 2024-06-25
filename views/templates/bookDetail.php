<?php
$userManager = new UserManager();
$user = null;

if (isset($_SESSION['idUser'])) {
    $user = $userManager->getUserById($_SESSION['idUser']);
}

?>

<section class="single-book">
  <div class= "single-book-container">
    <div class= "single-book-main-container">
      <div class="breadcrumb">
        <a href="index.php?action=ourBooks">Nos livres</a> > Book
      </div>
      <div class="single-book-detail">
        <img src="images/Rectangle 2-3.jpg" alt="">
          <div class="single-book-text">
          <h3>The book title</h3>
          <p class="single-book-author">par Author</p>
          <hr class="styled-hr">
          <p class="single-book-description">DESCRIPTION</p>
          <P class="single-book-txt-desc">
         
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac erat ac felis vulputate tristique. Suspendisse potenti. Sed sit amet justo id mauris feugiat feugiat. Praesent ultrices neque non justo aliquam, a feugiat lectus viverra. Mauris vehicula condimentum mauris, nec viverra sapien fringilla id. Nulla facilisi. In hac habitasse platea dictumst. Vivamus et erat ut elit pharetra ultricies. Donec sed ultricies risus. Aenean nec scelerisque sapien. Vivamus vel dictum urna. Curabitur in enim ac velit varius dignissim nec ac turpis. Nunc condimentum felis sed augue ultrices, in faucibus eros facilisis. Cras porta bibendum risus, et convallis est blandit nec. Fusce posuere felis vel magna consequat, a dictum metus dignissim.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac erat ac felis vulputate tristique. Suspendisse potenti. Sed sit amet justo id mauris feugiat feugiat. Praesent ultrices neque non justo aliquam, a feugiat lectus viverra. Mauris vehicula condimentum mauris, nec viverra sapien fringilla id. Nulla facilisi. In hac habitasse platea dictumst. Vivamus et erat ut elit pharetra ultricies. Donec sed ultricies risus. Aenean nec scelerisque sapien. Vivamus vel dictum urna. Curabitur in enim ac velit varius dignissim nec ac turpis. Nunc condimentum felis sed augue ultrices, in faucibus eros facilisis. Cras porta bibendum risus, et convallis est blandit nec. Fusce posuere felis vel magna consequat, a dictum metus dignissim.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac erat ac felis vulputate tristique. Suspendisse potenti. Sed sit amet justo id mauris feugiat feugiat. Praesent ultrices neque non justo aliquam, a feugiat lectus viverra. Mauris vehicula condimentum mauris, nec viverra sapien fringilla id. Nulla facilisi. In hac habitasse platea dictumst. Vivamus et erat ut elit pharetra ultricies. Donec sed ultricies risus. Aenean nec scelerisque sapien. Vivamus vel dictum urna. Curabitur in enim ac velit varius dignissim nec ac turpis. Nunc condimentum felis sed augue ultrices, in faucibus eros facilisis. Cras porta bibendum risus, et convallis est blandit nec. Fusce posuere felis vel magna consequat, a dictum metus dignissim.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac erat ac felis vulputate tristique. Suspendisse potenti. Sed sit amet justo id mauris feugiat feugiat. Praesent ultrices neque non justo aliquam, a feugiat lectus viverra. Mauris vehicula condimentum mauris, nec viverra sapien fringilla id. Nulla facilisi. In hac habitasse platea dictumst. Vivamus et erat ut elit pharetra ultricies. Donec sed ultricies risus. Aenean nec scelerisque sapien. Vivamus vel dictum urna. Curabitur in enim ac velit varius dignissim nec ac turpis. Nunc condimentum felis sed augue ultrices, in faucibus eros facilisis. Cras porta bibendum risus, et convallis est blandit nec. Fusce posuere felis vel magna consequat, a dictum metus dignissim.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac erat ac felis vulputate tristique. Suspendisse potenti. Sed sit amet justo id mauris feugiat feugiat. Praesent ultrices neque non justo aliquam, a feugiat lectus viverra. Mauris vehicula condimentum mauris, nec viverra sapien fringilla id. Nulla facilisi. In hac habitasse platea dictumst. Vivamus et erat ut elit pharetra ultricies. Donec sed ultricies risus. Aenean nec scelerisque sapien. Vivamus vel dictum urna. Curabitur in enim ac velit varius dignissim nec ac turpis. Nunc condimentum felis sed augue ultrices, in faucibus eros facilisis. Cras porta bibendum risus, et convallis est blandit nec. Fusce posuere felis vel magna consequat, a dictum metus dignissim.
        </P>
          <div class="single-book-owner">
          <p class="sb-owner">PROPRIÉTAIRE</p>
          <a href="index.php?action=profilePublic" class="sb-owner-name"><img src="images/Rectangle 2.jpg" alt="">Owner</a>
          </div>
          <button>Envoyer un message</button>
          </div>
          
         
      </div>
    </div>

  </div>

</section>