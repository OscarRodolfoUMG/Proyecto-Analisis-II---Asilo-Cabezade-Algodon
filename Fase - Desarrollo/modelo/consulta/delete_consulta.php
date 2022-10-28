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
	<?php include "../../estilos/s_consulta.php" ?>

	<title>Consulta</title>


</head>
<body>
	
	<div class="head">
		<h1>Asilo de Algodon Ventana Consulta</h1><a class="cerrar" href="../../controlador/cerrarsesion.php">Cerrar Sesion</a>
	</div>
	<div class="intername">
		<h2>Bienvenido <?php echo $_SESSION['usuario'];?> </h2>
	</div>

	<ul class="menu">
        <li><a class="nav_sol" 			href="fichas_consulta.php">Fichas Consulta</a></li>
        <li><a class="nav_fichas" 		href="diagnostico_consulta.php">Diagnostico</a></li>
    </ul>

	<div class="container">
		<h3>Eliminar Consulta</h3>
		
		<?php 
			$varIdFicha = $_REQUEST['idFicha'];
			$varIdConsulta = $_REQUEST['idConsulta'];

			$mysql_host = 'mysql8001.site4now.net';    #direccion del sitio por smarasp.net
			$mysql_user = 'a8caee_oscarum';            #nombre de usuario para login phpmyadmin
			$mysql_pass = 'Zanahoria@77';              #contraseña para el login de phpmyadmin
			$mysql_db = 'db_a8caee_oscarum';           #nombre de la base de datos

			#variable para establecer la conexion con la base de datos
			$conexionDB = mysqli_connect ($mysql_host, $mysql_user, $mysql_pass, $mysql_db)
			or  die("No se conecto a la DB"); #mensaje en caso no conecte

			$query1 = 'delete from consulta where idConsulta = "'.$varIdConsulta.'" AND idFicha = "'.$varIdFicha.'"';

			$resultado = mysqli_query ($conexionDB, $query1);
			$error_message = mysqli_error($conexionDB);
				
			echo '<h4 class="correcto">La Consulta Fue Eliminada con Exito</h4>';
			

			mysqli_close($conexionDB);  

		?>
	</div>

	<div class="foot">
		© Rodolfo Chávez
	</div>

</body>
</html>