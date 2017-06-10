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
  <body class="login">

    <div class="logo">
      <img src="../assets/fb/logo.png" alt="logo" title="logo">
    </div>
    <div class="dsc">
      <p><strong>Estás a punto de darle a papá <br />los juguetes que siempre ha querido.</strong>
        <span>Conéctate a Facebook para empezar.</span>
      </p>
    </div>
    <div class="login">
      <a href="<?php print htmlspecialchars($loginUrl) ?>">
        <img src="../assets/fb/boton.png" alt="">
      </a>
    </div>

    <div class="footerlogin">
      <div class="logo1">
        <img src="../assets/fb/logo_ishop.png" alt="">
      </div>
      <div class="social">
        <img src="../assets/fb/logo_campana.png" alt="">
        <ul>
          <li class="fb"><img src="../assets/fb/facebook.png" alt="fb"></li>
          <li class="tw"><img src="../assets/fb/twitter.png" alt="tw"></li>
          <li class="tw"><img src="../assets/fb/instagram.png" alt="ins"></li>
        </ul>
      </div>
    </div>

  </body>
</html>
