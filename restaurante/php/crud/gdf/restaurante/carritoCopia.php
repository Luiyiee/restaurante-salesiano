<?php
session_start();

require_once "../../../configuracion/conexion.php";
$conexion = conexion();
$id_usuario = $_POST['id_usuario'];
$id_comida = $_POST['id_comida'];

	$sql = "INSERT INTO tb_carrito (`fk_id_usuario`, `fk_id_comida`) VALUES ( '$id_usuario', '$id_comida');";

	echo $result = mysqli_query($conexion, $sql);
