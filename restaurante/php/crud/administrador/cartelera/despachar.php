<?php
include "../../../configuracion/conexion.php";
$conexion = conexion();

$nombre = $_POST['nombre'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];
$subcategoria = $_POST['subcategoria'];
$estado = $_POST['estado'];
$iduser = $_POST['idusuario'];

// $conexion->query('delete from cartelera where id='.$_POST['id']);

$query = $conexion->query("update tb_pedidos set estado='$estado' where id_pedidos=".$_POST['id']);

if($estado == 'Despachar'){

        $sql = "INSERT into tb_facturas
        (nombre,cantidad,precio,categoria,subcategoria,idusuario,fecha,notificacion)
values  ('$nombre','$cantidad','$precio','$categoria','$subcategoria','$iduser',now(),'1')";
        echo $result = mysqli_query($conexion, $sql)or die($conexion->error);
}


?>