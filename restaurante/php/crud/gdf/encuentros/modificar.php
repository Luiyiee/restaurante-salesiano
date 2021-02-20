<?php
session_start();

require_once "../../../configuracion/conexion.php";
$conexion = conexion();
$id_2 = $_POST['id'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$edad = $_POST['edad'];
$telefono = $_POST['telefono'];
$sexo = $_POST['sexo'];
$encuentro = $_POST['encuentro'];

$iduser=$_SESSION['datos_login']['usuario'];


if (!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $nombres)) {
    echo "No se pudo actualizar los nombres $nombres <br> Ingrese solo letras ";
} else
if (!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $apellidos)) {
    echo "No se pudo actualizar los apellidos $apellidos <br> Ingrese solo letras ";
} else

if (preg_replace("/^[0-9]{1,2}+$/", '', $edad)) {
    echo "No se pudo actualizar la edad $edad <br> Ingrese solo 2 números ";
} else 
if (preg_replace("/^[0-9]{10}+$/", '', $telefono)) {
    echo "No se pudo actualizar el teléfno $telefono  Ingrese solo 10 números ";

} else {
    $sql = "UPDATE gdf set
    nombres='$nombres', apellidos='$apellidos', edad='$edad', telefono='$telefono', sexo='$sexo', encuentro='$encuentro', usuario='$iduser'  where id='$id_2'";
    echo $result = mysqli_query($conexion, $sql);
}
