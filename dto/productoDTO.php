<?php

/*
*Description of productoDTO
*idProducto PK ->indicativo del producto autoincrementado
*Nombre-> nombre del producto
*Costo-> costo al que sale el producto
*Cantidad-> cantidad de producto en inventario / existencias nuevas
*Precio-> precio de venta del producto
*Mínimo-> stack minimo de productos para lanzar alerta
*/

class productoDTO{

private $idProducto;
private $nombre;
private $costo;
private $cantidad;
private $precio;
private $stack;
    

function __construct(){

}    

function getIdProducto() {
    return $this->idProducto;
}

function getNombre() {
    return $this->nombre;
}

function getCosto() {
    return $this->costo;
}

function getCantidad() {
    return $this->cantidad;
}

function getPrecio() {
    return $this->precio;
}

function getStack() {
    return $this->stack;
}

function setIdProducto($idProducto) {
    $this->idProducto = $idProducto;
}

function setNombre($nombre) {
    $this->nombre = $nombre;
}

function setCosto($costo) {
    $this->costo = $costo;
}

function setCantidad($cantidad) {
    $this->cantidad = $cantidad;
}

function setPrecio($precio) {
    $this->precio = $precio;
}

function setStack($stack) {
    $this->stack = $stack;
}





}

?>