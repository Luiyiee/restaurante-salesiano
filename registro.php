<?php
include_once 'restaurante/php/configuracion/conexion.php';
$conexion = conexion();

?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<link rel="stylesheet" type="text/css" href="css/registro.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<script src="js/jquery-3.2.1.min.js"></script>

<head>
  <title>Registro</title>

</head>

<body>

<style>
 .image-container{
    background: url('image/bg.jpg') center no-repeat;
    background-size: cover;
    height: 100vh;
} 

 .form-container{
    background-color: #fccc00;
    display: flex;
    justify-content: center;
} 
</style>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-md-6 d-none d-md-block image-container">

      </div>

      <div class="col-lg-6 col-md-6 form-container">
        <div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box text-center">
          <div class="logo mb-3">
            <img src="image/logo.png" alt="" width="150px">
          </div>
          <div class="heading mb-4">
            <!-- <h4>Registrate</h4> -->
          </div>

          <form id="frmajax" method="POST">
            <div class="form-input">
              <span><i class="fa fa-user"></i></span>
              <input type="text" id="nombres" name="nombres" onkeypress="return soloLetras(event)" placeholder="Nombres">
            </div>
            
            <div class="form-input">
              <span><i class="fa fa-user"></i></span>
              <input type="text" id="apellidos" name="apellidos" onkeypress="return soloLetras(event)" placeholder="Apellidos">
            </div>

            <div class="form-input">
              <span><i class="fa fa-user"></i></span>
              <input type="text" id="cedula" name="cedula" onkeypress="return validaNumericos(event)" placeholder="cedula">
            </div>
            
            
            <div class="form-input">
                <span><i class="fa fa-user"></i></span>
                <input type="telefono" id="telefono" name="telefono" onkeypress="return validaNumericos(event)" placeholder="Telefono">
              </div>
            
            <div class="form-input">
              <span><i class="fa fa-user"></i></span>
              <input type="email" id="email" name="email" placeholder="Email">
              </div>
            
            <div class="form-input">
              <span><i class="fa fa-user"></i></span>
              <input type="password" id="password" name="password" placeholder="password">
              </div>


        
            <div class="row mb-3">
							<div class="col-12 d-flex">
								<div class="custom-control custom-checkbox">
									<label>Todos los campos son obligatorios *</label>
								</div>
							</div>
						</div>
              <div class="text-center mb-3">
							<button type="submit"  id="btnguardar"  class="btn">Registrarse</button>
              
              
						</div>
            
          </form>

        </div>
      </div>
    </div>
  </div>

  <script>
    function soloLetras(e) {
      var key = e.keyCode || e.which,
        tecla = String.fromCharCode(key).toLowerCase(),
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
        especiales = [8, 37, 39, 46],
        tecla_especial = false;

      for (var i in especiales) {
        if (key == especiales[i]) {
          tecla_especial = true;
          break;
        }
      }

      if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
      }
    }
    //
    function validaNumericos(event) {
      if (event.charCode >= 48 && event.charCode <= 57) {
        return true;
      }
      return false;
    }
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#btnguardar').click(function() {
        var datos = $('#frmajax').serialize();
        // var datos = new FormData(document.getElementById("frmajax"));
        $.ajax({
          type: "POST",
          url: "restaurante/php/crud/administrador/clientes/agregar.php",
          // url: "cca/php/crud/administrador/registro/registro.php",
          data: datos,
          success: function(r) {
            if(r == 2){
              alert("Lo sentimos este correo ya exite");
              document.getElementById("frmajax").reset();
            }else if (r == 1) {
              alert("agregado con exito");
              document.getElementById("frmajax").reset();
            } else {
              alert("Fallo el server" + r);
              console.log(r);
              document.getElementById("frmajax").reset();
            }
          }
        });

        return false;
      });
    });
  </script>
</body>

</html>