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
			<div class="card-header"><i class="fa fa-table"></i> Clientes</div>



			<div class="card-body">
				<div class="table-responsive">
					<table id="example" class="table table-bordered">
						<thead>
							<tr>
								<th></th>
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Estado</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql_query = "SELECT * FROM usuarios where nivel = 'Cliente' and eliminado ='1' ";
							$result_set = mysqli_query($conexion, $sql_query);
							$i = 1;
							while ($ver = mysqli_fetch_array($result_set)) {
								$datos = $ver['id'] . "||" .
									$ver['nombres'] . "||" .
									$ver['apellidos'] . "||" .
									$ver['cedula'] . "||" .
									$ver['telefono'] . "||" .
									$ver['email'] . "||" .
									$ver['nivel'] . "||" .
									$ver['estado'];
							?>
								<tr>
									<td><?php echo $i; ?></td>
									
									<!-- <td><php echo $f[1]; ?></td> -->
									<!-- <td><php echo $f['GDF']; ?></td> -->
									<td><?php echo $ver['nombres']; ?></td>
									<td><?php echo $ver['apellidos']; ?></td>
									<td><?php echo $ver['estado']; ?></td>
									<td>
										<button class="btn btn-warning btn-small btnVer" data-id="<?php echo $ver['id']; ?>" data-nombres="<?php echo $ver['nombres']; ?>" data-apellidos="<?php echo $ver['apellidos']; ?>" data-cedula="<?php echo $ver['cedula']; ?>" data-telefono="<?php echo $ver['telefono']; ?>" data-email="<?php echo $ver['email']; ?>" data-estado="<?php echo $ver['estado']; ?>" data-usuario_creacion="<?php echo $ver['usuario_creacion']; ?>" data-usuario_editado="<?php echo $ver['usuario_editado']; ?>" data-fecha_creacion="<?php echo $ver['fecha_creacion']; ?>" data-fecha_editado="<?php echo $ver['fecha_editado']; ?>" data-toggle="modal" data-target="#modalVer">

											<i class="fas fa-eye"></i>
										</button>

										<button class="btn btn-success glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')">
											<i class="fa fa-edit"></i>
										</button>

										<button class="btn btn-danger glyphicon glyphicon-remove" onclick="preguntarSiNo('<?php echo $ver['id'] ?>')">
											<i class="fa fa-trash"></i>
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
								<th>Foto</th>
								<th>Usuario</th>
								<th>Estado</th>
								<th></th>
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
							<label>Nombres</label>
							<div class="input-group mb-3">
								<input type="text" class="form-control input-sm" id="nombresVer" name="nombres">
							</div>
						</div>

						<div class="col-sm-6">
							<label>Apellidos</label>
							<div class="input-group mb-3">
								<input type="text" class="form-control input-sm" id="apellidosVer" name="apellidos">
							</div>
						</div>



					</div>




					<div class="row">

						<div class="col-sm-6">

							<label>Cedula</label>
							<div class="input-group mb-3">
								<input type="text" class="form-control input-sm" id="cedulaVer" name="cedula">

							</div>
						</div>

						<div class="col-sm-6">
							<label>Telefono</label>
							<div class="input-group mb-3">
								<input type="text" class="form-control input-sm" id="telefonoVer" name="telefono">

							</div>
						</div>

					</div>

					<div class="row">
						<div class="col-sm-6">
							<label for="email">Email</label>
							<input type="text" name="email" placeholder="email" id="emailVer" class="form-control" required>
						</div>
						<div class="col-sm-6">
							<label>Estado</label>
							<input type="text" class="form-control input-sm" id="estadoVer" name="estado">
						</div>
					</div>



					<div class="row">

						<div class="col-sm-6">

							<label>Creado</label>
							<div class="input-group mb-3">
								<input type="text" class="form-control input-sm" id="fecha_creacionVer" name="fecha_creacionVer">

							</div>
						</div>

						<div class="col-sm-6">
							<label>Ultima modificación</label>
							<div class="input-group mb-3">
								<input type="text" class="form-control input-sm" id="fecha_editadoVer" name="fecha_editadoVer">

							</div>
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
			var cedula = $(this).data('cedula');
			var telefono = $(this).data('telefono');
			var email = $(this).data('email');
			var estado = $(this).data('estado');
			var fecha_creacion = $(this).data('fecha_creacion');
			var fecha_editado = $(this).data('fecha_editado');

			$("#nombresVer").val(nombres);
			$("#apellidosVer").val(apellidos);
			$("#cedulaVer").val(cedula);
			$("#telefonoVer").val(telefono);
			$("#emailVer").val(email);
			$("#estadoVer").val(estado);
			$("#fecha_creacionVer").val(fecha_creacion);
			$("#fecha_editadoVer").val(fecha_editado);
			$("#idVer").val(idEditar);

			// document.getElementById("emailVer").disabled = true;
			document.getElementById("nombresVer").disabled = true;
			document.getElementById("apellidosVer").disabled = true;
			document.getElementById("cedulaVer").disabled = true;
			document.getElementById("telefonoVer").disabled = true;
			document.getElementById("emailVer").disabled = true;
			document.getElementById("estadoVer").disabled = true;
			document.getElementById("fecha_creacionVer").disabled = true;
			document.getElementById("fecha_editadoVer").disabled = true;


		});
	});
</script>