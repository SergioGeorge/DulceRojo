<?php
    require_once('../model/Conexion.php');
    require_once('../model/Transaccion.php');
    require('../Debug.php');

   $claveProducto = $_POST[''];
   $nombreProducto = $_POST[''];
   $precioProducto = $POST[''];
   $familaProducto = $POST[''];
   $subfamiliaProducto = $POST['']; 

    // Debug::historial_dump($matricula, $nombre, $grupo, $id_profesor);
    // Debug::historial_print_r($matricula, $nombre, $grupo, $id_profesor);

    
        $transaccion = new Transaccion();
        $respuesta = $transaccion->insertarListaPastel($claveProducto, $nombreProducto, $precioProducto,
                                                        $familaProducto, $subfamiliaProducto);

        echo $respuesta;    
?>