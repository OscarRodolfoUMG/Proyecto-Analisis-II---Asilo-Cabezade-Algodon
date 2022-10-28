<!DOCTYPE html>
<html>
<head>
	<?php
		session_start();
		//echo "Nombre de usuario: ".$_SESSION['usuario'];

		if (!isset($_SESSION['usuario'])) {
		    header('location: ../../home.php');
		}
	?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" href="../../img/icono.jpg" />
	<?php include "../../estilos/s_fundacion.php" ?>

	<title>Fundacion</title>


</head>
<body>
	
	<div class="head">
		<h1>Asilo de Algodon Ventana Fundación</h1><a class="cerrar" href="../../controlador/cerrarsesion.php">Cerrar Sesion</a>
	</div>
	<div class="intername">
		<h2>Bienvenido <?php echo $_SESSION['usuario']; ?> </h2>
	</div>

	<ul class="menu">
        <li><a class="nav_sol" href="solicitudes_fundacion.php">Solicitudes</a></li>
        <li><a class="nav_fichas" href="fichas_fundacion.php">Fichas Internos</a></li>
        <li><a class="nav_empleados" href="empleados_ver_fundacion.php">Empleados</a></li>
        <li><a class="nav_caja" href="caja_fundacion.php">Caja</a></li>
    </ul>

	<div class="container">

		<h3>Empleados</h3>

		<ul class="sub-menu">
	        <li><a class="sub-nav" href="empleados_ver_fundacion.php">Ver Todos</a></li>
	        <li><a class="sub-nav" href="empleados_add_fundacion.php">Añadir</a></li>
	        <li><a class="sub-nav" href="empleados_borrar_fundacion.php">Borrar</a></li>
    	</ul>

    	
		<form action = "../../controlador/add_empleado.php" method ="post">

			<input required type="text" name="nombres" placeholder="Nombres">
			<input required type="text" name="apellidos" placeholder="Apellidos">
			
			<input required type="text" name="userName" placeholder="Nombre de Usuario">
			<input required type="password" name="contraseña" placeholder="Contraseña">
			<input required type="password" name="contraseña2" placeholder="Repetir contraseña">

			

			<input type="text" name="especialidad" placeholder="Especialidad">

			<select name="puesto" required>
				<option class="opt">Puesto</option>
				<option value="1">Consulta</option>
				<option value="2">Farmacia</option>
				<option value="3">Laboratorio</option>
			</select>
			
			<div class="subcontainer">
				<div class="botones">
					<input class="btn reset" type="reset" name="" value="Borrar">
					
					<input class="btn guardar" type="submit" name="" value="Guardar">
				</div>
			</div>

		</form>

	</div>

	<div class="foot">
		© Rodolfo Chávez
	</div>

</body>
</html>