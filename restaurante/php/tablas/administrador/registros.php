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
			<div class="card-header"><i class="fa fa-table"></i> Registros</div>

			<div class="card-header">

				<?php
				$sql_bloquear = "SELECT * FROM registros WHERE tribu IS NULL OR tribu = '' and eliminado = '1' ";
				$result_bloquear = mysqli_query($conexion, $sql_bloquear);
				$bloquear = mysqli_fetch_assoc($result_bloquear);
				if ($bloquear == true) {
				?>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
						<i class="fa fa-plus"></i> Agregar
					</button>

					<button class="btn btn-success glyphicon glyphicon-remove" onclick="preguntarSiNo()">
						Asignar tribus
					</button>


				<?php } else {
				?>


					<button class="btn btn-danger glyphicon glyphicon-remove" onclick="Finalizar()">
						Finalizar evento
					</button>
				<?php	} ?>
				<!-- SELECT * FROM registros WHERE tribu IS NULL OR tribu = '' -->
			</div>

			<div class="card-body">
				<div class="table-responsive">
					<table id="example" class="table table-bordered">
						<thead>
							<tr>
								<th></th>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Email</th>
								<th>Telefono</th>
								<th>Tribu</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql_query = "select * from registros where eliminado = '1' ORDER by tribu ASC ";
							$result_set = mysqli_query($conexion, $sql_query);
							$i = 1;
							while ($ver = mysqli_fetch_array($result_set)) {
								$datos = $ver['id'] . "||" .
									$ver['nombres'] . "||" .
									$ver['apellidos'] . "||" .
									$ver['edad'] . "||" .
									$ver['telefono'] . "||" .
									$ver['email'] . "||" .
									$ver['fecha'] . "||" .
									$ver['tribu'] . "||" .
									$ver['sexo'];

							?>
								<tr>
									<td><?php echo $i; ?></td>

									<td><?php echo $ver['nombres']; ?></td>
									<td><?php echo $ver['apellidos']; ?></td>
									<td><?php echo $ver['email']; ?></td>
									<td><?php echo $ver['telefono']; ?></td>
									<td><?php echo $ver['tribu']; ?></td>
									<td>
										<button class="btn btn-warning btn-small btnVer" 
										data-id="<?php echo $ver['id']; ?>" 
										data-nombres="<?php echo $ver['nombres']; ?>" 
										data-apellidos="<?php echo $ver['apellidos']; ?>" 
										data-edad="<?php echo $ver['edad']; ?>" 
										data-email="<?php echo $ver['email']; ?>" 
										data-telefono="<?php echo $ver['telefono']; ?>" 
										data-tribu="<?php echo $ver['tribu']; ?>"
										data-fecha="<?php echo $ver['fecha']; ?>" 
										data-sexo="<?php echo $ver['sexo']; ?>"  
										
										data-toggle="modal" data-target="#modalVer">

											<i class="fas fa-eye"></i>
										</button>

										<button class="btn btn-success glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')">
											<i class="fa fa-edit"></i>
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
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Email</th>
								<th>Telefono</th>
								<th>Tribu</th>
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
							<label>Nombres</label>
							<div class="input-group mb-3">
								<input type="text" class="form-control" id="nombresVer" name="nombres">
							</div>
						</div>

						<div class="col-sm-6">
							<label>Apellidos</label>
							<input type="text" class="form-control" id="apellidosVer" name="apellidos">
						</div>

					</div>





					<div class="row">

						<div class="col-sm-6">

							<label>Telefono </label>
							<div class="input-group mb-3">
								<input type="text" class="form-control" id="telefonoVer" name="telefono">

							</div>
						</div>

						<div class="col-sm-6">
							<label for="apellidos">Edad</label>
							<div class="input-group mb-3">
								<input type="text" id="edadVer" class="form-control" name="edad">


							</div>
						</div>

					</div>


					<div class="row">

						<div class="col-sm-6">

							<label>Sexo</label>
							<div class="input-group mb-3">
								<select name="sexo" id="sexoVer" class="form-control">
									<option value="M">Masculino</option>
									<option value="F">Femenino</option>
								</select>
							</div>
						</div>

						<div class="col-sm-6">
							<label>Email</label>
							<div class="input-group mb-3">
								<input type="email" class="form-control input-sm" id="emailVer" name="email">

							</div>
						</div>

					</div>



					<div class="row">

						<div class="col-sm-6">

							<label>Fecha registro</label>
							<div class="input-group mb-3">
								<input type="text" class="form-control" id="fechaVer" name="fecha">

							</div>
						</div>

						<div class="col-sm-6">
							<label>Tribu</label>
							<div class="input-group mb-3">
								<input type="text" class="form-control" id="tribuVer" name="tribu">

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
			var edad = $(this).data('edad');
			var telefono = $(this).data('telefono');
			var email = $(this).data('email');
			var fecha = $(this).data('fecha');
			var tribu = $(this).data('tribu');
			var sexo = $(this).data('sexo');

			$("#nombresVer").val(nombres);
			$("#apellidosVer").val(apellidos);
			$("#edadVer").val(edad);
			$("#telefonoVer").val(telefono);
			$("#emailVer").val(email);
			$("#fechaVer").val(fecha);
			$("#tribuVer").val(tribu);
			$("#sexoVer").val(sexo);

			$("#idVer").val(idEditar);


			document.getElementById("nombresVer").disabled = true;
			document.getElementById("apellidosVer").disabled = true;
			document.getElementById("edadVer").disabled = true;
			document.getElementById("telefonoVer").disabled = true;
			document.getElementById("emailVer").disabled = true;
			document.getElementById("fechaVer").disabled = true;
			document.getElementById("tribuVer").disabled = true;
			document.getElementById("sexoVer").disabled = true;


		});
	});
</script>