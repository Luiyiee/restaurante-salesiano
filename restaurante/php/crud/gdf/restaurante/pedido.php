<?php
session_start();

require_once "../../../configuracion/conexion.php";
$conexion = conexion();
$id = $_POST['id'];

	$sql = "DELETE FROM `tb_carrito` WHERE id='$id'";

	echo $result = mysqli_query($conexion, $sql);
