<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <center>
            Registro Venta Factura # <br>
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
                <!-- form start -->
                <form role="form" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class='form-group'>
                            <label>Factura</label>
                            <input type='text' name='Factura' class='form-control' placeholder="Numero Factura" readonly>
                        </div> 
                        <div class='form-group'>
                            <label>Id</label>
                            <input type='text' name='Id' class='form-control' placeholder="Nombre" readonly>
                        </div> 
                        <div class='form-group'>
                            <label>Nombre</label>
                            <input type='text' name='Nombre' class='form-control' placeholder="Nombre" readonly>
                        </div>
                        <div class='form-group'>
                            <label>Cantidad</label>
                            <input type='number' name='Cantidad' class='form-control' placeholder="Cantidad" required>
                        </div> 
                        <div class='form-group'>
                            <label>Precio Venta</label>
                            <input type='number' name='Precio' class='form-control'placeholder="Precio Venta" required>
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
