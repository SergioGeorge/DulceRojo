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
    <title>Agregar Sucursal</title>
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

        <div class = "row justify-content-center mt-4s mb-4">
            <div class = "col-3">
                <h2>Agregar Sucursal</h2>
            </div>
        </div>
        <form action="" class="">
            <div class="form-group row" align= "center">
                <label for="ClaveS" class="col-3" >Clave de la sucursal</label>
                <div class="col-4">
                    <input type="text"  placeholder="Clave de la sucursal" id="ClaveS" class="form-control" required>
                </div>
            </div>
            <div class="form-group row " align="center">
                <label for="NombreS" class="col-3" >Nombre de la sucursal</label>
                <div class="col-4">
                    <input type="text" id="NombreS" class="form-control" placeholder="Nombre de la sucursal" required>
                </div>
            </div>
            <div class="form-group row" align="center">
                <label for="DireccionS" class="col-3">Dirección de la sucursal</label>
                <div class="col-4">
                    <input type="text" id="DireccionS" class="form-control" placeholder="Dirección de la sucursal" required>
                </div>
            </div>
            <div class="form-group row" align="center">
                <div class="col-10">
                    <button  class="btn btn-outline-danger btn-lg" >Guardar</button>
                    <button type="reset" class="btn btn-outline-danger btn-lg">Limpiar</button>
                    <a href="ListaSucursal.php" class="btn btn-outline-danger btn-lg">Regresar</a>
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
    <!-- <link rel="stylesheet" type="text/css" href="../estilos/estilo_login.css"> -->
    <link rel="stylesheet" type="text/css" href="../frameworks/bootstrap.min.css">
    <script src="../frameworks/jquery-3.3.1.min.js"></script>
    <script src="../scripts-js/AgregarSucursal.js"></script>
    <link rel="stylesheet" type="text/css" href="../estilos/estilo_sucursal.css">
</body>
</html>
