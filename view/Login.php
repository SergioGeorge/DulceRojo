<?php 
    session_start(); 
    if(isset($_SESSION['user'])){ 
        header("Location: ../view/menuMaster.php"); 
    } else    
        session_destroy(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
    <div class="padre">
        <div class="row justify-content-start color_rojo pl-5 pb-2 pt-2">
            <img src="../img/logo.png" alt="">
            <h1>Sistema de control de inventario</h1>               
        </div>
                
        <div class="formulario mr-5 mt-5 justify-content-center">
            <form action="../controller/ControllerLogin.php" class="col-5 form-group" method="POST">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                    <input id="usuario" type="text" class="form-control" name="usuario" placeholder="Usuario" required>
                </div>
        
                <div class="input-group">
                    <!-- <label for="password" class="col-2">Contraseña</label> -->
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                        <input type="password" id="password" class="form-control" name="password" placeholder="Contraseña" required>
                    </div>                    
                </div>
                <div class="input-group botoncin">    
                    <!-- <input type="submit" class="btn-primary form-control b1" value="Iniciar Sesión">-->
                    <button type="submit" class="form-control btn-primary"><i class="fas fa-sign-in-alt"></i> Login</button>
                </div>      
            </form>           
        </div>
    </div>
    <link rel="stylesheet" type="text/css" href="../estilos/estilo_login.css">
    <link rel="stylesheet" href="../frameworks/bootstrap.min.css">
    <script src="../frameworks/jquery-3.3.1.min.js"></script>
</body>
</html>