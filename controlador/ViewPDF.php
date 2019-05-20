<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ViewPDF
 *
 * @author KRLOS
 */
include_once '../facade/facFl.php';
$facade= facFl::getInstance();
$numFactura=$_GET['numFactura'];

echo $facade->ViewFactura($numFactura);