<?php
session_start();

require_once "../../../configuracion/conexion.php";
$conexion = conexion();
$id_2 = $_POST['id'];
$nombre = $_POST['nombre'];
$lider_tribu = $_POST['lider_tribu'];
$puntos = $_POST['puntos'];

if (
	preg_match('/^[a-zA-ZñÑáéíóúäüÁÉÍÓÚÄÜ ]+$/', $nombre) &&
	preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $lider_tribu) &&
	preg_replace("/[^0-9]/", '', $puntos)
) {

	if ($_FILES['imagen']['name'] != '') {
		$carpeta = "../../images/tribus/";
		$nombreI = $_FILES['imagen']['name'];

		//imagen.casa.jpg
		$temp = explode('.', $nombreI);
		$extension = end($temp);

		$nombreFinal = time() . '.' . $extension;
		if ($extension == 'jpg' || $extension == 'png' || $extension == 'jpeg' || $extension = 'JPG') {
			if (move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta . $nombreFinal)) {
				$fila = $conexion->query('select imagen from tribus where id=' . $_POST['id']);
				$id = mysqli_fetch_row($fila);
				if (file_exists('../../../../images/tribus/' . $id[0])) {
					unlink('../../../../images/tribus/' . $id[0]);
				}
				$conexion->query("update tribus set imagen ='" . $nombreFinal . "' where id=" . $_POST['id']);
			} else {

				echo "no se puede subir la imagen";
			}
		}
	}
	
	$consulta = "select puntos as pts from tribus where id='$id_2' ";
	$procesando = mysqli_query($conexion,$consulta);
	$puntos_anteriores = mysqli_fetch_assoc($procesando);
	if($puntos != $puntos_anteriores['pts']){
		
		$puntos_nuevos = $puntos_anteriores['pts'] + $puntos;
		$sql = "UPDATE tribus set
		nombre='$nombre', lider_tribu='$lider_tribu', puntos='$puntos_nuevos'  where id='$id_2'";
		echo $result = mysqli_query($conexion, $sql);
	}else{
		$puntos_nuevos =  $puntos;

		$sql = "UPDATE tribus set
    nombre='$nombre', lider_tribu='$lider_tribu', puntos='$puntos_nuevos'  where id='$id_2'";
	echo $result = mysqli_query($conexion, $sql);
   }
}
