<?php
session_start();

if (!isset($_SESSION['datos_login'])) {
    header("Location: ../");
}

$arregloUsuario = $_SESSION['datos_login'];

if ($arregloUsuario['nivel'] != 'Administrador') {
    header("Location: ../");
}

include_once './configuracion/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mantenimiento tribus</title>
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

        <!--Start sidebar-wrapper-->
        <?php include 'layouts/menu.php' ?>
        <!--End sidebar-wrapper-->

        <!--Start topbar header-->
        <?php include 'layouts/barra.php' ?>
        <!--End topbar header-->

        <div class="clearfix"></div>

        <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumb-->

            </div>
            <!-- End Breadcrumb-->

            <!-- End Row-->

            <div id="tabla"></div>

            <!-- End Row-->

        </div>
        <!-- End container-fluid-->

    </div>
    <!--End content-wrapper-->
    <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->

    <!--Start footer-->
    <!-- <footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © 2018 Dashtreme Admin
        </div>
      </div>
    </footer> -->
    <!--End footer-->

    <!--start color switcher-->

    <!--end color cwitcher-->


    <!-- modales -->
    <!-- actualizar -->

    <!--insertar  -->


    <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Agregar tribu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                </div>
                <div class="modal-body">

                    <form id="frmTribus" enctype="multipart/form-data">

                        <label>Nombre de la tribu</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-sm" id="nombre" name="nombre">
                        </div>
                        <div class="row">


                            <div class="col-sm-6">
                                <label>Lider de tribu</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control input-sm" id="lider_tribu" name="lider_tribu">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label>Puntos</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control input-sm" id="puntos" name="puntos">

                                </div>
                            </div>

                        </div>

                        <label>Imagen</label>
                        <input type="file" id="imagen" name="imagen" class="form-control">


                        <p></p>
                        <!-- <center>  <span id="btnAgregar" class="btn btn-success">Agregar</span></center> -->
                    </form>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-success" id="btnAgregar" data-dismiss="modal">Agregar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para edicion de datos -->

    <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                </div>
                <div class="modal-body">

                    <!--  -->
                    <form id="frmTribusU" enctype="multipart/form-data">

                        <input type="text" hidden="" id="idEdit" name="id">

                        <label>Nombre del evento</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-sm" id="nombreu" name="nombre">
                        </div>
                        <div class="row">


                            <div class="col-sm-6">
                                <label>Lider de tribu</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control input-sm" id="lider_tribu_u" name="lider_tribu">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label>Puntos</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control input-sm" id="puntosu" name="puntos">

                                </div>
                            </div>

                        </div>

                        <label>Imagen</label>
                        <input type="file" id="imagenu" name="imagen" class="form-control">

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="actualizadatos" data-dismiss="modal">Actualizar</button>

                </div>
            </div>
        </div>
    </div>

    <!--  -->




    </div>
    <!--End wrapper-->


    <!-- Bootstrap core JavaScript-->
    <script src="assets\js\jquery.min.js"></script>
    <script src="assets\js\popper.min.js"></script>
    <script src="assets\js\bootstrap.min.js"></script>

    <!-- simplebar js -->
    <script src="assets\plugins\simplebar\js\simplebar.js"></script>
    <!-- sidebar-menu js -->
    <script src="assets\js\sidebar-menu.js"></script>

    <!-- Custom scripts -->
    <script src="assets\js\app-script.js"></script>

    <!--Data Tables js-->
    <script src="assets\plugins\bootstrap-datatable\js\jquery.dataTables.min.js"></script>
    <script src="assets\plugins\bootstrap-datatable\js\dataTables.bootstrap4.min.js"></script>
    <script src="assets\plugins\bootstrap-datatable\js\dataTables.buttons.min.js"></script>
    <script src="assets\plugins\bootstrap-datatable\js\buttons.bootstrap4.min.js"></script>
    <script src="assets\plugins\bootstrap-datatable\js\jszip.min.js"></script>
    <script src="assets\plugins\bootstrap-datatable\js\pdfmake.min.js"></script>
    <script src="assets\plugins\bootstrap-datatable\js\vfs_fonts.js"></script>
    <script src="assets\plugins\bootstrap-datatable\js\buttons.html5.min.js"></script>
    <script src="assets\plugins\bootstrap-datatable\js\buttons.print.min.js"></script>
    <script src="assets\plugins\bootstrap-datatable\js\buttons.colVis.min.js"></script>

    <script src="https://kit.fontawesome.com/2c36e9b7b1.js"></script>
    <!--notification js -->
    <script src="assets\plugins\notifications\js\lobibox.min.js"></script>
    <script src="assets\plugins\notifications\js\notifications.min.js"></script>
    <script src="assets\plugins\notifications\js\notification-custom-script-1.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tabla').load('php/tablas/administrador/tribus.php');
            // $('#buscador').load('php/tablas/buscador.php');
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#btnAgregar').click(function() {

                if ($('#nombre').val() == "") {
                    info_agregar();
                    return false;
                } else if ($('#lider_tribu').val() == "") {
                    info_agregar();
                    return false;
                } else if ($('#puntos').val() == "") {
                    info_agregar();
                    return false;
                } else if ($('#imagen').val() == "") {
                    info_agregar();
                    return false;
                }
                var formData = new FormData(document.getElementById("frmTribus"));

                $.ajax({
                    url: "php/crud/administrador/tribu/agregar.php",
                    type: "post",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,

                    success: function(r) {
                        if (r == 3) {
                            existe_agregar();
                            // alertify.alert("Este email ya existe :(");
                        } else
                        if (r == 1) {
                            // existo_agregar();
                            existo_agregar();
                            //  alertify.success("Agregado con exito :D");
                            
                            $("#nombre").val('').change();
                            $("#lider_tribu").val('').change();
                            $("#puntos").val('').change();
                            $("#imagen").val('').change();
                            $('#tabla').load('php/tablas/administrador/tribus.php');

                        } else {
                            for (let [key, value] of formData.entries()) {
                                 console.log(key, ':', value);
                             }
                           
                            error_agregar();
                            $("#nombre").val('').change();
                            $("#lider_tribu").val('').change();
                            $("#puntos").val('').change();
                            $("#imagen").val('').change();
                            $('#tabla').load('php/tablas/administrador/tribus.php');

                        }
                    }
                });

            });
            $('#actualizadatos').click(function() {
                actualizaDatos();
            });
        });
    </script>


    <script type="text/javascript">
        function agregaform(datos) {

            d = datos.split('||');

            $('#idEdit').val(d[0]);
            $('#nombreu').val(d[1]);
            $('#lider_tribu_u').val(d[2]);
            $('#puntosu').val(d[3]);

        }

        function actualizaDatos() {

            var formData = new FormData(document.getElementById("frmTribusU"));
            $.ajax({
                type: "POST",
                url: "php/crud/administrador/tribu/modificar.php",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(r) {

                    if (r == 1) {
                        exito_actualizar();
                        $("#imagenu").val('').change()
                        $('#tabla').load('php/tablas/administrador/tribus.php');
                    } else {
                        $('#tabla').load('php/tablas/administrador/tribus.php');
                        error_actualizar();

                    }
                }
            });

        }

        function preguntarSiNo(id) {
            alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?',
                function() {
                    eliminarDatos(id)
                }

                ,
                function() {
                    existe_eliminar();

                });
        }

        function eliminarDatos(id) {

            cadena = "id=" + id;

            $.ajax({
                type: "POST",
                url: "php/administrador/tribu/eliminar.php",
                data: cadena,
                success: function(r) {
                    if (r == 1) {
                        exito_eliminar();
                        $('#tabla').load('php/tablas/administrador/tribus.php');
                    } else {
                        error_eliminar();
                    }
                }
            });
        }
    </script>

</body>

</html>

<!-- COMPROBAR ERRORES -->
<!-- 

 // for (let [key, value] of formData.entries()) {
                            //     console.log(key, ':', value);
                            // }
                            // console.log(formData);
                            // console.log(r);

 -->