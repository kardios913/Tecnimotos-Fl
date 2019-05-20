<?php

/*
*Description of detalleFActuraDTO
*IdProducto PK FK de tabla producto
*IdDetalle PK
*Cantidad 
*PrecioUnitario
*IdFactura PK FK de tabla factura 
*/

class detalleFacturaDTO {

   private $IdProducto;
   private $IdDetalle;
   private $Cantidad;
   private $PrecioUnitario;
   private $IdFactura;


   function __construct(){

   }
    
   function getIdProducto() {
       return $this->IdProducto;
   }

   function getIdDetalle() {
       return $this->IdDetalle;
   }

   function getCantidad() {
       return $this->Cantidad;
   }

   function getPrecioUnitario() {
       return $this->PrecioUnitario;
   }

   function getIdFactura() {
       return $this->IdFactura;
   }

   function setIdProducto($IdProducto) {
       $this->IdProducto = $IdProducto;
   }

   function setIdDetalle($IdDetalle) {
       $this->IdDetalle = $IdDetalle;
   }

   function setCantidad($Cantidad) {
       $this->Cantidad = $Cantidad;
   }

   function setPrecioUnitario($PrecioUnitario) {
       $this->PrecioUnitario = $PrecioUnitario;
   }

   function setIdFactura($IdFactura) {
       $this->IdFactura = $IdFactura;
   }



}

?>