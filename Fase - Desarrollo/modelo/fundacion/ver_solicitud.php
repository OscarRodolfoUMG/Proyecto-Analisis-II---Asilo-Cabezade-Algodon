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
		<h2>Bienvenido <?php echo $_SESSION['usuario'];?> </h2>
	</div>

	<ul class="menu">
        <li><a class="nav_sol" href="solicitudes_fundacion.php">Solicitudes</a></li>
        <li><a class="nav_fichas" href="fichas_fundacion.php">Fichas Internos</a></li>
        <li><a class="nav_empleados" href="empleados_ver_fundacion.php">Empleados</a></li>
        <li><a class="nav_caja" href="caja_fundacion.php">Caja</a></li>
    </ul>

	<div class="container">
		<h3>Ver Solicitud</h3>
		
		<?php 
			$v = $_REQUEST['id'];
			$vSolicitud = $_REQUEST['idSol'];
			$idE = $_REQUEST['idEmpleado'];

			$mysql_host = 'mysql8001.site4now.net';    #direccion del sitio por smarasp.net
			$mysql_user = 'a8caee_oscarum';            #nombre de usuario para login phpmyadmin
			$mysql_pass = 'Zanahoria@77';              #contraseña para el login de phpmyadmin
			$mysql_db = 'db_a8caee_oscarum';           #nombre de la base de datos

			#variable para establecer la conexion con la base de datos
			$conexionDB = mysqli_connect ($mysql_host, $mysql_user, $mysql_pass, $mysql_db)
			or  die("No se conecto a la DB"); #mensaje en caso no conecte

			$query2 = 'select S.IdSolicitud, S.idEmpleado, U.userName, U.nombres, U.apellidos, U.fecha_nac, U.eMail, S.fechaSolicitud, S.enfermeroAux, S.aceptada, S.motivo from Usuario U inner join Solicitud S on U.userName = S.userName 
				where U.userName = "'.$v.'" AND S.IdSolicitud = "'.$vSolicitud.'"
				';

			$resultado = mysqli_query ($conexionDB, $query2);
			$error_message = mysqli_error($conexionDB);

			$query3 = 'select Emp.idEmpleado, U.username, U.nombres, U.apellidos, Esp.descripcionEsp  
							from empleado Emp inner join especialidad Esp on Esp.idEspecialidad = Emp.idEspecialidad 
							inner join usuario U on U.username = Emp.username
							where Emp.idEmpleado = "'.$idE.'"';

			$respuesta = mysqli_query ($conexionDB, $query3);
			$error_message = mysqli_error($conexionDB);

			$varEspecialista = "";
			while ($row = mysqli_fetch_assoc($respuesta)){
				$varIdEmpleado = $row['idEmpleado'];
				$vN = $row['nombres'];
				$vA = $row['apellidos'];
				$vD = $row['descripcionEsp'];
				$varEspecialista = $vD." - ".$vN." ".$vA;
			}

			function CalculaEdad( $fecha ) {
			    list($Y,$m,$d) = explode("-",$fecha);
			    return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
			}
			while ($row = mysqli_fetch_assoc($resultado)){ 
					$varEnfermeroAux = $row['enfermeroAux'];
					$varIdSolicitud = $row['IdSolicitud'];
					$varUserName = $row['userName'];
					$varNombres = $row['nombres'];
					$varApellidos = $row['apellidos'];
					$varFechaNac = $row['fecha_nac'];
					$varMail = $row['eMail'];
					$varFechaSolicitud = $row['fechaSolicitud'];
					$varMotivo = $row['motivo'];
			
			echo '<form action = "add_visitamedica.php" method ="post">

			<h5>Solicitud No:</h5>
			<input readonly class="block" type="text" name="idSolicitud" value="'.$varIdSolicitud.'">

			
			<input readonly class="block" type="hidden" name="idEmpleado" value="'.$varIdEmpleado.'">
			
			<input readonly class="block" type="hidden" name="enfermeroAux" value="'.$varEnfermeroAux.'">

			<h5>Fecha de Solicitud</h5>
			<input readonly class="block" type="text" name="eMail" value="'.$varFechaSolicitud.'">

			<h5>Nombre de Usuario:</h5> 
			<input readonly class="block" type="text" name="userName" value="'.$varUserName.'">

			<h5>Nombres:</h5>
			<input readonly class="block" type="text" name="nombres" value="'.$varNombres.'">

			<h5>Apellidos:</h5>
			<input readonly class="block" type="text" name="apellidos" value="'.$varApellidos.'">

			<h5>Edad:</h5>
			<input readonly class="block" type="text" name="fecha_nac" value="'.CalculaEdad($varFechaNac).'">

			<h5>eMail</h5>
			<input readonly class="block" type="text" name="eMail" value="'.$varMail.'">

			<h5>Especialista Solicitado</h5>
			<input readonly class="block esp" type="text" name="especialista" value="'.$varEspecialista.'">

			<h5>Motivo</h5>
			<textarea readonly class="blockA" name="motivo">'.$varMotivo.'</textarea>
			
			<h5>Fecha y Hora para Visita Medica</h5>
			<input required type="datetime-local" name="fechahora" value="">

			
			
			

			<div class="subcontainer">
				<div class="botones">
					<input class="btn reset" type="reset" name="" value="Borrar">
					
					<input class="btn guardar" type="submit" name="" value="Crear Visita Médica">
				</div>
			</div>

			</form>
			';
			}

			
			mysqli_close($conexionDB);  
		?>
	</div>

	<div class="foot">
		© Rodolfo Chávez
	</div>

</body>
</html>