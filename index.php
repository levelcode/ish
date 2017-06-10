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
    <script src="js/scripts.js"></script>
    <!-- <script src="js/scripts.min.js"></script>-->

  </body>
</html>
