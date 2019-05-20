<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormularioVentas
 *
 * @author KRLOS
 */
include_once '../facade/facFl.php';
$facade = facFl::getInstance();

$id = $_POST['Id'];
$cantidad = $_POST['Cantidad'];
$CantidadOld =$_POST['CantidadOld'];
$precio = $_POST['Precio'];
$tipo = $_POST['Tipo']; //1.Venta Simple // 2. Venta Abierta
$cliente = $_POST['Cliente']; //1. Persona Caja / 2. Otra
$cedula = 0;

if ($cliente == 2) {
    $cedula = $_POST['Cedula'];
    $nombreC = $_POST['NombreC'];
    $vehiculo = $_POST['Vehiculo'];
    $telefono = $_POST['Telefono'];
    $NuevoCLiente = $facade->RegistrarCliente($cedula, $nombreC, $vehiculo, $telefono);
}
$fecha = $facade->datetimeCompleto();
$CantidadNew=$CantidadOld-$cantidad;
$result = $facade->RegistrarVenta($id, $cantidad, $precio, $tipo, $cedula,$fecha,$CantidadNew);
if ($result && $tipo == 1) {
    echo '<script>alert("Venta Registrada!!") </script>';
    echo "<script language='javascript'>
              window.location.href = '../vista/FormFacturas.php';
               </script>";
} elseif ($result && $tipo == 2) {
    echo '<script>alert("Venta Abierta Registrada!!") </script>';
    echo "<script language='javascript'>
              window.location.href = '../vista/FormVentasAbiertas.php';
               </script>";
} else {
    echo '<script>alert("no se pudo registrar!!") </script>';
    echo "<script language='javascript'>
            	window.location.href = '../vista/FormFormularioVentas.php;
            	</script>";
}