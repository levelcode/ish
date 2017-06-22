<?php
  session_start();
  if( isset($_SESSION['fb_user']) ){
    require_once('../libraries/connection.php');
    $ID = $_POST['id'];
    $VOTE = $_POST['vote'];
    $mysql = new MySQL();
    $fbid = $_SESSION['fb_user']['id'];

    $query = "SELECT * FROM `votes` WHERE `idProduct` = '".$ID."' AND `Fbid` = '".$fbid."' ";
    $results = $mysql->query($query);

    if( count($results) == 0 ){
      $query = "SELECT * FROM `products` WHERE `id` = '".$ID."' AND `Puntos` = ".$VOTE." ";
      $results = $mysql->query($query);

      if( count($results) > 0 ){

        $query = "INSERT INTO `votes` ( `id`, `Fbid`, `idProduct`, `status` ) VALUES ( null , '$fbid' , $ID, 1  ) ";
        $mysql->boolean($query);

        $VOTE += 100;
        $query = "UPDATE `products` SET `Puntos` = ".$VOTE." WHERE `id` = '".$ID."' ";
        $update = $mysql->boolean($query);

        echo json_encode($update);
      }else{
        echo json_encode("Error ya votaste");
      }
    }else{
      echo json_encode("Error ya exite un registro con el mismo fb id");
    }
  }else{
    echo json_encode("Error user no login");
  }
?>
