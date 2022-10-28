<!DOCTYPE html>
<html>
<head>
	<?php
		session_start();
		//echo "Nombre de usuario: ".$_SESSION['usuario'];

		if (!isset($_SESSION['usuario'])){
		    header('location: ../../home.php');
		}
	?>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" href="../../img/icono.jpg" />
	<?php include "../../estilos/s_interno.php" ?>

	<title>Inicio - Interno</title>


</head>
<body>
	
	<div class="head">
		<h1>Asilo de Algodon Ventana Interno</h1><a class="cerrar" href="../../controlador/cerrarsesion.php">Cerrar Sesion</a>
	</div>
	<div class="intername">
		<h2>Bienvenido <?php echo $_SESSION['usuario']; ?> </h2>
	</div>

	<ul class="menu">
        <li><a class="nav_fichas" href="fichas_interno.php">Fichas Medicas</a></li>
        <li><a class="nav_datos" href="datos_interno.php">Datos</a></li>
        <li><a class="nav_cuenta" href="cuenta_interno.php">Cuenta</a></li>
    </ul>

	<div class="container">

		<?php 
			$varUser = $_SESSION['usuario'];

			echo '<h3>Reporte Cobros Mensualidades: </h3>';

			$mysql_host = 'mysql8001.site4now.net';    #direccion del sitio por smarasp.net
			$mysql_user = 'a8caee_oscarum';            #nombre de usuario para login phpmyadmin
			$mysql_pass = 'Zanahoria@77';              #contraseña para el login de phpmyadmin
			$mysql_db = 'db_a8caee_oscarum';           #nombre de la base de datos

			#variable para establecer la conexion con la base de datos
			$conexionDB = mysqli_connect ($mysql_host, $mysql_user, $mysql_pass, $mysql_db)
			or  die("No se conecto a la DB"); #mensaje en caso no conecte

			$query3 = 'select idCuenta from cuenta C 
						where username = "'.$varUser.'"
						';

			$resp3 = mysqli_query ($conexionDB, $query3);
			$error_message = mysqli_error($conexionDB);

			$varCuentaDB = 0;
			while ($row = mysqli_fetch_assoc($resp3)){ 
				$varCuentaDB += $row['idCuenta'];
			}

			$query2 = 'select idMovimiento, idTipoMovimiento, montoMovimiento, fechaMovimiento 
						from movimiento_cuenta M
						where motivoMovimiento like "Mensualidad %"
						AND idCuenta = '.$varCuentaDB.'
						';

			$resp2 = mysqli_query ($conexionDB, $query2);
			$error_message = mysqli_error($conexionDB);
			

			$varDeuda = 0.00;
			while ($row = mysqli_fetch_assoc($resp2)){ 
				$varDeuda += $row['montoMovimiento'];
			}


			$query1 = 'select idMovimiento, idTipoMovimiento, motivoMovimiento, montoMovimiento, fechaMovimiento 
						from movimiento_cuenta M
						where motivoMovimiento like "Pago Mensualidad %" OR motivoMovimiento like "Mensualidad %"
						AND idCuenta = '.$varCuentaDB.'
						';

			$resultado = mysqli_query ($conexionDB, $query1);
			$error_message = mysqli_error($conexionDB);

			echo '<div class="contenedor-cobros">
					<div class="contenedor-c-a">

					<h4>Detalle Cobros</h4>

			<table>
			<tr>
				<th>Id Movimiento</th>
				
				<th>Tipo</th>
				<th>Motivo Movimiento</th>
				<th>Monto Movimiento</th>
				<th>Fecha Movimiento</th>
				
			</tr>
			';

			$num = 0;
			while ($row = mysqli_fetch_assoc($resultado)){ 
				echo '<tr>';
				echo '<td>'.$row['idMovimiento'].'</td>';

				$tipo = $row['idTipoMovimiento'];
				if ($tipo == 1) {
					echo '<td class="green">Deposito</td>';
					$num += $row['montoMovimiento'];
				}
				if ($tipo == 2) {
					echo '<td class="red">Retiro</td>';
				}
				
				echo '<td>'.$row['motivoMovimiento'].'</td>';
				echo '<td>'.$row['montoMovimiento'].'</td>';
				echo '<td>'.$row['fechaMovimiento'].'</td>';
				echo '</tr>';
			}

			$varBalance = $varDeuda - $num;

			$varText2 = "green";
			if($varBalance > 0){
				$varText2 = "red";
			}
			echo '</table>

				 	</div>

					<div class="contenedor-c-b">

				<h4>Total Cobros</h4>
				<input readonly class="block red" type="text" value="'.$varDeuda.'">

				<h4>Total Pagos</h4>
				<input readonly class="block green" type="text" name="idConsulta" value="'.$num.'">
				

				<h4>Balance</h4>
				<input readonly class="block '.$varText2.'" type="text"  value="'.$varBalance.'">

					</div>
				</div>


				<div class="subcontainer">
					<div class="botones">
						<input class="btn reset" onclick="history.back()" type="reset" name="" value="Regresar">
					</div>
				</div>

					
				';





			mysqli_close($conexionDB);

		 ?>

	</div>

	<div class="foot">
		© Rodolfo Chávez
	</div>

</body>
</html>