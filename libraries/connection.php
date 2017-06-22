<?php
/**
* MySQL connection
*/
class MySQL{

  private $conexion;
  private $total_consultas;
  public $databaseName;

  function __construct(){
    $this->init();
  }

  public function init(){
    include($_SERVER['DOCUMENT_ROOT'].'/config/settings.php');
    if(!isset($this->conexion)){
      $this->conexion =  mysqli_connect($settings['db_server'],$settings['db_user'],$settings['db_pwd'],$settings['db_name']);
      if ($this->conexion->connect_errno) {
        printf("Falló la conexión: %s\n", $this->conexion->connect_error);
        exit;
      }else{
        $this->databaseName = $settings['db_name'];
      }
    }
  }

  public function query($query){
    $this->init();
    $resultado = mysqli_query($this->conexion,$query);
    if(!$resultado){
      echo 'MySQL Error: ' .$this->conexion->error;
      exit;
    }else{
      $rows = array();
      while($row = mysqli_fetch_array($resultado)){
        $rows[] = $row;
      }
      $resultado = $rows;
    }
    mysqli_close($this->conexion);
    unset($this->conexion);
    return $resultado;
  }

  public function boolean($query){
    $this->init();
    $resultado = mysqli_query($this->conexion,$query);
    if(!$resultado){
      $resultado = false;
    }else{
      $resultado = true;
    }
    mysqli_close($this->conexion);
    unset($this->conexion);
    return $resultado;
  }

}

function dateDifference($date_1 , $date_2 , $differenceFormat = '%a' ){
  $datetime1 = date_create($date_1);
  $datetime2 = date_create($date_2);
  $interval = date_diff($datetime1, $datetime2);
  return $interval->format($differenceFormat);
}


function open_votes(){
  date_default_timezone_set("America/Bogota");
  $vote = false;

  $day_start = "28";
  $month = "June";
  $year = "2017";
  $hour = "8:00 am";

  if( date("F") == $month && ( date("j") > $day_start ) && dateDifference(date("F j, Y, g:i a"),"$month $day_start, $year, $hour") <= 0 ){
    $vote = true;
  }

  return $vote;
}
?>
