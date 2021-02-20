
<?php
include "../../../configuracion/conexion.php";
$conexion = conexion();

$fila = $conexion->query('select imagen  from tb_comidas where id_comida='.$_POST['id']);
$id = mysqli_fetch_row($fila);
if(file_exists('../../../../images/cartelera/'.$id[0])){
    unlink('../../../../images/cartelera/'.$id[0]);
}
$conexion->query('delete from tb_comidas where id_comida='.$_POST['id']);
// $conexion->query("update from usuarios set eliminado='0' where id=".$_POST['id']);
echo '1';

?>