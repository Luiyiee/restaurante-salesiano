<?php
session_start();
if (!isset($_SESSION['datos_login'])) {
  header("Location: ../");
}
if ($_SESSION['datos_login']['estado'] !== "Activado") {
  header("Location: ../");
  session_unset();
}

include_once 'configuracion/conexion.php';
$id_email = $_SESSION['datos_login']['email'];
if ($_SESSION['datos_login']['conexion'] === 'Desconectado') {
  $sql = "UPDATE usuarios SET conexion='Conectado' WHERE email='$id_email' ";
  $result = $conexion->query($sql);
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
  <title>Restaurante</title>
  <!--favicon-->
  <?php include 'layouts/icono.php' ?>
  <!-- Vector CSS -->
  <link href="assets\plugins\vectormap\jquery-jvectormap-2.0.2.css" rel="stylesheet">
  <!-- simplebar CSS-->
  <link href="assets\plugins\simplebar\css\simplebar.css" rel="stylesheet">
  <!-- Bootstrap core CSS-->
  <link href="assets\css\bootstrap.min.css" rel="stylesheet">
  <!-- animate CSS-->
  <link href="assets\css\animate.css" rel="stylesheet" type="text/css">
  <!-- Icons CSS-->
  <link href="assets\css\icons.css" rel="stylesheet" type="text/css">
  <!-- Sidebar CSS-->
  <link href="assets\css\sidebar-menu.css" rel="stylesheet">
  <!-- Custom Style-->
  <link href="assets\css\app-style.css" rel="stylesheet">
</head>
<body class="bg-theme9">
  <div id="pageloader-overlay" class="visible incoming">
    <div class="loader-wrapper-outer">
      <div class="loader-wrapper-inner">
        <div class="loader"></div>
      </div>
    </div>
  </div>

  <div id="wrapper">
    <?php 
     if ($_SESSION['datos_login']['nivel'] == "Administrador") {
      include 'layouts/menu.php';
      include 'layouts/barra.php';
      
    }else{
      include 'layouts/menu_gdf.php';
      include 'layouts/barra_gdf.php';
     }
    ?>
    <div class="clearfix"></div>
    <div class="content-wrapper">
      <div class="container-fluid">
      <br>
                <div id="tablaBebidas"></div>

      </div>
    </div>
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © 2018 Dashtreme Admin
        </div>
      </div>
    </footer>
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
  <!-- loader scripts -->
  <!-- <script src="assets/js/jquery.loading-indicator.js"></script> -->
  <!-- Custom scripts -->
  <script src="assets\js\app-script.js"></script>
  <!-- Chart js -->

  <script src="assets\plugins\Chart.js\Chart.min.js"></script>
  <!-- Vector map JavaScript -->
  <script src="assets\plugins\vectormap\jquery-jvectormap-2.0.2.min.js"></script>
  <script src="assets\plugins\vectormap\jquery-jvectormap-world-mill-en.js"></script>
  <!-- Easy Pie Chart JS -->
  <script src="assets\plugins\jquery.easy-pie-chart\jquery.easypiechart.min.js"></script>
  <!-- Sparkline JS -->
  <script src="assets\plugins\sparkline-charts\jquery.sparkline.min.js"></script>
  <script src="assets\plugins\jquery-knob\excanvas.js"></script>
  <script src="assets\plugins\jquery-knob\jquery.knob.js"></script>

  <script type="text/javascript">
        $(document).ready(function() {
            $('#tablaBebidas').load('php/tablas/gdf/lista_bebidas.php');
            // $('#buscador').load('php/tablas/buscador.php');
        });
    </script>
  <!-- Index js -->
  <script src="assets\js\index.js"></script>


</body>

</html>