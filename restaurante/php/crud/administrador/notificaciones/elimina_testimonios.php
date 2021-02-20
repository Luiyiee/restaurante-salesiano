<?php

include_once '../../../configuracion/conexion.php';
$conexion = conexion();
      $fila = $conexion->query("update p_t set notificacion=0 where p_t= 'testimonio' and notificacion =1");
    // $fila = $conexion->query("update p_t set notificacion=1 where p_t= 'testimonio' and notificacion =0");

header("Location: testimonios.php");
?>