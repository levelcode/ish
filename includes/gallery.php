<?php
  require_once($_SERVER['DOCUMENT_ROOT'].'/libraries/connection.php');
  $mysql = new MySQL();
  $query = "SELECT * FROM `products` INNER JOIN `users` ON `users`.`id` = `products`.`Id_usuario` WHERE `Estado` = 1 ";
  $products = $mysql->query($query);
?>
<div id="gallery" class="container box-container">
  <div class="row">

    <div class="title">
      <h4>galería de juguetes</h4>
      <span>para subasta</span>
    </div>

    <div class="grid">

      <?php foreach ($products as $key => $value): ?>
        <div class="item">
          <div class="img">
            <img src="<?php print $value['Imagen_juguete'] ?>" alt="imagen1" title="imagen1">
          </div>
          <div class="title">
            <span><?php print $value['Nombre_cliente']." ".$value['Apellido_cliente'] ?></span>
            <p><?php print $value['Nombre_del_juguete'] ?></p>
          </div>
          <div class="description">
            <span class="price"><?php print empty($value['Puntos'])?'0':$value['Puntos'] ?> puntos</span>
            <input type="button" data="<?php print $value['id'] ?>" class="vote" value="VOTAR">
          </div>
        </div>
      <?php endforeach; ?>

      <!-- <?php //for($i = 0; $i < 40; $i++): ?>
      <div class="item">
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
      </div>
      <?php //endfor; ?> -->

    </div>

  </div>
</div>
