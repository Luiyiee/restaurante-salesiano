<?php
session_start();

if (!isset($_SESSION['datos_login'])) {
  header("Location: ../");
}


// if (isset($_GET['datos_login']))
//   $_SESSION['datos_login'] = $_GET['datos_login'];
if ($_SESSION['datos_login']['estado'] !== "Activado") {
  //$_SESSION['datos_login']['estado']
  header("Location: ../");
  session_unset();
}

include_once 'configuracion/conexion.php';
$id_email = $_SESSION['datos_login']['email'];
//gdf@rubi.prejus
//prejus_123
if ($_SESSION['datos_login']['conexion'] === 'Desconectado') {
  $sql = "UPDATE usuarios SET conexion='Conectado' WHERE email='$id_email' ";
  $result = $conexion->query($sql);
}


// VENTANAS

//usuarios


//cartelera
// $sql_cartelera  = "SELECT COUNT(*) total_cartelera FROM cartelera";
// $result_cartelera  = mysqli_query($conexion, $sql_cartelera);
// $fila_cartelera = mysqli_fetch_assoc($result_cartelera);

//registros
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
    <?php 
     if ($_SESSION['datos_login']['nivel'] == "Administrador") {
      include 'layouts/menu.php';
      include 'layouts/barra.php';
      
    }else{
      include 'layouts/menu_gdf.php';
      include 'layouts/barra_gdf.php';
     }
    ?>
 
    <!--End sidebar-wrapper-->

    <!--Start topbar header-->
   
    <!--End topbar header-->

    <div class="clearfix"></div>

    <div class="content-wrapper">
      <div class="container-fluid">

        <!--Start Dashboard Content-->

        <!--ventanas-->
        <?php 
            if ($_SESSION['datos_login']['nivel'] == "Administrador") {
                 include 'layouts/ventanas_administrador.php';
             }else{
                 include 'layouts/ventanas_gdf.php';
              }
        ?>
        <!--Fin-->

       <!-- Grafica -->
       <?php 
            if ($_SESSION['datos_login']['nivel'] == "Administrador") {
                 include 'layouts/grafica_administrador.php';
             }else{
                 include 'layouts/grafica_gdf.php';
              }
        ?>
        <!--Fin-->



        <!--  -->
        <!--End Row-->


        <!-- <div class="row">
          <div class="col-12 col-lg-12 col-xl-6">
            <div class="card">
              <div class="card-header">World Selling Region
                <div class="card-action">
                  <div class="dropdown">
                    <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
                      <i class="icon-options"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="javascript:void();">Action</a>
                      <a class="dropdown-item" href="javascript:void();">Another action</a>
                      <a class="dropdown-item" href="javascript:void();">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="javascript:void();">Separated link</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div id="dashboard-map" style="height: 275px;"></div>
              </div>
              <div class="table-responsive">
                <table class="table table-hover align-items-center">
                  <thead>
                    <tr>
                      <th>Country</th>
                      <th>Income</th>
                      <th>Trend</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><i class="flag-icon flag-icon-ca mr-2"></i> USA</td>
                      <td>4,586$</td>
                      <td><span id="trendchart1"></span></td>
                    </tr>
                    <tr>
                      <td><i class="flag-icon flag-icon-us mr-2"></i>Canada</td>
                      <td>2,089$</td>
                      <td><span id="trendchart2"></span></td>
                    </tr>

                    <tr>
                      <td><i class="flag-icon flag-icon-in mr-2"></i>India</td>
                      <td>3,039$</td>
                      <td><span id="trendchart3"></span></td>
                    </tr>

                    <tr>
                      <td><i class="flag-icon flag-icon-gb mr-2"></i>UK</td>
                      <td>2,309$</td>
                      <td><span id="trendchart4"></span></td>
                    </tr>

                    <tr>
                      <td><i class="flag-icon flag-icon-de mr-2"></i>Germany</td>
                      <td>7,209$</td>
                      <td><span id="trendchart5"></span></td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="col-12 col-lg-12 col-xl-6">
            <div class="row">
              <div class="col-12 col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <p>Page Views</p>
                    <h4 class="mb-0">8,293 <small class="small-font">5.2% <i class="zmdi zmdi-long-arrow-up"></i></small></h4>
                  </div>
                  <div class="chart-container-3">
                    <canvas id="chart3"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-12 col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <p>Total Clicks</p>
                    <h4 class="mb-0">7,493 <small class="small-font">1.4% <i class="zmdi zmdi-long-arrow-up"></i></small></h4>
                  </div>
                  <div class="chart-container-3">
                    <canvas id="chart4"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-12 col-lg-6">
                <div class="card">
                  <div class="card-body text-center">
                    <p class="mb-4">Total Downloads</p>
                    <input class="knob" data-width="175" data-height="175" data-readonly="true" data-thickness=".2" data-angleoffset="90" data-linecap="round" data-bgcolor="rgba(255, 255, 255, 0.14)" data-fgcolor="#fff" data-max="15000" value="8550">
                    <hr>
                    <p class="mb-0 small-font text-center">3.4% <i class="zmdi zmdi-long-arrow-up"></i> since yesterday</p>
                  </div>
                </div>
              </div>
              <div class="col-12 col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <p>Device Storage</p>
                    <h4 class="mb-3">42620/50000</h4>
                    <hr>
                    <div class="progress-wrapper mb-4">
                      <p>Documents <span class="float-right">12GB</span></p>
                      <div class="progress" style="height:5px;">
                        <div class="progress-bar" style="width:80%"></div>
                      </div>
                    </div>

                    <div class="progress-wrapper mb-4">
                      <p>Images <span class="float-right">10GB</span></p>
                      <div class="progress" style="height:5px;">
                        <div class="progress-bar" style="width:60%"></div>
                      </div>
                    </div>

                    <div class="progress-wrapper mb-4">
                      <p>Mails <span class="float-right">5GB</span></p>
                      <div class="progress" style="height:5px;">
                        <div class="progress-bar" style="width:40%"></div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>

        </div> -->
        <!--End Row-->

<!-- row -->
        <div class="row">
        
          <?php 
            if ($_SESSION['datos_login']['nivel'] == "Administrador") {
                 include 'layouts/tabla_tribu.php';
                 include 'layouts/chat.php';
                }
        ?>

      

        </div>
        <!--End Row-->

        <!--End Dashboard Content-->

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
    <!-- <div class="right-sidebar">
    <div class="switcher-icon">
      <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">

      <p class="mb-0">Gaussion Texture</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
      </ul>

      <p class="mb-0">Gradient Background</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme7"></li>
        <li id="theme8"></li>
        <li id="theme9"></li>
        <li id="theme10"></li>
        <li id="theme11"></li>
        <li id="theme12"></li>
      </ul>
      
     </div>
   </div> -->
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

  <script>
    $(function() {
      $(".knob").knob();
    });
  </script>
  <!-- Index js -->
  <script src="assets\js\index.js"></script>


</body>

</html>