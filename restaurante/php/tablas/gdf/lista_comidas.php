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
        <div class="card">
            <div class="card-header"><h1>Arroz</h1></div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush table-borderless">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Comida</th>
                                <th>Precio</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql_query = "SELECT * from tb_carta where categoria='comidas' and subcategoria='arroz' ";
                        $result_set = mysqli_query($conexion, $sql_query);
                        $i = 1;
                        while ($ver = mysqli_fetch_array($result_set)) {
                        ?>
                            <tr>
                                <td><img src="images/cartelera/<?php echo $ver['imagen']; ?>" width="20px" height="20px" alt=""></td>
                                <td><?php echo $ver['nombre']; ?></td>
                                <td><?php echo '$ '.$ver['precio']; ?></td>
                                <td><button class="btn btn-outline-success" onclick="agregarCarrito(<?php echo $iduser; ?>,<?php echo $ver['id_comida']; ?>)">Agregar al pedido</button></td>
                            </tr>
                        <?php
                            $i++;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<hr>
<br>
<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-header"><h1>Sopa</h1></div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush table-borderless">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Comida</th>
                                <th>Precio</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql_query = "SELECT * from tb_carta where categoria='comidas' and subcategoria='sopa' ";
                        $result_set = mysqli_query($conexion, $sql_query);
                        $i = 1;
                        while ($ver = mysqli_fetch_array($result_set)) {
                        ?>
                            <tr>
                                <td><img src="images/cartelera/<?php echo $ver['imagen']; ?>" width="20px" height="20px" alt=""></td>
                                <td><?php echo $ver['nombre']; ?></td>
                                <td><?php echo '$ '.$ver['precio']; ?></td>
                                <td><button class="btn btn-outline-success" onclick="agregarCarrito(<?php echo $iduser; ?>,<?php echo $ver['id_comida']; ?>)">Agregar al pedido</button></td>
                            </tr>
                        <?php
                            $i++;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<hr>
<br>
<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-header"><h1>Fritura</h1></div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush table-borderless">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Comida</th>
                                <th>Precio</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql_query = "SELECT * from tb_carta where categoria='comidas' and subcategoria='fritura' ";
                        $result_set = mysqli_query($conexion, $sql_query);
                        $i = 1;
                        while ($ver = mysqli_fetch_array($result_set)) {
                        ?>
                            <tr>
                                <td><img src="images/cartelera/<?php echo $ver['imagen']; ?>" width="20px" height="20px" alt=""></td>
                                <td><?php echo $ver['nombre']; ?></td>
                                <td><?php echo '$ '.$ver['precio']; ?></td>
                                <td><button class="btn btn-outline-success" onclick="agregarCarrito(<?php echo $iduser; ?>,<?php echo $ver['id_comida']; ?>)">Agregar al pedido</button></td>
                            </tr>
                        <?php
                            $i++;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function agregarCarrito(id_user, id_comida) {
        var form = new FormData();
        form.append("id_usuario", id_user);
        form.append("id_comida", id_comida);

        var settings = {
        "url": "http://localhost/restaurante salesiano/restaurante/php/crud/gdf/restaurante/carrito.php",
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
            location.href ="http://localhost/restaurante%20salesiano/restaurante/pedido.php";
        }else{
            console.log('error');
        }
        });
    }
</script>
<!--  -->
<!-- modal ver -->