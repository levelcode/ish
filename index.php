<?php
  session_start();
  if( !isset($_SESSION['fb_user']) ){
    header('Location: /services/login.php');
  }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>La subasta de papá</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/styles.min.css">
    <meta property="og:url"         content="https://lasubastadepapa.com" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="La Subasta de Papa" />
    <meta property="og:description"        content="Compra el regalo de papá en iShop y por tus compras de $1´000.000 o más, participa y gana una Juguetería completa para papá, que incluye: iPhone 7, MacBook Air, Apple TV, Audífonos Beats y iPad" />
    <meta property="og:image"              content="https://lasubastadepapa.com/assets/share_fb.jpg" />

  </head>
  <body class="<?php (isset($_SESSION['fb_user']))?print'user-login':print'user-logout'; ?>">

    <div class="container">
      <?php include "./includes/header.php" ?>

      <?php include "./includes/banner.php" ?>
      <div id="main">
        <div class="main">
          <?php include "./includes/steps.php" ?>
          <?php include "./includes/form.php" ?>
          <?php include "./includes/gallery.php" ?>
        </div>
      </div>

      <?php include "./includes/footer.php" ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <script src="js/vendors.min.js"></script>
    <script src="js/scripts.min.js"></script>

  </body>
</html>
