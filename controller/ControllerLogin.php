<?php
    require_once('../model/Conexion.php');
    require_once('../model/TransaccionUsuario.php');
    require_once('../controller/UserSession.php');

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $sesion = new UserSession();
    $transaccionUsuario = new TransaccionUsuario();

    if(isset($_SESSION['user'])){//La sesión ya ha sido iniciada
        echo "hay Sesión";
    }else if(isset($_POST['usuario']) && isset($_POST['password']))//Inicio de Sesión
    {
        //echo "Validación de Login";
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        
        if($transaccionUsuario->buscarUsuario($usuario, $password))
        {
            //echo "Usuario Validado";
            $sesion->establecerSesion($usuario);
            $transaccionUsuario->setUsuario($password);
            echo 1;
            //header('Location: ../view/AgregarSucursal.php');
        }
        else//Error al ingresar las credenciales
        { 
            //echo "Nombre de Usuario y/ password incorrecto";
            $errorLogin = "Nombre de Usuario y/o password incorrecto";
            echo 0;
            //header('Location: ../view/ListaProductos.html');
        }
    }
    else{
        //echo "Login";
        include_once '../view/GenerarOrden.html';
    }

?>