<?php 
    class Conexion
    {
        public function getConexion()
        {
            $server = "localhost";
            $user = "root";
            $password = "";
            $database = "dulce_rojo2";

            try{
                $conexion = new PDO("mysql:host=$server;dbname=$database;charset=utf8",$user,$password);
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //echo('Exito en la conexión BD_');//track********1
                return $conexion;
            }catch(Exception $e){
                die('Error en la conexión BD '.$e->GetMessage());
            }         
        }
    }
?>