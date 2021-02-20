<?php
session_start();
require_once "../../configuracion/conexion.php";
$conexion = conexion();

?>
<h6 class="text-uppercase">Tribus</h6>
<hr>
<div class="row">
  <?php
  $sql_query = "SELECT * FROM tribus ";
  $result_set = mysqli_query($conexion, $sql_query);
  $i = 10;
  while ($ver = mysqli_fetch_array($result_set)) {
  ?>
    <div class="card-deck col-lg-4 col-md-6 col-small-12">

      <div class="card">
        <img class="card-img-top" src="images/tribus/<?php echo $ver['imagen']; ?>" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"> Tribu: <?php echo $ver['nombre']; ?> </h5>
          <p class="card-text"><b> Lider tribu: </b> <?php echo $ver['lider_tribu']; ?> </p>
        </div>
        <div class="card-footer">
          <small><b> PUNTOS:</b> <?php echo $ver['puntos']; ?> </small>
        </div>
        <!-- <button class="btn btn-danger glyphicon glyphicon-remove" onclick="preguntarSiNo('<php echo $ver['id'] ?>')">
            Eliminar
          </button> -->
      </div>

    </div>
  <?php } ?>

</div>
<!--End Row-->