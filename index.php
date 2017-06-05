<!DOCTYPE html>
<html lang="es">
  <head>
    <title>La subasta de papá</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/styles.min.css">

  </head>
  <body>

    <div class="container">
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            appId      : '1320185844755160',
            xfbml      : true,
            version    : 'v2.9'
          });
          FB.AppEvents.logPageView();
        };
        (function(d, s, id){
           var js, fjs = d.getElementsByTagName(s)[0];
           if (d.getElementById(id)) {return;}
           js = d.createElement(s); js.id = id;
           js.src = "//connect.facebook.net/en_US/sdk.js";
           fjs.parentNode.insertBefore(js, fjs);
         }(document, 'script', 'facebook-jssdk'));
      </script>
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
    <script src="js/vendors.min.js"></script>
    <script src="js/scripts.min.js"></script>

  </body>
</html>
