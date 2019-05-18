<?php
    require_once('../model/Conexion.php');
    require_once('../model/Transaccion.php');
    
    $codBar = $_POST['codigo'];
    
    $transaccion = new Transaccion();
    $respuesta = $transaccion->getNameProduct($codBar);
    echo $respuesta;
?>