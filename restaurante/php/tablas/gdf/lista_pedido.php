<?php
session_start();
require_once "../../configuracion/conexion.php";
$conexion = conexion();
$iduser=$_SESSION['datos_login']['id_usuario'];
?>


<!-- btn agregar -->


<!-- fin btn agregar -->

<!-- tabla -->

<div class="row">
    <div class="col-12 col-lg-12">
        <?php
            $sql_query = "SELECT * FROM `tb_carrito` as c INNER JOIN `tb_carta` as ca on c.fk_id_comida=ca.id_comida WHERE c.fk_id_usuario=118";
            $result_set = mysqli_query($conexion, $sql_query);
            if($result_set->num_rows==0){
        ?>
        <h1>No se encontro alimentos</h1>
        <?php
            }else{
        ?>
            <div class="card">
                <div class="card-header"><h2>Pedido o carrito</h2></div>
                <ul class="list-group list-group-flush">
                    <?php
                    $total = 0;
                    while ($ver = mysqli_fetch_array($result_set)) {
                        $variable =  $ver['precio'];
                        $total = $total + $variable;
                    ?>
                    <li class="list-group-item bg-transparent">
                        <div class="media align-items-center">
                            <button class="btn btn-outline-danger mr-3" onclick="eliminarCarrito(<?php echo $ver['id'] ?>)">Eliminar</button>
                            <!-- <img src="assets\images\avatars\avatar-13.png" alt="image" class="customer-img rounded-circle"> -->
                            <img src="images/cartelera/<?php echo $ver['imagen']; ?>" width="120px" height="100px" alt="">
                            <div class="media-body ml-3">
                                <h4 class="mb-0"><?php echo $ver['nombre']; ?></h4>
                            </div>
                            <div class="star"><?php echo $ver['precio']; ?></div>
                        </div>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
                <div class="media align-items-center">
                <div class="media-body ml-3">
                    <h3 class="mb-0">TOTAL</h3>
                </div>
                <div class="star mr-3">$ <?php echo $total ?></div>
            </div>
        <?php
            }
        ?>
    </div>
</div>
<script>
    function eliminarCarrito(id) {
        var form = new FormData();
        form.append("id", id);

        var settings = {
        "url": "http://localhost/restaurante-salesiano/restaurante/php/crud/gdf/restaurante/pedido.php",
        "method": "POST",
        "timeout": 0,
        "headers": {
            "Cookie": "PHPSESSID=9ci38k0c7vktfbbron2u7pdgl7"
        },
        "processData": false,
        "mimeType": "multipart/form-data",
        "contentType": false,
        "data": form
        };

        $.ajax(settings).done(function (response) {
        console.log(response);
        if(response==1){
            alert('Producto borrado');
            location.href ="http://localhost/restaurante-salesiano/restaurante/pedido.php";
        }else{
            console.log('error');
        }
        });
    }
</script>     
<!--  -->
<!-- modal ver -->