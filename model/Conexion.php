<?php 
    class Conexion
    {
        public function getConexion()
        {
            $server = "localhost";
            $user = "root";
            $password = "";
            $database = "dulce_rojo";

            try{
                $conexion = new PDO("mysql:host=$server;dbname=$database",$user,$password);
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo('<br><br>Exito en la conexión BD<br><br>');
                return $conexion;
            }catch(Exception $e){
                die('Error en la conexión BD '.$e->GetMessage());
            }         
        }
    }
?>