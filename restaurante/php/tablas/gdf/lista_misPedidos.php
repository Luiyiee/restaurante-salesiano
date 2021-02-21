<?php
session_start();
require_once "../../configuracion/conexion.php";
$conexion = conexion();
$iduser=$_SESSION['datos_login']['email'];

$sql_query = "SELECT * from tb_pedidos where idusuario = '$iduser' ";
$result_set = mysqli_query($conexion, $sql_query);
$i = 1;
while ($ver = mysqli_fetch_array($result_set)) {
?>
<div class="row">

    <div class="col-12 col-lg-4">
	    <div class="card">
		  <img src="images/cartelera/<?php echo $ver['imagen']; ?>" class="card-img-top" alt="Card image cap">
			<div class="card-body">
				<h4 class="card-title"> <?php echo $ver['nombre'] ?>  - <?php echo $ver['subcategoria'] ?>  </h4>
				<h6> <?php echo $ver['estado'] ?>  </h6>
				
				<hr>
                <a href="javascript:void();" class="btn btn-light btn-sm text-white"><i class="fa fa-star mr-1"></i> Ver</a>
			</div>
		</div>
	   </div>
    </div>
    <br>
<?php
    $i++;
}
?>