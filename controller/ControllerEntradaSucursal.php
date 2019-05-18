<?php
    require_once('../model/Conexion.php');
    require_once('../model/Transaccion.php');
    //  require('../Debug.php');

   $claveAl = $_POST['clave'];
   $cod = $_POST['codigo'];
   $estadoo = $_POST['estado'];


    $transaccion = new Transaccion();
    $respuesta = $transaccion->insertarProductoSucursal($claveAl, $cod, $estadoo);
    echo $respuesta;//track********
?>
