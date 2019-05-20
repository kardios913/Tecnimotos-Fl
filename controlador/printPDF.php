<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of printPDF
 *
 * @author KRLOS
 */
require '../vendor/autoload.php';
include_once '../facade/facFl.php';
$facade= facFl::getInstance();
$numFactura=$_GET['numFactura'];
$html=$facade->ViewFactura($numFactura);
    switch (strlen($numFactura)) {
            case 1: $factura = 'N°:0000'.$numFactura;
                break;
            case 2: $factura = 'N°:000'.$numFactura;
                    break;
            case 3: $factura = 'N°:00'.$numFactura;
                    break;
            case 4: $factura = 'N°:0'.$numFactura;
                    break;
            case 5: $factura = 'N°:'.$numFactura;
                    break;
        }
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
try {
$html2pdf = new Html2Pdf();
$html2pdf->writeHTML($html);
$html2pdf->output($factura.'.pdf');
}
  catch (Html2PdfException $e) {
    $html2pdf->clean();
    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
?>