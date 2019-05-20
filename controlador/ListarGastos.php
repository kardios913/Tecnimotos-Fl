<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ListarGastos
 *
 * @author KRLOS
 */
include '../facade/facFl.php';
$facade = facFl::getInstance();

$result = $facade->ListarGastos();
echo $result;