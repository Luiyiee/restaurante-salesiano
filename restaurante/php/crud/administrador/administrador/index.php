<!-- <php 
  session_start();

  unset($_SESSION['consulta']);

 ?> -->

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>Tabla dinamica</title>
  <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">

  <script src="librerias/jquery-3.2.1.min.js"></script>
  <script src="js/funciones.js"></script>
  <script src="librerias/bootstrap/js/bootstrap.js"></script>
  <script src="librerias/alertifyjs/alertify.js"></script>
  <script src="librerias/select2/js/select2.js"></script>
</head>

<body>

  <div class="container">
    <div id="buscador"></div>
    <div id="tabla"></div>
  </div>

  <!-- Modal para registros nuevos -->


  <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Agrega nueva persona</h4>
        </div>
        <div class="modal-body">
          <!-- <form id="registro" enctype="multipart/form-data">
            <label>Nombre</label>
            <input type="text" name="" id="nombre" class="form-control input-sm">
            <label>Apellido</label>
            <input type="text" name="" id="apellido" class="form-control input-sm">
            <label>Email</label>
            <input type="text" name="" id="email" class="form-control input-sm">
            <label>telefono</label>
            <input type="text" name="" id="telefono" class="form-control input-sm">

            <label for="imagen">Imagen</label>
             <input type="text" name="" id="imagen" class="form-control input-sm"> -->


          <form id="frmArticulos" enctype="multipart/form-data">
            <label>Categoria</label>

            <label>Nombre</label>
            <input type="text" class="form-control input-sm" id="nombre" name="nombre">
            <label>Descripcion</label>
            <input type="text" class="form-control input-sm" id="apellido" name="apellido">
            <label>Cantidad</label>
            <input type="text" class="form-control input-sm" id="email" name="email">
            <label>Precio</label>
            <input type="text" class="form-control input-sm" id="telefono" name="telefono">
            <label>Imagen</label>
            <input type="file" id="imagen" name="imagen">
            <p></p>
            <span id="btnAgregaArticulo" class="btn btn-primary">Agregar</span>
            <!-- </form> -->

          </form>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo">
            Agregar
          </button> -->
          <!-- <span id="guardarnuevo" class="btn btn-primary">Agregar</span> -->
        </div>
      </div>
    </div>
  </div>

  <!-- Modal para edicion de datos -->

  <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
        </div>
        <div class="modal-body">
          <!--  -->
          <form id="frmArticulosU" enctype="multipart/form-data">

            <input type="text" hidden="" id="idpersona" name="id">
            <label>Nombre</label>
            <input type="text" class="form-control input-sm" id="nombreu" name="nombre">
            <label>Apellido</label>
            <input type="text" class="form-control input-sm" id="apellidou" name="apellido">
            <label>Email</label>
            <input type="text" class="form-control input-sm" id="emailu" name="email">
            <label>telefono</label>
            <input type="text" class="form-control input-sm" id="telefonou" name="telefono">
            <label>Imagen</label>
            <!-- <input type="text" class="form-control input-sm" id="imagenu" name="imagenU"> -->
            <input type="file" id="imagenu" name="imagen">
          </form>
        </div>
        <div class="modal-footer">
          <!-- <button id="btnActualizaarticulo" type="button" class="btn btn-warning" data-dismiss="modal">Actualizar</button> -->

          <button type="button" class="btn btn-warning" id="actualizadatos" data-dismiss="modal">Actualizar</button>

        </div>
      </div>
    </div>
  </div>

</body>

</html>

<script type="text/javascript">
  $(document).ready(function() {
    $('#tabla').load('componentes/tabla.php');
    $('#buscador').load('componentes/buscador.php');
  });
</script>


<script type="text/javascript">
  $(document).ready(function() {
    // $('#tablaArticulosLoad').load("articulos/tablaArticulos.php");

    $('#btnAgregaArticulo').click(function() {


      var formData = new FormData(document.getElementById("frmArticulos"));

      $.ajax({
        url: "agregar.php",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,

        success: function(r) {

          if (r == 1) {
            for (let [key, value] of formData.entries()) {
              console.log(key, ':', value);
            }
            $('#tabla').load('componentes/tabla.php');
            alertify.success("Agregado con exito :D");
          } else {
            for (let [key, value] of formData.entries()) {
              console.log(key, ':', value);
            }
            console.log(formData);
            console.log(r);
            $('#tabla').load('componentes/tabla.php');
            alertify.error("Fallo el servidor :(");

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
function agregaform(datos){

d=datos.split('||');

$('#idpersona').val(d[0]);
$('#nombreu').val(d[1]);
$('#apellidou').val(d[2]);
$('#emailu').val(d[3]);
$('#telefonou').val(d[4]);
// $('#imagenu').val(d[5]);

}
  function actualizaDatos() {

// formData.append("datos", datos);
           
    // var formData=$('#frmArticulosU').serialize();
  //  var formData = new FormData(document.getElementById("frmArticulosU"));
  var formData = new FormData(document.getElementById("frmArticulosU"));
    $.ajax({
      type: "POST",
      url: "modificar.php",
      dataType: "html",
      data: formData,
					cache: false,
					contentType: false,
					processData: false,
      success: function(r) {

if (r == 1) {
  console.log(formData);
  $('#tabla').load('componentes/tabla.php');
  alertify.success("Agregado con exito :D");
} else {
  
  // console.log(formData);
  for (let [key, value] of formData.entries()) {
              console.log(key, ':', value);
            }
  console.log(r);
  $('#tabla').load('componentes/tabla.php');
  alertify.error("Fallo el servidor :(");

}
}
    });

  }
</script>