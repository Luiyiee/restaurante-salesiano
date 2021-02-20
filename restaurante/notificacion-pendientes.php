<?php

include_once 'php/configuracion/conexion.php';
$conexion = conexion();
     $fila = $conexion->query("update tb_pedidos set notificacion = '0' where  notificacion = '1' ");
    // $fila = $conexion->query("update peticiones set notificacion=1 where p_t= 'testimonio' and notificacion =0");

header("Location: lista-pendientes.php");
?>