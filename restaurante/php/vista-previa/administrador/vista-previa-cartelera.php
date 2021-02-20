<?php
session_start();
require_once "../../configuracion/conexion.php";
$conexion = conexion();

?>
<h6 class="text-uppercase">Eventos pasados</h6>
<hr>
<div class="row">
  <?php
  $limite = 10; //productos por pagina
  $totalQuery = $conexion->query("select count(*) total_cartelera_eliminado from cartelera where eliminado = '0' ") or die($conexion->error);
  $totalProductos = mysqli_fetch_row($totalQuery);
  $totalBotones = round($totalProductos[0] / $limite);
  if (isset($_GET['limite'])) {
    $resultado = $conexion->query("select count(*) total_cartelera_eliminado from cartelera where eliminado = '0' order by id DESC limit " . $_GET['limite'] . "," . $limite) or die($conexion->error);
  } else {
    $resultado = $conexion->query("select count(*) total_cartelera_eliminado from cartelera where eliminado = '0'  order by id DESC limit " . $limite) or die($conexion->error);
  }

  $sql_total = "select count(*) total_cartelera_eliminado from cartelera where eliminado = '0' ";
  $result_set = mysqli_query($conexion, $sql_total);
  $total_cartelera = mysqli_fetch_assoc($result_set);


  $sql_query = "SELECT * FROM cartelera where eliminado ='0' ";
  $result_set = mysqli_query($conexion, $sql_query);
  $i = 10;
  while ($ver = mysqli_fetch_array($result_set)) {
  ?>

    <?php if ($total_cartelera['total_cartelera_eliminado'] == 1) {

    ?>
      <div class="card-deck col-lg-6 col-md-6 col-small-12">

        <div class="card">
          <img class="card-img-top" src="images/cartelera/<?php echo $ver['imagen']; ?>" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title"> nombre: <?php echo $ver['nombre']; ?> </h5>
            <p class="card-text"><b> DEscripcion: </b> <?php echo $ver['descripcion']; ?> </p>
          </div>
          <div class="card-footer">
            <small> <?php echo $ver['fecha']; ?> </small>
          </div>
          <button class="btn btn-danger glyphicon glyphicon-remove" onclick="preguntarSiNo('<?php echo $ver['id'] ?>')">
            Eliminar
          </button>
        </div>

      </div>
    <?php } else { ?>
      <div class="card-deck col-lg-6 col-md-6 col-small-12">

        <div class="card">
          <img class="card-img-top" src="images/cartelera/<?php echo $ver['imagen']; ?>" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title"> nombre: <?php echo $ver['nombre']; ?> </h5>
            <p class="card-text"><b> DEscripcion: </b> <?php echo $ver['descripcion']; ?> </p>
          </div>
          <div class="card-footer">
            <small> <?php echo $ver['fecha']; ?> </small>
          </div>
          <button class="btn btn-danger glyphicon glyphicon-remove" onclick="preguntarSiNo('<?php echo $ver['id'] ?>')">
            Eliminar
          </button>
        </div>

      </div>
    <?php } ?>
  <?php } ?>

</div>
<!--End Row-->

<nav>
  <ul class="pagination">

    <?php

    if ($_GET['limite'] = 0) {
      echo '<h1> No tienes eventos</h1>';
    ?>
      <h1> No tienes eventos</h1>
    <?php
    } else if (isset($_GET['limite'])) {
      if ($_GET['limite'] > 0) {
        echo ' <li class="page-item disabled"><a href="vista-previa-cartelera.php?limite=' . ($_GET['limite'] - 10) . '" class="page-link">&lt;</a></li>';
      }
    }

    for ($k = 0; $k < $totalBotones; $k++) {
      echo  '<li class="page-item"><a href="vista-previa-cartelera.php?limite=' . ($k * 10) . '" class="page-link">' . ($k + 1) . '</a></li>';
    }
    if (isset($_GET['limite'])) {
      if ($_GET['limite'] + 10 < $totalBotones * 10) {
        echo ' <li class="page-item"><a href="vista-previa-cartelera.php?limite=' . ($_GET['limite'] + 10) . '" class="page-link"> &gt;</a></li>';
      }
    } else {
      echo ' <li class="page-item"><a href="vista-previa-cartelera.php?limite=10" class="page-link">&gt;</a></li>';
    }
    ?>


  </ul>
</nav>