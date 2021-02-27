<?php 
// usuarios
$select_admin  = "SELECT COUNT(*) total_admin FROM usuarios where nivel = 'Administrador' ";
$result_admin  = mysqli_query($conexion, $select_admin);
$total_admin = mysqli_fetch_assoc($result_admin);

$select_clientes  = "SELECT COUNT(*) total_clientes FROM usuarios where nivel = 'Cliente' ";
$result_clientes   = mysqli_query($conexion, $select_clientes);
$total_clientes   = mysqli_fetch_assoc($result_clientes);

//cartelera
$sql_pedidos  = "SELECT COUNT(*) total_pedidos FROM tb_pedidos";
$result_pedidos  = mysqli_query($conexion, $sql_pedidos);
$total_pedidos = mysqli_fetch_assoc($result_pedidos);

// registros cartelera
$select_facturas  = "SELECT COUNT(*) total_facturas FROM tb_facturas ";
$result_facturas  = mysqli_query($conexion, $select_facturas);
$total_facturas = mysqli_fetch_assoc($result_facturas);

?>
        <!--Grupo 1-->
        <div class="card mt-3">
          <div class="card-content">
            <div class="row row-group m-0">
              <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0"> <?php echo $total_admin['total_admin']; ?> <span class="float-right"> <i aria-hidden="true" class="fa fa-user"></i> </span></h5>
                  <div class="progress my-3" style="height:3px;">
                    <div class="progress-bar" style="width: <?php echo $total_admin['total_admin'] ?>%"></div>
                  </div>
                  <p class="mb-0 text-white small-font">Administradores <span class="float-right"> </span></p>
                </div>
              </div>
             
              <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0"> <?php echo $total_clientes['total_clientes']; ?> <span class="float-right"> <span class="ti-briefcase"></span></span></h5>
                  <div class="progress my-3" style="height:3px;">
                    <div class="progress-bar" style="width: <?php echo $total_clientes['total_clientes'] ?>%"></div>
                  </div>
                  <p class="mb-0 text-white small-font"> Usuarios clientes <span class="float-right"> </span></p>
                </div>
              </div>
              <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0"> <?php echo $total_pedidos['total_pedidos']; ?> <span class="float-right"> <i aria-hidden="true" class="fa fa-envelope"></i> </span></h5>
                  <div class="progress my-3" style="height:3px;">
                    <div class="progress-bar" style="width: <?php echo $total_pedidos['total_pedidos'] ?>%"></div>
                  </div>
                  <p class="mb-0 text-white small-font"> total_pedidos <span class="float-right"> </span></p>
                </div>
              </div>
              <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0"> <?php echo $total_facturas['total_facturas']; ?> <span class="float-right"> <i aria-hidden="true" class="fa fa-envelope"></i> </span></h5>
                  <div class="progress my-3" style="height:3px;">
                    <div class="progress-bar" style="width: <?php echo $total_facturas['total_facturas'] ?>%"></div>
                  </div>
                  <p class="mb-0 text-white small-font">realizados <span class="float-right"> </span></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- fin grupo 1-->

  

    
        <!--End Row-->