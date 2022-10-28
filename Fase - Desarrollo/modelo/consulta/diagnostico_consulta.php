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

	<title>Consulta - Asilo</title>


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
		<h3>Diagnostico Consultas</h3>
		
		<?php 
			$varSesion = $_SESSION['usuario'];

			$mysql_host = 'mysql8001.site4now.net';    #direccion del sitio por smarasp.net
			$mysql_user = 'a8caee_oscarum';            #nombre de usuario para login phpmyadmin
			$mysql_pass = 'Zanahoria@77';              #contraseña para el login de phpmyadmin
			$mysql_db = 'db_a8caee_oscarum';           #nombre de la base de datos

			#variable para establecer la conexion con la base de datos
			$conexionDB = mysqli_connect ($mysql_host, $mysql_user, $mysql_pass, $mysql_db)
			or  die("No se conecto a la DB"); #mensaje en caso no conecte

			$query1 = 'select F.idFicha, C.idConsulta, U.username as userasilo, U.nombres, U.apellidos, E.idEmpleado, E.username, F.fechaVisita from ficha_visita F
				inner join usuario U on U.username = F.username
				inner join empleado E on E.idEmpleado = F.idEmpleado
				inner join consulta C on F.idFicha = C.idFicha
				where E.username = "'.$varSesion.'"
				order by F.fechaVisita asc';

			$resultado = mysqli_query ($conexionDB, $query1);
			$error_message = mysqli_error($conexionDB);

			echo "<table>
			<tr>
				<th>ID Consulta</th>
				<th>ID Ficha</th>
				<th>Usuario</th>
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>Fecha Visita</th>
				
			</tr>";

			$i = 1;
			while ($row = mysqli_fetch_assoc($resultado)){ 
				$varIdEmpleado = $row['idFicha'];
				echo '<tr>';
				echo '<td>'.$row['idConsulta'].'</td>';
				echo '<td>'.$row['idFicha'].'</td>';
				echo '<td>'.$row['userasilo'].'</td>';
				echo '<td>'.$row['nombres'].'</td>';
				echo '<td>'.$row['apellidos'].'</td>';
				echo '<td>'.$row['fechaVisita'].'</td>';
				echo "<td><a class='sen' href='ver_diagnostico_consulta.php?id=".$row['idFicha']."&idC=".$row['idConsulta']."' >Ver Diagnostico</a></td>";
				echo "<td><a class='del' href='eliminar_diagnostico_consulta.php?id=".$row['idFicha']."&idC=".$row['idConsulta']."' >Eliminar Diagnostico</a></td>";
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