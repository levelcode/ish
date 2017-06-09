<?php
  session_start();
  if( isset($_SESSION['fb_user']) ){
    header('Location: /');
  }
  require_once("../libraries/Facebook/autoload.php");
  $fb = new Facebook\Facebook([
    'app_id' => '1320185844755160', // Replace {app-id} with your app id
    'app_secret' => '1c3af0cd3625c0c3a11669e20b6478a7',
    'default_graph_version' => 'v2.2',
    ]);
  $helper = $fb->getRedirectLoginHelper();
  $permissions = ['email']; // Optional permissions
  $loginUrl = $helper->getLoginUrl('https://'.$_SERVER['SERVER_NAME'].'/services/fb-callback.php', $permissions);
  echo '';
?>
<html lang="es">
  <head>
    <title>La subasta de papá</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/styles.min.css">
  </head>
  <body class="login loginuser">

    <div class="logo">
      <img src="../assets/logo_subasta.png" alt="logo" title="logo">
    </div>
    <div class="formlogin">
      <form>
        <div class="input-field form-group">
          <input class="form-control" type="text" name="user" placeholder="Nombre de usuario">
        </div>
        <div class="input-field form-group">
          <input class="form-control" type="password" name="pwd" placeholder="Contraseña">
        </div>
        <input class="btn" type="submit" name="login" value="Iniciar">
      </form>
    </div>

    <?php include "../includes/footer.php" ?>
    <script src="/js/vendors.min.js"></script>
    <script src="/js/scripts.min.js"></script>


  </body>
</html>
