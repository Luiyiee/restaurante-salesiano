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
            <a href="#about">About</a>
            <a href="#event">Event</a>
            <a href="#menu-list">Menu</a>
            <a href="#contact">Book a table</a>
            <a href="iniciar-sesion.php">Iniciar sesion</a>
          </div>
          <!-- Use any element to open the sidenav -->
          <span onclick="openNav()" class="pull-right menu-icon">☰</span>
        </div>
      </header>
      <div class="container">
        <div class="row">
          <div class="inner text-center">
            <h1 class="logo-name">ProOnliPc</h1>
            <h2>Alimentos Para adaptarse a su estilo de vida & salud.</h2>
            <p>¡Especializado en cocina Peruana!!</p>
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
          <p class="header-p">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
            <br>nibh euismod tincidunt ut laoreet dolore magna aliquam.
          </p>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <div class="col-md-6 col-sm-6">
            <div class="about-info">
              <h2 class="heading">vel illum qui dolorem eum</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero impedit inventore culpa vero accusamus in nostrum dignissimos modi, molestiae. Autem iusto esse necessitatibus ex corporis earum quaerat voluptates quibusdam dicta!</p>
              <div class="details-list">
                <ul>
                  <li><i class="fa fa-check"></i>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                  <li><i class="fa fa-check"></i>Quisque finibus eu lorem quis elementum</li>
                  <li><i class="fa fa-check"></i>Vivamus accumsan porttitor justo sed </li>
                  <li><i class="fa fa-check"></i>Curabitur at massa id tortor fermentum luctus</li>
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
            <h1 class="header-h">Up Coming events</h1>
            <p class="header-p">Decorations 100% complete here</p>
          </div>
          <div class="col-md-12" style="padding-bottom:60px;">
            <div class="item active left">
              <div class="col-md-6 col-sm-6 left-images">
                <img src="img/res02.jpg" class="img-responsive">
              </div>
              <div class="col-md-6 col-sm-6 details-text">
                <div class="content-holder">
                  <h2>Joyful party</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore eos suscipit earum voluptas aliquam recusandae, quae iure adipisci, inventore quia, quos delectus quaerat praesentium id expedita nihil illo accusantium, tempora.</p>
                  <address>
                    <strong>Place: </strong>
                    1612 Collins Str, Victoria 8007
                    <br>
                    <strong>Time: </strong>
                    07:30pm
                  </address>
                  <a class="btn btn-imfo btn-read-more" href="events-details.html">Read more</a>
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
                <span class="menu-price">$ <?php echo $ver['precio'];?></span>
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
                <span class="menu-price">$ <?php echo $ver['precio'];?></span>
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
                <span class="menu-price">$ <?php echo $ver['precio'];?></span>
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
  <section id="contact" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1 class="header-h">Reserve Su Mesa</h1>
          <p class="header-p">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
            <br>nibh euismod tincidunt ut laoreet dolore magna aliquam.
          </p>
        </div>
      </div>
      <div class="row msg-row">
        <div class="col-md-4 col-sm-4 mr-15">
          <div class="media-2">
            <div class="media-left">
              <div class="contact-phone bg-1 text-center"><span class="phone-in-talk fa fa-phone"></span></div>
            </div>
            <div class="media-body">
              <h4 class="dark-blue regular">Phone Numbers</h4>
              <p class="light-blue regular alt-p">+440 875369208 - <span class="contacts-sp">Phone Booking</span></p>
            </div>
          </div>
          <div class="media-2">
            <div class="media-left">
              <div class="contact-email bg-14 text-center"><span class="hour-icon fa fa-clock-o"></span></div>
            </div>
            <div class="media-body">
              <h4 class="dark-blue regular">Opening Hours</h4>
              <p class="light-blue regular alt-p"> Monday to Friday 09.00 - 24:00</p>
              <p class="light-blue regular alt-p">
                Friday and Sunday 08:00 - 03.00
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-8 col-sm-8">
          <form action="" method="post" role="form" class="contactForm">
            <div id="sendmessage">Your booking request has been sent. Thank you!</div>
            <div id="errormessage"></div>
            <div class="col-md-6 col-sm-6 contact-form pad-form">
              <div class="form-group label-floating is-empty">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>

            </div>
            <div class="col-md-6 col-sm-6 contact-form">
              <div class="form-group">
                <input type="date" class="form-control label-floating is-empty" name="date" id="date" placeholder="Date" data-rule="required" data-msg="This field is required" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 contact-form pad-form">
              <div class="form-group">
                <input type="email" class="form-control label-floating is-empty" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 contact-form">
              <div class="form-group">
                <input type="time" class="form-control label-floating is-empty" name="time" id="time" placeholder="Time" data-rule="required" data-msg="This field is required" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 contact-form">
              <div class="form-group">
                <input type="text" class="form-control label-floating is-empty" name="phone" id="phone" placeholder="Phone" data-rule="required" data-msg="This field is required" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 contact-form">
              <div class="form-group">
                <input type="text" class="form-control label-floating is-empty" name="people" id="people" placeholder="People" data-rule="required" data-msg="This field is required" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="col-md-12 contact-form">
              <div class="form-group label-floating is-empty">
                <textarea class="form-control" name="message" rows="5" rows="3" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validation"></div>
              </div>

            </div>
            <div class="col-md-12 btnpad">
              <div class="contacts-btn-pad">
                <button class="contacts-btn">Reserve Su Mesa</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- / contact -->
  <!-- footer -->
  <footer class="footer text-center">
    <div class="footer-top">
      <div class="row">
        <div class="col-md-offset-3 col-md-6 text-center">
          <div class="widget">
            <h4 class="widget-title">ProOnliPc</h4>
            <address>324 Ellte Road<br>Delhi, DL 110013</address>
            <div class="social-list">
              <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            </div>
            <p class="copyright clear-float">
              © ProOnliPc Theme. All Rights Reserved
            <div class="credits">

              Designed by <a href="https://www.youtube.com/channel/UCDH0DJaVLkCDtl_YN9hhByw?view_as=subscriberP">ProOnliPc</a>
            </div>
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