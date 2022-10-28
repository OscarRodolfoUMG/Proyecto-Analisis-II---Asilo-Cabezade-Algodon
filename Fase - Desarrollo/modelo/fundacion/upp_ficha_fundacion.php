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
        <li><a class="nav_sol" href="solicitudes_fundacion.php">Solicitudes</a></li>
        <li><a class="nav_fichas" href="fichas_fundacion.php">Fichas Internos</a></li>
        <li><a class="nav_empleados" href="empleados_ver_fundacion.php">Empleados</a></li>
        <li><a class="nav_caja" href="caja_fundacion.php">Caja</a></li>
    </ul>

	<div class="container">
		<h3>Actualizar Montos Ficha</h3>
		
		<?php 
			$varIdFicha = $_REQUEST['idFicha'];
			$varUser = $_REQUEST['userInterno'];

			$varCostoConsulta = $_REQUEST['costoConsulta'];
			$varCostoFarmacia = $_REQUEST['costoFarmacia'];
			$varCostoLaboratorio = $_REQUEST['costoLaboratorio'];
			$varMonto = $_REQUEST['monto'];

			$mysql_host = 'mysql8001.site4now.net';    #direccion del sitio por smarasp.net
			$mysql_user = 'a8caee_oscarum';            #nombre de usuario para login phpmyadmin
			$mysql_pass = 'Zanahoria@77';              #contraseña para el login de phpmyadmin
			$mysql_db = 'db_a8caee_oscarum';           #nombre de la base de datos

			#variable para establecer la conexion con la base de datos
			$conexionDB = mysqli_connect ($mysql_host, $mysql_user, $mysql_pass, $mysql_db)
			or  die("No se conecto a la DB"); #mensaje en caso no conecte

			$query1 = "update consulta set 
						costoConsulta = '$varCostoConsulta'
						where idFicha = '$varIdFicha';
					   ";

			$query2 = "update farmacia set 
						costoFarmacia = '$varCostoFarmacia'
						where idFicha = '$varIdFicha';
					   ";
			$query3 = "update laboratorio set 
						costoLaboratorio = '$varCostoLaboratorio'
						where idFicha = '$varIdFicha';
					   ";
			$query4 = "update ficha_visita set 
						monto = '$varMonto'
						where idFicha = '$varIdFicha';
					   ";

			$resultado1 = mysqli_query ($conexionDB, $query1);
			$error_message = mysqli_error($conexionDB);

			$resultado2 = mysqli_query ($conexionDB, $query2);
			$error_message = mysqli_error($conexionDB);

			$resultado3 = mysqli_query ($conexionDB, $query3);
			$error_message = mysqli_error($conexionDB);

			$resultado4 = mysqli_query ($conexionDB, $query4)
			or die('<h4 class="incorrecto">La Visita Medica No fue procesada
					     <br> Recuerde llenar todos los campos</h4>');

			$query2 = ' select idCuenta from cuenta where userName = "'.$varUser.'"
					   ';

			$resp2 = mysqli_query ($conexionDB, $query2);
			$error_message = mysqli_error($conexionDB);
			

			$varIdCuentaBD;
			while ($row = mysqli_fetch_assoc($resp2)){ 
                  $varIdCuentaBD = $row['idCuenta'];
            }

            $query3 = ' select idFicha from movimiento_cuenta where idFicha = '.$varIdFicha.'
					   ';

			$resp3 = mysqli_query ($conexionDB, $query3);
			$error_message = mysqli_error($conexionDB);
			

			$varFichaMovBD;
			while ($row = mysqli_fetch_assoc($resp3)){ 
                  $varFichaMovBD = $row['idFicha'];
            }

            if(!isset($varFichaMovBD)){
            	$query4 = ' insert into movimiento_cuenta(idCuenta, idFicha, idTipoMovimiento, motivoMovimiento, montoMovimiento, fechaMovimiento)
            		values(	'.$varIdCuentaBD.', 
            				'.$varIdFicha.',
            			 	2,
            				"Cobro VisitaMedica",
            				'.$varMonto.',
            				now()
	            			)
						   ';

				$resp4 = mysqli_query ($conexionDB, $query4);
				$error_message = mysqli_error($conexionDB);
				


            }else{
            	$query5 = " update movimiento_cuenta set 
            				montoMovimiento = '$varMonto',
            				fechaMovimiento = now()
            				where idFicha = '$varIdFicha'
						   ";

				$resp5 = mysqli_query ($conexionDB, $query5);
				$error_message = mysqli_error($conexionDB);
				

            }

				
			echo '<h4 class="correcto">La Ficha de Visita fue Actualizada con Exito</h4>';

			mysqli_close($conexionDB);
		?>

	</div>

	<div class="foot">
		© Rodolfo Chávez
	</div>

</body>
</html>