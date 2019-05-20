<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NegFL
 *
 * @author KRLOS
 */
require '../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

include_once '../dto/clienteDTO.php';
include_once '../dto/detalleFacturaDTO.php';
include_once '../dto/facturaDTO.php';
include_once '../dto/productoDTO.php';
include_once '../dto/gastosDTO.php';

include_once '../dao/clienteDAO.php';
include_once '../dao/detalleFacturaDAO.php';
include_once '../dao/facturaDAO.php';
include_once '../dao/productoDAO.php';
include_once '../dao/gastosDAO.php';

class NegFL {

//put your code here

    public function datetimeCompleto() {
        date_default_timezone_set("America/Bogota");
        $date = date("Y-m-d H:i:s");
        return $date;
    }

    public function datetime() {
        date_default_timezone_set("America/Bogota");
        $date = date("Y-m-d");
        return $date;
    }

    public function date() {
        date_default_timezone_set("America/Bogota");
        $date = date("Y-m");
        return $date;
    }

    /*     * *********
     * PRODUCTOS* 
     * ********* */

    public function CrearArticulo($nombre, $costo, $cantidad, $precio, $stack) {
        $mod = new productoDTO();
        $mod->setNombre($nombre);
        $mod->setCosto($costo);
        $mod->setCantidad($cantidad);
        $mod->setPrecio($precio);
        $mod->setStack($stack);
        $moddao = new productoDAO();
        $result = $moddao->CrearArticulo($mod);
        return $result;
    }

    public function AddExistencia($id, $nombre, $costo, $cantidad, $precio) {
        $mod = new productoDTO();
        $moddao = new productoDAO();
        $mod->setIdProducto($id);
        $mod->setNombre($nombre);
        $mod->setCosto($costo);
        $mod->setCantidad($cantidad);
        $mod->setPrecio($precio);
        $result = $moddao->AddExistencia($mod);
        return $result;
    }

    public function UpdateExistencia($id, $nombre, $costo, $Cantidad, $precio, $stock) {
        $mod = new productoDTO();
        $moddao = new productoDAO();
        $mod->setIdProducto($id);
        $mod->setNombre($nombre);
        $mod->setCosto($costo);
        $mod->setCantidad($Cantidad);
        $mod->setPrecio($precio);
        $mod->setStack($stock);
        $result = $moddao->UpdateExistencia($mod);
        return $result;
    }

    public function ListarExistencias() {
        $moddao = new productoDAO();
        $listado = $moddao->ListarExistencias();
        $patrimonio = 0;
        $ListadoExistencias = " <table id='mytable' class='table table-bordred table-responsive table-striped'>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Costo</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Patrimonio</th>
                                    <th>Agregar</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody id='myTable'>";
        if ($row = $moddao->getArray($listado)) {

            do {
                $patrimonio = $patrimonio + ($row['cantidad'] * $row['costo']);
                $ListadoExistencias .= "<tr>"
                        . "<td>" . $row['idProducto'] . "</td>"
                        . "<td>" . $row['nombre'] . "</td>\n"
                        . "<td>" . $row['costo'] . "</td>\n"
                        . "<td>" . $row['cantidad'] . "</td>\n"
                        . "<td>" . $row['precio'] . "</td>\n"
                        . "<td>" . $row['cantidad'] * $row['costo'] . "</td>\n"
                        . "<td><a href='FormAddExistencia.php?id=" . $row['idProducto'] . "&nombre=" . $row['nombre']
                        . "&costo=" . $row['costo'] . "&precio=" . $row['precio'] . "&cantidad=" . $row['cantidad'] . ""
                        . "'class='btn btn-success'><i class='glyphicon glyphicon-plus'></i></a></td>"
                        . "<td><a href='FormEditarExistencia.php?id=" . $row['idProducto'] . "&nombre=" . $row['nombre']
                        . "&costo=" . $row['costo'] . "&precio=" . $row['precio'] . "&cantidad=" . $row['cantidad'] . "&stock=" . $row['stack'] . ""
                        . "'class='btn btn-primary'><i class='glyphicon glyphicon-pencil'></i></a></td>";
            } while ($row = $moddao->getArray($listado));
            $ListadoExistencias .= "<tr>"
                    . "<td></td>"
                    . "<td></td>\n"
                    . "<td></td>\n"
                    . "<td></td>\n"
                    . "<td style='font-weight: bold;'>PATRIMONIO</td>\n"
                    . "<td>" . $patrimonio . "</td>\n"
                    . "<td></td>"
                    . "<td></td>";
            $ListadoExistencias .= "</tbody>\n</table>\n";
            return $ListadoExistencias;
        } else {
            echo 'No hay Productos Registrados';
        }
    }

