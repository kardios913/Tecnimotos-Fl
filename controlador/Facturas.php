<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Facturas
 *
 * @author KRLOS
 */
include_once '../facade/facFl.php';
$facade = facFl::getInstance();

$result = $facade->facturas();
echo $result ;        