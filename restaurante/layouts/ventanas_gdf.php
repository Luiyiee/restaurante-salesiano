<?php 
$iduser=$_SESSION['datos_login']['email'];

//cartelera
$sql_pedidos  = "SELECT COUNT(*) total_pedidos FROM tb_pedidos where idusuario = '$iduser' ";
$result_pedidos  = mysqli_query($conexion, $sql_pedidos);
$total_pedidos = mysqli_fetch_assoc($result_pedidos);

// registros cartelera
$select_facturas  = "SELECT COUNT(*) total_facturas FROM tb_facturas where idusuario = '$iduser' ";
$result_facturas  = mysqli_query($conexion, $select_facturas);
$total_facturas = mysqli_fetch_assoc($result_facturas);

?>
        <!--Grupo 1-->
        <div class="card mt-3">
          <div class="card-content">
            <div class="row row-group m-0">
            
              <div class="col-12 col-lg-6 col-xl-6 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0"> <?php echo $total_pedidos['total_pedidos']; ?> <span class="float-right"> <i aria-hidden="true" class="fa fa-envelope"></i> </span></h5>
                  <div class="progress my-3" style="height:3px;">
                    <div class="progress-bar" style="width: <?php echo $total_pedidos['total_pedidos'] ?>%"></div>
                  </div>
                  <p class="mb-0 text-white small-font"> total_pedidos <span class="float-right"> </span></p>
                </div>
              </div>

              <div class="col-12 col-lg-6 col-xl-6 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0"> <?php echo $total_facturas['total_facturas']; ?> <span class="float-right"> <i aria-hidden="true" class="fa fa-envelope"></i> </span></h5>
                  <div class="progress my-3" style="height:3px;">
                    <div class="progress-bar" style="width: <?php echo $total_facturas['total_facturas'] ?>%"></div>
                  </div>
                  <p class="mb-0 text-white small-font">total_facturas <span class="float-right"> </span></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- fin grupo 1-->

  

    
        <!--End Row-->