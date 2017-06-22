<?php
  session_start();
  if( !isset($_SESSION['user']) ){
    header('Location: /services/loginuser.php');
  }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>La subasta de papá | Administración</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/css/styles.min.css">

  </head>
  <body>

    <div class="container admin">
      <?php include "./includes/header.php" ?>

      <div id="main">
        <div class="main">
          <div class="tables">
            <?php include "./includes/usuarios.php" ?>
            <?php include "./includes/productos.php" ?>
            <?php include "./includes/votes.php" ?>
          </div>
        </div>
      </div>

      <?php include "./includes/footer.php" ?>
    </div>
    <script src="/js/vendors.min.js"></script>
    <script src="/js/scripts.min.js"></script>

  </body>
</html>
