<?php

/*
*Description of facturaDTO
*IdFactura PK-> numero de factura dato autoincremetable
*cedula FK de tablacliente-> cedula del cliente
*Fecha->fecha de venta  o generacion de la factura
*Abierta datos posibles 0. simple 1.abierta-> simple venta directa
 , abierta venta de varios productos
*/

class facturaDTO{

private $idFactura;
private $cedula;
private $fecha;
private $abierta;
    

function __construct(){

}

function getIdFactura() {
    return $this->idFactura;
}

function getCedula() {
    return $this->cedula;
}

function getFecha() {
    return $this->fecha;
}

function getAbierta() {
    return $this->abierta;
}

function setIdFactura($idFactura) {
    $this->idFactura = $idFactura;
}

function setCedula($cedula) {
    $this->cedula = $cedula;
}

function setFecha($fecha) {
    $this->fecha = $fecha;
}

function setAbierta($abierta) {
    $this->abierta = $abierta;
}



}

?>