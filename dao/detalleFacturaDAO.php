<?php

include_once '../config/conexion.php';
include_once '../dto/detalleFacturaDTO.php';

class detalleFacturaDAO {

    //put your code here

    private $bd;

    function __construct() {
        $this->bd = conexion::getInstance();
    }

    public function RegistrarDetalle(detalleFacturaDTO $dtf) {
        $this->bd->conection();
        $consulta = "INSERT INTO `detallefactura`(`numFactura`, `idProducto`, `cantidad`, `precioUnitario`) "
                . "VALUES (" . $dtf->getIdFactura() . "," . $dtf->getIdProducto() . "," . $dtf->getCantidad() . "," . $dtf->getPrecioUnitario() . ");";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
    }

    public function Total($numFactura) {
        $this->bd->conection();
        $consulta = "SELECT SUM(d.cantidad * d.precioUnitario) AS Total FROM detallefactura d WHERE d.numFactura = " . $numFactura . ";";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
    }

    public function VerDetalle($numFactura) {
        $this->bd->conection();
        $consulta = "SELECT p.costo, p.precio, d.idDetalle , p.nombre ,d.cantidad , d.precioUnitario, (d.cantidad * d.precioUnitario) AS total FROM detallefactura d join producto p 
        ON (d.idProducto=p.idProducto) 
        WHERE d.numFactura = " . $numFactura . ";";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
    }
    
    public function EditarDetalle(detalleFacturaDTO $dtf){
        $this->bd->conection();
        $consulta = "UPDATE `detallefactura` SET `precioUnitario`=".$dtf->getPrecioUnitario()." WHERE `idDetalle`=".$dtf->getIdDetalle()."  and `numFactura`=".$dtf->getIdFactura()." ;";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
    }

    public function getArray($result) {
        return ($this->bd->getArray($result));
    }

    public function getObject($result) {
        return ($this->bd->getObject($result));
    }

}
