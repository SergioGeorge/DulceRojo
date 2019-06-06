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
    <title>Generar Orden</title>
</head>
<body>

    <div class="padre">
        <header>
                <div class = "titulo">
                    <img src="../img/logo.png" alt="">
                    <h1>Sistema de control de inventario</h1>
                </div>
        </header>

        <div class = "titulo">
            <h2 class="">Generar Orden</h2>
        </div>
        <div class = "titulo">
            <h6>Descripción de activdad</h6>
        </div>

            <form action="" class="">
              <div class="col col-lg-12">
                <div class="form-group row justify-content-center" align= "center">
                    <label for="cantidad" class="col-3" >Cantidad</label>
                    <div class="col-4">
                        <input type="text"  placeholder="cantidad" id="cantidad" class="form-control" >
                    </div>
                   <!-- <input type="button" name="" class="btn btn-outline-danger btn-lg" onclick="agregarProd()" value="Agregar">-->
                </div>

                <div class="form-group row justify-content-center" align= "center">
                    <label for="no_orden" class="col-3" >No de Orden</label>
                    <div class="col-4">
                        <input type="text"  placeholder="No orden" id="no_orden" class="form-control" >
                    </div>
                    <!--<input type="button" name="" class="btn btn-outline-danger btn-lg" onclick="agregarProd()" value="Agregar">-->
                </div>

                <div class="form-group row justify-content-center" align= "center">
                    <label for="id_pastel" class="col-3" >Clave Producto</label>
                    <div class="col-4">
                        <input type="text"  placeholder="clave del producto" id="id_pastel" class="form-control" >
                    </div>
                    <input type="button" name="" class="btn btn-outline-danger btn-lg" onclick="agregarProd()" value="Agregar">
                </div>

            </div>


            <div class="row justify-content-center">
                <div class="col-10 col-form-label">

                    <!--TABLA PARA DATOS PBP-->
                    <table class="table table-striped" id="table-entrada">
                        <thead class="thead-dark">
                            <tr>
                                <th>Cantidad</th>
                                <th>No Orden</th>
                                <th>Clave del producto</th>
                                <th>Borrar</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-entrada">
                            <tr>

                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="form-group row justify-content-center" align="center">
                <div class="col-10">
                    <button  class="btn btn-outline-danger btn-lg" >Guardar Orden</button>
                    <?php
                        $direccionarA = 'menuMaster.php'; 
                        $direccionarB = 'menuUser.php';
                        if(strcmp($_SESSION['rol'], "Admin") == 0)
                            echo "<a href='$direccionarA' class='btn btn-outline-danger btn-lg'>Regresar</a>";
                        else
                            echo "<a href='$direccionarB' class='btn btn-outline-danger btn-lg'>Regresar</a>";
                    ?>
                    <!--<a href="menuMaster.php" class="btn btn-outline-danger btn-lg">Regresar</a>-->
                </div>
            </div>
          </form>


          <?php
        if(isset($_SESSION['user'])){
            //echo "Sesión Exitosa Bienvenido";
        }else{
            session_destroy();
            header("Location: ../view/Login.php");
        }	
    ?>

        <link rel="stylesheet" type="text/css" href="../estilos/estilo_sucursal.css">
        <!-- <link rel="stylesheet" type="text/css" href="../estilos/estilo_almacen.css"> -->
        <link rel="stylesheet" href="../frameworks/bootstrap.min.css">
        <script src="../frameworks/jquery-3.3.1.min.js"></script>
        <script src="../scripts-js/GenerarOrden.js"></script>
    </div>
</body>
</html>