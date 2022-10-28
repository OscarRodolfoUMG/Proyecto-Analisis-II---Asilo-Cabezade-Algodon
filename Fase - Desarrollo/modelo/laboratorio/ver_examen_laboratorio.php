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
	<?php include "../../estilos/s_laboratorio.php" ?>

	<title>Consulta</title>


</head>
<body>
	
	<div class="head">
		<h1>Asilo de Algodon Ventana Laboratorio</h1><a class="cerrar" href="../../controlador/cerrarsesion.php">Cerrar Sesion</a>
	</div>
	<div class="intername">
		<h2>Bienvenido <?php echo $_SESSION['usuario'];?> </h2>
	</div>

	<ul class="menu">
        <li><a class="nav_sol" 			href="fichas_laboratorio.php">Ordenes Consulta</a></li>
        <li><a class="nav_fichas" 		href="examenes_laboratorio.php">Resultados Examenes</a></li>
    </ul>

	<div class="container">
		<h3>Resultados Examenes</h3>
		
		<?php 
			$vFicha = $_REQUEST['id'];
			

			$mysql_host = 'mysql8001.site4now.net';    #direccion del sitio por smarasp.net
			$mysql_user = 'a8caee_oscarum';            #nombre de usuario para login phpmyadmin
			$mysql_pass = 'Zanahoria@77';              #contraseña para el login de phpmyadmin
			$mysql_db = 'db_a8caee_oscarum';           #nombre de la base de datos

			#variable para establecer la conexion con la base de datos
			$conexionDB = mysqli_connect ($mysql_host, $mysql_user, $mysql_pass, $mysql_db)
			or  die("No se conecto a la DB"); #mensaje en caso no conecte

			$query1 = 'select F.idFicha, C.idConsulta, L.idLaboratorio, U.userName, U.nombres, U.apellidos, U.fecha_nac, F.fechaVisita,  C.idConsulta, C.ordenExamenes, L.resultadoEx, L.descripcionEx, L.costoLaboratorio
				from ficha_visita F
				inner join usuario U on U.username = F.username
				inner join solicitud S on F.idSolicitud = S.idSolicitud
				inner join consulta C on F.idFicha = C.idFicha
				inner join laboratorio L on L.idFicha = F.idFicha
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
					
					$varConsulta = $row['idConsulta'];
					$varOrdenesEx = $row['ordenExamenes'];

					$varIdLab = $row['idLaboratorio'];
					$varResultadoEx = $row['resultadoEx'];
					$varDescripcionEx = $row['descripcionEx'];
					$varCostoLab = $row['costoLaboratorio'];
					
			}


			echo '<form action = "upp_laboratorio.php" method ="post">

			<div class="contenedor-laboratorio">
				<div class="contenedor-l-a">
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

				</div>

				<div class="contenedor-l-b">
			
			<input type="hidden" name="idLaboratorio" value="'.$varIdLab.'">

			<h5>ID Consulta:</h5> 
			<input readonly class="block" type="text" name="idConsulta" value="'.$varConsulta.'">

			<h5>Ordenes Examenes</h5>
			<textarea readonly class="block" name="ordenEx">'.$varOrdenesEx.'</textarea>

			<h5>Descripcion Examenes</h5>
			<textarea name="descripcionEx">'.$varDescripcionEx.'</textarea>

			<h5>Resultados Examenes</h5>
			<textarea name="resultadoEx">'.$varResultadoEx.'</textarea>
			
			<h5>Costo Examenes</h5> 
			<input type="number" step="0.01" name="costoExamenes" value="'.$varCostoLab.'">

				</div>
			</div>

			<div class="subcontainer">
				<div class="botones">
					<input class="btn reset" type="reset" name="" value="Borrar">
					
					<input class="btn guardar" type="submit" name="" value="Actualizar Resultados">
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