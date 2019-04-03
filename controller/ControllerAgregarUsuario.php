<?php
    require_once('../model/Conexion.php');
    require_once('../model/Transaccion.php');

   $user = $_POST['user'];
   $name = $_POST['name'];
   $apePa = $_POST['apellidoP'];
   $apeMa = $_POST['apellidoM'];
   $userRol = $_POST['user_Rol'];
   $userPass = $_POST['user_password'];
    
    $transaccion = new Transaccion();
    $respuesta = $transaccion->insertarUser($user, $name, $apePa, $apeMa, $userRol, $userPass);
    echo $respuesta;//track********    
?>