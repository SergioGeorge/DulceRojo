<?php
    // include('class.conexion.php');

    class Transaccion
    {
       public function insertarListaPastel($clave, $descripcion, $precio, $unidad_medida, $familia, $subfamilia)
       {
        //Hacemos un casting de String a Float del campo de 'precio del producto'
        $precio = (float)$precio;
           
        Debug::historial_dump($clave, $descripcion, $precio, $unidad_medida, $familia, $subfamilia);
        Debug::historial_print_r($clave, $descripcion, $precio, $unidad_medida, $familia, $subfamilia);
           
            $modelo = new Conexion();            
            $conexion = $modelo->getConexion();

            if(!$conexion)
                echo "<br><br>Error en la conexión<br>";
            
            try{
                $sql  = "INSERT INTO lista_pastel (clave_pastel, descripcion, precio, unidad_medida, familia, subfamilia) 
                    VALUES(:clave_pastel, :descripcion, :precio, :unidad_medida, :familia, :subfamilia)";
                $statement = $conexion->prepare($sql);
                $statement->bindParam(':clave_pastel', $clave);
                $statement->bindParam(':descripcion', $descripcion);
                $statement->bindParam(':precio', $precio);
                $statement->bindParam(':unidad_medida', $unidad_medida);
                $statement->bindParam(':familia', $familia);
                $statement->bindParam(':subfamilia', $subfamilia);

                //if(!$statement || $statement==null)
                //{
                   
                //}    
                //else{
                        $statement->execute();
                        return "Registro creado correctamente en tabla 'lista_pastel'";     
                //}
            }catch(Exception $e){
                return "ERROR al insertar registro en tabla 'lista_pastel': ". $e;
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