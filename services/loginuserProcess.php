<?php
  session_start();
  if( isset($_SESSION['user']) ){
    header('Location: /admin/index.php');
  }

  require_once('../libraries/connection.php');

  $user = $_POST['user'];
  $pwd = $_POST['pwd'];

  $mysql = new MySQL();

  $query = "SELECT * FROM `admin` WHERE `user` = '".$user."' AND '".$pwd."' ";
  $u = $mysql->query($query);

  if( count($u) > 0 ){
    session_start();
    $_SESSION['user'] = $user;
    echo json_encode($user);
  }else{
    echo json_encode("Error");
  }


?>
