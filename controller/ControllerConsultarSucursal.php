<?php
     require_once('../model/Conexion.php');
     require_once('../model/Transaccion.php');
    $opcion = $_POST['transaccion'];

    $transaccion = new Transaccion();

    if(strcmp($opcion,"consultar") == 0){
        $respuesta = $transaccion->consultarSucursales();
    }else{
        $search = $_POST['palabra'];
        $respuesta = $transaccion->buscarSucursal($search);
    }


?>
