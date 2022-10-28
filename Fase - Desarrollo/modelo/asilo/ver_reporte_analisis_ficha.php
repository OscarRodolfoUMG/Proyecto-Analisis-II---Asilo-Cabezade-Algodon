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
	<?php include "../../estilos/s_asilo.php" ?>

	<title>Asilo</title>


</head>
<body>
	
	<div class="head">
		<h1>Asilo Cabeza de Algodon</h1><a class="cerrar" href="../../controlador/cerrarsesion.php">Cerrar Sesion</a>
	</div>
	<div class="intername">
		<h2>Bienvenido <?php echo $_SESSION['usuario'];?> </h2>
	</div>

	<ul class="menu">
        <li><a class="nav_sol" 			href="reportes_asilo.php">Reportes</a></li>
        <li><a class="nav_fichas" 		href="cuenta_asilo.php">Estado de Cuenta</a></li>
        <li><a class="nav_empleados" 	href="pagos_asilo.php">Pagos y Mensualidades</a></li>
    </ul>

	<div class="container">
		<h3>Reporte Analisis Ficha Paciente</h3>
		

		<?php 
			$vFicha = $_REQUEST['id'];

			$mysql_host = 'mysql8001.site4now.net';    #direccion del sitio por smarasp.net
			$mysql_user = 'a8caee_oscarum';            #nombre de usuario para login phpmyadmin
			$mysql_pass = 'Zanahoria@77';              #contraseña para el login de phpmyadmin
			$mysql_db = 'db_a8caee_oscarum';           #nombre de la base de datos

			#variable para establecer la conexion con la base de datos
			$conexionDB = mysqli_connect ($mysql_host, $mysql_user, $mysql_pass, $mysql_db)
			or  die("No se conecto a la DB"); #mensaje en caso no conecte

			$query1 = 'select F.idFicha, U.userName, U.nombres, U.apellidos, U.fecha_nac, F.fechaVisita, S.motivo, C.idConsulta, C.diagnostico, C.ordenExamenes, C.ordenMedicamentos, C.observaciones, C.costoConsulta
				from ficha_visita F
				inner join usuario U on U.username = F.username
				inner join solicitud S on F.idSolicitud = S.idSolicitud
				inner join consulta C on F.idFicha = C.idFicha
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

					$varOrdenesEx = $row['ordenExamenes'];
					$varOrdenMed = $row['ordenMedicamentos'];
					$varDiagnostico = $row['diagnostico'];
					$varObservaciones = $row['observaciones'];
					$varCostoC = $row['costoConsulta'];
			}
			
			$query2 = 'select L.resultadoEx
				from ficha_visita F
				inner join consulta C on F.idFicha = C.idFicha
				inner join laboratorio L on F.idFicha = L.idFicha
				where L.idFicha = '.$vFicha.' 
				';

			$respuesta = mysqli_query ($conexionDB, $query2);
			$error_message = mysqli_error($conexionDB);

			$varResultadoEx = "";
			while ($row = mysqli_fetch_assoc($respuesta)){ 
					$varResultadoEx = $row['resultadoEx'];
			}

			if(!isset($varCostoC)){
				$varCostoC = "0.0";	
			}

			echo '<form action = "upp_consulta.php" method ="post">

			<div class="contenedor-diagnostico">
				<div class="contenedor-d-a">
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
				</div>


				<div class="contenedor-d-b">

			<h5>Ordenes Examenes</h5>
			<textarea readonly class="blockA" name="ordenEx">'.$varOrdenesEx.'</textarea>
			

			<h5>Resultados Examenes</h5>
			<textarea readonly class="blockA" name="resultadoEx">'.$varResultadoEx.'</textarea>
			

			<h5>Orden Medicamentos</h5>
			<textarea readonly class="blockA" name="ordenMed">'.$varOrdenMed.'</textarea>

			<h5>Diagnostico</h5>
			<textarea readonly class="blockA" name="diagnostico">'.$varDiagnostico.'</textarea>

			<h5>Observaciones</h5>
			<textarea readonly class="blockA" name="observaciones">'.$varObservaciones.'</textarea>
			
			<h5>Costo Consulta</h5> 
			<input type="number" step="0.01" name="costoConsulta" value="'.$varCostoC.'">

			


				</div>
			</div>

			<div class="subcontainer">
				<div class="botones">
					<input class="btn reset" onclick="history.back()" type="reset" name="" value="Regresar">
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