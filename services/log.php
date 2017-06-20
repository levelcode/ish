<?php

  require_once('../libraries/connection.php');

  $query = "INSERT INTO `log` ( `id`, `data` ) VALUES ( null, '".json_encode($_POST)."' )";
  $save = $mysql->boolean($query);

?>
