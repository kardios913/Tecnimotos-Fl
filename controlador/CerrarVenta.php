<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CerrarVenta
 *
 * @author KRLOS
 */
include_once '../facade/facFl.php';
$facade  = facFl::getInstance();
$numFactura = $_GET['numFactura'];
$fecha = $facade->datetimeCompleto();
$result = $facade->CerrarVenta($numFactura, $fecha);

if ($result) {
    echo '<script>alert("Factura Asentada!!") </script>';
    echo "<script language='javascript'>
              window.location.href = '../vista/FormFacturas.php';
               </script>";
} else {
    echo '<script>alert("no se pudo Asentar") </script>';
    echo "<script language='javascript'>
            	window.location.href = '../vista/FormVentasAbiertas.php';
            	</script>";
}