<?php
    require_once('../model/Conexion.php');
    require_once('../model/Transaccion.php');
    
    $codBar = $_POST['codBar'];
    $estado = $_POST['estado'];

    $transaccion = new Transaccion();
    $respuesta = $transaccion->updateInvent($codBar, $estado);
    echo $respuesta;
?>