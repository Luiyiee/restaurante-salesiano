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
  <title>Mensajes testimonios</title>
  <!--favicon-->
  <?php include 'layouts/icono.php' ?>
  <!-- simplebar CSS-->
  <link href="assets\plugins\simplebar\css\simplebar.css" rel="stylesheet">
  <!-- Bootstrap core CSS-->
  <link href="assets\css\bootstrap1.min.css" rel="stylesheet">
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
  <script src="librerias/bootstrap/js/bootstrap.js"></script>
  <script src="librerias/alertifyjs/alertify.js"></script>
  <script src="librerias/select2/js/select2.js"></script>
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

        <!-- End Breadcrumb-->



        <div id="card"></div>
        <!--End Row-->

      </div>
      <!-- End container-fluid-->


    </div>
    <!--End content-wrapper-->
    <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->

    <!--Start footer-->
    <footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © 2018 Dashtreme Admin
        </div>
      </div>
    </footer>
    <!--End footer-->

    <!--start color switcher-->

    <!--end color cwitcher-->

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

  <!--  -->
  <script src="assets\plugins\notifications\js\lobibox.min.js"></script>

  <script src="assets\plugins\notifications\js\notification-custom-script-1.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#card').load('php/mensajes/mensajes-testimonios.php');
      // $('#buscador').load('php/tablas/buscador.php');
    });
  </script>

  <script type="text/javascript">
    function preguntarSiNo(id) {
      alertify.confirm('Eliminar Testimonio', '¿Esta seguro de eliminar este testimonio?',
        function() {
          eliminarDatos(id)
        }

        ,
        function() {
          cancelar_eliminar();

        });
    }

    function eliminarDatos(id) {

      cadena = "id=" + id;

      $.ajax({
        type: "POST",
        url: "php/crud/administrador/mensajes/eliminar.php",
        data: cadena,
        success: function(r) {
          if (r == 1) {
            exito_eliminar();
            $('#card').load('php/mensajes/mensajes-testimonios.php');
          } else {
            error_eliminar();
          }
        }
      });
    }
  </script>

  <script>
    //  Notificaciones
// -------------------------------
    //  Existo eliminar 
    function exito_eliminar() {
      Lobibox.notify('success', {
        pauseDelayOnHover: true,
        size: 'mini',
        rounded: true,
        icon: 'fa fa-check-circle',
        delayIndicator: false,
        continueDelayOnInactiveTab: false,
        position: 'top right',
        msg: 'Eliminado con exito'
      });
    }

    //  Cancelar eliminar
    function cancelar_eliminar() {
      Lobibox.notify('warning', {
        pauseDelayOnHover: true,
        size: 'mini',
        rounded: true,
        delayIndicator: false,
        icon: 'fa fa-exclamation-circle',
        continueDelayOnInactiveTab: false,
        position: 'top right',
        msg: 'Se cancelo la acción'
      });
    }
    //  Error eliminar
    
    function error_eliminar(){
        Lobibox.notify('error', {
        pauseDelayOnHover: true,
        size: 'mini',
        rounded: true,
        delayIndicator: false,
        icon: 'fa fa-times-circle',
        continueDelayOnInactiveTab: false,
        position: 'top right',
        msg: 'Lo sentenimos no se pudo eliminar'
        });
      }		
    //  Informacion

  </script>
</body>

</html>