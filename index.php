<?php
require_once "restaurante/php/configuracion/conexion.php";
$conexion = conexion();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RESTAURANTE SALESIANO</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Satisfy|Bree+Serif|Candal|PT+Sans">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>
  <!--banner-->
  <section id="banner">
    <div class="bg-color">
      <header id="header">
        <div class="container">
          <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          
            <a href="#menu-list">Menu</a>
            <a href="iniciar-sesion.php">Iniciar sesion</a>
          </div>
          <!-- Use any element to open the sidenav -->
          <span onclick="openNav()" class="pull-right menu-icon">☰</span>
        </div>
      </header>
      <div class="container">
        <div class="row">
          <div class="inner text-center">
            <h1 class="logo-name">Restaurante Salesinao</h1>
            <h2>Alimentos Para adaptarse a su estilo de vida & salud.</h2>
            <p>¡Especializado en cocina Ecuatoriana!</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / banner -->
  <!--about-->
  <section id="about" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center marb-35">
          <h1 class="header-h">Delicioso Viaje</h1>
          <!-- <p class="header-p">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
            <br>nibh euismod tincidunt ut laoreet dolore magna aliquam.
          </p> -->
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <div class="col-md-6 col-sm-6">
            <div class="about-info">
              <h2 class="heading">Alitas de pollo</h2>
              <p>En un bowl agregar las alitas de pollo , condimentar con sal-pimienta y adobar con la mostaza.

Sumergir cada alita de pollo en el huevo batido y luego en panko. Freír en aceite caliente por 10 a 12 minutos hasta dorar.</p>
              <div class="details-list">
                <ul>
                  <li><i class="fa fa-check"></i>6 alitas de pollo</li>
                  <li><i class="fa fa-check"></i>papas fritas</li>
                  <li><i class="fa fa-check"></i>cola </li>
                  <li><i class="fa fa-check"></i>arroz con menestra</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <img src="img/res01.jpg" alt="" class="img-responsive">
          </div>
        </div>
        <div class="col-md-1"></div>
      </div>
    </div>
  </section>
  <!--/about-->
  <!-- event -->
  <section id="event">
    <div class="bg-color" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 text-center" style="padding:60px;">
            <h1 class="header-h"> Comidas </h1>
            <!-- <p class="header-p">Decorations 100% complete here</p> -->
          </div>
          <div class="col-md-12" style="padding-bottom:60px;">
            <div class="item active left">
              <div class="col-md-6 col-sm-6 left-images">
                <img src="img/res02.jpg" class="img-responsive">
              </div>
              <div class="col-md-6 col-sm-6 details-text">
                <div class="content-holder">
                  <h2>Arroz marinero - Arroz con mariscos</h2>
                  <p>
                    El arroz marinero o arroz con mariscos es un plato típico de varios países latinos,
                     y en Ecuador es un plato tradicional de la Costa. El arroz marinero ecuatoriano se prepara con arroz, 
                     camarones, calamares, conchas, mejillones, ajo, cebolla, pimiento, cilantro y condimentos/especias.
                  </p>
                  <address>
                    <strong>Teléfono: </strong>
                    0945678349
                    <br>
                    <strong>Time: </strong>
                    07:30am - 10:00pm
                  </address>
                  <!-- <a class="btn btn-imfo btn-read-more" href="events-details.html">Read more</a> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ event -->
  <!-- menu -->
  <section id="menu-list" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center marb-35">
          <h1 class="header-h">Menú</h1>
          <p class="header-p">Delitate de nuestro menú
          </p>
        </div>
        <div class="col-md-12  text-center gallery-trigger">
          <ul>
            <li><a class="filter" data-filter="all">Ver todo</a></li>
            <li><a class="filter" data-filter=".category-1">Comdias</a></li>
            <li><a class="filter" data-filter=".category-2">Bebidas</a></li>
            <li><a class="filter" data-filter=".category-3">Postres</a></li>
          </ul>
        </div>
        <div id="Container">
          <div class="mix category-1 menu-restaurant" data-myorder="2">
            <?php
            $sql_query = "SELECT * FROM tb_carta where categoria = 'comidas' limit 5";
            $result_set = mysqli_query($conexion, $sql_query);
            $i = 1;
            while ($ver = mysqli_fetch_array($result_set)) {
            ?>
              <span class="clearfix">
                <a class="menu-title" data-meal-img="assets/img/restaurant/rib.jpg"> <?php echo $ver['nombre']; ?> </a>
                <span style="left: 166px; right: 44px;" class="menu-line"></span>
                <span class="menu-price">$ <?php echo $ver['precio']; ?></span>
              </span>
              <span class="menu-subtitle"> <?php echo $ver['subcategoria']; ?> </span>
              <br>
            <?php } ?>
          </div>

          <!-- 2 -->
          <div class="mix category-2 menu-restaurant" data-myorder="2">
            <span class="clearfix">
              <?php
              $sql_query = "SELECT * FROM tb_carta where categoria = 'bebidas' limit 5";
              $result_set = mysqli_query($conexion, $sql_query);
              $i = 1;
              while ($ver = mysqli_fetch_array($result_set)) {
              ?>
                <span class="clearfix">
                  <a class="menu-title" data-meal-img="assets/img/restaurant/rib.jpg"> <?php echo $ver['nombre']; ?> </a>
                  <span style="left: 166px; right: 44px;" class="menu-line"></span>
                  <span class="menu-price">$ <?php echo $ver['precio']; ?></span>
                </span>
                <span class="menu-subtitle"> <?php echo $ver['subcategoria']; ?> </span>
                <br>
              <?php } ?>
          </div>

          <!-- 3 -->
          <div class="mix category-3 menu-restaurant" data-myorder="2">
            <?php
            $sql_query = "SELECT * FROM tb_carta where categoria = 'postres ' limit 5";
            $result_set = mysqli_query($conexion, $sql_query);
            $i = 1;
            while ($ver = mysqli_fetch_array($result_set)) {
            ?>
              <span class="clearfix">
                <a class="menu-title" data-meal-img="assets/img/restaurant/rib.jpg"> <?php echo $ver['nombre']; ?> </a>
                <span style="left: 166px; right: 44px;" class="menu-line"></span>
                <span class="menu-price">$ <?php echo $ver['precio']; ?></span>
              </span>
              <span class="menu-subtitle"> <?php echo $ver['subcategoria']; ?> </span>
              <br>
            <?php } ?>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!--/ menu -->
  <!-- contact -->

  <!-- / contact -->
  <!-- footer -->
  <footer class="footer text-center">
    <div class="footer-top">
      <div class="row">
        <div class="col-md-offset-3 col-md-6 text-center">
          <div class="widget">
            <h4 class="widget-title">Restaurante Salesiano</h4>
            <!-- <address>324 Ellte Road<br>Delhi, DL 110013</address> -->
            <div class="social-list">
              <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            </div>
            <p class="copyright clear-float">
              © Restaurante Salesiano. Todos los derehcos reservados

            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- / footer -->

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.mixitup.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>