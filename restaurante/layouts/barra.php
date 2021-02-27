<?php
include_once 'configuracion/conexion.php';

$sql_pedidos = "SELECT count(*) total_pedidos FROM tb_pedidos where notificacion = '1' ";
$result_pedidos      = mysqli_query($conexion, $sql_pedidos);
$total_pedidos  = mysqli_fetch_assoc($result_pedidos);


$select_facturas = "SELECT count(*) total_facturas FROM tb_facturas where notificacion = '1' ";
$result_facturas      = mysqli_query($conexion, $select_facturas);
$total_facturas  = mysqli_fetch_assoc($result_facturas);


$total_notificaciones = $total_pedidos['total_pedidos'] ;
?>
<script type="text/javascript">
  function edt_id(id) {
    window.location.href = 'perfil.php?edit_id=' + id;
  }
</script>
<!--Start topbar header-->
<header class="topbar-nav">
  <nav class="navbar navbar-expand fixed-top">
    <ul class="navbar-nav mr-auto align-items-center">
      <li class="nav-item">
        <a class="nav-link toggle-menu" href="javascript:void();">
          <i class="icon-menu menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <form class="search-bar">
          <input type="text" class="form-control" placeholder="Enter keywords">
          <a href="javascript:void();"><i class="icon-magnifier"></i></a>
        </form>
      </li>
    </ul>

    <ul class="navbar-nav align-items-center right-nav-link">

      <li class="nav-item dropdown-lg">
        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
          <i class="fa fa-bell-o"></i><span class="badge badge-info badge"> <?php echo $total_notificaciones ?> </span></a>
        <div class="dropdown-menu dropdown-menu-right">
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <?php echo $total_notificaciones ?> Notificaciones
              <span class="badge badge-info"> <?php echo $total_notificaciones ?> </span>
            </li>
            <li class="list-group-item">
              <a href="javaScript:void();">
                <div class="media">
                  <i class="zmdi zmdi-accounts fa-2x mr-3 text-info"></i>
                  <div class="media-body">
                    <h6 class="mt-0 msg-title">  <?php echo $total_pedidos['total_pedidos']; ?> <a href="notificacion-pendientes.php"> ver pedidos </a>  </h6>
                    <!-- <p class="msg-info">Lorem ipsum dolor sit amet...</p> -->
                 </div>
                </div>
              </a>
            </li>
          
            <!-- <li class="list-group-item">
              <a href="javaScript:void();">
                <div class="media">
                  <i class="zmdi zmdi-notifications-active fa-2x mr-3 text-danger"></i>
                  <div class="media-body">
                    <h6 class="mt-0 msg-title"> <php echo $total_facturas['total_facturas']; ?> <a href="notificacion-facturas.php"> ver facturas </a> </h6>
            
                  </div>
                </div>
              </a>
            </li> -->
           
          </ul>
        </div>
      </li>

      <!--  -->
      <!-- <li class="nav-item language">
        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();"><i class="fa fa-flag"></i></a>
        <ul class="dropdown-menu dropdown-menu-right">
          <li class="dropdown-item"> <i class="flag-icon flag-icon-gb mr-2"></i> English</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-fr mr-2"></i> French</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-cn mr-2"></i> Chinese</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-de mr-2"></i> German</li>
        </ul>
      </li> -->
      <!-- idiomas -->
      <li class="nav-item">
        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
          <span class="user-profile">
            <img src="images/users/administradores/<?php echo $_SESSION['datos_login']['imagen']; ?>" class="img-circle" alt="user avatar"></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-right">
          <li class="dropdown-item user-details">
            <a href="javaScript:void();">
              <div class="media">
                <div class="avatar"><img class="align-self-start mr-3" src="images/users/administradores/<?php echo $_SESSION['datos_login']['imagen']; ?>" alt="user avatar"></div>
                <div class="media-body">
                  <h6 class="mt-2 user-title"> <?php echo $_SESSION['datos_login']['nombres']; ?> </h6>
                  <p class="user-subtitle"> <?php echo $_SESSION['datos_login']['email']; ?> </p>
                </div>
              </div>
            </a>
          </li>

          <!-- <li class="dropdown-divider"></li>
          <li class="dropdown-item"><i class="icon-envelope mr-2"></i> Inbox</li>
          <li class="dropdown-divider"></li>
          <li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li>
          <li class="dropdown-divider"></li>
          <li class="dropdown-item"><i class="icon-settings mr-2"></i> Setting</li>
          <li class="dropdown-divider"></li> -->
          <li class="dropdown-item">
            <a href="javascript:edt_id('<?php echo $_SESSION['datos_login']['id_usuario']; ?>')"><i class="icon-settings mr-2"></i> Configuración
          </li>
          <li class="dropdown-divider"></li>
          <li class="dropdown-item"><i class="icon-power mr-2"></i> <a href="configuracion/cerrar_sesion.php"> Cerrar sesión</a></li>
        </ul>
      </li>
    </ul>
  </nav>
</header>
<!--End topbar header-->