    public function ReporteProductosAgotados() {
        $moddao = new productoDAO();
        $listado = $moddao->ReporteProductosAgotados();

        $ListadoExistencias = " <table id='mytable' class='table table-responsive table-bordred table-striped'>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Costo</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Agregar</th>
                                </tr>
                            </thead>
                            <tbody id='myTable'>";
        if ($row = $moddao->getArray($listado)) {

            do {
                $ListadoExistencias .= "<tr>"
                        . "<td>" . $row['idProducto'] . "</td>"
                        . "<td>" . $row['nombre'] . "</td>\n"
                        . "<td>" . $row['costo'] . "</td>\n"
                        . "<td>" . $row['cantidad'] . "</td>\n"
                        . "<td>" . $row['precio'] . "</td>\n"
                        . "<td><a href='FormAddExistencia.php?id=" . $row['idProducto'] . "&nombre=" . $row['nombre']
                        . "&costo=" . $row['costo'] . "&precio=" . $row['precio'] . "&cantidad=" . $row['cantidad'] . ""
                        . "'class='btn btn-success'><i class='glyphicon glyphicon-plus'></i></a></td>";
            } while ($row = $moddao->getArray($listado));
            $ListadoExistencias .= "</tbody>\n</table>\n";
            return $ListadoExistencias;
        } else {
            echo 'No hay Productos Registrados';
        }
    }

    /*     * *******
     * VENTAS* 
     * ******* */

    public function RegistrarCliente($cedula, $nombreC, $vehiculo, $telefono) {
        $mod = new clienteDTO();
        $moddao = new clienteDAO();
        $mod->setCedula($cedula);
        $mod->setNombre($nombreC);
        $mod->setVehiculo($vehiculo);
        $mod->setTelefono($telefono);
        $isEmpty = $moddao->IsEmpty($mod);
        $row = $moddao->getArray($isEmpty);
        if ($row['num'] == 0) {
            $result = $moddao->RegistrarCliente($mod);
        } else {
            $result = false;
        }
        return $result;
    }

//                             IDProducto, Cantidad, PrecioUnitario, Abierta, Cedula
    public function RegistrarVenta($id, $cantidad, $precio, $tipo, $cedula, $fecha, $cantidadN) {
        $numFactura = $this->RegistrarFactura($tipo, $cedula, $fecha);
        $mod = new detalleFacturaDTO();
        $moddao = new detalleFacturaDAO();
        $mod->setIdFactura($numFactura);
        $mod->setIdProducto($id);
        $mod->setCantidad($cantidad);
        $mod->setPrecioUnitario($precio);
        $this->Venta($id, $cantidadN);
        $result = $moddao->RegistrarDetalle($mod);
        return $result;
    }

    public function RegistrarVentaFactura($numFactura, $id, $cantidad, $precio, $CantidadNew) {
        $mod = new detalleFacturaDTO();
        $moddao = new detalleFacturaDAO();
        $mod->setIdFactura($numFactura);
        $mod->setIdProducto($id);
        $mod->setCantidad($cantidad);
        $mod->setPrecioUnitario($precio);
        $this->Venta($id, $CantidadNew);
        $result = $moddao->RegistrarDetalle($mod);
        return $result;
    }

//DEscontar el prodcuto vendido en el inventario
    public function Venta($id, $cantidad) {
        $mod = new productoDTO();
        $moddao = new productoDAO();
        $mod->setIdProducto($id);
        $mod->setCantidad($cantidad);
        $result = $moddao->Venta($mod);
        return $result;
    }

    public function RegistrarFactura($tipo, $cedula, $fecha) {
        $mod = new facturaDTO();
        $moddao = new facturaDAO();
        $mod->setAbierta($tipo);
        $mod->setCedula($cedula);
        $mod->setFecha($fecha);
        $numFactura = $moddao->RegistrarFactura($mod);
        $result = $moddao->NumFactura($fecha);
        $row = $moddao->getArray($result);
        return $row['numFactura'];
    }

    public function FormRegistrarVentas() {
        $moddao = new productoDAO();
        $listado = $moddao->ListarExistencias();

        $ListadoExistencias = " <table id='mytable' class='table table-bordred table-responsive table-striped'>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Costo</th>
                                    <th>Precio Venta</th>
                                    <th>Exitesncias</th>
                                    <th>Vender</th>
                                </tr>
                            </thead>
                            <tbody id='myTable'>";
        if ($row = $moddao->getArray($listado)) {

            do {
                if ($row['cantidad'] > 0) {
                    $ListadoExistencias .= "<tr>"
                            . "<td>" . $row['idProducto'] . "</td>"
                            . "<td>" . $row['nombre'] . "</td>\n"
                            . "<td>" . $row['costo'] . "</td>\n"
                            . "<td>" . $row['precio'] . "</td>\n"
                            . "<td>" . $row['cantidad'] . "</td>\n";
                    $ListadoExistencias .= "<td><a href='FormFormularioVentas.php?id=" . $row['idProducto'] . "&nombre=" . $row['nombre']
                            . "&costo=" . $row['costo'] . "&precio=" . $row['precio'] . "&cantidad=" . $row['cantidad'] . ""
                            . "'class='btn btn-success'><i class='glyphicon glyphicon-shopping-cart'></i></a></td>";
                }
            } while ($row = $moddao->getArray($listado));
            $ListadoExistencias .= "</tbody>\n</table>\n";
            return $ListadoExistencias;
        } else {
            echo 'No hay Productos Registrados';
        }
    }

