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
		<h3>Grabar Visita Medica</h3>
		
		<?php 
			$varIdSolicitud = $_REQUEST['idSolicitud'];
			$varUserName = $_REQUEST['userName'];
			$varNombres = $_REQUEST['nombres'];
			$varApellidos = $_REQUEST['apellidos'];
			$varMail = $_REQUEST['eMail'];
			$varMotivo = $_REQUEST['motivo'];
			$varIdEmpleado = $_REQUEST['idEmpleado'];
			$varEspecialista = $_REQUEST['especialista'];
			$varEnfermeroAux = $_REQUEST['enfermeroAux'];
			$varFechaHora = $_REQUEST['fechahora'];

			$mysql_host = 'mysql8001.site4now.net';    #direccion del sitio por smarasp.net
			$mysql_user = 'a8caee_oscarum';            #nombre de usuario para login phpmyadmin
			$mysql_pass = 'Zanahoria@77';              #contraseña para el login de phpmyadmin
			$mysql_db = 'db_a8caee_oscarum';           #nombre de la base de datos

			#variable para establecer la conexion con la base de datos
			$conexionDB = mysqli_connect ($mysql_host, $mysql_user, $mysql_pass, $mysql_db)
			or  die("No se conecto a la DB"); #mensaje en caso no conecte

			$query2 = 'update solicitud set
						aceptada = 1
						where idSolicitud = '.$varIdSolicitud.'
						';

			$resp2 = mysqli_query ($conexionDB, $query2);
			$error_message = mysqli_error($conexionDB);


			$query1 = 'insert into ficha_visita(idSolicitud, userName, idEmpleado, fechaVisita)
					   values('.$varIdSolicitud.',"'.$varUserName.'",'.$varIdEmpleado.',"'.$varFechaHora.'")';

			$resultado = mysqli_query ($conexionDB, $query1)
			or die('<h4 class="incorrecto">La Visita Medica No fue procesada
					     <br> Recuerde llenar todos los campos</h4>');
				
			echo '<h4 class="correcto">La Visita Medica Fue Procesada con Exito</h4>';


			/*
			$to = $varMail;
			$subject = "Notificacion Visita Medica - Asilo de Algodon";
			$message = '
			<html>
			<head>
			<title>HTML</title>
			</head>
			<body>
			<h1>Estimado(a) Familia H1</h1>
			<p>Mediante este Mail le notificamos que el residente del Asilo '.$varNombres.' '.$varApellidos.'<br>
			ha sido aceptado para visita medica en la Fundacion para la fecha: '.$varFechaHora.'
			sera atendido por el especialista: '.$varEspecialista.' y el enfermero auxiliar que lo acompañara <br>
			en la visita es : '.$varEnfermeroAux.'<br><br>
			Le recomendamos estar siempre al pendiente y comunicarse con nosotros ante cualquier duda o inquietud.
			</p>
			</body>
			</html>";'

			mail("$to","$subject","$message");
			*/


			mysqli_close($conexionDB);  
		?>

	</div>

	<div class="foot">
		© Rodolfo Chávez
	</div>

</body>
</html>