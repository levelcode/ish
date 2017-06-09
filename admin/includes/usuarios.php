<?php
  require_once($_SERVER['DOCUMENT_ROOT'].'/libraries/connection.php');
  $mysql = new MySQL();
  $query = "SELECT * FROM `users`";
  $users = $mysql->query($query);
?>
<div class="table-users">
  <h3>Usuarios</h3>
  <table id="users-table">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Identificacion</th>
        <th>Telefono</th>
        <th>Email</th>
        <th>Ciudad</th>
        <th>Tipo</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $key => $value): ?>
        <tr>
          <td><?php print $value['Nombre_cliente']; ?></td>
          <td><?php print $value['Apellido_cliente']; ?></td>
          <td><?php print $value['Identificacion']; ?></td>
          <td><?php print $value['Telefono']; ?></td>
          <td><?php print $value['Email']; ?></td>
          <td><?php print $value['Ciudad']; ?></td>
          <td><?php print $value['Tipo_usuario']; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
