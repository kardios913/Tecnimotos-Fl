<!-- Content Header (Page header) -->
<?php include './head.php';?>
<?php include './header.php';?>
<section class="content-header">
    <h1>
        <center>
            Editar Articulo <br>
            <small>Formulario</small>
        </center>
    </h1>
    <br>
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
<section class="content-header">
    <div id="result">
        
    </div>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-8 col-md-offset-2"> 
            <!-- general form elements -->
            <div class="box box-danger">

                <!-- /.box-header -->
                <!-- form start
                id=" . $row['idProducto'] . "&nombre=" . $row['nombre'] 
                ."&costo=".$row['costo']."&precio=".$row['precio'].-->
                <form role="form" method="POST" enctype="multipart/form-data" action="../controlador/EditarExistencia.php">
                                    <div class="box-body">
                                        <div class='form-group'>
                                            <label>Id</label>
                                            <input type='number'  name='Id' class='form-control' value='<?php echo $_GET['id'];?>' placeholder="Id" readonly>
                                        </div> 
                                        <div class='form-group'>
                                            <label>Nombre</label>
                                            <input type='text' name='Nombre' class='form-control' value='<?php echo $_GET['nombre'];?>' placeholder="Nombre" readonly>
                                        </div> 
                                        <div class='form-group'>
                                            <label>Costo</label>
                                            <input type='number'  name='Costo' class='form-control' value='<?php echo $_GET['costo'];?>' placeholder="Costo" required="">
                                        </div> 
                                        <div class='form-group'>
                                            <label>Precio Venta</label>
                                            <input type='number'  name='Precio' class='form-control' value='<?php echo $_GET['precio'];?>'placeholder="Precio Venta"required>
                                        </div>
                                        <div class='form-group'>
                                            <label>Cantidad</label>
                                            <input type='number'  name='Cantidad' class='form-control' value='<?php echo $_GET['cantidad'];?>'   placeholder="Cantidad"required>
                                        </div>
                                        <div class='form-group'>
                                            <label>Stock</label>
                                            <input type='number'  name='Stock' class='form-control' value='<?php echo $_GET['stock'];?>'   placeholder="Stock"required>
                                        </div> 
                                    </div>

                    <div class="box-footer">
                      
                            <button class="btn btn-primary" type="submit">Actualizar</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (left) -->

    </div>
</section>

<script>

    $('#FormArticulo').submit(function (e) {
        var data = new FormData(this); //Creamos los datos a enviar con el formulario
        $.ajax({
            url: '../controlador/CrearArticulo.php', //URL destino
            data: data,
            processData: false, //Evitamos que JQuery procese los datos, daría error
            contentType: false, //No especificamos ningún tipo de dato
            type: 'POST',
            success: function (data) {
                $('#result').html(data);
            }
        });

        e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    });


//$('#data_1 .input-group.date').datepicker({
//                 format: "yyyy-mm-dd",
//                todayBtn: "linked",
//                keyboardNavigation: false,
//                forceParse: false,
//                calendarWeeks: true,
//                autoclose: true
//            });



</script>
<!-- /.content -->
<?php include './footer.php';?>