    public function VentasAbiertas() {
        $moddao = new facturaDAO();
        $moddaoD = new detalleFacturaDAO();

        $listado = $moddao->FacturaxCliente();
        $tabla = "<table id='mytable' class='table table-bordred table-striped table-responsive'>
                            <thead>
                                <tr>
                                    <th>Num Factura</th>
                                    <th>Fecha</th>
                                    <th>Cliente</th>
                                    <th>Vehiculo</th>
                                    <th>Total</th>
                                    <th>Ver Detalle</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id='myTable'>";
        if ($row = $moddao->getArray($listado)) {
            do {
                $numFactura = $row['numFactura'];
                $total = $moddaoD->Total($numFactura);
                $row2 = $moddaoD->getArray($total);
                //f., f. , c., c.
                $tabla .= "<tr>"
                        . "<td>" . $row['numFactura'] . "</td>"
                        . "<td>" . $row['fecha'] . "</td>"
                        . "<td>" . $row['nombre'] . "</td>"
                        . "<td>" . $row['vehiculo'] . "</td>"
                        . "<td>" . $row2['Total'] . "</td>"
                        . "<td><a href = './FormVerDetalle.php?numFactura=" . $row['numFactura'] . "' class = 'btn btn-info' ><i class = 'glyphicon glyphicon-list'></i></a></td>"
                        . "<td><a href = '../controlador/CerrarVenta.php?numFactura=" . $row['numFactura'] . "'  class = 'btn btn-success' ><i class = 'glyphicon glyphicon-ok'></i></a></td>"
                        . "";
            } while ($row = $moddao->getArray($listado));
        } else {
            $tabla .= "<td>No Hay Ventas Abiertas</td><td></td><td></td><td></td><td></td><td></td><td></td>";
        }
        $tabla .= "</tbody>\n</table>\n";
        return $tabla;
    }

    public function facturas() {
        $moddao = new facturaDAO();
        $moddaoD = new detalleFacturaDAO();
        $listado = $moddao->FacturaxClienteS();
        $tabla = "<table id='mytable' class='table table-bordred table-striped table-responsive'>
                            <thead>
                                <tr>
                                    <th>Num Factura</th>
                                    <th>Fecha</th>
                                    <th>Cliente</th>
                                    <th>Ganancia</th>
                                    <th>Total</th>
                                    <th>Ver Detalle</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id='myTable'>";
        if ($row = $moddao->getArray($listado)) {
            do {
                $numFactura = $row['numFactura'];
                $g = $moddao->ReporteGanancia($numFactura);
                $ganancia = $moddao->getArray($g);
                $total = $moddaoD->Total($numFactura);
                $row2 = $moddaoD->getArray($total);
                //f., f. , c., c.
                $tabla .= "<tr>"
                        . "<td>" . $row['numFactura'] . "</td>"
                        . "<td>" . $row['fecha'] . "</td>"
                        . "<td>" . $row['nombre'] . "</td>"
                        . "<td>" . $ganancia['Ganancia'] . "</td>"
                        . "<td>" . $row2['Total'] . "</td>"
                        . "<td><a href = './FormVerDetalleFactura.php?numFactura=" . $row['numFactura'] . "' class = 'btn btn-info' ><i class = 'glyphicon glyphicon-list'></i></a></td>"
                        . "<td><a href = '../controlador/printPDF.php?numFactura=" . $row['numFactura'] . "' target='_blank'  class = 'btn btn-danger' ><i class = 'glyphicon glyphicon-save-file'></i></a></td>"
                        . "";
            } while ($row = $moddao->getArray($listado));
        } else {
            $tabla .= " <td>No Hay Ventas Facturadas</td><td></td><td></td><td></td><td></td><td></td>";
        }
        $tabla .= "</tbody>\n</table>\n";
        return $tabla;
    }

