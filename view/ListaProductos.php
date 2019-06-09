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
    <title>Productos de la pastelería</title>
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

        <div class = "titulo mb-3">
            <h2>Productos de la pastelería</h2>
        </div>

            <form action="" class="">
              <div class="col col-lg-12">
                <div class="form-group row justify-content-center">
                    <div class="col-4">
                        <input type="text"  placeholder="Ingresa la clave del producto" id="CodigoB" class="form-control" required>
                    </div>
                    <input type="button" name="" class="btn btn-outline-danger btn-lg" onclick="limpiar()" value="Limpiar">
                </div>


            </form>
            </div>
            <div class="row justify-content-center" style="width:100%;">
                <div class="col-10 col-form-label">

                    <!--TABLA PARA DATOS PBP-->
                    <table class="table table-striped" id="table-entrada">
                        <thead class="thead-dark">
                            <tr>
                                <th>Clave</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Unidad de medida</th>
                                <th>Familia</th>
                                <th>Subfamilia</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-entrada">

                        </tbody>
                    </table>
                </div>

            </div>
            <div class="form-group row justify-content-center" align="center" style="width:100%;">
                <div class="col-10">
                    <button class="btn btn-outline-danger btn-lg" id="bConsultar">Consultar</button>
                    <?php
                        $direccionarA = 'menuMaster.php'; 
                        $direccionarB = 'menuUser.php';
                        if(strcmp($_SESSION['rol'], "Admin") == 0)
                            echo "<a href='$direccionarA' class='btn btn-outline-danger btn-lg'>Regresar</a>";
                        else
                            echo "<a href='$direccionarB' class='btn btn-outline-danger btn-lg'>Regresar</a>";
                    ?>
                    
                    <!--<a href="menuMaster.html"><img src="../img/regresar.png" width="60" height="60" class="imglogo"></a>-->
                    <br><br>
                    <a href="AgregarProductos.php"><img src="../img/agregar.png" width="100" height="100" class="imglogo"></a>
                    
                </div>
            </div>
    </div>
    <link rel="stylesheet" type="text/css" href="../estilos/estilo_sucursal.css">
    <link rel="stylesheet" href="../frameworks/bootstrap.min.css">
    <script src="../frameworks/jquery-3.3.1.min.js"></script>
     <script src="../scripts-js/ConsultarListaProducto.js" type="text/javascript"></script>
     <?php
        if(isset($_SESSION['user'])){
            //echo "Sesión Exitosa Bienvenido";
        }else{
            session_destroy();
            header("Location: ../view/Login.php");
        }	
    ?>
</body>
</html>
