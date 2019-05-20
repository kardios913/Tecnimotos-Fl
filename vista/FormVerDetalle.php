<?php
include_once './head.php';
include_once './header.php';
$numFactura = $_GET['numFactura'];
?>

<section class="content-header">
    <h1>
        <center>
            Detalle Venta
            <strong>N° <?php echo $numFactura?></strong>
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
                <form role="form" method="POST" >
                    <div class="box-body">
                        <div class='form-group'>
                            <input id="myInput" type="text" placeholder="Search..">
                        </div> 
                        
                    </div> 

                    <div class="table-responsive">
                        <?php
                        include '../controlador/VerDetalle.php';
                        ?>
                    </div>
                    <div class="box-footer">     
                        <a href="FormVentasAbiertas.php"  class="small-box-footer btn btn-success">Atras <i class="glyphicon glyphicon-circle-arrow-left"></i></a>   
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<?php
include_once './footer.php';
?>
<!-- /.content -->