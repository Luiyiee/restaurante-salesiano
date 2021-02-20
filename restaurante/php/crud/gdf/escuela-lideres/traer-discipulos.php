<?php 
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
session_start();
require_once "../../../configuracion/conexion.php";
$conexion = conexion();
$nombres = $_GET['nombres'];
$iduser = $_SESSION['datos_login']['usuario'];
// var_dump($nombres);

$sql_traer = "SELECT * FROM gdf where encuentro= 'Si_E' and escuela_lideres='No_E' and usuario='$iduser' and eliminado ='1' and nombres = 'Elias' ";
$result_traer = mysqli_query($conexion, $sql_traer);
$traer =  mysqli_fetch_assoc($result_traer);
// while ($ver = mysqli_fetch_array($result_traer)) {
//     $traer = $ver['id'] . "||" .
//         $ver['nombres'] . "||" .
//         $ver['apellidos'] . "||" .
//         $ver['edad'] . "||" .
//         $ver['telefono'] . "||" .
//         $ver['sexo'] . "||" .
//         $ver['encuentro'];

//     }
    $data = array($traer);
// $data = $traer;
echo $return = json_encode($data);
return $return;
        //  var_dump($data);
  
        //  var_dump( json_encode($data, JSON_FORCE_OBJECT));
    //    return  json_encode($data);
            // SELECT * FROM gdf where encuentro= 'Si_E' and escuela_lideres='No_E' and usuario='GDF Rubi' and eliminado ='1' and nombres = 'Elias'