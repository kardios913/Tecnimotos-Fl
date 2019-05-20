<?php 
include_once '../facade/facFl.php';
$facade = facFl::getInstance();
$fecha = $facade->datetime();
$result = $facade->ReporteDiaActual($fecha);
echo $result ;        