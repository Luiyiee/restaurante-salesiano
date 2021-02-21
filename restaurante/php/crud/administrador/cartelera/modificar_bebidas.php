<?php
session_start();

require_once "../../../configuracion/conexion.php";
$conexion = conexion();
$id_2 = $_POST['id'];

$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$subcategoria = $_POST['subcategoria'];

$iduser = $_SESSION['datos_login']['email'];


if ($_FILES['imagen']['name'] != '') {
	$carpeta = "../../../../images/cartelera/";
	$nombreI = $_FILES['imagen']['name'];

	//imagen.casa.jpg
	$temp = explode('.', $nombreI);
	$extension = end($temp);

	$nombreFinal = time() . '.' . $extension;
	if ($extension == 'jpg' || $extension == 'png' || $extension == 'jpeg') {
		if (move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta . $nombreFinal)) {
			$fila = $conexion->query('select imagen from tb_carta where id_comida=' . $_POST['id']);
			$id = mysqli_fetch_row($fila);
			if (file_exists('../../../../images/cartelera/' . $id[0])) {
				unlink('../../../../images/cartelera/' . $id[0]);
			}
			$conexion->query("update tb_carta set imagen='" . $nombreFinal . "' where id_comida=" . $_POST['id']);
		} else {

			echo "no se puede subir la imagen";
		}
	}

}

if (!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $nombre)) {
	echo "No se pudo actualizar el nombres $nombre <br> Ingrese solo letras ";
	
}  else {
$sql = "UPDATE tb_carta set	nombre='$nombre', precio='$precio',	categoria='bebidas',
 subcategoria = '$subcategoria', idusuario='$iduser' where id_comida='$id_2'";
	echo $result = mysqli_query($conexion, $sql);


}
