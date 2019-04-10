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
            try
            {
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

        public function insertarSucursal($clave, $nombre, $direccion)
       {

            $modelo = new Conexion();//Creamos una conexión con la BD
            $conexion = $modelo->getConexion();//Obtenemos la conexión

            if(!$conexion)//Si la conexión no se establece, se muestra mensaje de error
                echo "Error en la conexión_";

            try{
                $sql  = "INSERT INTO sucursal (clave_suc, nombre, direccion)
                    VALUES(:clave_suc, :nombre, :direccion)";
                $statement = $conexion->prepare($sql);
                $statement->bindParam(':clave_suc', $clave);
                $statement->bindParam(':nombre', $nombre);
                $statement->bindParam(':direccion', $direccion);

                $statement->execute();
                return 1;//Regresa 1 si el registro se ingreso correctamente

            }catch(Exception $e){
                return 0;////Regresa 0 si existe algún error
            }
        }

        public function insertarProducto($clave, $codigo, $estado,$fecha)
       {

            $modelo = new Conexion();//Creamos una conexión con la BD
            $conexion = $modelo->getConexion();//Obtenemos la conexión

            if(!$conexion)//Si la conexión no se establece, se muestra mensaje de error
                echo "Error en la conexión_";

            try{
                $sql  = "INSERT INTO producto (id_pastel,codigo_barras,estado,fecha_elaboracion)
                    VALUES(:id_pastel,:codigo_barras,:estado,:fecha_elaboracion)";
                $statement = $conexion->prepare($sql);
                $statement->bindParam(':id_pastel', $clave);
                $statement->bindParam(':codigo_barras', $codigo);
                $statement->bindParam(':estado', $estado);
                $statement->bindParam(':fecha_elaboracion', $fecha);

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
                $sql  = "INSERT INTO USERS (user_var, user_name, ape_pat, ape_mat, user_rol, user_pass)
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

        public function consultarUsuarios()
        {
            $rows = null;
            $modelo = new Conexion();
            $conexion = $modelo->getConexion();
            $query = "SELECT user_var, user_name, ape_pat, ape_mat, user_rol, user_pass FROM USERS";
            $statement = $conexion->prepare($query);
            $statement->execute();

            while($result = $statement->fetch())
            {
                $json[] = array(
                    'user_var' => $result['user_var'],
                    'user_name' => $result['user_name'],
                    'ape_pat' => $result['ape_pat'],
                    'ape_mat' => $result['ape_mat'],
                    'user_rol' => $result['user_rol'],
                    'user_pass' => $result['user_pass']
                );
            }
            echo json_encode($json);
        }

        public function buscarUsuario($search)//Busca un producto en específico
        {
            $rows = null;
            $modelo = new Conexion();
            $conexion = $modelo->getConexion();
            $query = "SELECT user_var, user_name, ape_pat, ape_mat, user_rol, user_pass FROM USERS
                        WHERE user_var LIKE '$search%'";
            $statement = $conexion->prepare($query);
            $statement->execute(array($search));

            while($result = $statement->fetch())
            {
                if(!$result) die("Error al buscar: ");
                $json[] = array(
                    'user_var' => $result['user_var'],
                    'user_name' => $result['user_name'],
                    'ape_pat' => $result['ape_pat'],
                    'ape_mat' => $result['ape_mat'],
                    'user_rol' => $result['user_rol'],
                    'user_pass' => $result['user_pass']
                );
            }


            echo json_encode($json);
        }


        public function consultarSucursales()
        {
            $rows = null;
            $modelo = new Conexion();
            $conexion = $modelo->getConexion();
            $query = "SELECT clave_suc, nombre, direccion FROM sucursal";
            $statement = $conexion->prepare($query);
            $statement->execute();

            while($result = $statement->fetch())
            {
                $json[] = array(
                    'clave_suc' => $result['clave_suc'],
                    'nombre' => $result['nombre'],
                    'direccion' => $result['direccion'],
                );
            }
            echo json_encode($json);
        }

        public function buscarSucursal($search)//Busca un producto en específico
        {
            $rows = null;
            $modelo = new Conexion();
            $conexion = $modelo->getConexion();
            $query = "SELECT clave_suc, nombre, direccion FROM sucursal
                        WHERE clave_suc LIKE '$search%'";
            $statement = $conexion->prepare($query);
            $statement->execute(array($search));

            while($result = $statement->fetch())
            {
                if(!$result) die("Error al buscar: ");
                $json[] = array(
                    'clave_suc' => $result['clave_suc'],
                    'nombre' => $result['nombre'],
                    'direccion' => $result['direccion'],
                );
            }


            echo json_encode($json);
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
