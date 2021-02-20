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



if ($_FILES['imagen']['name'] != '') {
	$carpeta = "../../../../images/users/clientes/";
	$nombreI = $_FILES['imagen']['name'];

	//imagen.casa.jpg
	$temp = explode('.', $nombreI);
	$extension = end($temp);

	$nombreFinal = time() . '.' . $extension;
	if ($extension == 'jpg' || $extension == 'png' || $extension == 'jpeg') {
		if (move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta . $nombreFinal)) {
			$fila = $conexion->query('select img_perfil from usuarios where id=' . $_POST['id']);
			$id = mysqli_fetch_row($fila);
			if (file_exists('../../../../images/users/clientes/' . $id[0])) {
				unlink('../../../../images/users/clientes/' . $id[0]);
			}
			$conexion->query("update usuarios set img_perfil='" . $nombreFinal . "' where id=" . $_POST['id']);
		} else {

			echo "no se puede subir la imagen";
		}
	}

}

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
