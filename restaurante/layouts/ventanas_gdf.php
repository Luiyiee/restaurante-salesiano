<?php
$iduser = $_SESSION['datos_login']['id_usuario'];

//cartelera
$sql_pedidos  = "SELECT COUNT(*) total_pedidos FROM tb_pedidos where idusuario = '$iduser' and estado = 'Pendiente' ";
$result_pedidos  = mysqli_query($conexion, $sql_pedidos);
$total_pedidos = mysqli_fetch_assoc($result_pedidos);

?>
<!--Grupo 1-->
<div class="card mt-3">
  <div class="card-content">
    <div class="row row-group m-0">

      <div class="col-12 col-lg-6 col-xl-12 border-light">
        <div class="card-body">
          <h5 class="text-white mb-0"> <?php echo $total_pedidos['total_pedidos']; ?> <span class="float-right"> <i aria-hidden="true" class="fa fa-envelope"></i> </span></h5>
          <div class="progress my-3" style="height:3px;">
            <div class="progress-bar" style="width: <?php echo $total_pedidos['total_pedidos'] ?>%"></div>
          </div>
          <p class="mb-0 text-white small-font"> Pedidos <span class="float-right"> </span></p>
        </div>
      </div>


    </div>
  </div>
</div>
<!-- fin grupo 1-->

<h6 class="text-uppercase"> ALIMENTOS </h6>
<hr>
<div class="row">
  <?php
  $sql_pedidos  = "SELECT * from tb_carta ";
  $result_set  = mysqli_query($conexion, $sql_pedidos);
  while ($ver = mysqli_fetch_array($result_set)) {
  ?>


    <div class="col-lg-4">
    <div class="pricing-table">
    <div class="card">
      <div class="card-body text-center">
      <ul class="list-group list-group-flush">
              <li class="list-group-item text white"><b> <?php echo $ver['nombre'] ?> </b></li>
              
            </ul>
            <h2 class="price text white"><small class="currency">$</small> <?php echo $ver['precio'] ?> </h2>
           
            <br clear="all">
            <img src="images/cartelera/<?php echo $ver['imagen']; ?>"  width="120px" height="120px" alt="">
            <!-- <a href="javascript:void();" class="btn btn-link text-primary bg-white my-3 btn-round">View  </a> -->
          </div>
        </div>
      </div>
    </div>






  <?php } ?>
</div>


</div>
<!--End Row-->

<!--End Row-->