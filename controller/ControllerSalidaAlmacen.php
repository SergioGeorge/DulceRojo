<?php
    require_once('../model/Conexion.php');
    require_once('../model/Transaccion.php');
    
    $codBar = $_POST['codBar'];
    $estado = $_POST['estado'];

    //echo $codBar;

    $transaccion = new Transaccion();
    $respuesta = $transaccion->updateInvent($codBar, $estado);
    echo $respuesta;
?>