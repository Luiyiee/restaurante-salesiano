<?php
session_start();

require_once "../../../configuracion/conexion.php";
$conexion = conexion();
$id_2 = $_POST['id'];

$tribu = $_POST['tribu'];


if (preg_match('/^[a-zA-ZñÑáéíóúäüÁÉÍÓÚÄÜ ]+$/', $tribu) ){


 $sql = "UPDATE registros set tribu='$tribu'  where id='$id_2'";
echo $result=mysqli_query($conexion,$sql);
}
