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

	<title>Laboratorio</title>


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
		<h3>Agregar Resultados Examenes</h3>
		
		<?php 
			$varIdFicha = $_REQUEST['idFicha'];
			$varDescripcionEx = $_REQUEST['descripcionEx'];
			$varResultadoEx = $_REQUEST['resultadoEx'];
			$varCostoEx = $_REQUEST['costoExamenes'];

			$mysql_host = 'mysql8001.site4now.net';    #direccion del sitio por smarasp.net
			$mysql_user = 'a8caee_oscarum';            #nombre de usuario para login phpmyadmin
			$mysql_pass = 'Zanahoria@77';              #contraseña para el login de phpmyadmin
			$mysql_db = 'db_a8caee_oscarum';           #nombre de la base de datos

			#variable para establecer la conexion con la base de datos
			$conexionDB = mysqli_connect ($mysql_host, $mysql_user, $mysql_pass, $mysql_db)
			or  die("No se conecto a la DB"); #mensaje en caso no conecte

			$queryConfirm = 'select idFicha from laboratorio where idFicha = '.$varIdFicha.'';

			$encontrado = mysqli_query ($conexionDB, $queryConfirm)or die('<h4 class="incorrecto">No se encontro el registro</h4>');

			$varIdFicha2 = 0;
			while ($row = mysqli_fetch_assoc($encontrado)){ 
					$varIdFicha2 = $row['idFicha'];
					
			}

			if($varIdFicha != $varIdFicha2){

				$query1 = 'insert into laboratorio(idFicha, fechaExamen, descripcionEx, resultadoEx, costoLaboratorio)
					   values('.$varIdFicha.', now(), "'.$varDescripcionEx.'", "'.$varResultadoEx.'", "'.$varCostoEx.'")';

				$resultado = mysqli_query ($conexionDB, $query1)
				or die('<h4 class="incorrecto">No se ingreso el registro</h4>');
				
					
				echo '<h4 class="correcto">Resultados Procesados con Exito</h4>';
			}else{
				echo '<h4 class="incorrecto">Ya Existe un Registro con ese ID<br> Revise en Resultados Examenes</h4>';
			}

			
			
			mysqli_close($conexionDB);  
			

		?>
	</div>

	<div class="foot">
		© Rodolfo Chávez
	</div>

</body>
</html>