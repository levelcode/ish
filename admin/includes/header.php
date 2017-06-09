<?php if(isset($_SESSION['user'])): ?>
  <div id="user-bar">
    <div class="img"><img src="<?php print $_SESSION['fb_user']["picture"]["url"]; ?>" alt=""></div>
    <div class="name"><a href="/services/logout.php">Salir</a></div>
    <div class="name">|</div>
    <div class="name"><?php print $_SESSION['user']; ?></div>
  </div>
<?php endif; ?>
<div id="header" class="container">
  <div class="row">
    <div class="logo">
      <a href="/">
        <img src="../assets/logo_subasta.png" alt="Subasta" title="Subasta">
      </a>
    </div>
  </div>
</div>
