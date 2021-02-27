<?php
session_start();
require_once "../../configuracion/conexion.php";
$conexion = conexion();
$iduser=$_SESSION['datos_login']['id_usuario'];
?>

 

<div class="row">
    <div class="col-12 col-lg-12">
        <?php
            $sql_query = "SELECT * FROM `tb_pedidos`   WHERE idusuario='$iduser'";
            $result_set = mysqli_query($conexion, $sql_query);
            if($result_set->num_rows==0){
        ?>
        <h1>No se encontro alimentos</h1>
        <?php
            }else{
        ?>
            <div class="card">
                <div class="card-header"><h2>Pedido</h2></div>
                <ul class="list-group list-group-flush">
                    <?php
                    $total = 0;
                    while ($ver = mysqli_fetch_array($result_set)) {
               
                        if($ver['estado'] == 'Pendiente'){
                    ?>
                    <li class="list-group-item bg-transparent">
                        <div class="media align-items-center">
                            <p class="btn btn-outline-danger mr-3">Pendiente</p>
                            <!-- <img src="assets\images\avatars\avatar-13.png" alt="image" class="customer-img rounded-circle"> -->
                            <img src="images/cartelera/<?php echo $ver['imagen']; ?>" width="120px" height="120px" alt="">
                            <div class="media-body ml-3">
                                <h4 class="mb-0"><?php echo $ver['nombre']; ?></h4>
                            </div>
                            <div class="star"><?php echo $ver['precio']; ?></div>
                        </div>
                    </li>
                    <?php
                    }else{
?>
                <li class="list-group-item bg-transparent">
                        <div class="media align-items-center">
                            <p class="btn btn-outline-success mr-3">Despachado</p>
                            <!-- <img src="assets\images\avatars\avatar-13.png" alt="image" class="customer-img rounded-circle"> -->
                            <img src="images/cartelera/<?php echo $ver['imagen']; ?>" width="120px" height="120px" alt="">
                            <div class="media-body ml-3">
                                <h4 class="mb-0"><?php echo $ver['nombre']; ?></h4>
                            </div>
                            <div class="star"><?php echo $ver['precio']; ?></div>
                        </div>
                    </li>
            <?php 
                    }
                }
                    ?>
                </ul>
            </div>
            
        <?php
            }
        ?>
    </div>
</div>
  
<!--  -->
<!-- modal ver -->