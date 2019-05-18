<?php
     require_once('../model/Conexion.php');
     require_once('../model/Transaccion.php');
    $opcion = $_POST['transaccion'];

    $transaccion = new Transaccion();

    if(strcmp($opcion,"cConsultar") == 0){
        $respuesta = $transaccion->consultarInventario();
    }else{
       
    }


?>
