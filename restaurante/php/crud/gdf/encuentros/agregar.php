<?php 
session_start();    

require_once "../../../configuracion/conexion.php";
$conexion = conexion();

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$edad = $_POST['edad'];
$telefono = $_POST['telefono'];
$sexo = $_POST['sexo'];
$c_r = $_POST['c_r'];

$iduser=$_SESSION['datos_login']['usuario'];

if (!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $nombres)) {
    echo "No se pudo agregar los $nombres <br> Ingrese solo letras ";
} else
if (!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $apellidos)) {
    echo "No se pudo agregar los apellidos $apellidos <br> Ingrese solo letras ";
} else

if (preg_replace("/^[0-9]{1,2}+$/", '', $edad)) {
    echo "No se pudo agregar la edad $edad <br> Ingrese solo 2 números ";
} else 
if (preg_replace("/^[0-9]{10}+$/", '', $telefono)) {
    echo "No se pudo agregar el teléfono $telefono <br> Ingrese solo 10 números ";

} else {
    $sql = "INSERT into gdf 
    (nombres,apellidos,edad,telefono,sexo,c_r,consolidado,encuentro,
    escuela_lideres,bautizado,asistencia,fecha,usuario,eliminado)
    values
    ('$nombres','$apellidos','$edad','$telefono','$sexo','$c_r','Consolidado','Encuentro',
    'Pendiente','Pendiente','Si',now(),'$iduser','1')";
    echo $result = mysqli_query($conexion, $sql)or die($conexion->error);    
}


