<?php
session_start();

require_once "../../../configuracion/conexion.php";
$conexion = conexion();
$id_2 = $_POST['id'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$cedula = $_POST['cedula'];
$telefono = $_POST['telefono'];

$email = $_POST['email'];
$estado = $_POST['estado'];

$iduser = $_SESSION['datos_login']['email'];


if (!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $nombres)) {
	echo "No se pudo actualizar el nombres $nombres <br> Ingrese solo letras ";
} else
if (!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $apellidos)) {
	echo "No se pudo actualizar el apellidos $apellidos <br> Ingrese solo letras ";
} else
	if (preg_replace("/^[0-9]{10}+$/", '', $telefono)) {
	echo "No se pudo actualizar el teléfono $telefono <br> Ingrese solo 10 números ";
} else
	
	if (preg_replace("/^[0-9]{10}+$/", '', $cedula)) {
	echo "No se pudo actualizar la cedula $cedula <br> Ingrese solo 10 números ";
} else 
	if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/', $email)) {
	echo "No se pudo actualizar el email $email";
} else {

	$sql = "UPDATE usuarios set
											nombres='$nombres', apellidos='$apellidos',		
											cedula='$cedula',	telefono='$telefono',
											email='$email', estado='$estado', usuario_editado='$iduser' where id='$id_2'";
	echo $result = mysqli_query($conexion, $sql);
}
