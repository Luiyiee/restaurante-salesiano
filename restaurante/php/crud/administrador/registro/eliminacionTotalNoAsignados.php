<?php
include "../../../configuracion/conexion.php";
$conexion = conexion();

// $conexion->query('delete from usuarios where id='.$_POST['id']);
 $conexion->query("update  registros set eliminado='0' where tribu = '' ");
echo '1';

?>