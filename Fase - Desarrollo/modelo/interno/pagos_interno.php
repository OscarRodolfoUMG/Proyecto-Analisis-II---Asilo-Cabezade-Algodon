<!DOCTYPE html>
<html>
<head>
	<?php
		session_start();
		//echo "Nombre de usuario: ".$_SESSION['usuario'];

		if (!isset($_SESSION['usuario'])){
		    header('location: ../../home.php');
		}
	?>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" href="../../img/icono.jpg" />
	<?php include "../../estilos/s_interno.php" ?>

	<title>Inicio - Interno</title>


</head>
<body>
	
	<div class="head">
		<h1>Asilo de Algodon Ventana Interno</h1><a class="cerrar" href="../../controlador/cerrarsesion.php">Cerrar Sesion</a>
	</div>
	<div class="intername">
		<h2>Bienvenido <?php echo $_SESSION['usuario']; ?> </h2>
	</div>

	<ul class="menu">
        <li><a class="nav_fichas" href="fichas_interno.php">Fichas Medicas</a></li>
        <li><a class="nav_datos" href="datos_interno.php">Datos</a></li>
        <li><a class="nav_cuenta" href="cuenta_interno.php">Cuenta</a></li>
    </ul>

	<div class="container">

		<h3>Pagos Mensualidades</h3>

		<div class="subcontainer pagos">

		<form action = "add_pagos_interno.php" method ="post">
			<select class="linear sle3" name="mes" required>
				<option value="">Mes a Pagar</option>
				<option value="enero">Enero</option>
				<option value="febrero">Febrero</option>
				<option value="marzo">Marzo</option>
				<option value="abril">Abril</option>
				<option value="mayo">Mayo</option>
				<option value="junio">Junio</option>
				<option value="julio">Julio</option>
				<option value="agosto">Agosto</option>
				<option value="septiembre">Septiembre</option>
				<option value="octubre">Octubre</option>
				<option value="noviembre">Noviembre</option>
				<option value="diciembre">Diciembre</option>
			</select>

			<h4>Nombre Tarjeta</h4>
	        <input required class="control" type="text" name="nombres" value="" placeholder=" Nombre Tarjeta" autocomplete="off">

	        <h4>Numero de Tarjeta</h4>
	        <input required class="control" type="text" name="tarjeta" value="" placeholder=" Numero de Tarjeta" autocomplete="off">

	        <h4>Codigo de Seguridad</h4>
	        <input required class="control small" type="password" name="num" value="" placeholder=" Codigo de Seguridad" autocomplete="off">

	        <h4>Cantidad</h4>
	        <input required class="control small" type="number" step="0.01" name="monto" value="" placeholder=" (Q.)" autocomplete="off">
			
			<input class="btn linear guardar linbtn" type="submit" name="enviarPago" value="Realizar Pago">
		</form>
		</div>

		<div class="subcontainer">
			<div class="botones">
				<input class="btn reset" onclick="history.back()" type="reset" name="" value="Regresar">
			</div>
		</div>


	</div>

	<div class="foot">
		© Rodolfo Chávez
	</div>

</body>
</html>