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
		<h3>Ver Ficha Medica</h3>
		
		<?php 
			$vFicha = $_REQUEST['id'];

			$mysql_host = 'mysql8001.site4now.net';    #direccion del sitio por smarasp.net
			$mysql_user = 'a8caee_oscarum';            #nombre de usuario para login phpmyadmin
			$mysql_pass = 'Zanahoria@77';              #contraseña para el login de phpmyadmin
			$mysql_db = 'db_a8caee_oscarum';           #nombre de la base de datos

			#variable para establecer la conexion con la base de datos
			$conexionDB = mysqli_connect ($mysql_host, $mysql_user, $mysql_pass, $mysql_db)
			or  die("No se conecto a la DB"); #mensaje en caso no conecte

			$query1 = 'select F.idFicha, U.userName, U.nombres, U.apellidos, U.fecha_nac, F.fechaVisita, S.motivo
				from ficha_visita F
				inner join usuario U on U.username = F.username
				inner join solicitud S on F.idSolicitud = S.idSolicitud
				where F.idFicha = '.$vFicha.'
				';

			$resultado = mysqli_query ($conexionDB, $query1);
			$error_message = mysqli_error($conexionDB);
			
			
			function CalculaEdad( $fecha ) {
			    list($Y,$m,$d) = explode("-",$fecha);
			    return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
			}

			while ($row = mysqli_fetch_assoc($resultado)){ 
					$varUserName = $row['userName'];
					$varNombres = $row['nombres'];
					$varApellidos = $row['apellidos'];
					$varFechaNac = $row['fecha_nac'];
					$varFechaVisita = $row['fechaVisita'];
					$varMotivo = $row['motivo'];
			}
			
			echo '<form action = "add_consulta.php" method ="post">

			<h5>ID Ficha:</h5> 
			<input readonly class="block" type="text" name="idFicha" value="'.$vFicha.'">

			<h5>Fecha y Hora para Visita Medica</h5>
			<input readonly class="block" type="datetime-local" name="fechahora" value="'.$varFechaVisita.'">

			<h5>Nombre de Usuario:</h5> 
			<input readonly class="block" type="text" name="userName" value="'.$varUserName.'">

			<h5>Nombres:</h5>
			<input readonly class="block" type="text" name="nombres" value="'.$varNombres.'">

			<h5>Apellidos:</h5>
			<input readonly class="block" type="text" name="apellidos" value="'.$varApellidos.'">

			<h5>Edad:</h5>
			<input readonly class="block" type="text" name="fecha_nac" value="'.CalculaEdad($varFechaNac).'">

			<h5>Motivo</h5>
			<textarea readonly class="blockA" name="motivo">'.$varMotivo.'</textarea>
			

			<div class="subcontainer">
				<div class="botones">
					
					<input class="btn guardar" type="submit" name="" value="Crear Consulta">
				</div>
			</div>

			</form>
			';
			

			mysqli_close($conexionDB);  

		?>
	</div>

	<div class="foot">
		© Rodolfo Chávez
	</div>

</body>
</html>