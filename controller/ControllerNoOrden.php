<?php
    require_once('../model/Conexion.php');
    require_once('../model/Transaccion.php');
    
    $no_Orden = $_POST['no_Ord'];

    $transaccion = new Transaccion();
    $respuesta = $transaccion->getNoOrden($no_Orden);
    echo $respuesta;
?>