    public function VerDetalle($numFactura) {
        $moddao = new detalleFacturaDAO();
        $detalle = $moddao->VerDetalle($numFactura);
        $total = 0;
        $tabla = " <table id='mytable' class='table table-bordred table-striped table-responsive'>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio Unitario</th>
                                    <th>Total</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody id='myTable'>";
        if ($row = $moddao->getArray($detalle)) {
            do {
                $total = $total + $row['total'];
                $tabla .= "<tr>"
                        . "<td>" . $row['idDetalle'] . "</td>"
                        . "<td>" . $row['nombre'] . "</td>"
                        . "<td>" . $row['cantidad'] . "</td>"
                        . "<td>" . $row['precioUnitario'] . "</td>"
                        . "<td>" . $row['total'] . "</td>"
                        . "<td><a href = './FormEditarDetalle.php?numFactura=" . $numFactura . "&idDetalle=" . $row['idDetalle'] . "&nombre=" . $row['nombre'] . "&costo=" . $row['costo'] . "&precio=" . $row['precio'] . "&precioU=" . $row['precioUnitario'] . "' class = 'btn btn-info' ><i class = 'glyphicon glyphicon-pencil'></i></a></td>";
            } while ($row = $moddao->getArray($detalle));
            $tabla .= "<tr>"
                    . "<td></td>"
                    . "<td></td>"
                    . "<td></td>"
                    . "<td style='font-weight: bold;'>TOTAL</td>"
                    . "<td>" . $total . "</td>"
                    . "<td></td>"
                    . "</tbody>\n</table>\n"
                    . "  <div class='box-footer'>
                            <a class='btn btn-primary' href='FormAgregarDetalle.php?numFactura=" . $numFactura . "' >Agregar Articulo</a>
                    </div>";
            return $tabla;
        } else {
            $tabla .= "No Hay Ventas Abiertas";
        }
    }

    public function VerDetalleFactura($numFactura) {
        $moddao = new detalleFacturaDAO();
        $detalle = $moddao->VerDetalle($numFactura);
        $total = 0;
        $tabla = " <table id='mytable' class='table table-bordred table-striped table-responsive'>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio Unitario</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody id='myTable'>";
        if ($row = $moddao->getArray($detalle)) {
            do {
                $total = $total + $row['total'];
                $tabla .= "<tr>"
                        . "<td>" . $row['idDetalle'] . "</td>"
                        . "<td>" . $row['nombre'] . "</td>"
                        . "<td>" . $row['cantidad'] . "</td>"
                        . "<td>" . $row['precioUnitario'] . "</td>"
                        . "<td>" . $row['total'] . "</td>";
            } while ($row = $moddao->getArray($detalle));
            $tabla .= "<tr>"
                    . "<td></td>"
                    . "<td></td>"
                    . "<td></td>"
                    . "<td style='font-weight: bold;'>TOTAL</td>"
                    . "<td>" . $total . "</td>";
        } else {
            $tabla .= "<td>No se han Agregado Productos a la Factura </td><td></td><td></td><td></td><td></td>";
        }
        $tabla .= "</tbody>\n</table>\n";
        return $tabla;
    }

    public function FormRegistrarDetalles($numFactura) {
        $moddao = new productoDAO();
        $listado = $moddao->ListarExistencias();

        $ListadoExistencias = " <table id='mytable' class='table table-bordred table-striped table-responsive'>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Costo</th>
                                    <th>Precio Venta</th>
                                    <th>Exitesncias</th>
                                    <th>Vender</th>
                                </tr>
                            </thead>
                            <tbody id='myTable'>";
        if ($row = $moddao->getArray($listado)) {

            do {
                if ($row['cantidad'] > 0) {
                    $ListadoExistencias .= "<tr>"
                            . "<td>" . $row['idProducto'] . "</td>"
                            . "<td>" . $row['nombre'] . "</td>\n"
                            . "<td>" . $row['costo'] . "</td>\n"
                            . "<td>" . $row['precio'] . "</td>\n"
                            . "<td>" . $row['cantidad'] . "</td>\n";

                    $ListadoExistencias .= "<td><a href='FormAddVentas.php?numFactura=" . $numFactura . "&id=" . $row['idProducto'] . "&nombre=" . $row['nombre']
                            . "&costo=" . $row['costo'] . "&precio=" . $row['precio'] . "&cantidad=" . $row['cantidad'] . ""
                            . "'class='btn btn-success'><i class='glyphicon glyphicon-shopping-cart'></i></a></td>";
                }
            } while ($row = $moddao->getArray($listado));
        } else {
            $ListadoExistencias .= '<td>No hay Productos Registrados</td> <td></td><td></td><td></td><td></td><td></td>';
        }
        $ListadoExistencias .= "</tbody>\n</table>\n";
        return $ListadoExistencias;
    }

    public function EditarDetalle($numFactura, $numDetalle, $PrecioUnitario) {
        $mod = new detalleFacturaDTO();
        $moddao = new detalleFacturaDAO();
        $mod->setIdDetalle($numDetalle);
        $mod->setIdFactura($numFactura);
        $mod->setPrecioUnitario($PrecioUnitario);
        $result = $moddao->EditarDetalle($mod);
        return $result;
    }

    public function CerrarVenta($numFactura, $fecha) {
        $mod = new facturaDTO();
        $moddao = new facturaDAO();
        $mod->setFecha($fecha);
        $mod->setIdFactura($numFactura);
        $result = $moddao->CerrarVenta($mod);
        return $result;
    }

