<?php
    require_once('../model/Conexion.php');
    require_once('../model/TransaccionUsuario.php');
    require_once('../controller/UserSession.php');

    $sesion = new UserSession();
    $transaccionUsuario = new TransaccionUsuario();

    if(isset($_SESSION['user']))
    {   
        $sesion->closeSession();
        header('Location: ../view/Login.php');
    }else{
        if(isset($_POST['usuario']) && isset($_POST['password']))//Inicio de Sesión
        {
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            
            if($transaccionUsuario->buscarUsuario($usuario, $password))
            {
                $sesion->establecerSesion($usuario);
                $transaccionUsuario->setUsuario($password);
                header('Location: ../view/menuMaster.php');
            }
            else//Error al ingresar las credenciales            
                header('Location: ../view/Login.php');            
        }
    }
    
?>