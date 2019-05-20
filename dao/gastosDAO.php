<?php

include_once '../config/conexion.php';
include_once '../dto/gastosDTO.php';

class gatosDAO {

    //put your code here

     private $bd;

    function __construct() {
        $this->bd = conexion::getInstance();
    }

    public function RegistrarGastos(gastosDTO $gas) {
        $this->bd->conection();
        $consulta = "INSERT INTO `gasto`(`valor`, `descripcion`, `fecha`) "
                . "VALUES (".$gas->getValor().",'".$gas->getDescripcion()."','".$gas->getFecha()."');";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
    }

    public function ListarGastos() {
        $this->bd->conection();
        $consulta = "SELECT `id`, `valor`, `descripcion`, `fecha` "
                . "FROM `gasto`;";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
    }
    
    public function ListarGastosFecha($fecha) {
        $this->bd->conection();
        $consulta = "SELECT `id`, `valor`, `descripcion`, `fecha` "
                . "FROM `gasto`"
                . "WHERE `fecha` LIKE '%".$fecha."%' ;";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
        
    }


    public function EditarGatos(detalleFacturaDTO $dtf){
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
