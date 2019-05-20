<?php

include_once '../config/conexion.php';
include_once '../dto/productoDTO.php';

class productoDAO {

    //put your code here

    private $bd;

    function __construct() {
        $this->bd = conexion::getInstance();
    }

    public function CrearArticulo(productoDTO $pro) {
        $this->bd->conection();
        $consulta="INSERT INTO `producto`( `nombre`, `costo`, `cantidad`, `precio`, `stack`) VALUES "
                . "('".$pro->getNombre()."',".$pro->getCosto().",".$pro->getCantidad().",".$pro->getPrecio().",".$pro->getStack().")";
       $result=$this->bd->ejecutarConsultaSQL($consulta);
       return $result; 
   }
   
   public function ListarExistencias(){
       $this->bd->conection();
        $consulta = "SELECT `idProducto`,`nombre`, `costo`, `cantidad`, `precio`, `stack` FROM `producto` ;";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
   }
   public function ReporteProductosAgotados(){
       $this->bd->conection();
        $consulta = "SELECT `idProducto`,`nombre`, `costo`, `cantidad`, `precio`, `stack` FROM `producto` where `cantidad`<`stack` ;";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
   }
   
   public function AddExistencia(productoDTO $pro){
        $this->bd->conection();
        $consulta = "UPDATE `producto` SET `nombre`='".$pro->getNombre()."',`costo`=".$pro->getCosto().","
                . "`cantidad`=".$pro->getCantidad().",`precio`=".$pro->getPrecio()
                ." WHERE `idProducto`=".$pro->getIdProducto().";";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
   }
   public function UpdateExistencia(productoDTO $pro){
        $this->bd->conection();
        $consulta =  "UPDATE `producto` SET `nombre`='".$pro->getNombre()."',`costo`=".$pro->getCosto().","
                . "`cantidad`=".$pro->getCantidad().",`precio`=".$pro->getPrecio().",`stack`=".$pro->getStack()
                ." WHERE `idProducto`=".$pro->getIdProducto().";";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
   }

   public function Venta(productoDTO $pro){
        $this->bd->conection();
        $consulta =  "UPDATE `producto` SET `cantidad`=".$pro->getCantidad()." WHERE `idProducto`=".$pro->getIdProducto().";";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
   }

   public function getProducto($id){
        $this->bd->conection();
        $consulta = "SELECT `idProducto`,`nombre`, `costo`, `cantidad`, `precio`, `stack` "
                . "FROM `producto` WHERE `idProducto`=$id;";
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

