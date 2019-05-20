<?php
include_once './head.php';
include_once './header.php';
?>
<section class="content-header">
    <h1>
        <center>
            Ventas Periodo Actual <br>
            <small></small>
        </center>
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-8 col-md-offset-2">
            <!-- general form elements -->

            <?php include_once '../controlador/ReportePeriodoActual.php'; ?>

        </div>
    </div>
</section>

<?php
include_once './footer.php';
?>

<!-- /.content -->