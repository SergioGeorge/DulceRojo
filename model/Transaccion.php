<?php
    // include('class.conexion.php');

    class Transaccion
    {
       public function insertarListaPastel($clave, $descripcion, $precio, $unidad_medida, $familia, $subfamilia)
       {
           //Convertimos los parametros de Array a (string|int)
           $clave = (int)$clave;
           $precio = (float)$precio;
           
        //    Debug::historial_dump($matricula, $nombre, $grupo, $id_profesor);
        //    Debug::historial_print_r($matricula, $nombre, $grupo, $id_profesor);
           
            $modelo = new Conexion();            
            $conexion = $modelo->getConexion();

            if(!$conexion)
                echo "<br><br>Error en la conexión<br>";

            $sql  = "INSERT INTO lista_pastel 
                    VALUES(:clave_pastel, :descripcion, :precio, :unidad_medida, :familia, :subfamilia)";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(':clave_pastel', $clave);
            $statement->bindParam(':descripcion', $descripcion);
            $statement->bindParam(':precio', $precio);
            $statement->bindParam(':unidad_medida', $unidad_medida);
            $statement->bindParam(':familia', $familia);
            $statement->bindParam(':subfamilia', $subfamilia);

            if(!$statement || $statement==null)
            {
                return "ERROR al insertar registro en tabla 'lista_pastel'";
            }    
            else{
                $statement->execute();
                return "Registro creado correctamente en tabla 'lista_pastel'";
            }
        }

        public function getAlumno()
        {
            $rows = null;
            $modelo = new Conexion();
            $conexion = $modelo->getConexion();
            $sql = "SELECT * FROM alumno";
            $statement = $conexion->prepare($sql);
            $statement->execute();

            while($result = $statement->fetch()){
                $rows[] = $result;
            }

            return $rows;
        }
    }

?>