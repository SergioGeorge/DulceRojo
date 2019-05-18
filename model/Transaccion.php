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
                $query="SELECT clave_pastel FROM lista_pastel WHERE clave_pastel=$codigo";

                  $con=mysqli_connect("localhost","root","");
                  mysqli_select_db($con,"dulce_rojo2");
                //$statement = $conexion->prepare($query);
                //$statement->execute();
                //$query="0";

                $query = mysqli_num_rows(mysqli_query($con,"SELECT clave_pastel FROM lista_pastel WHERE clave_pastel='$codigo'"));
                if($query==0){
                echo 'El producto no existe';
                }
                else {
                  $sql  = "INSERT INTO producto (id_pastel,codigo_barras,estado,fecha_elaboracion)
                      VALUES(:id_pastel,:codigo_barras,:estado,:fecha_elaboracion)";
                  $statement = $conexion->prepare($sql);
                  $statement->bindParam(':id_pastel', $clave);
                  $statement->bindParam(':codigo_barras', $codigo);
                  $statement->bindParam(':estado', $estado);
                  $statement->bindParam(':fecha_elaboracion', $fecha);

                  $statement->execute();
                  return 1;//Regresa 1 si el registro se ingreso correctamente
                }

            }
            catch(Exception $e){
                return 0;////Regresa 0 si existe algún error
            }
        }

        public function checarNombre($codigo)
        {

          $con=mysqli_connect("localhost","root","");
          mysqli_select_db($con,"dulce_rojo2");

          $nombre = mysqli_query($con,"SELECT descripcion FROM lista_pastel WHERE clave_pastel='$codigo'");
          if (mysqli_num_rows($nombre) > 0) {
            while($row = mysqli_fetch_assoc($nombre)) {
                  return $row["descripcion"];
            }

          }
        }

        public function getNameProduct($codigo)
        {
            $rows = null;
            $modelo = new Conexion();
            $conexion = $modelo->getConexion();
            $query = "SELECT descripcion FROM LISTA_PASTEL WHERE clave_pastel='$codigo'";
            $statement = $conexion->prepare($query);
            $statement->execute();

            while($result = $statement->fetch())
            {
                $json[] = array(
                    'descripcion' => $result['descripcion']
                );
            }
            echo json_encode($json);
        }

        public function getNoOrden($no_Orden)
        {
            $rows = null;
            $modelo = new Conexion();
            $conexion = $modelo->getConexion();
            $query = "SELECT clave_pastel FROM DETALLE_ORDEN WHERE no_orden='$no_Orden'";
            $statement = $conexion->prepare($query);
            $statement->execute();

            while($result = $statement->fetch())
            {
                $json[] = array(
                    'clave_pastel' => $result['clave_pastel']
                );
            }
            echo json_encode($json);
        }

        public function updateInvent($codBar, $estado)
        {
            $modelo = new Conexion();//Creamos una conexión con la BD
            $conexion = $modelo->getConexion();//Obtenemos la conexión

            if(!$conexion)//Si la conexión no se establece, se muestra mensaje de error
                echo "Error en la conexión_";

            try{
                $sql  = "UPDATE PRODUCTO SET estado = :estado WHERE codigo_barras = :codBar";
                $statement = $conexion->prepare($sql);
                $statement->bindParam(':estado', $estado);
                $statement->bindParam(':codBar', $codBar);

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


        public function consultarInventario()
        {
            $rows = null;
            $modelo = new Conexion();
            $conexion = $modelo->getConexion();
            $query = "SELECT id_pastel, codigo_barras, estado, fecha_elaboracion FROM INVENTARIO";
            $statement = $conexion->prepare($query);
            $statement->execute();

            while($result = $statement->fetch())
            {
                $json[] = array(
                    'id_pastel' => $result['id_pastel'],
                    'codigo_barras' => $result['codigo_barras'],
                    'estado' => $result['estado'],
                    'fecha_elaboracion' => $result['fecha_elaboracion'],
                );
            }
            echo json_encode($json);
        }


        public function consultarSucursales()
        {
            $rows = null;
            $modelo = new Conexion();
            $conexion = $modelo->getConexion();
            $query = "SELECT clave_suc, nombre, direccion FROM SUCURSAL";
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
            $valor = 1;//El valor 1 indica que el producto existe, 0 no existe
            $rows = null;
            $modelo = new Conexion();
            $conexion = $modelo->getConexion();
            $query = "SELECT clave_pastel, descripcion, precio, unidad_medida, familia, subfamilia FROM lista_pastel
                        WHERE existe = :existe";
            $statement = $conexion->prepare($query);
            $statement->execute(array('existe' => $valor));

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
                        WHERE clave_pastel LIKE '$search%' AND existe = 1";
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

        public function ocultarProducto($claveProducto){
            $modelo = new Conexion();//Creamos una conexión con la BD
            $conexion = $modelo->getConexion();//Obtenemos la conexión

            if(!$conexion)//Si la conexión no se establece, se muestra mensaje de error
                echo "Error en la conexión_";

            try{
                $valor = 0;//El valor 0 indica que el producto no existe, 1 si existe
                $sql  = "UPDATE lista_pastel SET existe = :existe WHERE id_pastel = :id_pastel";
                $statement = $conexion->prepare($sql);
                $statement->bindParam(':existe', $valor);
                $statement->bindParam(':id_pastel', $claveProducto);

                $statement->execute();
                return 1;//Regresa 1 si el registro se oculto

            }catch(Exception $e){
                return 0;////Regresa 0 si existe algún error
            }
        }

    }

?>
