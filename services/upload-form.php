<?php
  require_once('../libraries/connection.php');

  function generateRandomString($length = 10) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) { $randomString .= $characters[rand(0, $charactersLength - 1)]; }
      return $randomString;
  }
  /*
  function image_resize($src, $dst, $width, $height, $crop=0){
    if(!list($w, $h) = getimagesize($src)) return "Unsupported picture type!";
    $type = strtolower(substr(strrchr($src,"."),1));
    if($type == 'jpeg') $type = 'jpg';
    switch($type){
      case 'bmp': $img = imagecreatefromwbmp($src); break;
      case 'gif': $img = imagecreatefromgif($src); break;
      case 'jpg': $img = imagecreatefromjpeg($src); break;
      case 'png': $img = imagecreatefrompng($src); break;
      default : return "Unsupported picture type!";
    }
    // resize
    if($crop){
      if($w < $width or $h < $height) return "Picture is too small!";
      $ratio = max($width/$w, $height/$h);
      $h = $height / $ratio;
      $x = ($w - $width / $ratio) / 2;
      $w = $width / $ratio;
    }else{
      if($w < $width and $h < $height) return "Picture is too small!";
      $ratio = min($width/$w, $height/$h);
      $width = $w * $ratio;
      $height = $h * $ratio;
      $x = 0;
    }
    $new = imagecreatetruecolor($width, $height);
    // preserve transparency
    if($type == "gif" or $type == "png"){
      imagecolortransparent($new, imagecolorallocatealpha($new, 0, 0, 0, 127));
      imagealphablending($new, false);
      imagesavealpha($new, true);
    }
    imagecopyresampled($new, $img, 0, 0, $x, 0, $width, $height, $w, $h);
    switch($type){
      case 'bmp': imagewbmp($new, $dst); break;
      case 'gif': imagegif($new, $dst); break;
      case 'jpg': imagejpeg($new, $dst); break;
      case 'png': imagepng($new, $dst); break;
    }
    return true;
  // }
  */
  function save_image($base64,$pre){
    $name = $pre."_".generateRandomString(4).".jpg";
    $dir = $_SERVER['DOCUMENT_ROOT']."/files";
    if( !is_dir($dir) ){
      mkdir($dir, 0755);
    }
    $fileName = $dir."/".$name;
    $toy = base64_decode($base64);
    file_put_contents($fileName, $toy);
    return $fileName;
  }

  $toy = $_POST['toy'];
  $bill = $_POST['bill'];
  $iduserFB = $_POST['data'];

  $url_toy = save_image($toy,'toy');
  $url_toy_thumbnail = $_SERVER['DOCUMENT_ROOT']."/files/toy_thumbnail_".generateRandomString(4).".jpg";
  $url_bill = save_image($bill,'bill');
  // image_resize($url_toy, $url_toy_thumbnail, 300, 300);

  $mysql = new MySQL();

  $query = "SELECT * FROM `users` WHERE `Id_FB` = '".$iduserFB."'";
  $id = $mysql->query($query);

  if( count($id) == 0 ){
    $query = "INSERT INTO `users` ( `id`, `Nombre_cliente`, `Apellido_cliente`, `Identificacion`, `Telefono`, `Email`, `Ciudad`, `Id_FB`, `Tipo_usuario` ) ";
    $query .= "VALUES ( null, '".$_POST['nameCliente']."', '".$_POST['lastnameClient']."', '".$_POST['identification']."', '".$_POST['phone']."', '".$_POST['mail']."' , '".$_POST['country']."', '$iduserFB', '1' )";
    $save = $mysql->boolean($query);

    $query = "SELECT * FROM `users` WHERE `Id_FB` = '".$iduserFB."'";
    $id = $mysql->query($query);
    $id = $id;
  }

  $url_bill = "/files/".basename($url_bill);
  $url_toy = "/files/".basename($url_toy);

  $query = "INSERT INTO `products` ( `id`, `Nombre_del_juguete`, `Imagen_factura`, `Imagen_juguete`, `Miniatura`, `Id_usuario`, `Estado`, `Puntos` ) ";
  $query .= "VALUES ( null, '".$_POST['nametoy']."', '$url_bill', '$url_toy', '$url_toy', ".$id[0]['id'].", 1, 0 )";
  $save = $mysql->boolean($query);

  echo json_encode($save);

  $data = array(
    "url_bill" => $url_bill,
    "url_toy" => $url_toy,
    "user_id" => $id[0]['id'],
    "fb_id" => $iduserFB,
    "toy_name" => $_POST['nametoy'],
  );

  $query = "INSERT INTO `log` ( `id`, `data`, `user` ) VALUES ( null, '".json_encode($data)."', ".$id[0]['id']." )";
  $save = $mysql->boolean($query);


?>
