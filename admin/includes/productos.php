<?php
  require_once($_SERVER['DOCUMENT_ROOT'].'/libraries/connection.php');
  $mysql = new MySQL();
  $query = "SELECT `products`.*, `users`.`Nombre_cliente`, `users`.`Apellido_cliente` FROM `products` INNER JOIN `users` ON `users`.`id` = `products`.`Id_usuario` ";
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
<div class="table-products">
  <h3>Juguetes</h3>
  <table id="toys-table">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Factura</th>
        <th>Juguete</th>
        <th>Estado</th>
        <th>Nombre del usuario</th>
        <th>Apellido del usuario</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($products as $key => $value): ?>
        <tr data="<?php print $value['Estado']; ?>">
          <td><?php print $value['Nombre_del_juguete']; ?></td>
          <td><a class="fancybox" href="<?php print "//lasubastadepapa.com".$value['Imagen_factura']; ?>"><img src="<?php print thumbnail("/home/lasubastadepapa/public_html".$value['Imagen_factura'],200,200); ?>" alt=""></a></td>
          <td><a class="fancybox" href="<?php print "//lasubastadepapa.com".$value['Imagen_juguete']; ?>"><img src="<?php print thumbnail("/home/lasubastadepapa/public_html".$value['Imagen_juguete'],200,200); ?>" alt=""></a></td>
          <td class="state"><?php print ($value['Estado'] == 1)?'Activo':'Inactivo'; ?></td>
          <td><?php print $value['Nombre_cliente']; ?></td>
          <td><?php print $value['Apellido_cliente']; ?></td>
          <td><button onclick="adminEnableDisable(this)" data="<?php print $value['id']; ?>" class="btn" type="button" name="button"><?php print ($value['Estado'] == 1)?'Inhabilitar':'Habilitar' ?></button></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
