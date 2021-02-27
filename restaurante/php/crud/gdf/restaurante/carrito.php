<?php
session_start();

require_once "../../../configuracion/conexion.php";
$conexion = conexion();
$id_usuario = $_POST['id_usuario'];
$id_comida = $_POST['id_comida'];

	$nombre = $_POST['nombre'];
	$precio = $_POST['precio'];
	$categoria = $_POST['categoria'];
	$subcategoria = $_POST['subcategoria'];
	$imagen = $_POST['imagen'];
	
	


				$sql = "INSERT into tb_pedidos
				(nombre,cantidad,precio,imagen,categoria,subcategoria,estado,idusuario,fecha,notificacion) values
				(
					'$nombre', '0' , '$precio' , '$imagen','$categoria',
					'$subcategoria','Pendiente' ,'$id_usuario',now(),'1'
				 )";
						echo $result = mysqli_query($conexion, $sql)or die($conexion->error);
			
