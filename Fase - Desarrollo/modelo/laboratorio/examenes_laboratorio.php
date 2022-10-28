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

	<title>Laboratorio - Asilo</title>


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
			$varSesion = $_SESSION['usuario'];
			$varSesionIdEmpleado = $_SESSION['idEmpleado'];

			$mysql_host = 'mysql8001.site4now.net';    #direccion del sitio por smarasp.net
			$mysql_user = 'a8caee_oscarum';            #nombre de usuario para login phpmyadmin
			$mysql_pass = 'Zanahoria@77';              #contraseña para el login de phpmyadmin
			$mysql_db = 'db_a8caee_oscarum';           #nombre de la base de datos

			#variable para establecer la conexion con la base de datos
			$conexionDB = mysqli_connect ($mysql_host, $mysql_user, $mysql_pass, $mysql_db)
			or  die("No se conecto a la DB"); #mensaje en caso no conecte

			$query1 = 'select U.username, U.nombres, U.apellidos, L.idLaboratorio, L.idFicha, L.fechaExamen 
						from laboratorio L
						inner join ficha_visita F on F.idFicha = L.idFicha
						inner join usuario U on F.username = U.username
						order by L.idFicha desc
						';

			$resultado = mysqli_query ($conexionDB, $query1);
			$error_message = mysqli_error($conexionDB);

			echo "<table>
			<tr>
				<th>ID Ficha</th>
				<th>Usuario</th>
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>Fecha Examenes</th>
				<th></th>
				
			</tr>";

			$i = 1;
			while ($row = mysqli_fetch_assoc($resultado)){ 
				$varIdEmpleado = $row['idFicha'];
				echo '<tr>';
				echo '<td>'.$row['idFicha'].'</td>';
				echo '<td>'.$row['username'].'</td>';
				echo '<td>'.$row['nombres'].'</td>';
				echo '<td>'.$row['apellidos'].'</td>';
				echo '<td>'.$row['fechaExamen'].'</td>';
				echo "<td><a class='sen' href='ver_examen_laboratorio.php?id=".$row['idFicha']."' >Ver Examenes</a></td>";
				echo '</tr>';
				$i++;
			}
			echo "</table>";

			mysqli_close($conexionDB);  
			
		?>
		

	</div>

	<div class="foot">
		© Rodolfo Chávez
	</div>

</body>
</html>