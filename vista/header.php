<div class="wrapper">
    <!--header-->
    <header class="main-header">

        <a href="../index.php"  class="logo">
            <!-- logo for regular state and mobile devices -->
            <span class="logo-mini"> <img class="img-responsive" src="../assets/img/fl-icon-nav-red.png"/></span>
            <span class="logo-lg"><img class="img-responsive" src="../assets/img/tecnimotos-fl.png"/></span>
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
                <li><a href="../index.php" ><i class="glyphicon glyphicon-home"></i><span>Inicio</span></a></li>
                <li><a href="#" id="btn-1" data-toggle="collapse" data-target="#submenu1" aria-expanded="false">
                        <i class="glyphicon glyphicon-equalizer"></i> <span>Articulos</span></a>
                    <ul class="nav collapse sidebar-menu" id="submenu1" role="menu" aria-labelledby="btn-1">
                        <li><a href="FormCrearArticulo.php"><i class="glyphicon glyphicon-book" ></i> <span>Crear Articulos</span></a></li>
                        <li><a href="FormListarExistencias.php" ><i class="glyphicon glyphicon-list-alt"></i> <span>Listar Existencias</span></a></li>
                    </ul>
                </li>
                <li><a href="#" id="btn-2" data-toggle="collapse" data-target="#submenu2" aria-expanded="false">
                        <i class="glyphicon glyphicon-shopping-cart"></i><span>Ventas</span></a>
                    <ul class="nav collapse sidebar-menu" id="submenu2" role="menu" aria-labelledby="btn-2">
                        <li><a href="FormRegistrarVenta.php" ><i class="glyphicon glyphicon-shopping-cart"></i> <span>Registrar Venta</span></a></li>
                        <li><a href="FormVentasAbiertas.php" ><i class="glyphicon glyphicon-shopping-cart"></i> <span>Venta Abierta</span></a></li>
                    </ul>
                </li>
                <li><a href="#" id="btn-3" data-toggle="collapse" data-target="#submenu3" aria-expanded="false">
                        <i class="glyphicon glyphicon-book"></i> <span>Reportes</span></a>
                    <ul class="nav collapse sidebar-menu" id="submenu3" role="menu" aria-labelledby="btn-3">
                        <li><a href="FormFacturas.php" ><i class="glyphicon glyphicon-book"></i> <span>Facturas</span></a></li>                          
                        <li><a href="FormReporteDiaActual.php"><i class="glyphicon glyphicon-book"></i> <span>Ventas Dia Actual</span></a></li>
                        <li><a href="FormReportePeriodoActual.php"><i class="glyphicon glyphicon-book"></i> <span>Ventas Periodo Actual</span></a></li>
                        <li><a href="FormReporteProductosAgotados.php"><i class="glyphicon glyphicon-book"></i> <span>Productos Agotados</span></a></li>
                    </ul>
                </li>
                <li><a href="#" id="btn-4" data-toggle="collapse" data-target="#submenu4" aria-expanded="false">
                                <i class="glyphicon glyphicon-transfer"></i> <span>Gastos</span></a>
                            <ul class="nav collapse sidebar-menu" id="submenu4" role="menu" aria-labelledby="btn-4">
                                <li><a href="FormRegistrarGastos.php" ><i class="glyphicon glyphicon-transfer"></i> <span>Registrar Gasto</span></a></li>            
                                <li><a href="FormListarGastos.php"><i class="glyphicon glyphicon-list-alt"></i> <span>Listar Gastos</span></a></li>
                            </ul>
                        </li>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- Content  -->
    <div class="content-wrapper" id="contenido">