    public function ReporteDiaActual($fecha) {
        $moddao = new facturaDAO();
        $moddaoD = new detalleFacturaDAO();
        $totalFacturas = 0;
        $totalGanancia = 0;
        $totalGastos = 0;
        $totalCaja = 0;
        $listado = $moddao->ReporteDiaActual($fecha);
        $tabla = "<div class='box box-danger'>
            <form role='form' method='POST'>
                    <div class='box-body'>
                    <div class='form-group'>
                        <input id='myInput' type='text' placeholder='Search..'>
                        </div> 
                        <div class='form-group'>
                        <label>VENTAS<label>
                        </div> 
                    </div> 

                    <div class='table-responsive'>            
                        <table id='mytable' class='table table-bordred table-striped table-responsive'>

                            <thead>
                                <tr>
                                    <th>Num Factura</th>
                                    <th>Fecha</th>
                                    <th>Cliente</th>
                                    <th>Ganancia</th>
                                    <th>Total</th>
                                    <th>Ver Detalle</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id='myTable'>";
        if ($row = $moddao->getArray($listado)) {
            do {
                $numFactura = $row['numFactura'];
                $g = $moddao->ReporteGanancia($numFactura);
                $ganancia = $moddao->getArray($g);
                $total = $moddaoD->Total($numFactura);
                $row2 = $moddaoD->getArray($total);
                $totalFacturas = $totalFacturas + $row2['Total'];
                $totalGanancia = $totalGanancia + $ganancia['Ganancia'];
                //f., f. , c., c.
                $tabla .= "<tr>"
                        . "<td>" . $row['numFactura'] . "</td>"
                        . "<td>" . $row['fecha'] . "</td>"
                        . "<td>" . $row['nombre'] . "</td>"
                        . "<td>" . $ganancia['Ganancia'] . "</td>"
                        . "<td>" . $row2['Total'] . "</td>"
                        . "<td><a href = './FormVerDetalleFactura.php?numFactura=" . $row['numFactura'] . "' class = 'btn btn-info' ><i class = 'glyphicon glyphicon-list'></i></a></td>"
                        . "<td><a href = '../controlador/printPDF.php?numFactura=" . $row['numFactura'] . "' target='_blank'  class = 'btn btn-danger' ><i class = 'glyphicon glyphicon-save-file'></i></a></td>";
            } while ($row = $moddao->getArray($listado));
            $tabla .= "<tr>"
                    . "<td></td>"
                    . "<td></td>"
                    . "<td></td>"
                    . "<td style='font-weight: bold;'>" . $totalGanancia . "</td>"
                    . "<td style='font-weight: bold;'>" . $totalFacturas . "</td>"
                    . "<td></td>"
                    . "<td></td>";
        } else {
            $tabla .= "<td>No Ventas Registradas</td><td></td><td></td><td></td><td></td><td></td>";
        }
        $tabla .= "</tbody>\n</table>\n</form>"
                . "</div>"
                . "</div>";
        $moddaoG = new gatosDAO;

        $listado2 = $moddaoG->ListarGastosFecha($fecha);
        //`id`, `valor`, `descripcion`, `fecha`
        $tabla .= "<div class='box box-danger'>
            <form role='form' method='POST'>
                    <div class='box-body'>
                        <div class='form-group'>
                        <label>GASTOS<label>
                        </div> 
                    </div> 

                    <div class='table-responsive'>     
            <table id='mytable' class='table table-bordred table-striped table-responsive'>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Descripcion</th>
                                    <th>Fecha</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody id='myTable'>";
        if ($row = $moddao->getArray($listado2)) {
            do {
                $totalGastos += $row['valor'];
                $tabla .= "<tr>"
                        . "<td>" . $row['id'] . "</td>"
                        . "<td>" . $row['descripcion'] . "</td>"
                        . "<td>" . $row['fecha'] . "</td>"
                        . "<td>" . $row['valor'] . "</td>";
            } while ($row = $moddao->getArray($listado2));
            $tabla .= "<tr>"
                    . "<td></td>"
                    . "<td></td>"
                    . "<td></td>"
                    . "<td style='font-weight: bold;'>" . $totalGastos . "</td>";
        } else {
            $tabla .= "<td>No Hay Gastos Registrados</td> <td></td><td></td><td></td>";
        }
        $tabla .= "</tbody>\n</table>\n</form></div></div>";
        $totalCaja = $totalFacturas - $totalGastos;
        $tabla .= "<div class='box box-danger'>
            <form role='form' method='POST'>
                    <div class='box-body'>
                        <div class='form-group'>
                        <label>REPORTE CAJA<label>
                        </div> 
                    </div> 

                    <div class='table-responsive'>     
            <table id='mytable' class='table table-bordred table-striped table-responsive'>
                            <thead>
                                <tr>
                                    <th>Total Ventas</th>
                                    <th>Total Ganancias</th>
                                    <th>Total Gastos</th>
                                    <th>Total Caja</th>
                                </tr>
                            </thead>
                            <tbody id='myTable'>
                            <td>" . $totalFacturas . "</td>
                            <td>" . $totalGanancia . "</td>
                            <td>" . $totalGastos . "</td>
                            <td>" . $totalCaja . "</td>
</tbody>\n</table>\n</form></div></div>";
        return $tabla;
    }

