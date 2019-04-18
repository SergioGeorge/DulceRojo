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
    <title>Menu</title>
		<link rel="stylesheet" type="text/css" href="../estilos/estilo_sucursal.css">
    <link rel="stylesheet" type="text/css" href="../estilos/menuUser.css">
    <link rel="stylesheet" href="../frameworks/bootstrap.min.css">
</head>
<body>
    <div class="padre">
        <header>
            <div class = "titulo">
                <img src="../img/logo.png" alt="">
				<h1>Sistema de control de inventario</h1>
				
			</div>
			<div class="mr-3" style="text-align: right;">
				<p class="text-light"><?php echo "Bienvenido " . $_SESSION['user']?></p>
			</div>
        </header>
        <div id="presentMain">
			<h2>Bienvenido al sistema de control de inventario de la pastelería Dulce Rojo.</h2>
		</div>

		<div id="menutable">
			<div id="daspage">
				<a href="Agregarproductos.html"><img src="../img/pastelproducto.png" class="imglogo"></a>
				<div class="refmenutext">
					<!--	<a href="Agregarproductos.html">Productos</a>-->
				<a href="ListaProductos.html">Productos</a>
				</div>
			</div>
			<div id="reportspage">
				<a href="ListaProductos.html"><img src="../img/control-inventario.png" class="imglogo"></a>
				<div class="refmenutext">
					<a href="Reportes/listReports.html">Control del producto</a>
				</div>
			</div>
			<div id="reportspage">
				<a href="GenerarOrden.html"><img src="../img/orden-entrega.png" class="imglogo"></a>
				<div class="refmenutext">
					<!--<a href="Reportes/listReports.html">Ordenes de entrega</a>-->
					<a href="GenerarOrden.html">Ordenes de entrega</a>
				</div>
			</div>
			<div id="reportspage">
				<a href="AgregarSucursal.html"><img src="../img/sucursal-icono.png" class="imglogo"></a>
				<div class="refmenutext">
				<!--	<a href="Reportes/listReports.html">Sucursales</a>-->
					<a href="ListaSucursal.html">Sucursales</a>
				</div>
			</div>
			<div id="reportspage">
				<a href="AgregarUsuario.html"><img src="../img/usuario.png" class="imglogo"></a>
				<div class="refmenutext">
					<!--<a href="Reportes/listReports.html">Usuarios</a>-->
					<a href="ListaUsuarios.html">Usuarios</a>
				</div>
			</div>
			<div id="reportspage">
				<a href="../controller/ControllerLogin.php" id="logoutID"><img src="../img/logout-icon.png" class="imglogo"></a>
				<div class="refmenutext">
					<!--<a href="Reportes/listReports.html">Logout</a>-->
				<a href="../controller/ControllerLogin.php">Logout</a>
				</div>
			</div>
		</div>

		<?php
			if(isset($_SESSION['user'])){
				echo "Sesión Exitosa Bienvenido";
			}else{
				session_destroy();
				header("Location: ../view/Login.php");
			}	
		?>
    </div>
</body>
</html>
