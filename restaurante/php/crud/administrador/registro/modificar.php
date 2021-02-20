<?php
session_start();

require_once "../../../configuracion/conexion.php";
$conexion = conexion();
$id_2 = $_POST['id'];

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$edad = $_POST['edad'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$sexo = $_POST['sexo'];


if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $nombres) &&
    preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $apellidos) &&
    preg_replace("/[^0-9]/", '', $edad) &&
    preg_replace("/[^0-9]/", '', $telefono) &&
    preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/', $email)
){


 $sql = "UPDATE registros set nombres='$nombres', apellidos='$apellidos', edad='$edad', telefono='$telefono',	
 email='$email', sexo='$sexo' where id='$id_2'";
echo $result=mysqli_query($conexion,$sql);
}
