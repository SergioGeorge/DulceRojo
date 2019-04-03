<?php
    // include('class.conexion.php');

    class Transaccion
    {

       public function insertarListaPastel($clave, $descripcion, $precio, $unidad_medida, $familia, $subfamilia)
       {
            //Hacemos un casting de String a Float del campo de 'precio del producto'
            $precio = (float)$precio;
            
            // Debug::historial_dump($clave, $descripcion, $precio, $unidad_medida, $familia, $subfamilia);
            // Debug::historial_print_r($clave, $descripcion, $precio, $unidad_medida, $familia, $subfamilia);
           
            $modelo = new Conexion();//Creamos una conexión con la BD            
            $conexion = $modelo->getConexion();//Obtenemos la conexión

            if(!$conexion)//Si la conexión no se establece, se muestra mensaje de error
                echo "Error en la conexión_";
            
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

                $statement->execute();
                return 1;//Regresa 1 si el registro se ingreso correctamente
                
            }catch(Exception $e){
                return 0;////Regresa 0 si existe algún error
            }
            
        }
        public function insertarUser($user, $name, $apePa, $apeMa, $userRol, $userPas)
       {
           
            $modelo = new Conexion();//Creamos una conexión con la BD            
            $conexion = $modelo->getConexion();//Obtenemos la conexión

            if(!$conexion)//Si la conexión no se establece, se muestra mensaje de error
                echo "Error en la conexión_";
            
            try{
                $sql  = "INSERT INTO lista_pastel (clave_pastel, descripcion, precio, unidad_medida, familia, subfamilia) 
                    VALUES(:user, :name, :apePa, :apeMa, :userRol, :userPas)";
                $statement = $conexion->prepare($sql);
                $statement->bindParam(':user', $user);
                $statement->bindParam(':name', $name);
                $statement->bindParam(':apePa', $apePa);
                $statement->bindParam(':apeMa', $apeMa);
                $statement->bindParam(':userRol', $userRol);
                $statement->bindParam(':userPas', $userPas);

                $statement->execute();
                return 1;//Regresa 1 si el registro se ingreso correctamente
                
            }catch(Exception $e){
                return 0;////Regresa 0 si existe algún error
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