<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ViewFactura
 *
 * @author KRLOS
 */?>
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <title>Factura</title>
    <link rel='stylesheet' href='../assets/css/factura.css' media='all' />
  </head>
  <body>
    <header class='clearfix'>
      <div id='logo'>
          <img src='../assets/img/fl.png'>
      </div>
      <div id='company' class='clearfix'>
        <div>Tecnimotos FL</div>
        <div>Nit: 1094350702 </div>
        <div>Tel: 3132147848</div>
        
      </div>
      <div id='project'>
        <div><span>CLIENTE</span> John Doe</div>
        <div><span>CEDULA</span> 796 Silver Harbour, TX 79273, US</div>
        <div><span>TELEFONO</span> 3112486889</div>
        <div><span>FECHA</span> August 17, 2015</div>
        </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class='service'>ID</th>
            <th class='desc'>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class='service'>1</td>
            <td class='desc'>Moto</td>
            <td class='unit'>$40.00</td>
            <td class='qty'>26</td>
            <td class='total'>$1,040.00</td>
          </tr>
          
          <tr>
            <td colspan='4' class='grand total'>TOTAL</td>
            <td class='grand total'>$6,500.00</td>
          </tr>
        </tbody>
      </table>
    </main>
    <footer>
       <center>
        <div>
            <strong>&copy</strong>TECNIMOTOS FL
            <br>Sistema de Inventarios y Ventas
        </div>
    </center>
    </footer>
  </body>
</html>
