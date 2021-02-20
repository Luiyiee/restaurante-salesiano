<?php

include_once '../../../configuracion/conexion.php';

$conexion = conexion();


$sql_total = "select count(*) total_registros from registros where tribu = '' ";
$resultado = mysqli_query($conexion, $sql_total);
$total_registros = mysqli_fetch_assoc($resultado);
$asignacion = intval($total_registros['total_registros']);

$total = round($total_registros['total_registros'] / 4);


//n cantidad de veces que traera NO LO OLVIDES para eso haces la primera consulta y el 1er while
$sql = "select * from registros where tribu = '' ";
$result = mysqli_query($conexion, $sql);
$i = 1;

// if (validar($conexion) == 1) {
//     echo 2;
// } else {
//     if ($total > 0) {
//         return 2;
//     } else {
        while ($datos = mysqli_fetch_array($result)) {

            $sql_tribus = "select * from tribus";
            $resultado_tribus = mysqli_query($conexion, $sql_tribus);
            while ($datos_temporales = mysqli_fetch_array($resultado_tribus)) {
                // $datos_temporales['nombre'];

                // $ver_tribus=mysqli_fetch_assoc($resultdo_tribus); 

                if ($i <= $total) {

                    $conexion->query("update registros set tribu='" . $datos_temporales['nombre'] . "' where tribu= '' limit 1 ");
                } else if ($i <= ($total * 2)) {

                    $fila = $conexion->query("update registros set tribu='" . $datos_temporales['nombre'] . "' where tribu = '' limit 1");
                } else if ($i <= ($total * 3)) {

                    $fila = $conexion->query("update registros set tribu='" . $datos_temporales['nombre'] . "' where tribu = '' limit 1");
                } else if (true) {

                    $fila = $conexion->query("update registros set tribu='" . $datos_temporales['nombre'] . "' where tribu = '' limit 1");
                }
                $i++;
                $asignacion--;
            }
        }
        echo 1;
    // }
// }

// function validar($conexion)
// {
//     $sql = "select count(*) from registro where tribu = ''  ";
//     $result = mysqli_query($conexion, $sql);

//     if (mysqli_num_rows($result) > 0) {
//         return 1;
//     } else {
//         return 0;
//     }
// }
//breackpoints son los puntos para ver el proceso 
//laravel
//microservicios
//api reset
//server rendiris
//update registros set tribu=''
//paginacion servidor
// SELECT COUNT(tribu) from registros GROUP by tribu
// SELECT count(*) FROM registros WHERE tribu IS NOT NULL
//vd - dv