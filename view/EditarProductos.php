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
    <title>Agregar Productos</title>
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
        
        <div class="presentMain">                
            <h3 style="font-size:30px">Editar Productos</h3>                
        </div>
    
        <form class="" method="POST" style="width:90%; margin-top:40px;">
            <div class="form-group row">
                <label for="claveP" class="col-3" >Clave del producto</label>
                <div class="col-4">
                    <input type="text" name="clave" id="claveP" class="form-control" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="descripcionP" class="col-3" >Nombre del producto</label>
                <div class="col-4">
                    <input type="text" name="nombre" id="descripcionP" class="form-control" placeholder="Nombre del producto" required>
                </div>
            </div>

            <div class="form-inline row">
                <label for="precioP" class="col-3">Precio del producto</label>
                <div class="col-3 col-sm-3 input-group">                
                    <input type="number" min="0" max="999" name="precio" id="precioP_entero" class="form-control" placeholder="$000" required>
                    <span class="input-group-addon"></span>                    
                    <input type="number" min="0" max="99" name="precio" id="precioP_decimal" class="form-control mr-3" placeholder=".00" required>                
                </div>
            </div>

            <div class="form-group row form-inline mt-3">
                <label for="unidad_medidaP" class="col-3">Unidad de Medida</label>
                <select id="unidad_medidaP" class="form-control custom-select ml-3 mr-3" style="width:200px">
                    <option value="Pza">Pza</option>
                    <option value="Caja">Caja</option>
                </select>
            </div>
            <div class="form-group row">
                <label for="familiaP" class="col-3">Familia</label>
                <div class="col-4">
                    <input type="text" name="familia" id="familiaP" class="form-control" placeholder="Familia" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="subFamiliaP" class="col-3">Sub familia</label>
                <div class="col-4">
                    <input type="text" name="subfamilia" id="subFamiliaP" class="form-control" placeholder="Subfamilia" required>
                </div>
            </div>
            <div class="form-group row">

                <div class="col-10">
                    <input type="submit" class="btn btn-outline-danger btn-lg" value="Actualizar">                 
                    <a href="ListaProductos.php" class="btn btn-outline-danger btn-lg">Regresar</a>
                    <br><br>
                    <!-- <a href="ListaProductos.html"><img src="../img/regresar.png" width="40" height="40" class="imglogo"></a> -->
                </div>
            </div>
        </form>        
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../estilos/estilo_sucursal.css">
    <link rel="stylesheet" type="text/css" href="../estilos/menuUser.css">
    <!-- <link rel="stylesheet" type="text/css" href="../estilos/estilo_login.css"> -->
    <link rel="stylesheet" type="text/css" href="../frameworks/bootstrap.min.css">
    <script src="../frameworks/jquery-3.3.1.min.js"></script>
    <script src="../scripts-js/EditarProductos.js"></script>
</body>
</html>
