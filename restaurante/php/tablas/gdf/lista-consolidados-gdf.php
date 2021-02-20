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
            <div class="card-header"><i class="fa fa-table"></i> Consolidados</div>


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
                            $iduser=$_SESSION['datos_login']['usuario'];

                            $sql_query = "SELECT * FROM gdf where consolidado = 'Consolidado' and usuario='$iduser' and eliminado ='1' ";
                            $result_set = mysqli_query($conexion, $sql_query);
                            $i = 1;
                            while ($ver = mysqli_fetch_array($result_set)) {
                                $datos = $ver['id'] . "||" .
                                    $ver['nombres'] . "||" .
                                    $ver['apellidos'] . "||" .
                                    $ver['edad'] . "||" .
                                    $ver['telefono'] . "||" .
                                    $ver['sexo'] . "||" .
                                    $ver['c_r'];
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>

                                    <!-- <td><php echo $f[1]; ?></td> -->
                                    <!-- <td><php echo $f['GDF']; ?></td> -->
                                    <td><?php echo $ver['nombres']; ?></td>
                                    <td><?php echo $ver['apellidos']; ?></td>
                                    <td><?php echo $ver['telefono']; ?></td>
                                    <td>
                                        <button class="btn btn-warning btn-small btnVer" data-id="<?php echo $ver['id']; ?>" data-nombres="<?php echo $ver['nombres']; ?>" data-apellidos="<?php echo $ver['apellidos']; ?>" data-edad="<?php echo $ver['edad']; ?>" data-telefono="<?php echo $ver['telefono']; ?>" data-sexo="<?php echo $ver['sexo']; ?>" data-c_r="<?php echo $ver['c_r']; ?>" data-fecha="<?php echo $ver['fecha']; ?>" data-consolidado="<?php echo $ver['consolidado']; ?>" data-toggle="modal" data-target="#modalVer">

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
                            <label for="c_r">Convertido - Reconciliado</label>
                            <select name="c_r" id="c_rVer" class="form-control">
                                <option value="C">Convertido</option>
                                <option value="R">Reconciliado</option>
                            </select>

                        </div>
                    </div>



                    <div class="row">
                        <div class="col-sm-6">
                            <label for="fecha">Fecha registro</label>
                            <input type="text" name="fecha" id="fechaVer" class="form-control" required>

                        </div>
                        <div class="col-sm-6">
                            <label for="fecha">Consolidado</label>
                            <input type="text" name="consolidado" id="consolidadoVer" class="form-control">
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
            var c_r = $(this).data('c_r');
            var fecha = $(this).data('fecha');
            var consolidado = $(this).data('consolidado');

            $("#nombresVer").val(nombres);
            $("#apellidosVer").val(apellidos);
            $("#edadVer").val(edad);
            $("#telefonoVer").val(telefono);
            $("#sexoVer").val(sexo);
            $("#c_rVer").val(c_r);
            $("#fechaVer").val(fecha);
            $("#consolidadoVer").val(consolidado);

            $("#idVer").val(idEditar);

            // document.getElementById("c_rVer").disabled = true;
            document.getElementById("nombresVer").disabled = true;
            document.getElementById("apellidosVer").disabled = true;
            document.getElementById("edadVer").disabled = true;
            document.getElementById("telefonoVer").disabled = true;
            document.getElementById("sexoVer").disabled = true;
            document.getElementById("c_rVer").disabled = true;
            document.getElementById("fechaVer").disabled = true;
            document.getElementById("consolidadoVer").disabled = true;


        });
    });
</script>