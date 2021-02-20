<?php 
session_start();    

require_once "../../../configuracion/conexion.php";
$conexion = conexion();

// $password = sha1("prejus_".$_POST['password']);
$nombre = $_POST['nombre'];
$lider_tribu = $_POST['lider_tribu'];
$puntos = $_POST['puntos'];

if(buscaRepetido($nombre,$conexion)==1){
echo 2;
}else{
    if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/',$nombre) && 
			   preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/',$lider_tribu) && 
			   preg_replace("/[^0-9]/", '', $puntos) 
			 	){
                    $carpeta="../../../../images/tribus/";
                    $nombreI = $_FILES['imagen']['name'];
                    
                    //imagen.casa.jpg
                    $temp= explode( '.' ,$nombreI);
                    $extension= end($temp);
                    
                    $nombreFinal = time().'.'.$extension;
                    if($extension=='jpg' || $extension == 'png' || $extension == 'jpeg'){
                        if(move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta.$nombreFinal)){
                            $sql = "INSERT into tribus 
                            (nombre,lider_tribu,puntos,imagen)
                    values  ('$nombre','$lider_tribu','$puntos','$nombreFinal')";
                            echo $result = mysqli_query($conexion, $sql)or die($conexion->error);
                    	}else{
                            echo "no se puede subir la imagen";
                            }
                        }else{
                        echo "subir imagen valida";
                        
                        }

                }
}


function buscaRepetido($nombre,$conexion){
    $sql="SELECT * from tribus where nombre='$nombre' ";
    $result=mysqli_query($conexion,$sql);

    if(mysqli_num_rows($result) > 0){
        return 1;
    }else{
        return 0;
    }
}

?>