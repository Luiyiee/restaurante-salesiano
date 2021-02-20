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
			<div class="card-header"><i class="fa fa-table"></i> Lista comidas</div>


			<div class="card-body">
				<div class="table-responsive">
					<table id="example" class="table table-bordered">
						<thead>
							<tr>
								<th></th>
								<th>Foto</th>
								<th>nombre</th>
								<th>categoria</th>
								<th>estado</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql_query = "SELECT * FROM tb_pedidos where estado = 'pendiente' ";
							$result_set = mysqli_query($conexion, $sql_query);
							$i = 1;
							while ($ver = mysqli_fetch_array($result_set)) {
								$datos = $ver['id_comida'] . "||" .
									$ver['nombre'] . "||" .
									$ver['categoria'] . "||" .
									$ver['subcategoria'] . "||" .
									$ver['estado'];
							?>
								<tr>
									<td><?php echo $i; ?></td>
									<td>
										<img src="images/cartelera/<?php echo $ver['imagen']; ?>" width="20px" height="20px" alt="">

									</td>
									<td><?php echo $ver['nombre']; ?></td>
									<td><?php echo $ver['categoria']; ?></td>
									<td><?php echo $ver['estado']; ?></td>
									<td>
										<button class="btn btn-warning btn-small btnVer" data-id="<?php echo $ver['id']; ?>" data-nombre="<?php echo $ver['nombre']; ?>" data-precio="<?php echo $ver['precio']; ?>" data-categoria="<?php echo $ver['categoria']; ?>"
                                         data-subcategoria="<?php echo $ver['subcategoria']; ?>"
                                         data-estado="<?php echo $ver['estado']; ?>"
                                         
                                         data-toggle="modal" data-target="#modalVer">

											<i class="fas fa-eye"></i>
										</button>

										<button class="btn btn-success glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')">
											<i class="fa fa-edit"></i>
										</button>

										<button class="btn btn-danger glyphicon glyphicon-remove" onclick="preguntarSiNo('<?php echo $ver['id_comida'] ?>')">
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
								<th>Nombre</th>
								<th>Precio</th>
								<th>Categoria</th>
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

							<label>Nombre</label>
							<div class="input-group mb-3">
								<input type="text" class="form-control input-sm" id="nombreVer" name="nombre">

							</div>
						</div>
						
						<div class="col-sm-6">

							<label>Categoria</label>
							<div class="input-group mb-3">
								<input type="text" class="form-control input-sm" id="categoriaVer" name="categoria">

							</div>
						</div>

					</div>

					<div class="row">

						<div class="col-sm-6">

							<label>subcategoria</label>
							<div class="input-group mb-3">
								<input type="text" class="form-control input-sm" id="subcategoriaVer" name="subcategoria">

							</div>
						</div>

						<div class="col-sm-6">
							<label>precio</label>
							<div class="input-group mb-3">
								<input type="text" class="form-control input-sm" id="precioVer" name="precio">

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
			var nombre = $(this).data('nombre');
			var precio = $(this).data('precio');
			var categoria = $(this).data('categoria');
			var subcategoria = $(this).data('subcategoria');

			$("#nombreVer").val(nombre);
			$("#precioVer").val(precio);
			$("#categoriaVer").val(categoria);
			$("#subcategoriaVer").val(subcategoria);
			$("#idVer").val(idEditar);

			// document.getElementById("emailVer").disabled = true;
			document.getElementById("nombreVer").disabled = true;
			document.getElementById("precioVer").disabled = true;
			document.getElementById("categoriaVer").disabled = true;
			document.getElementById("subcategoriaVer").disabled = true;


		});
	});
</script>