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
		
		
		<?php 
			$varTipoPago = "$_REQUEST[tipo]";
			$varMonto = "$_REQUEST[monto]";
			$varObs = "$_REQUEST[observacion]";
			
			$varMotivo = "";
			$varCuenta = "Asilo";
          	switch ($varTipoPago) {
          		case '1':
          			$varMotivo = "Pago de Energia Electrica ";	
          			break;
          		case '2':
          			$varMotivo = "Pago de Agua Potable ";	
          			break;
          		case '3':
          			$varMotivo = "Pago de Cable Tv ";	
          			break;
          		case '4':
          			$varMotivo = "Pago de Internet ";	
          			break;
          		case '5':
          			$varMotivo = "Pago Fundacion ";
          			$varCuenta = "Fundacion";
          			break;
          		case '6':
          			$varMotivo = "Otros: ";
          			break;

          		default:
          			// code...
          			break;
          	}

          	$varMotivo = $varMotivo."".$varObs;

			$mysql_host = 'mysql8001.site4now.net';    #direccion del sitio por smarasp.net
			$mysql_user = 'a8caee_oscarum';            #nombre de usuario para login phpmyadmin
			$mysql_pass = 'Zanahoria@77';              #contraseña para el login de phpmyadmin
			$mysql_db = 'db_a8caee_oscarum';           #nombre de la base de datos

			#variable para establecer la conexion con la base de datos
			$conexionDB = mysqli_connect ($mysql_host, $mysql_user, $mysql_pass, $mysql_db)
			or  die("No se conecto a la DB"); #mensaje en caso no conecte

			$query1 = '
						select idCuenta from Cuenta C
						where C.userName = "'.$varCuenta.'"
						limit 1
						';

			$resultado = mysqli_query ($conexionDB, $query1);
			$error_message = mysqli_error($conexionDB);
			
			$varIdCuentaDB;
			while ($row = mysqli_fetch_assoc($resultado)){ 
				$varIdCuentaDB = $row['idCuenta'];
			}


			$query2 = 'insert into movimiento_cuenta(idCuenta, idTipoMovimiento, motivoMovimiento, 				   montoMovimiento, fechaMovimiento) 
					   values(
					   	'.$varIdCuentaDB.',
					   	 2,
					   	"'.$varMotivo.'",
					   	'.$varMonto.',
					   	now()
					   )
						';

			$resp2 = mysqli_query ($conexionDB, $query2);
			$error_message = mysqli_error($conexionDB);
			

			echo "<h4 class='correcto'>Pago Registrado con Exito</h4>";



			mysqli_close($conexionDB);

		 ?>

		 <div class="subcontainer">
			<div class="botones">
				<input class="btn reset" onclick="history.back()" type="reset" name="" value="Regresar">
			</div>
		</div>

		

	</div>

	<div class="foot">
		© Rodolfo Chávez
	</div>

</body>
</html>