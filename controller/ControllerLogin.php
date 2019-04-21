<?php
    require_once('../model/Conexion.php');
    require_once('../model/TransaccionUsuario.php');

    $transaccionUsuario = new TransaccionUsuario();
    
    session_start();
    if(isset($_SESSION['user']))//Se entra a esta condición cuando nos encontramos en el menuMaster/User y 
    {   
        session_unset($_SESSION['user']);
        session_unset($_SESSION['rol']);
        session_destroy();
        header('Location: ../view/Login.php');
    }else{
        if(isset($_POST['usuario']) && isset($_POST['password']))//Inicio de Sesión
        {
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            
            if($transaccionUsuario->buscarUsuario($usuario, $password))
            {        
                $rol = $transaccionUsuario->buscarRol($usuario);
                $_SESSION['user'] = $usuario;
                $_SESSION['rol'] = $rol;

                if(strcmp($_SESSION['rol'], "Admin") == 0)
                    header('Location: ../view/menuMaster.php');
                else
                    header('Location: ../view/menuUser.php');
            }
            else//Error al ingresar las credenciales  
                echo "Usuario/Password Incorrectos..";          
                //header('Location: ../view/Login.php');            
        }
    }
    
?>