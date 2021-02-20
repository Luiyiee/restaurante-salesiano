<?php
include "../../../configuracion/conexion.php";
$conexion = conexion();

$fila = $conexion->query('select imagen  from tribus where id='.$_POST['id']);
$id = mysqli_fetch_row($fila);
if(file_exists('../../../../images/tribus/'.$id[0])){
    unlink('../../../../images/tribus/'.$id[0]);
}
$conexion->query("delete from tribus where id=".$_POST['id']);
// $conexion->query("update tribus set eliminado='0' where id=".$_POST['id']);
echo '1';

?>