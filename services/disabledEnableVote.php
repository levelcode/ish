<?php
  require_once('../libraries/connection.php');

  $id = $_POST['id'];
  $state = $_POST['state'];

  $mysql = new MySQL();

  $query = "UPDATE `votes` SET `status` = $state WHERE `id` = '".$id."' ";
  $update = $mysql->boolean($query);

  echo json_encode($update);

?>
