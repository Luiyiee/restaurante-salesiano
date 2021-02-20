<?php 
session_start();    

require_once "../../../configuracion/conexion.php";
$conexion = conexion();

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$cedula = $_POST['cedula'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$password=sha1($_POST['password']);



if(buscaRepetido($email,$conexion)==1){
echo 2;
}else{
                if (!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $nombres)) {
                    echo "No se pudo agregar el nombres $nombres <br> Ingrese solo letras ";
                } else
                if (!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $apellidos)) {
                    echo "No se pudo agregar el apellidos $apellidos <br> Ingrese solo letras ";
                } else
                if (preg_replace("/^[0-9]{10}+$/", '', $telefono)) {
                    echo "No se pudo agregar el teléfono $telefono <br> Ingrese solo 10 números ";
                } else
                
                if (preg_replace("/^[0-9]{10}+$/", '', $cedula)) {
                    echo "No se pudo agregar la cedula $cedula <br> Ingrese solo 10 números ";
                } else 
                if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/',$email)) {
                    echo "No se pudo agregar el email $email";
                
                } else {

                   $sql = "INSERT into usuarios 
                            (nombres,apellidos,cedula,telefono,email,password,nivel,estado,img_perfil,
                             fecha_creacion,fecha_editado,usuario_creacion,usuario_editado,conexion,eliminado)
                    values  ('$nombres','$apellidos','$cedula','$telefono','$email','$password',
                             'Cliente','Activado','nulo',
                              now(),now(),'cliente_creado','Sin editar','Desconectado','1')";
                      echo $result = mysqli_query($conexion, $sql)or die($conexion->error);
                }
}


function buscaRepetido($email,$conexion){
    $sql="SELECT * from usuarios where email='$email' ";
    $result=mysqli_query($conexion,$sql);

    if(mysqli_num_rows($result) > 0){
        return 1;
    }else{
        return 0;
    }
}

?>