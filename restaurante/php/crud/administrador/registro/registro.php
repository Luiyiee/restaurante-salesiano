<?php 
session_start();    

require_once "../../../../configuracion/conexion.php";
$conexion = conexion();

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$edad = $_POST['edad'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$sexo = $_POST['sexo'];

if(buscaRepetido($email,$conexion)==1){
echo 2;
}else{
    if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/',$nombres) && 
			   preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/',$apellidos) && 
			   preg_replace("/[^0-9]/", '', $edad) &&
			   preg_replace("/[^0-9]/", '', $telefono) &&
			   preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/',$email)
				){
   $sql = "INSERT into registros 
                            (nombres,apellidos,edad,telefono,email,fecha,tribu,notificacion,eliminado,sexo)
                    values  ('$nombres','$apellidos','$edad','$telefono','$email',now(),'','1','1','$sexo')";
                            echo $result = mysqli_query($conexion, $sql)or die($conexion->error);
                 
                }
}


function buscaRepetido($email,$conexion){
    $sql="SELECT * from registros where email='$email' ";
    $result=mysqli_query($conexion,$sql);

    if(mysqli_num_rows($result) > 0){
        return 1;
    }else{
        return 0;
    }
}

?>