<?php
    /**
     * Contiene la implementación de la clase conexión, la cuál permite crear y establecer una conexión con la BD
     */
    require_once('../model/Conexion.php');
    /**
     * Contiene la implementación de la clase conexión, la cúal nos ayuda a relizar transacciones o 
     * manipulación en la base datos
     */
    require_once('../model/Transaccion.php');
    /**
     * Variable que almacena la opción que realizará el usuario en la BD
     * Las opciones disponibles son: consultar, buscar, eliminar y editar
     */
    $opcion = $_POST['transaccion'];
    //Se instancia un objeto
    $transaccion = new Transaccion();

    if(strcmp($opcion,"consultar") == 0){//Consulta toda la lista de pasteles disponible del catálogo      
        $respuesta = $transaccion->consultarListaPastel();
        echo json_encode($respuesta);//Envia la respuesta al cliente
    }else if(strcmp($opcion, "buscar") == 0){//Esta opción se ejecuta cuando el usuario hace un typing en el buscador
        $data = $_POST['palabra'];
        $respuesta = $transaccion->buscarProducto($data);//Devuelve un conjunto de registros que coinciden con el argumento de búsqueda
        echo json_encode($respuesta);//Envia la respuesta al cliente
    }
    else if(strcmp($opcion, "eliminar") == 0){//Esta opción se ejecuta cuando el usuario presiona el botón eliminar y confirma 
        $claveProducto = $_POST['registroID'];
        $respuesta = $transaccion->ocultarProducto($claveProducto);//Esta opción se ejecuta cuando el usuario presiona el botón editar
        echo $respuesta;//Envia la respuesta al cliente
    }else if(strcmp($opcion, "buscarClave") == 0){//Busca un pastel por clave
        $clave_pastel = $_POST['clave_pastel'];
        $respuesta = $transaccion->buscarClave($clave_pastel);
        echo json_encode($respuesta);//Envia la respuesta al cliente
    }
    else if(strcmp($opcion, "getLastRegister") == 0){
        $respuesta = $transaccion->getLastRegister();
        echo json_encode($respuesta);
    }
    else if(strcmp($opcion, 'editar')==0){
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $unidad_medida = $_POST['unidad_medida'];
        $familia = $_POST['familia'];
        $subfamilia = $_POST['subfamilia'];
        $clave_pastel = $_POST['clave_pastel'];

        $respuesta = $transaccion->actualizarProducto($descripcion, $precio, $unidad_medida, $familia, $subfamilia, $clave_pastel);
        echo $respuesta;
    }
?>