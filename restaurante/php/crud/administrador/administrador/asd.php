<?php 
session_start();    

require_once "conexion.php";
$conexion = conexion();

$usuario = $_POST['usuario'];
$lider_1 = $_POST['lider_1'];
$lider_2 = $_POST['lider_2'];
$telefono_1 = $_POST['telefono_1'];
$telefono_2 = $_POST['telefono_2'];

$email = $_POST['email'];
$password=sha1($_POST['password']);
$estado = $_POST['estado'];

$iduser=$_SESSION['datos_login']['usuario'];

if(buscaRepetido($email,$conexion)==1){
echo 2;
}else{
    if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/',$usuario) && 
			   preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/',$lider_1) && 
			   preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/',$lider_2) && 
			   preg_replace("/[^0-9]/", '', $telefono_1) &&
			   preg_replace("/[^0-9]/", '', $telefono_2) &&
			   preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/',$email) &&
			   !preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/',$password) &&
			   preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/',$estado) 
				){
                    $carpeta="../../images/users/administradores/";
                    $nombreI = $_FILES['imagen']['name'];
                    
                    //imagen.casa.jpg
                    $temp= explode( '.' ,$nombreI);
                    $extension= end($temp);
                    
                    $nombreFinal = time().'.'.$extension;
                    if($extension=='jpg' || $extension == 'png' || $extension == 'jpeg'){
                        if(move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta.$nombreFinal)){
                            $sql = "INSERT into usuarios 
                            (usuario,lider_1,lider_2,telefono_1,telefono_2,email,password,nivel,estado,img_perfil,
                             fecha_creacion,fecha_editado,usuario_creacion,usuario_editado,conexion,eliminado)
                    values  ('$usuario','$lider_1','$lider_2','$telefono_1','$telefono_2','$email','$password',
                             'Administrador','$estado','$nombreFinal',
                              now(),now(),'$iduser','Sin editar','Desconectado','1')";
                            echo $result = mysqli_query($conexion, $sql)or die($conexion->error);
                    	}else{
                            echo "no se puede subir la imagen";
                            }
                        }else{
                        echo "subir imagen valida";
                        
                        }

                }
}












function buscaRepetido($email,$conexion){
    $sql="SELECT * from usuarios 
        where email='$email' ";
    $result=mysqli_query($conexion,$sql);

    if(mysqli_num_rows($result) > 0){
        return 1;
    }else{
        return 0;
    }
}

?>