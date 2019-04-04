<?php
    // include('class.conexion.php');
        include('../Debug.php');

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
                $sql  = "INSERT INTO lista_pastel (clave_pastel, descripcion, precio, unidad_medida, familia, subfamilia, existe) 
                    VALUES(:clave_pastel, :descripcion, :precio, :unidad_medida, :familia, :subfamilia, :existe)";
                $statement = $conexion->prepare($sql);
                $statement->bindParam(':clave_pastel', $clave);
                $statement->bindParam(':descripcion', $descripcion);
                $statement->bindParam(':precio', $precio);
                $statement->bindParam(':unidad_medida', $unidad_medida);
                $statement->bindParam(':familia', $familia);
                $statement->bindParam(':subfamilia', $subfamilia);
                $varExiste = 1;//Bandera que indica que el producto está en existencia
                $statement->bindParam(':existe', $varExiste);

                $statement->execute();
                return 1;//Regresa 1 si el registro se ingreso correctamente
                
            }catch(Exception $e){
                return 0;////Regresa 0 si existe algún error
            }
            
        }

        public function consultarListaPastel()
        {
            $rows = null;
            $modelo = new Conexion();
            $conexion = $modelo->getConexion();
            $query = "SELECT clave_pastel, descripcion, precio, unidad_medida, familia, subfamilia FROM lista_pastel";
            $statement = $conexion->prepare($query);
            $statement->execute();
            
            while($result = $statement->fetch())
            {
                $json[] = array(
                    'clave_pastel' => $result['clave_pastel'],
                    'descripcion' => $result['descripcion'],
                    'precio' => $result['precio'],
                    'unidad_medida' => $result['unidad_medida'],
                    'familia' => $result['familia'],
                    'subfamilia' => $result['subfamilia']                    
                );
            }
            echo json_encode($json);
        }

        public function buscarProducto($search)//Busca un producto en específico
        {   
            $rows = null;
            $modelo = new Conexion();
            $conexion = $modelo->getConexion();
            $query = "SELECT clave_pastel, descripcion, precio, unidad_medida, familia, subfamilia FROM lista_pastel
                        WHERE clave_pastel LIKE '$search%'";
            $statement = $conexion->prepare($query);
            $statement->execute(array($search));

            while($result = $statement->fetch())
            {
                if(!$result) die("Error al buscar: ");
                $json[] = array(
                    'clave_pastel' => $result['clave_pastel'],
                    'descripcion' => $result['descripcion'],
                    'precio' => $result['precio'],
                    'unidad_medida' => $result['unidad_medida'],
                    'familia' => $result['familia'],
                    'subfamilia' => $result['subfamilia']                    
                );
            }

                
            echo json_encode($json);
        }
    }

?>