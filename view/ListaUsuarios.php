<?php 
	session_start(); 
    if(!isset($_SESSION['user'])){ 
		session_destroy();
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Usuarios</title>
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
            <h2>Usuarios</h2>
        </div>

            <form action="" class="">
              <div class="col col-lg-12">
                <div class="form-group row justify-content-center" align= "center">
                    <label for="ClaveP" class="col-3" >Buscar por user</label>
                    <div class="col-4">
                        <input type="text"  placeholder="Ingresa el user" id="user_var" class="form-control" required>
                    </div>
                    <input type="button" name="" class="btn btn-outline-danger btn-lg" onclick="agregarProd()" value="Buscar">
                </div>


            </form>
            </div>
            <div class="row justify-content-center">
                <div class="col-10 col-form-label">

                    <!--TABLA PARA DATOS PBP-->
                    <table class="table table-striped" id="table-entrada">
                        <thead class="thead-dark">
                            <tr>
                                <th>Usuario</th>
                                <th>Nombre</th>
                                <th>Ape. Pat</th>
                                <th>Ape. Mat</th>
                                <th>Rol</th>
                                <th>Password</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-entrada">

                        </tbody>
                    </table>
                </div>

            </div>
            <div class="form-group row justify-content-center" align="center">
                <div class="col-10">
                    <button class="btn btn-outline-danger btn-lg" id="consultar" >Consultar</button>
                    <a href="menuMaster.php" class="btn btn-outline-danger btn-lg">Regresar</a>
                    <br><br>
                    <a href="AgregarUsuario.php"><img src="../img/agregar.png" width="100" height="100" class="imglogo"></a>
                </div>
            </div>
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
    <link rel="stylesheet" href="../frameworks/bootstrap.min.css">
    <script src="../frameworks/jquery-3.3.1.min.js"></script>
     <script src="../scripts-js/ConsultarListaUsuario.js" type="text/javascript"></script>
</body>
</html>
