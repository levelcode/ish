<?php if(isset($_SESSION['fb_user'])): ?>
  <div id="user-bar">
    <div class="img"><img src="<?php print $_SESSION['fb_user']["picture"]["url"]; ?>" alt=""></div>
    <div class="name"><a href="/services/logout.php">Salir</a></div>
    <div class="name">|</div>
    <div class="name"><?php print $_SESSION['fb_user']["name"]; ?></div>
  </div>
<?php endif; ?>
<div id="header" class="container">
  <div class="row">
    <div class="col col-xs-12 col-md-12 col-lg-10 col-lg-offset-1">
      <div class="logo col-xs-3 col-md-3 col-lg-3">
        <a href="http://www.ishopcolombia.com/">
          <img src="../assets/p2.png" alt="Subasta" title="Subasta">
        </a>
      </div>
      <div class="links col-xs-9 col-md-9 col-lg-9">
        <div class="nav">
          <div id="main-menu">
            <ul class="menu">
              <li data="1"><a href="#">INICIO</a></li>
              <li data="2"><a href="#">INSTRUCCIONES</a></li>
              <li data="3"><a href="#">REGISTRO</a></li>
              <li data="4"><a href="#">GALERÍA</a></li>
            </ul>
          </div>
          <div class="social-links">
            <ul class="social">
              <li class="fb"><a href="https://www.facebook.com/iShopColombia/"></a></li>
              <li class="tw"><a href="https://twitter.com/iShopCol?lang=es"></a></li>
              <li class="tg"><a href="https://www.instagram.com/ishopcolombia/"></a></li>
            </ul>
          </div>
          <div class="other-logos">
            <ul class="logos">
              <li class="lg1"><img src="../assets/logoadicional1.png" alt="logo1" title="logo1"></li>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
