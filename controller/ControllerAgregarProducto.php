<?php
    require_once('../model/Conexion.php');
    require_once('../model/Transaccion.php');
    require('../Debug.php');

   $claveProducto = $_POST['clave'];
   $descripcionProducto = $_POST['descripcion'];
   $precio_entero = $_POST['precio_entero'];
   $precio_decimal = $_POST['precio_decimal'];
   $unidad_medida = $_POST['unidad_medida'];
   $familaProducto = $_POST['familia'];
   $subfamiliaProducto = $_POST['subfamilia'];

    //Concatenamos la parte entera y decimal del formulario
   $precio_total = $precio_entero.'.'.$precio_decimal;

    //Debug::historial_dump($claveProducto, $descripcionProducto, $precioProducto, $unidad_medida, $familaProducto, $subfamiliaProducto);
    //Debug::historial_print_r($claveProducto, $descripcionProducto, $precioProducto, $unidad_medida, $familaProducto, $subfamiliaProducto);
    
    $transaccion = new Transaccion();
    $respuesta = $transaccion->insertarListaPastel($claveProducto, $descripcionProducto, $precio_total,
                                                    $unidad_medida, $familaProducto, $subfamiliaProducto);
    echo $respuesta;    
?>