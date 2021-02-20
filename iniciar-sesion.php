
<!DOCTYPE html>
<html>

<head>
	<title>Iniciar Sesión</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <meta name="keywords" content="Slide Login Form template Responsive, Login form web template, Flat Pricing tables, Flat Drop downs Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" /> -->

	<!-- <script>
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script> -->

	<!-- Custom Theme files -->
	<link href="estilos-login/css/estilos.css" rel="stylesheet" type="text/css" media="all" />
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js"></script>

</head>

<body>

	<!-- main -->
	<div class="w3layouts-main">
		<div class="bg-layer">
			<h1>Rastaurante Salesiana</h1>
			<div class="header-main">
				<div class="main-icon">
					<span class="fa "><i class="fas fa-chevron-circle-up"></i></span>
				</div>
				<div class="header-left-bottom">
					<form action="./restaurante/configuracion/check.php" method="post">
						<div class="icon1">
							<span class="fa fa-user"></span>

							<input type="email" class="form-control" pattern="[A-Za-z0-9_-@.]{1,15}" placeholder="Email" name="email">
						</div>
						<div class="icon1">
							<span class="fa fa-lock"></span>

							<input type="password" class="form-control" pattern="[A-Za-z0-9_-]{1,15}" placeholder="Password" name="password">
						</div>
					
						<div class="bottom">
							<button type="submit" class="btn">Iniciar Sesión</button>
							<br clear="all">
							<br clear="all">
							<a href="registro.php" class="btn btn-primary"> Registrase </a>
                        </div>
                        <br>
                        <center>
							<div class="login-check">
						 	<?php
							if (isset($_GET['error'])) {
								echo '<p class="error">'. $_GET['error'] .'</p>';
							}else if(isset($_GET['bloqueado'])){
								echo '<p class="error">'. $_GET['bloqueado'] .'</p>';
							}
							?>
							<div class="clear"></div>
                        </div>
                    </center>
					</form>
				</div>
			<!-- echo '<p>'. $_GET['error'] .'</p>'; -->
			</div>

			
		</div>
	</div>


</body>

</html>