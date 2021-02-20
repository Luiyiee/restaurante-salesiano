<?php
session_start();

if (!isset($_SESSION['datos_login'])) {
    header("Location: ../");
}

$arregloUsuario = $_SESSION['datos_login'];

if ($arregloUsuario['nivel'] != 'Administrador') {
    header("Location: ../");
}

include_once './configuracion/conexion.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Vista previa registros</title>
    <!--favicon-->
    <?php include 'layouts/icono.php' ?>
    <!-- simplebar CSS-->
    <link href="assets\plugins\simplebar\css\simplebar.css" rel="stylesheet">
    <!-- Bootstrap core CSS-->
    <link href="assets\css\bootstrap.min.css" rel="stylesheet">
    <!-- animate CSS-->
    <link href="assets\css\animate.css" rel="stylesheet" type="text/css">
    <!-- Icons CSS-->
    <link href="assets\css\icons.css" rel="stylesheet" type="text/css">
    <!-- Sidebar CSS-->
    <link href="assets\css\sidebar-menu.css" rel="stylesheet">
    <!-- Custom Style-->
    <link href="assets\css\app-style.css" rel="stylesheet">

</head>

<body class="bg-theme bg-theme1">

    <!-- start loader -->

    <!-- end loader -->

    <!-- Start wrapper-->
    <div id="wrapper">

        <!--Start sidebar-wrapper-->

        <?php include 'layouts/menu.php' ?>
        <!--End sidebar-wrapper-->

        <!--Start topbar header-->
        <?php include 'layouts/barra.php' ?>

        <!--End topbar header-->

        <div class="clearfix"></div>

        <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumb-->
                <div class="row pt-2 pb-2">
                    <div class="col-sm-9">
                        <h4 class="page-title">Vista previa registeos</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a style="color:#27FC00;"href="javaScript:void();">Hombres</a></li>
                            <li class="breadcrumb-item"><a style="color:#FF009A;" href="javaScript:void();">Mujeres</a></li>
                            <li class="breadcrumb-item"><a style="color:#000;"href="javaScript:void();">Sin tribus</a></li>
                        </ol>
                    </div>

                </div>
                <!-- End Breadcrumb-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">


                                    <?php
                                    $sql_query = "select * from registros where eliminado = '1' ORDER by tribu ASC ";
                                    $result_set = mysqli_query($conexion, $sql_query);
                                    $i = 1;

                                    ?>
                                    <div class="preview">
                                        <?php
                                        while ($ver = mysqli_fetch_array($result_set)) {
                                            $datos = $ver['id'] . "||" .
                                                $ver['nombres'] . "||" .
                                                $ver['apellidos'];

                                        ?>
                                            <?php
                                            if ($ver['tribu'] == '') {

                                            ?>
                                                <a data-toggle="popover" data-trigger="focus" 
                                                title="<?php echo $ver['nombres']; ?>" data-placement="top"
                                                 data-content="Este registro no tiene una tribu asiganada" 
                                                 href="javascript:void();" title="<?php echo $ver['nombres']; ?>">

                                                    <i style="color:#000" class="icon-user icons"></i>

                                                <?php } else if ($ver['sexo'] == 'H'  && (isset($ver['tribu']))) {  ?>
                                                    <a data-toggle="popover" data-trigger="focus" 
                                                       title="<?php echo $ver['nombres']; ?>" data-placement="top"
                                                       data-content="<?php echo $ver['tribu']; ?>" 
                                                    href="javascript:void();" title="<?php echo $ver['nombres']; ?>">

                                                        <i style="color:#27FC00;" class="icon-user icons"></i>

                                             <?php } else if ($ver['sexo'] == 'M'  && (isset($ver['tribu']))) { ?>
                                                        <a data-toggle="popover" data-trigger="focus" 
                                                       title="<?php echo $ver['nombres']; ?>" data-placement="top"
                                                       data-content="<?php echo $ver['tribu']; ?>" 
                                                         href="javascript:void();" title="<?php echo $ver['nombres']; ?>">

                                                            <i style="color:#FC0067;" class="icon-user icons"></i>
                                                        <?php } ?>
                                                    <?php
                                                    $i++;
                                                }
                                                    ?>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Row-->


            </div>
            <!-- End container-fluid-->


            <!--End content-wrapper-->
            <!--Start Back To Top Button-->
            <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
            <!--End Back To Top Button-->

            <!--Start footer-->

            <!--End footer-->

            <!--start color switcher-->

            <!--end color cwitcher-->

        </div>
        <!--End wrapper-->


        <!-- Bootstrap core JavaScript-->
        <script src="assets\js\jquery.min.js"></script>
        <script src="assets\js\popper.min.js"></script>
        <script src="assets\js\bootstrap.min.js"></script>

        <!-- simplebar js -->
        <script src="assets\plugins\simplebar\js\simplebar.js"></script>
        <!-- sidebar-menu js -->
        <script src="assets\js\sidebar-menu.js"></script>

        <!-- Custom scripts -->
        <script src="assets\js\app-script.js"></script>

</body>

</html>