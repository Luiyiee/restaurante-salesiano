<?php

include_once '../../../php/configuracion/conexion.php';

    $fila = $conexion->query('update registro set notificacion=0 where notificacion =1');
//    $fila = $conexion->query('update registro set notificacion=1 where notificacion =0');
header("Location: registros.php");
?>