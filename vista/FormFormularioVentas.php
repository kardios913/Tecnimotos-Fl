<?php
include_once './head.php';
include_once './header.php';
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <center>
            Registro Ventas <br>
            <small>Formulario</small>
        </center>
    </h1>
    <?php if (isset($msg)) { ?>
        <div class="col-md-12">
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong></strong> <?php echo $msg; ?>
            </div>
        </div>
        <?php
    }
    unset($msg);
    ?>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-8 col-md-offset-2">
            <!-- general form elements -->
            <div class="box box-danger">

                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" enctype="multipart/form-data" action="../controlador/FormularioVentas.php">
                    <div class="box-body">
                        <div class='form-group'>
                            <label>Id</label>
                            <input type='number'  name='Id' class='form-control' value='<?php echo $_GET['id']; ?>' placeholder="Id" readonly>
                        </div> 
                        <div class='form-group'>
                            <label>Nombre</label>
                            <input type='text' name='Nombre' class='form-control' value='<?php echo $_GET['nombre']; ?>' placeholder="Nombre" readonly>
                        </div> 
                        <div class='form-group'>
                            <label>Cantidad</label>
                             <input type='number' max='<?php echo $_GET['cantidad']; ?>' min="1" name='Cantidad' class='form-control' placeholder='Cantidad Maximo <?php echo $_GET['cantidad']; ?>' required>
                                            <input type='hidden'  name='CantidadOld' class='form-control' value='<?php echo $_GET['cantidad'];?>'  placeholder="Cantidad" required>
                        </div> 
                        <div class='form-group'>
                            <label>Precio Venta</label>
                            <input type='number' max='<?php echo $_GET['precio']; ?>' min='<?php echo $_GET['costo']; ?>' name='Precio' class='form-control'placeholder='Precio Venta <?php echo $_GET['costo']; ?> - <?php echo $_GET['precio']; ?>' required>
                        </div>
                        <div class='form-group'>
                            <label>Tipo Venta</label>
                            <select  name="Tipo" id="Tipo" class="form-control" >
                                <option value="1">Venta Simple</option>
                                <option value="2">Venta Abierta</option>
                            </select>
                        </div> 
                        <div class='form-group'>
                            <label>Cliente</label>
                            <select  name="Cliente" id="Cliente" class="form-control" onchange="TipoCliente()">
                                <option value="1">Cliente Caja</option>
                                <option value="2">Otro</option>
                            </select>
                        </div> 
                        <div id="VentaAbierta">
                          
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success">Guardar</button>
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