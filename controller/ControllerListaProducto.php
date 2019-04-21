<?php
    require_once('../model/Conexion.php');
    require_once('../model/Transaccion.php');
    
    $opcion = $_POST['transaccion'];

    $transaccion = new Transaccion();

    if(strcmp($opcion,"consultar") == 0){       
        $respuesta = $transaccion->consultarListaPastel();
    }else if(strcmp($opcion, "buscar") == 0){
        $data = $_POST['palabra'];
        $respuesta = $transaccion->buscarProducto($data);
    }
    else if(strcmp($opcion, "eliminar") == 0){
        $claveProducto = $_POST['registroID'];
        $respuesta = $transaccion->ocultarProducto($claveProducto);
        echo $respuesta;
    }else if(strcmp($opcion, "editar") == 0){

    }
    
?>