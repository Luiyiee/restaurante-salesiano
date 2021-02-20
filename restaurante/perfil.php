<?php

session_start();
include "configuracion/conexion.php";
if (!isset($_SESSION['datos_login'])) {
    header("Location: ../index.php");
}
$arregloUsuario = $_SESSION['datos_login'];



if (!isset($_GET['edit_id'])) {
    header("Location: ../restaurante/inicio.php");
   
} else if(isset($_GET['edit_id'])) {

    if($arregloUsuario['id_usuario']== $_GET['edit_id']){
        $sql_query = "SELECT * FROM usuarios WHERE id=" . $_GET['edit_id'];
    $result_set = mysqli_query($conexion, $sql_query);
    $fetched_row = mysqli_fetch_array($result_set, MYSQLI_ASSOC); 
   }else {
    header("Location: ../restaurante/inicio.php");
   }
   
    
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Perfil de usuario</title>
    <!--favicon-->
    <?php include 'layouts/icono.php' ?>
    <!-- simplebar CSS-->
    <link href="assets\plugins\simplebar\css\simplebar.css" rel="stylesheet">
    <!-- Bootstrap core CSS-->
    <link href="assets\css\bootstrap1.min.css" rel="stylesheet">
    <!--Data Tables -->
    <link href="assets\plugins\bootstrap-datatable\css\dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="assets\plugins\bootstrap-datatable\css\buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <!-- animate CSS-->
    <link href="assets\css\animate.css" rel="stylesheet" type="text/css">
    <!-- Icons CSS-->
    <link href="assets\css\icons.css" rel="stylesheet" type="text/css">
    <!-- Sidebar CSS-->
    <link href="assets\css\sidebar-menu.css" rel="stylesheet">
    <!-- Custom Style-->
    <link href="assets\css\app-style.css" rel="stylesheet">

    <!--  -->

    <link rel="stylesheet" href="assets\plugins\notifications\css\lobibox.min.css">
    <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">

    <script src="librerias/jquery-3.2.1.min.js"></script>
    <!-- <script src="js/funciones.js"></script> -->
    <script src="librerias/bootstrap/js/bootstrap.js"></script>
    <script src="librerias/alertifyjs/alertify.js"></script>
    <script src="librerias/select2/js/select2.js"></script>
    <!--  -->
    <!-- Font Awesome -->
</head>

<body class="bg-theme bg-theme1">

    <!-- start loader -->
    <div id="pageloader-overlay" class="visible incoming">
        <div class="loader-wrapper-outer">
            <div class="loader-wrapper-inner">
                <div class="loader"></div>
            </div>
        </div>
    </div>
    <!-- end loader -->

    <!-- Start wrapper-->
    <div id="wrapper">


        <?php require 'layouts/menu.php' ?>
        <?php require 'layouts/barra.php' ?>

                <!-- <div class="content-wrapper">
                <div class="container-fluid"> -->
        <div class="clearfix"></div>

            <div class="content-wrapper">
                <div class="container-fluid">

                    <div class="row mt-3">

                        <!-- 3 -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">

                                    <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">

                                        <li class="nav-item">
                                            <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link"> <span class="hidden-xs">Información</span></a>
                                        </li>
                                    </ul>

                                    <!-- salto -->
                                    <div class="form-group row"></div>

                                    <!-- form edi -->
                                    <div class="tab-pane" id="edit">
                                        <form id="frmajax" method="post" enctype="multipart/form-data">
                                                        
                                                        <input value="<?php echo $fetched_row['id'] ?>"  id="id" name="id" hidden>
                                                        <div class="form-group row">
                                                            <label class="col-lg-2 col-form-label form-control-label">Nombre: </label>
                                                            <div class="col-lg-9">
                                                                <input  type="text" value="<?php echo $fetched_row['nombres'] ?>" class="form-control" id="nombres" name="nombres">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-lg-2 col-form-label form-control-label">Apellido: </label>
                                                            <div class="col-lg-9">
                                                                <input  type="text" value="<?php echo $fetched_row['apellidos'] ?>" class="form-control" id="apellidos" name="apellidos">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-lg-2 col-form-label form-control-label">Cedula: </label>
                                                            <div class="col-lg-9">
                                                                <input  type="text" value="<?php echo $fetched_row['cedula'] ?>" class="form-control" id="cedula" name="cedula">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-lg-2 col-form-label form-control-label">Telefono: </label>
                                                            <div class="col-lg-9">
                                                                <input  type="text" value="<?php echo $fetched_row['telefono'] ?>" class="form-control" id="telefono" name="telefono">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-lg-2 col-form-label form-control-label">Email: </label>
                                                            <div class="col-lg-9">
                                                                <input type="text" value="<?php echo $fetched_row['email'] ?>" class="form-control" id="email" name="email">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-lg-3 col-form-label form-control-label">Imagen</label>
                                                            <div class="col-lg-6">
                                                                <?php if($_SESSION['datos_login']['nivel']=='Administrador'){
                                                                    ?>
                                                                    <center>  <img src="images/users/administradores/<?php echo $fetched_row['img_perfil'];?>" width="50%" height="100%" alt=""></center>
                                                                    <?php 
                                                                }else if($_SESSION['datos_login']['nivel']=='Cliente'){
                                                                    ?>  
                                                                    <center>  <img src="images/users/clientes/<?php echo $fetched_row['img_perfil']; ?>" width="50%" height="100%" alt=""></center>
                                                                    <?php
                                                                }?>
                                                            </div>

                                                        </div>
                                                        <hr>
                                                        <div class="text-center mb-3">
                                                            <button type="submit"  id="btnActualizar"  class="btn btn-primary">Guardar</button>
                                                        </div>
                                        </form>
                                    </div>
                                                <!-- form edit -->

                            </div>
                        </div>
                    </div>
                    <!-- 3 -->
                </div>

            </div>



        </div>
    </div>

<!-- </div> -->
<!--start overlay-->
<div class="overlay toggle-menu"></div>
<!--end overlay-->
<script>

                document.getElementById("nombre").disabled = true;
                document.getElementById("apellidos").disabled = true;
                document.getElementById("cedula").disabled = true;
                document.getElementById("telefono_1").disabled = true;
                document.getElementById("telefono_2").disabled = true;
                document.getElementById("email").disabled = true;
    
                 
</script>

<!-- Bootstrap core JavaScript-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- simplebar js -->
<script src="assets/plugins/simplebar/js/simplebar.js"></script>
<!-- sidebar-menu js -->
<script src="assets/js/sidebar-menu.js"></script>

<!-- Custom scripts -->
<script src="assets/js/app-script.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
      $('#btnActualizar').click(function() {
        var datos = $('#frmajax').serialize();
        // var datos = new FormData(document.getElementById("frmajax"));
        $.ajax({
          type: "POST",
          url: "php/crud/administrador/administrador/actualizar.php",
          // url: "cca/php/crud/administrador/registro/registro.php",
          data: datos,
          success: function(r) {
            if(r == 1){
              alert('Actualizado correctamente');
            } else {
              alert("Fallo el server" + r);
            }
          }
        });

        return false;
      });
    });
  </script>


</body>

</html>