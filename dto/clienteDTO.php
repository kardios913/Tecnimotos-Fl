<?php
/**
* Description of clienteDTO
*Cedula PK
*Nombre 
*Apellido
*Telefono
*Email
*Vehiculo-> placa o marca-color
*/


class clienteDTO{
   
private $cedula; 
private $nombre ;
private $telefono;
private $vehiculo;

function __construct(){

}

function getCedula() {
    return $this->cedula;
}

function getNombre() {
    return $this->nombre;
}

function getTelefono() {
    return $this->telefono;
}

function getVehiculo() {
    return $this->vehiculo;
}

function setCedula($cedula) {
    $this->cedula = $cedula;
}

function setNombre($nombre) {
    $this->nombre = $nombre;
}

function setTelefono($telefono) {
    $this->telefono = $telefono;
}

function setVehiculo($vehiculo) {
    $this->vehiculo = $vehiculo;
}


}


?>