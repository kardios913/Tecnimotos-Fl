<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VerDetalleFactura
 *
 * @author KRLOS
 */
include_once '../facade/facFl.php';
$facade = facFl::getInstance();
$numFactura = $_GET['numFactura'];

$result = $facade->VerDetalleFactura($numFactura);
echo $result;
