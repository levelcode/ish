<?php
  require_once($_SERVER['DOCUMENT_ROOT'].'/libraries/connection.php');
  $mysql = new MySQL();
  $query = "SELECT * FROM `products` INNER JOIN `users` ON `users`.`id` = `products`.`Id_usuario` ";
  $products = $mysql->query($query);
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
          <td><?php print $value['Imagen_factura']; ?></td>
          <td><?php print $value['Imagen_juguete']; ?></td>
          <td class="state"><?php print ($value['Estado'] == 1)?'Activo':'Inactivo'; ?></td>
          <td><?php print $value['Nombre_cliente']; ?></td>
          <td><?php print $value['Apellido_cliente']; ?></td>
          <td><button data="<?php print $value['id']; ?>" class="btn" type="button" name="button"><?php print ($value['Estado'] == 1)?'Inhabilitar':'Habilitar' ?></button></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
