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
		<h3>Solicitudes</h3>
		
		<div class="tab-container">

			
			<?php 

				$mysql_host = 'mysql8001.site4now.net';    #direccion del sitio por smarasp.net
				$mysql_user = 'a8caee_oscarum';            #nombre de usuario para login phpmyadmin
				$mysql_pass = 'Zanahoria@77';              #contraseña para el login de phpmyadmin
				$mysql_db = 'db_a8caee_oscarum';           #nombre de la base de datos

				#variable para establecer la conexion con la base de datos
				$conexionDB = mysqli_connect ($mysql_host, $mysql_user, $mysql_pass, $mysql_db)
				or  die("No se conecto a la DB"); #mensaje en caso no conecte

				$query2 = 'select S.IdSolicitud, U.userName, U.nombres, U.apellidos, U.fecha_nac, U.eMail, S.fechaSolicitud, S.aceptada from Usuario U inner join Solicitud S on U.userName = S.userName';

				$resultado = mysqli_query ($conexionDB, $query2);
				$error_message = mysqli_error($conexionDB);

				function CalculaEdad( $fecha ) {
				    list($Y,$m,$d) = explode("-",$fecha);
				    return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
				}


				echo "<table>
				<tr>
					<th>No. ID</th>
					<th>Usuario</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Edad</th>
					<th>eMail</th>
					<th>Fecha de Solicitud</th>
					<th>Estado de Solicitud</th>
					
				</tr>";

				$i = 1;
				while ($row = mysqli_fetch_assoc($resultado)){ 

					echo '<tr>';
					echo '<td>'.$row['IdSolicitud'].'</td>';
					echo '<td>'.$row['userName'].'</td>';
					echo '<td>'.$row['nombres'].'</td>';
					echo '<td>'.$row['apellidos'].'</td>';
					echo '<td>'.CalculaEdad($row['fecha_nac']).'</td>';
					echo '<td>'.$row['eMail'].'</td>';
					echo '<td>'.$row['fechaSolicitud'].'</td>';
					$varAceptada = $row['aceptada'];
					$varR;
					if($varAceptada == "0"){
						$varR = "En espera";
					}elseif($varAceptada == "1"){
						$varR = "Aceptada";
					}
					echo '<td>'.$varR.'</td>';
					
					echo '</tr>';
					$i++;
				}
				echo "</table>";

				mysqli_close($conexionDB);  
				
			 ?>
			 
		 </div>
		

	</div>

	<div class="foot">
		© Rodolfo Chávez
	</div>

</body>
</html>