<?php 
session_start();
include_once 'conexion.php';
$id_email=$_SESSION['datos_login']['email'];
if($_SESSION['datos_login']['conexion']==='Conectado'){
	$sql="UPDATE usuarios SET conexion='Desconectado' WHERE email='$id_email' ";
	$result = $conexion->query($sql);
}
unset($_SESSION['datos_login']);
header("Location: ../../iniciar-sesion.php");
session_destroy();
?>