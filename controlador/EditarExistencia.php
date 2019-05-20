<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EditarExistencia
 *
 * @author KRLOS
 */
include_once '../facade/facFl.php';
$facade = facFl::getInstance();
$id = $_POST['Id'];
$nombre = $_POST['Nombre'];
$costo = $_POST['Costo'];
$cantidad = $_POST['Cantidad'];
$precio = $_POST['Precio'];
$stock= $_POST['Stock'];

$result = $facade->UpdateExistencia($id, $nombre, $costo, $cantidad, $precio, $stock);

if ($result) {
    echo '<script>alert("Existencias Actualizadas!!") </script>';
    echo "<script language='javascript'>
              window.location.href = '../vista/FormListarExistencias.php';
               </script>";
} else {
    echo '<script>alert("no se pudo actualizar") </script>';
    echo "<script language='javascript'>
            	window.location.href = '../vista/FormAddExistencia.php;
            	</script>";
}
?>