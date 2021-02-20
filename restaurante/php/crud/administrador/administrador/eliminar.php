<?php
include "../../../configuracion/conexion.php";
$conexion = conexion();

$fila = $conexion->query('select img_perfil  from usuarios where id='.$_POST['id']);
$id = mysqli_fetch_row($fila);
if(file_exists('../../../../images/users/administradores/'.$id[0])){
    unlink('../../../../images/users/administradores/'.$id[0]);
}
$conexion->query('delete from usuarios where id='.$_POST['id']);
// $conexion->query("update from usuarios set eliminado='0' where id=".$_POST['id']);
echo '1';

?>