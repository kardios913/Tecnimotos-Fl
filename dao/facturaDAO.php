<?php

include_once '../config/conexion.php';
include_once '../dto/facturaDTO.php';

class facturaDAO {

    //put your code here

    private $bd;

    function __construct() {
        $this->bd = conexion::getInstance();
    }

    public function RegistrarFactura(facturaDTO $fac){
        $this->bd->conection();
        $consulta = "INSERT INTO `factura`( `cedula`, `fecha`, `abierta`) "
                . "VALUES (".$fac->getCedula().",'".$fac->getFecha()."',".$fac->getAbierta().");";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
    }
    public function NumFactura($fecha){
        $this->bd->conection();
        $consulta = "SELECT `numFactura` FROM `factura` WHERE `fecha` ='".$fecha."';";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
    }
    
    public function FacturaxCliente(){
        $this->bd->conection();
        $consulta = "SELECT f.numFactura, f.fecha , c.nombre, c.vehiculo FROM factura f JOIN cliente c ON (f.cedula = c.cedula) WHERE f.abierta = 2;";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
    }
    public function FacturaxClienteS(){
        $this->bd->conection();
        $consulta = "SELECT f.numFactura, f.fecha , c.nombre, c.vehiculo, c.telefono, c.cedula FROM factura f JOIN cliente c ON (f.cedula = c.cedula) WHERE f.abierta = 1;";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
    }
    public function ClienteFactura($numfactura){
        $this->bd->conection();
        $consulta = "SELECT  f.fecha , c.nombre, c.vehiculo, c.telefono, c.cedula FROM factura f JOIN cliente c ON (f.cedula = c.cedula) WHERE f.abierta = 1 and f.numFactura = $numfactura;";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
    }
    public function ReporteDiaActual($fecha){
        $this->bd->conection();
        $consulta = "SELECT f.numFactura, f.fecha , c.nombre, c.vehiculo FROM factura f JOIN cliente c ON (f.cedula = c.cedula) WHERE f.abierta = 1 and f.fecha LIKE '%".$fecha."%';";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
    }
    public function ReporteGanancia($numfactura){
        $this->bd->conection();
        $consulta = "SELECT SUM(d.precioUnitario*d.cantidad)-SUM(p.costo*d.cantidad)AS Ganancia "
                . "FROM detallefactura d JOIN producto p ON(d.idProducto=p.idProducto) WHERE d.numFactura =".$numfactura.";";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
    }
    public function CerrarVenta(facturaDTO $fac){
        $this->bd->conection();
        $consulta = "UPDATE `factura` SET `fecha`='".$fac->getFecha()."',`abierta`=1 WHERE `numFactura`=".$fac->getIdFactura().";";
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

