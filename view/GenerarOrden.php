<?php 
	session_start(); 
    if(!isset($_SESSION['user'])){ 
        session_destroy();
        header("Location: ../view/Login.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Generar Orden</title>
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
        <div class = "row ml-5 mb-4 mt-3">
            <div class = "col-3">
                <h2>Generar Orden</h2>
                <h6><i>Descripcion de la actividad</i></h6>
            </div>
        </div>
        <form action="" class="ml-5">
            <div class="form-group row" align= "center">
                <label for="NoOrden" class="col-1" >No. de Orden</label>
                <div class="col-4">
                    <input type="text"  placeholder="Ingresa No. de orden" id="NoOrden" class="form-control" required>
                </div>
            </div>
            <div class="form-group row " align="center">
                <label for="ClaveP" class="col-1" >Clave del Producto</label>
                <div class="col-4">
                    <input type="text" id="ClaveP" class="form-control" placeholder="Ingresa clave del producto" required>
                </div>
            </div>
            <div class="form-group row" align="center">
                <label for="CantidadP" class="col-1">Cantidad del Producto</label>
                <div class="col-4">
                    <input type="text" id="CantidadP" class="form-control" placeholder="Ingresa cantidad del producto" required>
                </div>
            </div>
            <table class="col-5">
                <tr>
                    <td><strong>Clave del producto</strong></td>
                    <td><strong>Nombre del producto</strong></td>
                    <td><strong>Cantidad</strong></td>
                    <td><strong>Borrar</strong></td>
                </tr>
                <tr>
                    <td>123419030801</td>
                    <td>Pastel arcoiris</td>
                    <td>5</td>
                    <td><button type="submit" class="btn btn-primary">Borrar</button></td>
                    </tr>
                    <tr>
                    <td>123419030801</td>
                    <td>Pastel de chocolate</td>
                    <td>3</td>
                    <td><button type="submit" class="btn btn-primary">Borrar</button></td>
                </tr>
            </table>
            <br><br>
            <div class="form-group row" align="center">
                <div class="col-10">
                    <button type="submit" class="btn btn-outline-danger btn-lg" >Guardar orden</button>
                    <button type="reset" class="btn btn-outline-danger btn-lg" >Cancelar</button>
                    <!--<a href="menuMaster.html"><img src="../img/regresar.png" width="60" height="60" class="imglogo"></a>-->
             <a href="menuMaster.php" class="btn btn-outline-danger btn-lg">Regresar</a>
                </div>
            </div>
        </form>
    </div>
    <link rel="stylesheet" type="text/css" href="../estilos/estilo_login.css">
    <link rel="stylesheet" type="text/css" href="../estilos/estilo_sucursal.css">
    <link rel="stylesheet" href="../frameworks/bootstrap.min.css">
    <script src="../frameworks/jquery-3.3.1.min.js"></script>
</body>
</html>
