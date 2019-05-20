<?php

include_once ('../config/conexion.php');
include_once ('../dto/clienteDTO.php');

class clienteDAO {

    //put your code here

    private $bd;

    function __construct() {
        $this->bd = conexion::getInstance();
    }

    public function getArray($result) {
        return ($this->bd->getArray($result));
    }

    public function getObject($result) {
        return ($this->bd->getObject($result));
    }

    public function RegistrarCliente(clienteDTO $cli) {
        $this->bd->conection();
        $consulta = "INSERT INTO `cliente`(`cedula`, `nombre`, `telefono`, `vehiculo`) "
                . "VALUES (" . $cli->getCedula() . ",'" . $cli->getNombre() . "'," . $cli->getTelefono() . ",'" . $cli->getVehiculo() . "');";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
    }

    public function IsEmpty(clienteDTO $cli){
        $this->bd->conection();
        $consulta = "SELECT COUNT(*) AS num FROM `cliente` WHERE cedula = ".$cli->getCedula().";";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
    }
}
