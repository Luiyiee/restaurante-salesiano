<?php
session_start();
require_once "../../configuracion/conexion.php";
$conexion = conexion();

?>


<!-- btn agregar -->


<!-- fin btn agregar -->

<!-- tabla -->
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header"><i class="fa fa-table"></i> Lista bautizados proceso</div>



			<div class="card-body">
				<div class="table-responsive">
					<table id="example" class="table table-bordered">
						<thead>
							<tr>
								<th></th>
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Teléfono</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$iduser = $_SESSION['datos_login']['usuario'];

							$sql_query = "SELECT * FROM gdf where bautizado= 'Proceso' and usuario='$iduser' and eliminado ='1' ";
							$result_set = mysqli_query($conexion, $sql_query);
							$i = 1;
							while ($ver = mysqli_fetch_array($result_set)) {
								$datos = $ver['id'] . "||" .
									$ver['nombres'] . "||" .
									$ver['apellidos'] . "||" .
									$ver['edad'] . "||" .
									$ver['telefono'] . "||" .
									$ver['sexo'] . "||" .
									$ver['bautizado'];
							?>
								<tr>
									<td><?php echo $i; ?></td>

									<!-- <td><php echo $f[1]; ?></td> -->
									<!-- <td><php echo $f['GDF']; ?></td> -->
									<td><?php echo $ver['nombres']; ?></td>
									<td><?php echo $ver['apellidos']; ?></td>
									<td><?php echo $ver['telefono']; ?></td>
									<td>
										<button class="btn btn-warning btn-small btnVer" data-id="<?php echo $ver['id']; ?>" data-nombres="<?php echo $ver['nombres']; ?>" data-apellidos="<?php echo $ver['apellidos']; ?>" data-edad="<?php echo $ver['edad']; ?>" data-telefono="<?php echo $ver['telefono']; ?>" data-sexo="<?php echo $ver['sexo']; ?>" data-fecha="<?php echo $ver['fecha']; ?>" data-bautizado="<?php echo $ver['bautizado']; ?>" data-usuario="<?php echo $ver['usuario']; ?>" data-toggle="modal" data-target="#modalVer">

											<i class="fas fa-eye"></i>
										</button>
										
                                        
									</td>
								</tr>
							<?php
								$i++;
							}
							?>
						</tbody>
						<tfoot>
							<tr>
								<th>#</th>
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Teléfono</th>
								<th>Opciones</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!--  -->
<!-- modal ver -->
<div class="modal fade" id="modalVer" tabindex="-1" role="dialog" aria-labelledby="modalVer" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form method="POST" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title" id="modalVer">Datos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" id="idVer" name="id">



					<div class="row">
						<div class="col-sm-6">
							<label for="nombres">Nombres</label>
							<input type="text" name="nombres" id="nombresVer" class="form-control" required>
						</div>



						<div class="col-sm-6">
							<label for="apellidos">Apellidos</label>
							<input type="text" name="apellidos" id="apellidosVer" class="form-control">

						</div>
					</div>

					<div class="row">
						<div class="col-sm-6">
							<label for="edad">Edad</label>
							<input type="text" name="edad" id="edadVer" class="form-control">

						</div>

						<div class="col-sm-6">
							<label for="telefono">Teléfono</label>
							<input type="text" name="telefono" id="telefonoVer" class="form-control">

						</div>
					</div>

					<div class="row">
						<div class="col-sm-6">
							<label for="sexo">Sexo</label>
							<select name="sexo" id="sexoVer" class="form-control">
								<option value="M">Masculino</option>
								<option value="F">Femenino</option>
							</select>

						</div>
						<div class="col-sm-6">
							<label for="bautizado">Bautizado</label>
							<input type="text" name="bautizado" id="bautizadoVer" class="form-control">
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6">
							<label for="fecha">Fecha registro</label>
							<input type="text" name="fecha" id="fechaVer" class="form-control" required>

						</div>
						<div class="col-sm-6">
							<label for="usuario">GDF</label>
							<input type="text" name="usuario" id="usuarioVer" class="form-control">
						</div>
					</div>



				</div>
			</form>
		</div>
	</div>
</div>
<!-- modal eliminar -->

<!-- scripts -->
<script>
	$(document).ready(function() {
		//Default data table
		$('#default-datatable').DataTable();


		var table = $('#example').DataTable({
			lengthChange: false,
			buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
		});

		table.buttons().container()
			.appendTo('#example_wrapper .col-md-6:eq(0)');

	});
</script>
<!-- eliminar -->

<!-- Ver -->
<script>
	$(document).ready(function() {

		$(".btnVer").click(function() {
			idEditar = $(this).data('id');
			var nombres = $(this).data('nombres');
			var apellidos = $(this).data('apellidos');
			var edad = $(this).data('edad');
			var telefono = $(this).data('telefono');
			var sexo = $(this).data('sexo');
			var bautizado = $(this).data('bautizado');
			var usuario = $(this).data('usuario');
			var fecha = $(this).data('fecha');

			$("#nombresVer").val(nombres);
			$("#apellidosVer").val(apellidos);
			$("#edadVer").val(edad);
			$("#telefonoVer").val(telefono);
			$("#sexoVer").val(sexo);
			$("#bautizadoVer").val(bautizado);
			$("#usuarioVer").val(usuario);
			$("#fechaVer").val(fecha);

			$("#idVer").val(idEditar);

			// document.getElementById("c_rVer").disabled = true;
			document.getElementById("nombresVer").disabled = true;
			document.getElementById("apellidosVer").disabled = true;
			document.getElementById("edadVer").disabled = true;
			document.getElementById("telefonoVer").disabled = true;
			document.getElementById("sexoVer").disabled = true;
			document.getElementById("bautizadoVer").disabled = true;
			document.getElementById("usuarioVer").disabled = true;
			document.getElementById("fechaVer").disabled = true;


		});
	});
</script>