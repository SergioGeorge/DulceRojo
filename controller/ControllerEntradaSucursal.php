<?php
    require_once('../model/Conexion.php');
    require_once('../model/Transaccion.php');
    //  require('../Debug.php');

   $claveAl = $_POST['clave'];
   $cod = $_POST['codigo'];
   $estadoo = $_POST['estado'];
   $fecha = $_POST['date'];

    $transaccion = new Transaccion();
    $respuesta = $transaccion->insertarProducto($claveAl, $cod, $estadoo,$fecha);
    echo $respuesta;//track********
?>
