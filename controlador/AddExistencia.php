<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AddExistencias
 *
 * @author KRLOS
 */
include_once '../facade/facFl.php';
$facade = facFl::getInstance();
$id = $_POST['Id'];
$nombre = $_POST['Nombre'];
$costo = $_POST['Costo'];
$cantidad = $_POST['Cantidad'];
$CantidadOld =$_POST['CantidadOld'];
$precio = $_POST['Precio'];

$CantidadNew=$cantidad+$CantidadOld;
$result = $facade->AddExistencia($id, $nombre, $costo, $CantidadNew, $precio);

if ($result) {
    echo '<script>alert("Existencias Agregadas!!") </script>';
    echo "<script language='javascript'>
              window.location.href = '../vista/FormListarExistencias.php';
               </script>";
} else {
    echo '<script>alert("no se pudo agregar") </script>';
    echo "<script language='javascript'>
            	window.location.href = '../vista/FormAddExistencia.php;
            	</script>";
}
?>


