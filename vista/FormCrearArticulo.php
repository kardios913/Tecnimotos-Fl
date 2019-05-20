<!-- Content Header (Page header) -->
<?php include './head.php';?>
<?php include './header.php';?>
<section class="content-header">
    <h1>
        <center>
            Crear Articulo <br>
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
                <!-- form start -->
                <form role="form" method="POST" enctype="multipart/form-data" action="../controlador/CrearArticulo.php" id="FormArticulo">
                    <div class="box-body">
                        <div class='form-group'>
                            <label>Nombre</label>
                            <input type='text' name='Nombre' class='form-control' placeholder="Nombre" required>
                        </div> 
                        <div class='form-group'>
                            <label>Costo C/U</label>
                            <input type='number' name='Costo' class='form-control' placeholder="Costo"required>
                        </div> 
                        <div class='form-group'>
                            <label>Cantidad</label>
                            <input type='number' name='Cantidad' class='form-control' placeholder="Cantidad"required>
                        </div> 
                        <div class='form-group'>
                            <label>Precio Venta C/U</label>
                            <input type='number' name='Precio' class='form-control'placeholder="Precio Venta"required>
                        </div> 
                        <div class='form-group'>
                            <label>stack minimo</label>
                            <input type='number' name='minimo' class='form-control' placeholder="stack minimo"required>
                        </div> 

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                      
                            <button class="btn btn-primary" type="submit">Crear</button>
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