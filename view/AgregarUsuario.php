<?php 
	session_start(); 
    if(!isset($_SESSION['user'])){ 
		session_destroy();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agregar Usuario</title>
</head>
<body>

    <div class="padre">
        <header>
            <div class = "titulo">
                <img src="../img/logo.png" alt="">
                <h1>Sistema de control de inventario</h1>
            </div>
            <div class="mr-3" style="text-align: right;">
                <p class="text-light"><?php echo "Bienvenido " . $_SESSION['user'] . "  " . $_SESSION['rol']?></p>
            </div>
        </header>

        <div class = "row justify-content-center mt-4 mb-4">
            <div class = "col-5">
                <h2>Agregar Usuario</h2>
            </div>
        </div>

        <form action="" class="">
            <div class="form-group row" align= "center">
                <label for="User" class="col-3" >Usuario</label>
                <div class="col-4">
                    <input type="text"  placeholder="Ingresa Usuario" id="user" class="form-control" required>
                </div>
            </div>
            <div class="form-group row " align="center">
                <label for="Nombre" class="col-3" >Nombre</label>
                <div class="col-4">
                    <input type="text" id="name" class="form-control" placeholder="Ingresa el nombre de usuario" required>
                </div>
            </div>
            <div class="form-group row" align="center">
                <label for="ApellidoP" class="col-3">Apellido Paterno</label>
                <div class="col-4">
                    <input type="text" id="apellidoP" class="form-control" placeholder="Ingresa apellido paterno" required>
                </div>
            </div>
            <div class="form-group row" align="center">
                <label for="ApellidoM" class="col-3">Apellido Materno</label>
                <div class="col-4">
                    <input type="text" id="apellidoM" class="form-control" placeholder="Ingresa apellido materno" required>
                </div>
            </div>
            <div class="form-group row" align="center">
                <label for="Rol" class="col-3">Permisos/Rol</label>
                <div class="col-4">
                    <input type="text" id="user_Rol" class="form-control" placeholder="Ingresa los permisos del usuario" required>
                </div>
            </div>
            <div class="form-group row" align="center">
                <label for="Password" class="col-3">Password</label>
                <div class="col-4">
                    <input type="text" id="user_password" class="form-control" placeholder="Ingresa el Password" required>
                </div>
            </div>
            <div class="form-group row" align="center">
                <div class="col-11">
                    <button type="submit" class="btn btn-outline-danger btn-lg" >Guardar</button>
                    <button type="reset" class="btn btn-outline-danger btn-lg">Limpiar</button>
                    <a href="ListaUsuarios.php" class="btn btn-outline-danger btn-lg">Regresar</a>
                </div>
            </div>
        </form>
    </div>
        <?php
			if(isset($_SESSION['user'])){
				//echo "Sesión Exitosa Bienvenido";
			}else{
				session_destroy();
				header("Location: ../view/Login.php");
			}	
		?>
    <link rel="stylesheet" type="text/css" href="../estilos/estilo_sucursal.css">
    <link rel="stylesheet" type="text/css" href="../estilos/estilo_login.css">
    <link rel="stylesheet" href="../frameworks/bootstrap.min.css">
    <script src="../frameworks/jquery-3.3.1.min.js"></script>
    <script src="../scripts-js/AgregarUsuario.js"></script>
</body>
</html>