    public function ReportePeriodoActual($fecha) {
        $moddao = new facturaDAO();
        $moddaoD = new detalleFacturaDAO();
        $totalFacturas = 0;
        $totalGanancia = 0;
        $totalGastos = 0;
        $totalCaja = 0;

        $listado = $moddao->ReporteDiaActual($fecha);
        $tabla = "<div class='box box-danger'>
            <form role='form' method='POST'>
                    <div class='box-body'>
                    <div class='form-group'>
                            <input id='myInput' type='text' placeholder='Search..'>
                        </div> 
                        <div class='form-group'>
                        <label>VENTAS<label>
</div> 
                    </div> 

                    <div class='table-responsive'>            
            <table id='mytable' class='table table-bordred table-striped table-responsive'>
                            <thead>
                                <tr>
                                    <th>Num Factura</th>
                                    <th>Fecha</th>
                                    <th>Cliente</th>
                                    <th>Ganancia</th>
                                    <th>Total</th>
                                    <th>Ver Detalle</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id='myTable'>";
        if ($row = $moddao->getArray($listado)) {
            do {
                $numFactura = $row['numFactura'];
                $g = $moddao->ReporteGanancia($numFactura);
                $ganancia = $moddao->getArray($g);
                $total = $moddaoD->Total($numFactura);
                $row2 = $moddaoD->getArray($total);
                $totalFacturas = $totalFacturas + $row2['Total'];
                $totalGanancia = $totalGanancia + $ganancia['Ganancia'];
                //f., f. , c., c.
                $tabla .= "<tr>"
                        . "<td>" . $row['numFactura'] . "</td>"
                        . "<td>" . $row['fecha'] . "</td>"
                        . "<td>" . $row['nombre'] . "</td>"
                        . "<td>" . $ganancia['Ganancia'] . "</td>"
                        . "<td>" . $row2['Total'] . "</td>"
                        . "<td><a href = './FormVerDetalleFactura.php?numFactura=" . $row['numFactura'] . "' class = 'btn btn-info' ><i class = 'glyphicon glyphicon-list'></i></a></td>"
                        . "<td><a href = '../controlador/printPDF.php?numFactura=" . $row['numFactura'] . "' target='_blank'   class = 'btn btn-danger' ><i class = 'glyphicon glyphicon-save-file'></i></a></td>";
            } while ($row = $moddao->getArray($listado));
            $tabla .= "<tr>"
                    . "<td></td>"
                    . "<td></td>"
                    . "<td></td>"
                    . "<td style='font-weight: bold;'>" . $totalGanancia . "</td>"
                    . "<td style='font-weight: bold;'>" . $totalFacturas . "</td>"
                    . "<td></td>"
                    . "<td></td>";
        } else {
            $tabla .= "<td>No Hay Ventas Periodo Actual</td> <td></td><td></td><td></td><td></td><td></td>";
        }
        $tabla .= "</tbody>\n</table>\n</form>"
                . "</div>"
                . "</div>";

        $moddaoG = new gatosDAO;

        $listado2 = $moddaoG->ListarGastosFecha($fecha);
        //`id`, `valor`, `descripcion`, `fecha`
        $tabla .= "<div class='box box-danger'>
            <form role='form' method='POST'>
                    <div class='box-body'>
                        <div class='form-group'>
                        <label>GASTOS<label>
                        </div> 
                    </div> 

                    <div class='table-responsive'> 
            <table id='mytable' class='table table-bordred table-striped table-responsive'>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Descripcion</th>
                                    <th>Fecha</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody id='myTable'>";
        if ($row = $moddao->getArray($listado2)) {
            do {
                $totalGastos += $row['valor'];
                $tabla .= "<tr>"
                        . "<td>" . $row['id'] . "</td>"
                        . "<td>" . $row['descripcion'] . "</td>"
                        . "<td>" . $row['fecha'] . "</td>"
                        . "<td>" . $row['valor'] . "</td>";
            } while ($row = $moddao->getArray($listado2));
            $tabla .= "<tr>"
                    . "<td></td>"
                    . "<td></td>"
                    . "<td></td>"
                    . "<td style='font-weight: bold;'>" . $totalGastos . "</td>";
        } else {
            $tabla .= "<td>No Hay Gastos Registrados</td> <td></td><td></td><td></td>";
        }
        $tabla .= "</tbody>\n</table>\n</form></div></div>";
        $totalCaja = $totalFacturas - $totalGastos;
        $tabla .= "<div class='box box-danger'>
            <form role='form' method='POST'>
                    <div class='box-body'>
                        <div class='form-group'>
                        <label>REPORTE CAJA<label>
                        </div> 
                    </div> 

                    <div class='table-responsive'>     
            <table id='mytable' class='table table-bordred table-striped table-responsive'>
                            <thead>
                                <tr>
                                    <th>Total Ventas</th>
                                    <th>Total Ganancias</th>
                                    <th>Total Gastos</th>
                                    <th>Total Caja</th>
                                </tr>
                            </thead>
                            <tbody id='myTable'>
                            <td>" . $totalFacturas . "</td>
                            <td>" . $totalGanancia . "</td>
                            <td>" . $totalGastos . "</td>
                            <td>" . $totalCaja . "</td>
</tbody>\n</table>\n</form></div></div>";
        return $tabla;
    }

