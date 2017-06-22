<?php
  require_once($_SERVER['DOCUMENT_ROOT'].'/libraries/connection.php');
  $mysql = new MySQL();
  $query  = "SELECT `votes`.*, `users`.`Nombre_cliente`, `users`.`Apellido_cliente`, `users`.`id` AS `id_user` FROM `votes` INNER JOIN `users` ON `users`.`Id_FB` = `votes`.`Fbid` ";
  $products = $mysql->query($query);
?>
<div class="table-products">
  <h3>Votos</h3>
  <table id="votes-table">
    <thead>
      <tr>
        <th>Nombre del usuario</th>
        <th>Id del juguete</th>
        <th>Estado</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      <?php if( count($products) == 0 ): ?>
        <tr class="noresults">
          <td colspan="3">No se tienen votos.</td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      <?php else: ?>
      <?php foreach ($products as $key => $value): ?>
        <tr data="<?php print $value['status']; ?>">
          <td><?php print $value['Nombre_cliente']." ".$value['Apellido_cliente']; ?></td>
          <td><?php print $value['idProduct']; ?></td>
          <td class="state"><?php print ($value['status'] == 1)?'Activo':'Inactivo'; ?></td>
          <td><button onclick="adminEnableDisable(this)" data="<?php print $value['id']; ?>" class="btn" type="button" name="button"><?php print ($value['status'] == 1)?'Inhabilitar':'Habilitar' ?></button></td>
        </tr>
      <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>
