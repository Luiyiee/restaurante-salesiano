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
			<div class="card-header"><i class="fa fa-table"></i> Administradores</div>

			<div class="card-header">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
					<i class="fa fa-plus"></i> Agregar administrador
				</button>
			</div>

			<div class="card-body">
				<div class="table-responsive">
					<table id="example" class="table table-bordered">
						<thead>
							<tr>
								<th></th>
								<th>Foto</th>
								<th>nombres</th>
								<th>Estado</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql_query = "SELECT * FROM usuarios where nivel = 'Administrador' and eliminado ='1' ";
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
									<td>
										<img src="images/users/administradores/<?php echo $ver['img_perfil']; ?>" width="20px" height="20px" alt="">

									</td>
									<!-- <td><php echo $f[1]; ?></td> -->
									<!-- <td><php echo $f['GDF']; ?></td> -->
									<td><?php echo $ver['nombres']; ?></td>
									<td><?php echo $ver['estado']; ?></td>
									<td>
										<button class="btn btn-warning btn-small btnVer" 
										data-id="<?php echo $ver['id']; ?>" 
										data-nombres="<?php echo $ver['nombres']; ?>" 
										data-apellidos="<?php echo $ver['apellidos']; ?>" 
										data-cedula="<?php echo $ver['cedula']; ?>" 
										data-telefono="<?php echo $ver['telefono']; ?>" 
										data-email="<?php echo $ver['email']; ?>" 
										data-estado="<?php echo $ver['estado']; ?>" 
										data-usuario_creacion="<?php echo $ver['usuario_creacion']; ?>" 
										data-usuario_editado="<?php echo $ver['usuario_editado']; ?>" 
										data-fecha_creacion="<?php echo $ver['fecha_creacion']; ?>" 
										data-fecha_editado="<?php echo $ver['fecha_editado']; ?>" 
										
										data-toggle="modal" data-target="#modalVer">

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
								<th>nombres</th>
								<th>Estado</th>
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
							<div class="input-group mb-3">
								<input type="text" name="nombres" id="nombresVer" class="form-control">
							</div>
						</div>

						<div class="col-sm-6">
							<label for="apellidos">Apellidos</label>
							<div class="input-group mb-3">
								<input type="text" name="apellidos" id="apellidosVer" class="form-control">
							</div>
						</div>

					</div>

					<div class="row">

					<div class="col-sm-6">
						<label for="email">Email</label>
							<div class="input-group mb-3">
							<input type="text" name="email" id="emailVer" class="form-control">
							</div>
						</div>

						<div class="col-sm-6">
								<label for="estado">Estado</label>
								<div class="input-group mb-3">
								<input type="text" name="estado" id="estadoVer" class="form-control">
							</div>
						</div>


					</div>
					
					<div class="row">

						<div class="col-sm-6">
						<label for="cedula">Cedula </label>
							<div class="input-group mb-3">
							<input type="text" name="cedula" id="cedulaVer" class="form-control">
							</div>
						</div>

						<div class="col-sm-6">
						<label for="telefono_2">Telefono </label>
							<div class="input-group mb-3">
							<input type="text" name="telefono"  id="telefonoVer" class="form-control">
							</div>
						</div>


					</div>
			
					<div class="row">

						<div class="col-sm-6">
						<label for="usuario_creacion">Creado por:</label>
							<div class="input-group mb-3">
							<input type="text" name="usuario_creacion" id="usuario_creacionVer" class="form-control">
							</div>
						</div>

						<div class="col-sm-6">
						<label for="usuario_editado">Editado por: </label>
							<div class="input-group mb-3">
							<input type="text" name="usuario_editado"  id="usuario_editadoVer" class="form-control">
							</div>
						</div>


					</div>
				
					<div class="row">

						<div class="col-sm-6">
						<label for="fecha_creacion">Creado</label>
							<div class="input-group mb-3">
							<input type="text" name="fecha_creacion"  id="fecha_creacionVer" class="form-control">
							</div>
						</div>

						<div class="col-sm-6">
						<label for="fecha_editado">Ultima modificación</label>
							<div class="input-group mb-3">
						<input type="text" name="fecha_editado" id="fecha_editadoVer" class="form-control" >
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
			var usuario_creacion = $(this).data('usuario_creacion');
			var usuario_editado = $(this).data('usuario_editado');
			var fecha_creacion = $(this).data('fecha_creacion');
			var fecha_editado = $(this).data('fecha_editado');

			$("#nombresVer").val(nombres);
			$("#apellidosVer").val(apellidos);
			$("#cedulaVer").val(cedula);
			$("#telefonoVer").val(telefono);
			$("#emailVer").val(email);
			$("#estadoVer").val(estado);
			$("#usuario_creacionVer").val(usuario_creacion);
			$("#usuario_editadoVer").val(usuario_editado);
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
			document.getElementById("usuario_creacionVer").disabled = true;
			document.getElementById("usuario_editadoVer").disabled = true;
			document.getElementById("fecha_creacionVer").disabled = true;
			document.getElementById("fecha_editadoVer").disabled = true;


		});
	});
</script>