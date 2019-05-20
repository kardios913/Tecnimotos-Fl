<?php
  include_once '../facade/facFl.php'; 
   $facade = facFl::getInstance();  
   $nombre= $_POST['Nombre'];
   $costo = $_POST['Costo'];
   $cantidad = $_POST['Cantidad'];
   $precio = $_POST['Precio'];
   $stack=$_POST['minimo'];
   
    $result = $facade->CrearArticulo($nombre,$costo,$cantidad,$precio,$stack);
   
if ($result) {
    echo '<script>alert("Registro exitoso") </script>';
    echo "<script language='javascript'>
              window.location.href = '../vista/FormListarExistencias.php';
               </script>";
} else {
    echo '<script>alert("no se pudo registrar") </script>';
    echo "<script language='javascript'>
            	window.location.href = '../vista/FormCrearArticulo.php;
            	</script>";
}
