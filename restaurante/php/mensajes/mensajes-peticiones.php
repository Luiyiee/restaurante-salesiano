<?php
session_start();
require_once "../configuracion/conexion.php";
$conexion = conexion();

?>
<h6 class="text-uppercase">Peticiones</h6>
<hr>
<div class="row">
    <?php
    $limite = 10; //productos por pagina
    $totalQuery = $conexion->query("select count(*) total_mensajes_peticiones from p_t where p_t = 'peticion' and eliminado = '1' ") or die($conexion->error);
    $totalMensajes = mysqli_fetch_row($totalQuery);
    $totalBotones = round($totalMensajes[0] / $limite);
    if (isset($_GET['limite'])) {
        $resultado = $conexion->query("select count(*) total_mensajes_peticiones from p_t where p_t = 'peticion' and eliminado = '1' order by id DESC limit " . $_GET['limite'] . "," . $limite) or die($conexion->error);
    } else {
        $resultado = $conexion->query("select count(*) total_mensajes_peticiones from p_t where p_t = 'peticion' and eliminado = '1'  order by id DESC limit " . $limite) or die($conexion->error);
    }

    $sql_total = "select count(*) total_mensajes_peticiones from p_t  where p_t = 'peticion' and eliminado = '1' ";
    $result_set = mysqli_query($conexion, $sql_total);
    $total_cartelera = mysqli_fetch_assoc($result_set);


    $sql_query = "SELECT * FROM p_t where p_t = 'peticion' and eliminado = '1' ";
    $result_set = mysqli_query($conexion, $sql_query);
    $i = 10;
    while ($ver = mysqli_fetch_array($result_set)) {
        $datos = $ver['id'] . "||" .
            $ver['nombre'] . "||" .
            $ver['apellido'] . "||" .
            $ver['email'] . "||" .
            $ver['telefono'] . "||" .
            $ver['mensaje'] . "||" .
            $ver['fecha'];
    ?>

        <?php if ($total_cartelera['total_mensajes_peticiones'] == 1) {

        ?>
            <div class="card-deck col-lg-6 col-md-6 col-small-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> Fecha: <?php echo $ver['fecha']; ?> </h5>


                        <button class="btn btn-success glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalVer" onclick="agregaform('<?php echo $datos ?>')">
                            Ver
                        </button>

                        <button class="btn btn-danger glyphicon glyphicon-remove" onclick="preguntarSiNo('<?php echo $ver['id'] ?>')">
                            Eliminar
                        </button>
                    </div>
                </div>

            </div>
        <?php } else { ?>
            <div class="card-deck col-lg-4 col-md-6 col-small-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> Fecha: <?php echo $ver['fecha']; ?> </h5>


                        <button class="btn btn-success glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalVer" onclick="agregaform('<?php echo $datos ?>')">
                            Ver
                        </button>

                        <button class="btn btn-danger glyphicon glyphicon-remove" onclick="preguntarSiNo('<?php echo $ver['id'] ?>')">
                            Eliminar
                        </button>
                    </div>
                </div>

            </div>
        <?php } ?>
    <?php } ?>

</div>
<!--End Row-->

<nav>
    <ul class="pagination">

        <?php

        if ($_GET['limite'] = 0) {
            echo '<h1> No tienes eventos</h1>';
        ?>
            <h1> No tienes eventos</h1>
        <?php
        } else if (isset($_GET['limite'])) {
            if ($_GET['limite'] > 0) {
                echo ' <li class="page-item disabled"><a href="mensajes-peticiones.php?limite=' . ($_GET['limite'] - 10) . '" class="page-link">&lt;</a></li>';
            }
        }

        for ($k = 0; $k < $totalBotones; $k++) {
            echo  '<li class="page-item"><a href="mensajes-peticiones.php?limite=' . ($k * 10) . '" class="page-link">' . ($k + 1) . '</a></li>';
        }
        if (isset($_GET['limite'])) {
            if ($_GET['limite'] + 10 < $totalBotones * 10) {
                echo ' <li class="page-item"><a href="mensajes-peticiones.php?limite=' . ($_GET['limite'] + 10) . '" class="page-link"> &gt;</a></li>';
            }
        } else {
            echo ' <li class="page-item"><a href="mensajes-peticiones.php?limite=10" class="page-link">&gt;</a></li>';
        }
        ?>


    </ul>
</nav>

<div class="modal fade" id="modalVer" tabindex="-1" role="dialog" aria-labelledby="modalVer" aria-hidden="true">
    <div style="background:#FF335B;" class="modal-dialog">
        <div class="card mt-3 shadow-none">
            <div class="card-body">
                <div class="media mb-3">
                    <!-- <img src="assets\images\avatars\avatar-2.png" class="rounded-circle mr-3 mail-img shadow" alt="media image"> -->
                    <div class="media-body">
                        <input type="text" hidden="" id="idEdit" name="id">
                        <span id="fecha" class="media-meta float-right"></span>
                        <p> Teléfono: <b id="telefono"> </b> </p>
                        <!--                     <input type="text" class="form-control input-sm" id="nombre" name="nombre"> -->

                        <p>Correo: <b id="email"></b> </p>
                    </div>
                </div> <!-- media -->

                <p>Hola, soy <b id="nombre" class="m-0"></b>. </p>
                <p id="mensaje"></p>
                <hr>





                <!-- <div class="text-right">
                      <button type="button" class="btn btn-primary waves-effect waves-light mt-3"><i class="fa fa-send mr-1"></i> Send</button>
                  </div> -->

            </div>
        </div> <!-- card -->

    </div> <!-- end Col-9 -->

</div>


<script>
    function agregaform(datos) {

        // console.log(datos);

        d = datos.split('||');


        nombre = d[1];
        apellido = d[2];
        email = d[3];
        telefono = d[4];
        mensaje = d[5];
        fecha = d[6];

        console.log(email);
        document.querySelector('#nombre').innerHTML = nombre + " " + apellido;
        document.querySelector('#email').innerHTML = email;
        document.querySelector('#telefono').innerHTML = telefono;
        document.querySelector('#mensaje').innerHTML = mensaje;
        document.querySelector('#fecha').innerHTML = fecha;

        // idEditar = $(this).data('id');
        // 			var nombre = $(this).data('nombre');
        // 			var lider_tribu = $(this).data('lider_tribu');
        // 			var puntos = $(this).data('puntos');

        // 			$("#nombreVer").val(nombre);
        // 			$("#lider_tribuVer").val(lider_tribu);
        // 			$("#puntosVer").val(puntos);
        // 			$("#idVer").val(idEditar);




    }
</script>