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
    <title>LA SUBASTA DE PAPÁ - iShop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="fb:app_id" content="1320185844755160" />
    <meta property="og:title" content="LA SUBASTA DE PAPÁ - iShop" />
    <meta property="og:description" content="Compra el regalo de papá en iShop y por tus compras de $1´000.000 o más, participa y gana una Juguetería completa para papá, que incluye: iPhone 7, MacBook Air, Apple TV, Audífonos Beats y iPad" />
    <meta property="og:image:secure_url" content='https://lasubastadepapa.com/assets/share_fb.jpg' />
    <meta property="og:image" content='https://lasubastadepapa.com/assets/share_fb.jpg' />
    <meta property="og:image:width" content="1024" />
    <meta property="og:image:height" content="1024" />      
    <meta property="og:url" content='https://lasubastadepapa.com?fb=true' />
    <link rel="stylesheet" href="../css/styles.min.css">
  </head>
  <body class="login" sytle="width: 440px; margin: 0 auto;">

    <div class="logo">
      <img src="../assets/fb/logo.png" alt="logo" title="logo">
    </div>
    <div class="dsc">
      <p><strong>Estás a punto de darle a papá <br />los juguetes que siempre ha querido.</strong>
        <span style="font-family: sans-serif;">Conéctate a Facebook para empezar.</span>
      </p>
    </div>
    <div class="login">
      <a href="<?php print htmlspecialchars($loginUrl) ?>">
        <img src="../assets/fb/boton.png" alt="">
      </a>
    </div>

    <div class="footerlogin" style="z-index:-1;">
      <div class="logo1">
        <a href="http://www.ishopcolombia.com/"><img src="../assets/fb/logo_ishop.png" alt=""></a>
      </div>
      <div class="social">
        <img src="../assets/fb/logo_campana.png" alt="">
        <ul>
          <li class="fb"><a href="https://www.facebook.com/iShopColombia/"><img src="../assets/fb/facebook.png" alt="fb"></a></li>
          <li class="tw"><a href="https://twitter.com/iShopCol?lang=es"><img src="../assets/fb/twitter.png" alt="tw"></a></li>
          <li class="tw"><a href="https://www.instagram.com/ishopcolombia/"><img src="../assets/fb/instagram.png" alt="ins"></a></li>
        </ul>
      </div>
    </div>

  </body>
</html>
