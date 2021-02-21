<?php 
session_start();    

require_once "../../../configuracion/conexion.php";
$conexion = conexion();


$nombre = $_POST['nombre'];
$precio = $_POST['precio'];

$subcategoria = $_POST['subcategoria'];

$iduser = $_SESSION['datos_login']['email'];

if(buscaRepetido($nombre,$conexion)==1){
echo 2;
}else{
    if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/',$nombre) && 
			    preg_replace("/[^0-9]/", '', $precio) 
				){
                    $carpeta="../../../../images/cartelera/";
                    $nombreI = $_FILES['imagen']['name'];
                    
                    //imagen.casa.jpg
                    $temp= explode( '.' ,$nombreI);
                    $extension= end($temp);
                    
                    $nombreFinal = time().'.'.$extension;
                    if($extension=='jpg' || $extension == 'png' || $extension == 'jpeg'){
                        if(move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta.$nombreFinal)){
                            $sql = "INSERT into tb_carta 
                            (nombre,precio,categoria,subcategoria,imagen,idusuario)
                    values  ('$nombre','$precio','postres','$subcategoria','$nombreFinal','$iduser')";
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
    $sql="SELECT * from tb_carta  where nombre='$nombre' ";
    $result=mysqli_query($conexion,$sql);

    if(mysqli_num_rows($result) > 0){
        return 1;
    }else{
        return 0;
    }
}

?>