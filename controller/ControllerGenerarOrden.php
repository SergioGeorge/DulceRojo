<?php
    require_once('../model/Conexion.php');
    require_once('../model/Transaccion.php');
    //  require('../Debug.php');

   $cantidad = $_POST['cantidad'];
   $no_orden = $_POST['no_orden'];
   $id_pastel = $_POST['id_pastel'];
   
    $transaccion = new Transaccion();
    $respuesta = $transaccion->insertarOrden($cantidad, $no_orden, $id_pastel);
    echo $respuesta;//track********
?>
