<?php
    require_once('../model/Conexion.php');
    require_once('../model/Transaccion.php');
    //  require('../Debug.php');

   $claveSucursal = $_POST['clave'];
   $nombreSucursal = $_POST['nombre'];
   $direccionSucursal = $_POST['direccion'];
   
    $transaccion = new Transaccion();
    $respuesta = $transaccion->insertarSucursal($claveSucursal, $nombreSucursal, $direccionSucursal);
    echo $respuesta;//track********
?>
