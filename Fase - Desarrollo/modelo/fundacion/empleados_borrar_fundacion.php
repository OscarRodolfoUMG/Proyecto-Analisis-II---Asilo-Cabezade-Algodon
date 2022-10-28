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
        <li><a class="nav_sol"    href="solicitudes_fundacion.php">Solicitudes</a></li>
        <li><a class="nav_fichas" href="fichas_fundacion.php">Fichas Internos</a></li>
        <li><a class="nav_empleados" href="empleados_ver_fundacion.php">Empleados</a></li>
        <li><a class="nav_caja"   href="caja_fundacion.php">Caja</a></li>
    </ul>

	<div class="container">
		<h3>Empleados</h3>
		<ul class="sub-menu">
	        <li><a class="sub-nav" href="empleados_ver_fundacion.php">Ver Todos</a></li>
	        <li><a class="sub-nav" href="empleados_add_fundacion.php">Añadir</a></li>
	        <li><a class="sub-nav" href="empleados_borrar_fundacion.php">Borrar</a></li>
    	</ul>

    	<table>
				<tr>
					<th>No. ID</th>
					<th>Usuario</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Puesto</th>
					<th>Especialidad</th>
					<th></th>
					
				</tr>
			<?php 

				$mysql_host = 'mysql8001.site4now.net';    #direccion del sitio por smarasp.net
				$mysql_user = 'a8caee_oscarum';            #nombre de usuario para login phpmyadmin
				$mysql_pass = 'Zanahoria@77';              #contraseña para el login de phpmyadmin
				$mysql_db = 'db_a8caee_oscarum';           #nombre de la base de datos

				#variable para establecer la conexion con la base de datos
				$conexionDB = mysqli_connect ($mysql_host, $mysql_user, $mysql_pass, $mysql_db)
				or  die("No se conecto a la DB"); #mensaje en caso no conecte

				$query1 = 'select Emp.idEmpleado, U.username as User, U.nombres, U.apellidos, Esp.descripcionEsp, Emp.idPuesto, P.descripcionP  
							from empleado Emp 	
							inner join especialidad Esp on Esp.idEspecialidad = Emp.idEspecialidad 
							inner join usuario U on U.username = Emp.username
							inner join puesto P on Emp.idPuesto = P.idPuesto
							where Emp.idPuesto = 1 OR Emp.idPuesto = 2 OR Emp.idPuesto = 3
							order by Emp.idPuesto asc
							';

				$resultado = mysqli_query ($conexionDB, $query1);
				$error_message = mysqli_error($conexionDB);

				$i = 1;
				$varP = 0;

				while ($row = mysqli_fetch_array($resultado)){ 

					echo '<form action = "delete_empleado.php" method ="post" name="form'.$i.'">';
					echo '<tr>';
					echo '<td>'.$row['idEmpleado'].'</td>';
					echo '<td>'.$row['User'].'</td>';
					echo '<td>'.$row['nombres'].'</td>';
					echo '<td>'.$row['apellidos'].'</td>';

					$varP = $row['idPuesto'];
					if($varP == 1){
						echo '<td>Consulta</td>';
					}
					else if($varP == 2){
						echo '<td>Farmacia</td>';
					}
					else if($varP == 3){
						echo '<td>Laboratorio</td>';
					}else{
						echo '<td></td>';
					}

					echo '<td>'.$row['descripcionEsp'].'</td>';

					echo "<td><a class='sen nen' href='?id=".$row['User']."' >Eliminar Empleado</a></td>";
					echo '</tr>';
					$i++;
					
				}

				mysqli_close($conexionDB);  
			 ?>
			 </table>













	</div>

	<div class="foot">
		© Rodolfo Chávez
	</div>

</body>
</html>