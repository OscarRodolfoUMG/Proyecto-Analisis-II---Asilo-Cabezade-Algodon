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
				$v = $_REQUEST['id'];
				
				$mysql_host = 'mysql8001.site4now.net';    #direccion del sitio por smarasp.net
				$mysql_user = 'a8caee_oscarum';            #nombre de usuario para login phpmyadmin
				$mysql_pass = 'Zanahoria@77';              #contraseña para el login de phpmyadmin
				$mysql_db = 'db_a8caee_oscarum';           #nombre de la base de datos

				#variable para establecer la conexion con la base de datos
				$conexionDB = mysqli_connect ($mysql_host, $mysql_user, $mysql_pass, $mysql_db)
				or  die("No se conecto a la DB"); #mensaje en caso no conecte

				$query1 = 'select userName, nombres, apellidos, fecha_nac, eMail  from usuario where userName = "'.$v.'"';

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
					$varMail = $row['eMail'];
					
				}

				$query2 = 'select Emp.idEmpleado, U.nombres, U.apellidos, Esp.descripcionEsp  
							from empleado Emp inner join especialidad Esp on Esp.idEspecialidad = Emp.idEspecialidad 
							inner join usuario U on U.username = Emp.username
							where Emp.idPuesto = 1;';

				$respuesta = mysqli_query ($conexionDB, $query2);
				$error_message = mysqli_error($conexionDB);
				
				echo '<form action = "add_solicitud.php" method ="post">

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

					<h5>Enfermero Auxiliar</h5>
					<input type="text" name="enfermeroAux" value="">

					<h5>Especialista</h5>
					<select name="especialista">
						<option class="opt">-Selecione al Especialista-</option>
					';


					while ($row = mysqli_fetch_assoc($respuesta)){ 
						$varIdEmpleado = $row['idEmpleado'];
						$varNombres = $row['nombres'];
						$varApellidos = $row['apellidos'];
						$varEspecialidad = $row['descripcionEsp'];

						echo '<option value="'.$varIdEmpleado.'">'.$varEspecialidad." - ".$varNombres." ".$varApellidos.'</option>';

					}
						
					echo '</select>

					<h5>Motivo</h5>
					<textarea name="motivo"></textarea>

					<div class="subcontainer">
						<div class="botones">
							<input class="btn reset" type="reset" name="" value="Borrar">
							
							<input class="btn guardar" type="submit" name="" value="Guardar">
						</div>
					</div>

					</form>
					';

					mysqli_close($conexionDB);  
			 ?>
			
		 </div>
		

	</div>

	<div class="foot">
		© Rodolfo Chávez
	</div>

</body>
</html>