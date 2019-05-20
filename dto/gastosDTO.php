<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gastosDTO
 *
 * @author KRLOS
 */
class gastosDTO {
    //put your code here
private $id;
private $fecha;
private $descripcion;
private $valor;


   function __construct(){

   }
   function getId() {
       return $this->id;
   }

   function getFecha() {
       return $this->fecha;
   }

   function getDescripcion() {
       return $this->descripcion;
   }

   function getValor() {
       return $this->valor;
   }

   function setId($id) {
       $this->id = $id;
   }

   function setFecha($fecha) {
       $this->fecha = $fecha;
   }

   function setDescripcion($descripcion) {
       $this->descripcion = $descripcion;
   }

   function setValor($valor) {
       $this->valor = $valor;
   }




}

?>