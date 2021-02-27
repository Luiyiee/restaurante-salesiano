<?php
session_start();
include_once 'php/configuracion/conexion.php';
$iduser=$_SESSION['datos_login']['id_usuario'];

$conexion = conexion();

     $fila = $conexion->query("UPDATE tb_pedidos set notificacion = '2' where  idusuario = '$iduser' ");
    // $fila = $conexion->query("update peticiones set notificacion=1 where p_t= 'testimonio' and notificacion =0");

header("Location: misPedidos.php");
?>