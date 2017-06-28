<?php
  require_once($_SERVER['DOCUMENT_ROOT'].'/libraries/connection.php');
  date_default_timezone_set("America/Bogota");
  $mysql = new MySQL();
  $query = "SELECT `products`.*, `users`.`Nombre_cliente`, `users`.`Apellido_cliente` FROM `products` INNER JOIN `users` ON `users`.`id` = `products`.`Id_usuario` WHERE `Estado` = 1 ";
  $products = $mysql->query($query);

  function thumbnail($url,$w,$h){
    $old = pathinfo($url);
    $url_new = $old['dirname']."/".$old['filename']."_thumbnail.".$old['extension'];
    if( !file_exists($url_new) ){
      exec("convert -size 200x200 -quality 20 $url $url_new");
    }
    return "//lasubastadepapa.com/files/".$old['filename']."_thumbnail.".$old['extension'];
  }
?>
<div id="gallery" class="container box-container">
  <div class="row">

    <div class="title">
      <h4>Galería de Juguetes</h4>
      <span>Obtén la mayor cantidad de puntos para ganar  la subasta</span>
    </div>

    <div class="grid">

      <?php foreach ($products as $key => $value): ?>
        <div class="item">
          <div class="img popup" data-img="<?php print "//lasubastadepapa.com".$value['Imagen_juguete'] ?>" style="background-image: url(<?php print thumbnail("/home/lasubastadepapa/public_html".$value['Imagen_juguete'],200,200); ?>); height: 200px; background-size: cover;  background-position: center;">
          </div>
          <div class="title">
            <span><?php print $value['Nombre_cliente']." ".$value['Apellido_cliente'] ?></span>
            <p><?php print $value['Nombre_del_juguete'] ?></p>
          </div>
          <div class="description">
            <?php
              $query = "SELECT count(*) * 100 AS `c` FROM `votes` WHERE `votes`.`status` = 1 AND `votes`.`idProduct` = ".$value['id'];
              $votes = $mysql->query($query);
            ?>
            <span class="price"><?php print empty($votes[0]['c'])?'0':$votes[0]['c'] ?> puntos</span>
            <?php if( open_votes() ): ?>
              <input type="button" data="<?php print $value['id'] ?>" class="vote" value="VOTAR">
            <?php else: ?>
              <?php if( !btnVote() ): ?>
                <input type="button" data="openmodal" class="vote" value="VOTAR">
              <?php endif; ?>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>

      <?php //for($i = 0; $i < 40; $i++): ?>
      <!-- <div class="item">
        <div class="img">
          <img src="../assets/p1.png" alt="imagen1" title="imagen1">
        </div>
        <div class="title">
          <span>Juan Diego Martínez</span>
          <p>Policias Motorizados</p>
        </div>
        <div class="description">
          <span class="price">$500</span>
          <input type="button" value="VOTAR">
        </div>
      </div> -->
      <?php //endfor; ?>

    </div>

  </div>
</div>
