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
		<h3>Reporte Entradas y Cobros</h3>
		
		
		<?php 
			$mysql_host = 'mysql8001.site4now.net';    #direccion del sitio por smarasp.net
			$mysql_user = 'a8caee_oscarum';            #nombre de usuario para login phpmyadmin
			$mysql_pass = 'Zanahoria@77';              #contraseña para el login de phpmyadmin
			$mysql_db = 'db_a8caee_oscarum';           #nombre de la base de datos

			#variable para establecer la conexion con la base de datos
			$conexionDB = mysqli_connect ($mysql_host, $mysql_user, $mysql_pass, $mysql_db)
			or  die("No se conecto a la DB"); #mensaje en caso no conecte

			$query1 = 'select idMovimiento, idTipoMovimiento, motivoMovimiento, montoMovimiento, fechaMovimiento 
						from movimiento_cuenta M
						inner join cuenta C on C.idCuenta = M.idCuenta
						where C.userName = "Asilo" OR M.motivoMovimiento like "Pago Fundacion %"
						';

			$resultado = mysqli_query ($conexionDB, $query1);
			$error_message = mysqli_error($conexionDB);
			

			echo '<div class="contenedor-cuenta">
					<div class="contenedor-c-a">

					<h4>Detalle de Movimientos</h4>

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
			$deposito = 0;
			$retiro = 0;
			while ($row = mysqli_fetch_assoc($resultado)){ 
				echo '<tr>';
				echo '<td>'.$row['idMovimiento'].'</td>';
				
				
				$tipo = $row['idTipoMovimiento'];
				if ($tipo == 1) {
					echo '<td class="green">Deposito</td>';
					$num += $row['montoMovimiento'];
					$deposito += $row['montoMovimiento'];
				}
				if ($tipo == 2) {
					echo '<td class="red">Retiro</td>';
					$num -= $row['montoMovimiento'];
					$retiro += $row['montoMovimiento'];
				}

				echo '<td>'.$row['motivoMovimiento'].'</td>';
				echo '<td>'.$row['montoMovimiento'].'</td>';
				echo '<td>'.$row['fechaMovimiento'].'</td>';
				echo '</tr>';
			}
			$varText = "red";
			if($num > 0){
				$varText = "green";
			}
			echo '</table>

				 	</div>

					<div class="contenedor-c-b">

				<h4>Total Deposito</h4>
				<input readonly class="block green" type="text" value="'.$deposito.'">

				<h4>Total Retiro</h4>
				<input readonly class="block red" type="text" value="'.$retiro.'">

				<h4>Estado de Cuenta</h4>
				<input readonly class="block '.$varText.'" type="text" value="'.$num.'">

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