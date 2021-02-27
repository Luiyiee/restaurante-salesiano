<?php
session_start();

require_once "../../../configuracion/conexion.php";
$conexion = conexion();
$id = $_POST['id'];
$iduser=$_POST['iduser'];

	// $sql = "INSERT into  `tb_pedidos` WHERE id='$id'";

	// echo $result = mysqli_query($conexion, $sql);


        $sql="SELECT nombre,precio,categoria,subcategoria,imagen FROM tb_carta 
        INNER JOIN tb_carrito on tb_carta.id_comida = tb_carrito.fk_id_comida 
        where tb_carrito.fk_id_usuario = '$iduser' and  tb_carrito.fk_id_comida = '$id'";
        $result=mysqli_query($conexion,$sql);
    
        if(mysqli_num_rows($result) > 0){
        $nombre = mysqli_fetch_assoc($result);
        $precio = mysqli_fetch_assoc($result);
        $categoria = mysqli_fetch_assoc($result);
        $subcategoria = mysqli_fetch_assoc($result);
        $imagen = mysqli_fetch_assoc($result);
   
        
    $sql = "INSERT into tb_pedidos
    (nombre,cantidad,precio,imagen,categoria,subcategoria,estado,idusuario,fecha,notificacion) values
    (
        '".$nombre['nombre']."', '0' , '".$precio['precio']."' , 
        '".$imagen['imagen']."', '".$categoria['categoria']."' ,
        '".$subcategoria['subcategoria']."', 'Pendiente' , '$iduser' , now(),'1'
     )";
            echo $result = mysqli_query($conexion, $sql)or die($conexion->error);



        }else{
            return 0;
        }
  