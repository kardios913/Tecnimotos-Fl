<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EditarDetalle
 *UPDATE `detallefactura` SET `precioUnitario`=[value-5] WHERE `idDetalle`=[value-1] and `numFactura`=[value-2]
 * @author KRLOS
 */
include_once '../facade/facFl.php';
$facade  = facFl::getInstance();
$numFactura = $_POST['Factura'];
$numDetalle = $_POST['Id'];
$PrecioUnitario = $_POST['Precio'];

$result = $facade->EditarDetalle($numFactura,$numDetalle,$PrecioUnitario);

if ($result) {
    echo '<script>alert("Detalle Factura Editado!!") </script>';
    echo "<script language='javascript'>
              window.location.href = '../vista/FormVerDetalle.php?numFactura=$numFactura';
               </script>";
} else {
    echo '<script>alert("no se pudo Editar") </script>';
    echo "<script language='javascript'>
            	window.location.href = '../vista/FormVerDetalle.php?numFactura=$numFactura';
            	</script>";
}