    public function RegistrarGastos($descripcion, $valor, $fecha) {
        $mod = new gastosDTO();
        $moddao = new gatosDAO();
        $mod->setFecha($fecha);
        $mod->setDescripcion($descripcion);
        $mod->setValor($valor);
        $result = $moddao->RegistrarGastos($mod);
        return $result;
    }

    public function ListarGastos() {
        $moddao = new gatosDAO;
        $totalGastos = 0;
        $listado2 = $moddao->ListarGastos();
        //`id`, `valor`, `descripcion`, `fecha`
        $tabla = "<table id='mytable' class='table table-bordred table-striped table-responsive'>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Valor</th>
                                    <th>Descripcion</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody id='myTable'>";
        if ($row = $moddao->getArray($listado2)) {
            do {
                $totalGastos += $row['valor'];
                $tabla .= "<tr>"
                        . "<td>" . $row['id'] . "</td>"
                        . "<td>" . $row['valor'] . "</td>"
                        . "<td>" . $row['descripcion'] . "</td>"
                        . "<td>" . $row['fecha'] . "</td>";
            } while ($row = $moddao->getArray($listado2));
        } else {
            $tabla .= "<td>No Hay Gastos Registrados</td> <td></td><td></td><td></td>";
        }
        $tabla .= "</tbody>\n</table>\n";
        return $tabla;
    }

