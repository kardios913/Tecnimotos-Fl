<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of facFl
 *
 * @author KRLOS
 */
include_once '../negocio/NegFL.php';

class facFl {

    static $_instance;
    private $negFl;

    function __construct() {
        $this->negFl = new NegFL();
    }

    private function __clone() {
        
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function CrearArticulo($nombre, $costo, $cantidad, $precio, $stack) {
        return $this->negFl->CrearArticulo($nombre, $costo, $cantidad, $precio, $stack);
    }

    public function ListarExistencias() {
        return $this->negFl->ListarExistencias();
    }
    
    public function ReporteProductosAgotados(){
        return $this->negFl->ReporteProductosAgotados();
    }

    public function FormRegistrarVentas() {
        return $this->negFl->FormRegistrarVentas();
    }

    public function AddExistencia($id, $nombre, $costo, $cantidad, $precio) {
        return $this->negFl->AddExistencia($id, $nombre, $costo, $cantidad, $precio);
    }

    public function UpdateExistencia($id, $nombre, $costo, $Cantidad, $precio, $stock) {
        return $this->negFl->UpdateExistencia($id, $nombre, $costo, $Cantidad, $precio, $stock);
    }

    public function RegistrarCliente($cedula, $nombreC, $vehiculo, $telefono) {
        return $this->negFl->RegistrarCliente($cedula, $nombreC, $vehiculo, $telefono);
    }

    public function RegistrarVenta($id, $cantidad, $precio, $tipo, $cedula,$fecha,$cantidadE) {
        return $this->negFl->RegistrarVenta($id, $cantidad, $precio, $tipo, $cedula,$fecha,$cantidadE);
    }
    
    public function datetimeCompleto() {
        return $this->negFl->datetimeCompleto();
    }
    public function datetime() {
        return $this->negFl->datetime();
    }
    public function date() {
        return $this->negFl->date();
    }
    public function VentasAbiertas(){
        return $this->negFl->VentasAbiertas();
    }
    
    public function VerDetalle($numFactura){
        return $this->negFl->VerDetalle($numFactura);
    }
    
    public function FormRegistrarDetalles($numFactura){
        return $this->negFl->FormRegistrarDetalles($numFactura);
    }
    
    public function RegistrarVentaFactura($numFactura,$id, $cantidad, $precio,$CantidadNew){
        return $this->negFl->RegistrarVentaFactura($numFactura,$id, $cantidad, $precio,$CantidadNew);
    }
    
    public function facturas(){
        return $this->negFl->facturas();
    }
    
    public function VerDetalleFactura($numFactura){
        return $this->negFl->VerDetalleFactura($numFactura);        
    }
    
    public function EditarDetalle($numFactura,$numDetalle,$PrecioUnitario){
        return $this->negFl->EditarDetalle($numFactura,$numDetalle,$PrecioUnitario);
    }
    
    public function CerrarVenta($numFactura, $fecha){
        return $this->negFl->CerrarVenta($numFactura, $fecha);
    }
    
    public function ReporteDiaActual($fecha){
        return $this->negFl->ReporteDiaActual($fecha);
    }
    public function ReportePeriodoActual($fecha){
        return $this->negFl->ReportePeriodoActual($fecha);
    }
    
    public function RegistrarGastos($descripcion,$valor,$fecha){
        return $this->negFl->RegistrarGastos($descripcion,$valor,$fecha);
    }
    public function ListarGastos(){
        return $this->negFl->ListarGastos();
    }
    
    public function ViewFactura($numFactura){
        return $this->negFl->ViewFactura($numFactura);
    }
    
    //put your code here
}
