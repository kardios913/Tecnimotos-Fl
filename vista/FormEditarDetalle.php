<?php
include_once './head.php';
include_once './header.php';
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <center>
            Editor Detalle Factura <b> N° <?php echo $_GET['numFactura']?></b> <br>
            <small>Formulario</small>
        </center>
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-8 col-md-offset-2">
            <!-- general form elements -->
            <div class="box box-danger">

                <!-- /.box-header -->
                <!-- 
                numFactura=9&idDetalle=3&nombre=ARANDELAS%20F2%20LIBERO&costo=1600&precio=6000&precioU=6000
                form start -->
                
                <form role="form" method="POST" enctype="multipart/form-data" action="../controlador/EditarDetalle.php">
                    <div class="box-body">
                        <div class='form-group'>
                            <label>Factura</label>
                            <input type='text' name='Factura' class='form-control' value='<?php echo $_GET['numFactura']?>' placeholder="Numero Factura" readonly>
                        </div> 
                        <div class='form-group'>
                            <label>Id</label>
                            <input type='text' name='Id' class='form-control' value='<?php echo $_GET['idDetalle']?>' placeholder="Id" readonly>
                        </div> 
                        <div class='form-group'>
                            <label>Nombre</label>
                            <input type='text' name='Nombre' class='form-control' value='<?php echo $_GET['nombre']?>'placeholder="Nombre" readonly>
                        </div>
                       
                        <div class='form-group'>
                            <label>Precio Venta</label>
                            <input type='number' max='<?php echo $_GET['precio']?>' min='<?php echo $_GET['costo']?>' name='Precio' class='form-control' value='<?php echo $_GET['precioU']?>' placeholder="Precio Venta" required>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (left) -->

    </div>
</section>
<!-- /.content -->
<?php
include_once './footer.php';
?>