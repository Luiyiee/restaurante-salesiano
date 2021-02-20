<?php
include "../../../configuracion/conexion.php";
$conexion = conexion();

// $conexion->query('delete from usuarios where id='.$_POST['id']);
 $conexion->query("update  registros set eliminado='0' where id=".$_POST['id']);
echo '1';

?>