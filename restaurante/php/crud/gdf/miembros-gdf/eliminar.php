<?php
include "../../../configuracion/conexion.php";
$conexion = conexion();

$conexion->query('delete from gdf where id='.$_POST['id']);
// $conexion->query("update from usuarios set eliminado='0' where id=".$_POST['id']);
echo '1';

?>