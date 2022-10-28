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

		<h3>Datos Interno</h3>
		

		<?php 
			$varUser = $_SESSION['usuario'];

			$mysql_host = 'mysql8001.site4now.net';    #direccion del sitio por smarasp.net
			$mysql_user = 'a8caee_oscarum';            #nombre de usuario para login phpmyadmin
			$mysql_pass = 'Zanahoria@77';              #contraseña para el login de phpmyadmin
			$mysql_db = 'db_a8caee_oscarum';           #nombre de la base de datos

			#variable para establecer la conexion con la base de datos
			$conexionDB = mysqli_connect ($mysql_host, $mysql_user, $mysql_pass, $mysql_db)
			or  die("No se conecto a la DB"); #mensaje en caso no conecte

			$query1 = 'select username, nombres, apellidos from usuario where username = "'.$varUser.'"';

			$resultado = mysqli_query ($conexionDB, $query1);
			$error_message = mysqli_error($conexionDB);

			while ($row = mysqli_fetch_assoc($resultado)){ 
					$varUsuario = $row['username'];
					$varNombres = $row['nombres'];
					$varApellidos = $row['apellidos'];
			}



			echo '<form action = "upp_datos_interno.php" method ="post">

			
			<h5>Usuario:</h5> 
			<input readonly class="block" type="text" name="username" value="'.$varUsuario.'">

			<h5>Nombres:</h5> 
			<input readonly class="block" type="text" name="nombres" value="'.$varNombres.'">

			<h5>Apellidos:</h5> 
			<input readonly class="block" type="text" name="nombres" value="'.$varApellidos.'">
			</form>
			';

			mysqli_close($conexionDB);


		?>
		<h3>Cambiar Contraseña</h3> 

		<form action = "upp_pass_interno.php" method ="post">
		<h5>Constraseña Actual</h5>
	    <input required class="control" type="password" name="pass" value="" placeholder=" Contraseña Actual">
		<h5>Nueva Constraseña</h5>
	    <input required class="control" type="password" name="nPass1" value="" placeholder="Nueva Contraseña">
	    <h5>Repetir  Contraseña</h5>
	    <input required class="control" type="password" name="nPass2" value="" placeholder=" Repetir Contraseña">
	    <div class="subcontainer">
			<div class="botones">
				<input class="btn guardar" type="submit" name="" value="Cambiar Contraseña">
			</div>
		</div>

		</form>

	</div>

	<div class="foot">
		© Rodolfo Chávez
	</div>

</body>
</html>