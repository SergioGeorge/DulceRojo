<?php
    require_once('../model/Conexion.php');
    require_once('../model/Transaccion.php');
    //  require('../Debug.php');


    $cod = $_POST['codigo'];


    $transaccion = new Transaccion();
    $respuesta = $transaccion->getNameProduct($cod);
    echo $respuesta;//track********
?>
