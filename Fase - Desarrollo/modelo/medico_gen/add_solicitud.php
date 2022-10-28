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
	<?php include "../../estilos/s_medicogen.php" ?>

	<title>Medico General</title>


</head>
<body>
	
	<div class="head">
		<h1>Asilo de Algodon Ventana Medico General</h1><a class="cerrar" href="../../controlador/cerrarsesion.php">Cerrar Sesion</a>
	</div>
	<div class="intername">
		<h2>Bienvenido <?php echo $_SESSION['usuario'];?> </h2>
	</div>

	<ul class="menu">
        <li><a class="nav_sol" href="internos_medicogen.php">Internos</a></li>
        <li><a class="nav_fichas" href="solicitudes_medicogen.php">Solicitudes</a></li>
        <li><a class="nav_fichas" href="fichas_medicogen.php">Fichas</a></li>
    </ul>

	<div class="container">
		<h3>Crear Solicitud</h3>
		
		<div class="tab-container">

			
			<?php 
				$varUser = $_REQUEST['userName'];
				$varNombres = $_REQUEST['nombres'];
				$varApellidos = $_REQUEST['apellidos'];
				$varFechaNac = $_REQUEST['fecha_nac'];
				$varMail = $_REQUEST['eMail'];
				$varEnfermero = $_REQUEST['enfermeroAux'];
				$varIdEmpleado = $_REQUEST['especialista'];
				$varMotivo = $_REQUEST['motivo'];

				$mysql_host = 'mysql8001.site4now.net';    #direccion del sitio por smarasp.net
				$mysql_user = 'a8caee_oscarum';            #nombre de usuario para login phpmyadmin
				$mysql_pass = 'Zanahoria@77';              #contraseña para el login de phpmyadmin
				$mysql_db = 'db_a8caee_oscarum';           #nombre de la base de datos

				#variable para establecer la conexion con la base de datos
				$conexionDB = mysqli_connect ($mysql_host, $mysql_user, $mysql_pass, $mysql_db)
				or  die("No se conecto a la DB"); #mensaje en caso no conecte

				$query1 = 'insert into solicitud(username, eMail, idEmpleado, fechaSolicitud, aceptada, motivo, enfermeroAux)values("'.$varUser.'","'.$varMail.'",'.$varIdEmpleado.', now() , 0, "'.$varMotivo.'","'.$varEnfermero.'");';

				$resultado = mysqli_query ($conexionDB, $query1)
				or die('<h4 class="incorrecto">La Solicitud No fue procesada
					     <br> Recuerde llenar todos los campos</h4>');
				
			     echo '<h4 class="correcto">La Solicitud Fue Procesada con Exito</h4>';

	

				mysqli_close($conexionDB);  


			 ?>
			
		 </div>
		

	</div>

	<div class="foot">
		© Rodolfo Chávez
	</div>

</body>
</html>