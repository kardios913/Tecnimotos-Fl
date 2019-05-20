<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" href="assets/img/fl.png" type="image/png" >
        <title>TECNIMOTOS-FL</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/Font-Awenson/css/fontawesome.min.css">
        <link rel="stylesheet" href="assets/css/ionicons.min.css">
        <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
        <link rel="stylesheet" href="assets/css/Style.css">
        <link rel="stylesheet" href="assets/css/skins/skin-red.min.css">

    </head>
    <body class="hold-transition skin-red sidebar-mini">
        <div class="wrapper">
            <!--header-->
            <header class="main-header">

                <a href="#" class="logo">
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-mini"> <img class="img-responsive" src="assets/img/fl-icon-nav-red.png"/></span>
                    <span class="logo-lg"><img class="img-responsive" src="assets/img/tecnimotos-fl.png"/></span>
                </a>
                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="	glyphicon glyphicon-menu-hamburger" style="color: #fff" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                </nav>
            </header>
            <!--aside-->
            <aside class="main-sidebar">

                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar Menu -->
                 <ul class="sidebar-menu">
                        <li class="header"><center>Menu del Sistema</center></li>
                        <!-- Optionally, you can add icons to the links -->
                        <li><a href="#" ><i class="glyphicon glyphicon-home"></i><span>Inicio</span></a></li>
                        <li><a href="#" id="btn-1" data-toggle="collapse" data-target="#submenu1" aria-expanded="false">
                                <i class="glyphicon glyphicon-equalizer"></i> <span>Articulos</span></a>
                            <ul class="nav collapse sidebar-menu" id="submenu1" role="menu" aria-labelledby="btn-1">
                                <li><a href="vista/FormCrearArticulo.php"><i class="glyphicon glyphicon-book" ></i> <span>Crear Articulos</span></a></li>
                                <li><a href="vista/FormListarExistencias.php" ><i class="glyphicon glyphicon-list-alt"></i> <span>Listar Existencias</span></a></li>
                           </ul>
                        </li>
                        <li><a href="#" id="btn-2" data-toggle="collapse" data-target="#submenu2" aria-expanded="false">
                                <i class="glyphicon glyphicon-shopping-cart"></i> <span>Ventas</span></a>
                            <ul class="nav collapse sidebar-menu" id="submenu2" role="menu" aria-labelledby="btn-2">
                                <li><a href="vista/FormRegistrarVenta.php" ><i class="glyphicon glyphicon-shopping-cart"></i> <span>Registrar Venta</span></a></li>
                                <li><a href="vista/FormVentasAbiertas.php" ><i class="glyphicon glyphicon-shopping-cart"></i> <span>Venta Abierta</span></a></li>              
                            </ul>
                        </li>
                        <li><a href="#" id="btn-3" data-toggle="collapse" data-target="#submenu3" aria-expanded="false">
                                <i class="glyphicon glyphicon-book"></i> <span>Reportes</span></a>
                            <ul class="nav collapse sidebar-menu" id="submenu3" role="menu" aria-labelledby="btn-3">
                                <li><a href="vista/FormFacturas.php" ><i class="glyphicon glyphicon-book"></i> <span>Facturas</span></a></li>            
                                <li><a href="vista/FormReporteDiaActual.php"><i class="glyphicon glyphicon-book"></i> <span>Ventas Dia Actual</span></a></li>
                                <li><a href="vista/FormReportePeriodoActual.php"><i class="glyphicon glyphicon-book"></i> <span>Ventas Periodo Actual</span></a></li>
                                <li><a href="vista/FormReporteProductosAgotados.php"><i class="glyphicon glyphicon-book"></i> <span>Productos Agotados</span></a></li>
                            </ul>
                        </li>
                        <li><a href="#" id="btn-4" data-toggle="collapse" data-target="#submenu4" aria-expanded="false">
                                <i class="glyphicon glyphicon-transfer"></i> <span>Gastos</span></a>
                            <ul class="nav collapse sidebar-menu" id="submenu4" role="menu" aria-labelledby="btn-4">
                                <li><a href="vista/FormRegistrarGastos.php" ><i class="glyphicon glyphicon-transfer"></i> <span>Registrar Gasto</span></a></li>            
                                <li><a href="vista/FormListarGastos.php"><i class="glyphicon glyphicon-list-alt"></i> <span>Listar Gastos</span></a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- /.sidebar-menu -->
                </section>
                <!-- /.sidebar -->
            </aside>
            <!-- Content  -->
            <div class="content-wrapper" id="contenido">

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <center>
                            Pagina Principal<br>
                            <small>Seleccion una Opción</small>
                        </center>
                    </h1>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">

                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">

                                    <p>Articulos</p>
                                </div>
                                <div class="icon">
                                    <i class="glyphicon glyphicon-cog"></i>
                                </div>
                                <a href="vista/FormArticulos.php"  class="small-box-footer">Acceder <i class="glyphicon glyphicon-circle-arrow-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-xs-6">

                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">

                                    <p>Ventas</p>
                                </div>
                                <div class="icon">
                                    <i class="glyphicon glyphicon-shopping-cart"></i>
                                </div>
                                <a href="vista/FormVentas.php" class="small-box-footer">Acceder <i class="glyphicon glyphicon-circle-arrow-right"></i></a>
                            </div>
                        </div>
                         <div class="col-lg-3 col-xs-6">

                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">

                                    <p>Reportes</p>
                                </div>
                                <div class="icon">
                                    <i class="glyphicon glyphicon-book"></i>
                                </div>
                                <a href="vista/FormReportes.php" class="small-box-footer">Acceder <i class="glyphicon glyphicon-circle-arrow-right"></i></a>
                            </div>
                        </div>
                         <div class="col-lg-3 col-xs-6">

                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">

                                    <p>Gastos</p>
                                </div>
                                <div class="icon">
                                    <i class="glyphicon glyphicon-transfer"></i>
                                </div>
                                <a href="vista/FormGastos.php" class="small-box-footer">Acceder <i class="glyphicon glyphicon-circle-arrow-right"></i></a>
                            </div>
                        </div>
                </section>
                <!-- /.content -->
            </div>
       
            </div>

        <!-- Footer -->
        <footer class="main-footer fixed-bottom " >

            <center>
                <div>
                    <strong>&copy</strong>TECNIMOTOS FL
                    <br>Sistema de Inventarios y Ventas
                </div>
            </center>
        </footer>


        <!-- REQUIRED JS SCRIPTS -->
        <!-- jQuery 2.2.3 -->
        <script src="assets/js/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="assets/js/app.js"></script>
        <script src="assets/js/funciones.js"></script>
    </body>
</html>
