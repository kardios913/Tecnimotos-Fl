<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AddVentas
 *
 * @author KRLOS
 */
include_once '../facade/facFl.php';
$facade = facFl::getInstance();

$numFactura = $_POST['numFactura'];
$id = $_POST['Id'];
$cantidad = $_POST['Cantidad'];
$CantidadOld =$_POST['CantidadOld'];
$precio = $_POST['Precio'];

$CantidadNew=$CantidadOld-$cantidad;
$result = $facade->RegistrarVentaFactura($numFactura,$id, $cantidad, $precio,$CantidadNew);
if ($result) {
    echo '<script>alert("Venta Registrada!!") </script>';
    echo "<script language='javascript'>
              window.location.href = '../vista/FormVerDetalle.php?numFactura=$numFactura';
               </script>";
} else {
    echo '<script>alert("no se pudo registrar!!") </script>';
    echo "<script language='javascript'>
            	window.location.href = '../vista/FormAgregarDetalle.php?numFactura=$numFactura;
            	</script>";
}
