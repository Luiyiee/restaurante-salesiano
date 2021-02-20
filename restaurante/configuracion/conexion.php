<?php
    $servidor="localhost";
    $nombreBd="restaurante";
    $usuario="root";
    $pass="";
    $conexion = new mysqli($servidor,$usuario,$pass,$nombreBd);
    if($conexion -> connect_error ){
        die("No se pudo conectar");
        
    }
?>