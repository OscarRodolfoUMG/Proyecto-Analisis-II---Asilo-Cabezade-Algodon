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

		<h3>Pagos Mensualidades</h3>

		<?php 
			$varUser = $_SESSION['usuario'];
			$varMes  = "$_REQUEST[mes]";
			$varNombres = "$_REQUEST[nombres]";
	        $varTarjeta = "$_REQUEST[tarjeta]";
	        $varMonto = "$_REQUEST[monto]";
			
			$varMotivo = "Pago Mensualidad ".$varMes." User: ".$varUser." T.".$varNombres." ".$varTarjeta;
			$mysql_host = 'mysql8001.site4now.net';    #direccion del sitio por smarasp.net
			$mysql_user = 'a8caee_oscarum';            #nombre de usuario para login phpmyadmin
			$mysql_pass = 'Zanahoria@77';              #contraseña para el login de phpmyadmin
			$mysql_db = 'db_a8caee_oscarum';           #nombre de la base de datos

			#variable para establecer la conexion con la base de datos
			$conexionDB = mysqli_connect ($mysql_host, $mysql_user, $mysql_pass, $mysql_db)
			or  die("No se conecto a la DB"); #mensaje en caso no conecte

			$query1 = '
						select idCuenta from Cuenta C
						where C.userName = "'.$varUser.'"
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
					   	 1,
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