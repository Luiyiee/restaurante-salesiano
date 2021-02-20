<?php

include_once 'php/configuracion/conexion.php';
$iduser=$_SESSION['datos_login']['email'];

$conexion = conexion();

     $fila = $conexion->query("UPDATE tb_facturas set notificacion = '0' where  idusuario = '$iduser' ");
    // $fila = $conexion->query("update peticiones set notificacion=1 where p_t= 'testimonio' and notificacion =0");

header("Location: pedido.php");
?>