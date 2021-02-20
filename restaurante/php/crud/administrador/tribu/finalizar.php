<?php
include "../../../configuracion/conexion.php";
$conexion = conexion();

 $conexion->query("update registros set tribu= '' ");
// $conexion->query("update tribus set eliminado='0' where id=".$_POST['id']);
echo '1';

?>