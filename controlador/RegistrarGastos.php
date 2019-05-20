<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegistrarGastos
 *
 * @author KRLOS
 */
include_once '../facade/facFl.php';
$facade = facFl::getInstance();
$descripcion = $_POST['Descripcion'];
$valor = $_POST['Valor'];
$fecha = $facade->datetimeCompleto();

$result = $facade->RegistrarGastos($descripcion, $valor, $fecha);
if ($result) {
    echo '<script>alert("Gasto Registrado!!") </script>';
    echo "<script language='javascript'>
              window.location.href = '../vista/FormListarGastos.php';
               </script>";
} else {
    echo '<script>alert("no se pudo registrar") </script>';
    echo "<script language='javascript'>
            	window.location.href = '../vista/FormRegistrarGastos.php';
            	</script>";
}