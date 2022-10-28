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
		

		<h3>Pagos</h3>
		 
		<form action = "add_pago_asilo.php" method ="post">
		<select class="linear sle" name="tipo" required>
			<option value="">Indique el tipo de Pago a Registrar</option>
			<option value="1">Pago de Servicio de Energia Electrica</option>
			<option value="2">Pago de Servicio de Agua Potable</option>
			<option value="3">Pago de Servicio de Cable TV</option>
			<option value="4">Pago de Servicio de Internet</option>
			<option value="5">Depositar a la Fundacion</option>
			<option value="6">Otros.....</option>
		</select>

		<input required autocomplete="off" class="linear ninput" type="number" step="0.01" name="monto" placeholder="(Q.) Monto">
		<input autocomplete="off" class="linear linput" type="text" name="observacion" placeholder="Observaciones">
		

		<input class="btn linear guardar linbtn" type="submit" name="enviarPago" value="Ingresar Pago">
		</form>
		
		<h3>Mensualidades</h3>
		
		<?php 
			$mysql_host = 'mysql8001.site4now.net';    #direccion del sitio por smarasp.net
			$mysql_user = 'a8caee_oscarum';            #nombre de usuario para login phpmyadmin
			$mysql_pass = 'Zanahoria@77';              #contraseña para el login de phpmyadmin
			$mysql_db = 'db_a8caee_oscarum';           #nombre de la base de datos

			#variable para establecer la conexion con la base de datos
			$conexionDB = mysqli_connect ($mysql_host, $mysql_user, $mysql_pass, $mysql_db)
			or  die("No se conecto a la DB"); #mensaje en caso no conecte

			$query1 = 'select U.username, U.nombres, U.apellidos, C.fechaPago
						from usuario U 
						inner join cuenta C on C.username = U.username
						where U.userType = 1
				';

			$resultado = mysqli_query ($conexionDB, $query1);
			$error_message = mysqli_error($conexionDB);

			echo '
			<form action = "add_mensualidad_asilo.php" method ="post">
				<select class="linear sle2" name="idUser" required>
				<option value="">Interno - Fecha de Pago</option>

			';
			while ($row = mysqli_fetch_assoc($resultado)){ 
				$vUser   = $row['username'];
				$vNombre = $row['nombres'];
				$vApell  = $row['apellidos'];
				$vFechaP = date('d', strtotime($row['fechaPago']));
				echo '<option value="'.$vUser.'">'.$vNombre.' '.$vApell.' - Dia '.$vFechaP.' de cada mes </option>';
			}	
				
			echo '		
				</select>

				<select class="linear sle3" name="mes" required>
					<option value="">Mesualidad</option>
					<option value="enero">Enero</option>
					<option value="febrero">Febrero</option>
					<option value="marzo">Marzo</option>
					<option value="abril">Abril</option>
					<option value="mayo">Mayo</option>
					<option value="junio">Junio</option>
					<option value="julio">Julio</option>
					<option value="agosto">Agosto</option>
					<option value="septiembre">Septiembre</option>
					<option value="octubre">Octubre</option>
					<option value="noviembre">Noviembre</option>
					<option value="diciembre">Diciembre</option>
				</select>

				<input required class="linear ninput" type="number" step="0.01" name="monto" placeholder="(Q.) Monto">
				
				<input class="btn linear guardar linbtn" type="submit" name="enviarPago" value="Realizar Cobro">
			</form>

			';


		?>
		

	</div>

	<div class="foot">
		© Rodolfo Chávez
	</div>

</body>
</html>