    public function ViewFactura($numFactura) {
        $moddao = new detalleFacturaDAO();
        $moddaoF = new facturaDAO();
        $Cliente = $moddaoF->ClienteFactura($numFactura);
        $detalle = $moddao->VerDetalle($numFactura);
        $id = 0;
        $total = 0;
        $factura = "<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <title>Factura</title>
    
  </head>
  <body style='position: relative;width: 21cm; height: 29.7cm; margin: 0 auto; color: #001028; background: #FFFFFF;font-family: Arial, sans-serif;font-size: 12px; font-family: Arial;'>
    <div width ='90' height='90'><img style=' display: block;margin: auto;'   src='../assets/img/fl2.png'>
<br>
<br>
<div style='border-top: 1px solid #C1CED9; border-bottom: 1px solid #C1CED9'>
";

        switch (strlen($numFactura)) {
            case 1: $factura .= "<h1 style='border-top: 1px solid  #5D6975;  border-bottom: 1px solid  #5D6975;  color: #5D6975;  font-size: 2.4em;  line-height: 1.4em;  font-weight: normal;  text-align: center;  margin: 0 0 20px 0;background: url(dimension.png);'>N° 0000$numFactura</h1>";
                break;
            case 2: $factura .= "<h1 style='border-top: 1px solid  #5D6975;  border-bottom: 1px solid  #5D6975;  color: #5D6975;  font-size: 2.4em;  line-height: 1.4em;  font-weight: normal;  text-align: center;  margin: 0 0 20px 0;background: url(dimension.png);'>N° 000$numFactura</h1>";
                break;
            case 3: $factura .= "<h1 style='border-top: 1px solid  #5D6975;  border-bottom: 1px solid  #5D6975;  color: #5D6975;  font-size: 2.4em;  line-height: 1.4em;  font-weight: normal;  text-align: center;  margin: 0 0 20px 0;background: url(dimension.png);'>N° 00$numFactura</h1>";
                break;
            case 4: $factura .= "<h1 style='border-top: 1px solid  #5D6975;  border-bottom: 1px solid  #5D6975;  color: #5D6975;  font-size: 2.4em;  line-height: 1.4em;  font-weight: normal;  text-align: center;  margin: 0 0 20px 0;background: url(dimension.png);'>N° 0$numFactura</h1>";
                break;
            case 5: $factura .= "<h1 style='border-top: 1px solid  #5D6975;  border-bottom: 1px solid  #5D6975;  color: #5D6975;  font-size: 2.4em;  line-height: 1.4em;  font-weight: normal;  text-align: center;  margin: 0 0 20px 0;background: url(dimension.png);'>N° $numFactura</h1>";
                break;
        }

        if ($row2 = $moddaoF->getArray($Cliente)) {
            do {
                $factura .= "</div>
                    <br>
                    <br>
                    <div id='project' style='float: left;margin-left: 20px;font-size: 2em;'>
        <div style='padding: 5px;'><span style=' color: #5D6975;text-align: left;width: 52px;display: inline-block;font-size: 1em;'>CLIENTE:</span> " . $row2['nombre'] . "</div>
        <div style='padding: 5px;'><span style=' color: #5D6975;text-align: left;width: 52px;display: inline-block;font-size: 1em;'>CEDULA:</span> " . $row2['cedula'] . "</div>
        <div style='padding: 5px;'><span style=' color: #5D6975;text-align: left;width: 52px;display: inline-block;font-size: 1em;'>TELEFONO:</span> " . $row2['telefono'] . "</div>
        <div style='padding: 5px;'><span style=' color: #5D6975;text-align: left;width: 52px;display: inline-block;font-size: 1em;'>FECHA:</span> " . $row2['fecha'] . "</div>
        </div>
        </div>";
            } while ($row2 = $moddaoF->getArray($Cliente));
        }
        $factura .= "
    <div>
    <br>
    <br>
      <table >
        <thead>
          <tr>
            <th style='text-align: left;padding: 15px;'></th>
            <th style='text-align: left;padding: 15px;'></th>
            <th style='text-align: left;padding: 15px;'></th>
            <th style='background-color: #EFF8FB;text-align: left;padding: 15px;border-bottom: 1px dashed  #5D6975;border-top: 1px dashed  #5D6975;border-right: 1px dashed  #5D6975;border-left: 1px dashed  #5D6975;'>ID</th>
            <th style='background-color: #EFF8FB;text-align: left;padding: 15px;border-bottom: 1px dashed  #5D6975;border-top: 1px dashed  #5D6975;border-right: 1px dashed  #5D6975;'>Producto</th>
            <th style='background-color: #EFF8FB;text-align: left;padding: 15px;border-bottom: 1px dashed  #5D6975;border-top: 1px dashed  #5D6975;border-right: 1px dashed  #5D6975;'>Precio</th>
            <th style='background-color: #EFF8FB;text-align: left;padding: 15px;border-bottom: 1px dashed  #5D6975;border-top: 1px dashed  #5D6975;border-right: 1px dashed  #5D6975;'>Cantidad</th>
            <th style='background-color: #EFF8FB;text-align: left;padding: 15px;border-bottom: 1px dashed  #5D6975;border-top: 1px dashed  #5D6975;border-right: 1px dashed  #5D6975;'>Total</th>
          </tr>
        </thead>
        <tbody>";
        if ($row = $moddao->getArray($detalle)) {
            do {
                $id++;
                $total = $total + $row['total'];
                $factura .= "<tr>
            <td style=' text-align: left;padding: 20px; vertical-align: top;'></td>
            <td style=' text-align: left;padding: 20px; vertical-align: top;'></td>
            <td style=' text-align: left;padding: 20px; vertical-align: top;'></td>
            <td style=' text-align: left;padding: 20px; vertical-align: top;border-left: 1px dashed  #5D6975;border-right: 1px dashed  #5D6975;'>$id</td>
            <td style=' text-align: left;padding: 20px;vertical-align: top;border-right: 1px dashed  #5D6975;'>" . $row['nombre'] . "</td>
            <td style=' text-align: left;padding: 20px;vertical-align: top;border-right: 1px dashed  #5D6975;'> $" . $row['precioUnitario'] . "</td>
            <td style=' text-align: left;padding: 20px;vertical-align: top;border-right: 1px dashed  #5D6975;'>" . $row['cantidad'] . "</td>
            <td style=' text-align: left;padding: 20px;vertical-align: top;border-right: 1px dashed  #5D6975;'>$" . $row['total'] . "</td>
</tr>";
            } while ($row = $moddao->getArray($detalle));
        }
        $factura .= "<tr>
              <td style='text-align: center;padding: 20px; vertical-align: top;'></td>
              <td style='text-align: center;padding: 20px; vertical-align: top;'></td>
              <td style='text-align: center;padding: 20px; vertical-align: top;'></td>
              <td style='text-align: center;padding: 20px; vertical-align: top;border-top: 1px dashed #5D6975;border-bottom: 1px dashed #5D6975;border-left: 1px dashed #5D6975;'></td>
              <td style='text-align: center;padding: 20px; vertical-align: top;border-top: 1px dashed #5D6975;border-bottom: 1px dashed #5D6975;'></td>
              <td style='text-align: center;padding: 20px; vertical-align: top;border-top: 1px dashed #5D6975;border-bottom: 1px dashed #5D6975;'></td>
              <td style='text-align: center;padding: 20px; vertical-align: top;border-top: 1px dashed #5D6975;border-bottom: 1px dashed #5D6975;'><strong>TOTAL:</strong></td>
              <td style='text-align: center;padding: 20px; vertical-align: top;border-top: 1px dashed #5D6975;border-bottom: 1px dashed #5D6975;border-right: 1px dashed #5D6975;'><strong>$$total</strong></td>
          </tr>
        </tbody>
      </table>
    </div>
    </body>
</html>
";

        return $factura;
    }

}
