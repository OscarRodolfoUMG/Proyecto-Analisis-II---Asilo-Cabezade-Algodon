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
		<h3>Costo Visita Medica</h3>
		
		<?php 
			$vIdFicha = $_REQUEST['id'];

			$mysql_host = 'mysql8001.site4now.net';    #direccion del sitio por smarasp.net
			$mysql_user = 'a8caee_oscarum';            #nombre de usuario para login phpmyadmin
			$mysql_pass = 'Zanahoria@77';              #contraseña para el login de phpmyadmin
			$mysql_db = 'db_a8caee_oscarum';           #nombre de la base de datos

			#variable para establecer la conexion con la base de datos
			$conexionDB = mysqli_connect ($mysql_host, $mysql_user, $mysql_pass, $mysql_db)
			or  die("No se conecto a la DB"); #mensaje en caso no conecte

			$query1 = 'select F.IdFicha, U.userName as UserInterno, U.nombres, U.apellidos, F.fechaVisita, F.monto
				from Usuario U 
				inner join ficha_visita F on U.userName = F.userName
				where F.IdFicha = "'.$vIdFicha.'"
				';

			$resultado = mysqli_query ($conexionDB, $query1);
			$error_message = mysqli_error($conexionDB);

			$query2 = 'select C.costoConsulta, Fa.costoFarmacia, L.costoLaboratorio
				from Usuario U 
				inner join ficha_visita F on U.userName = F.userName
				inner join consulta C on C.idFicha = F.idFicha
				inner join laboratorio L on L.idFicha = F.idFicha
				inner join farmacia Fa on Fa.idFicha = F.idFicha
				where F.IdFicha = "'.$vIdFicha.'"
				';

			$resp = mysqli_query ($conexionDB, $query2);
			$error_message = mysqli_error($conexionDB);
			
			while ($row = mysqli_fetch_assoc($resultado)){ 
				$varIdFicha = $row['IdFicha'];
				$varUserInterno = $row['UserInterno'];
				$varNombres = $row['nombres'];
				$varApellidos = $row['apellidos'];
				
				$varFechaVisita = $row['fechaVisita'];
				$varMonto = $row['monto'];
			}

			

			
			while ($row = mysqli_fetch_assoc($resp)){ 
				

				$varCostoConsulta = $row['costoConsulta'];
				$varCostoFarmacia = $row['costoFarmacia'];
				$varCostoLab = $row['costoLaboratorio'];

				
			}

			if(!isset($varMonto)){
				$varMonto = "0.00";	
			}
			if(!isset($varCostoConsulta)){
				$varCostoConsulta = "0.00";	
			}
			if(!isset($varCostoFarmacia)){
				$varCostoFarmacia = "0.00";	
			}
			if(!isset($varCostoLab)){
				$varCostoLab = "0.00";	
			}
			
			echo '<form action = "upp_ficha_fundacion.php" method ="post">

			<div class="contenedor-fundacion">
				<div class="contenedor-f-a">
			<h5>ID Ficha:</h5>
			<input readonly class="block" type="text" name="idFicha" value="'.$varIdFicha.'">

			<h5>Fecha y Hora para Visita Medica</h5>
			<input readonly class="block" type="datetime-local" name="fechahora" value="'.$varFechaVisita.'">

			<h5>Nombre de Usuario:</h5> 
			<input readonly class="block" type="text" name="userInterno" value="'.$varUserInterno.'">

			<h5>Nombres:</h5>
			<input readonly class="block" type="text" name="nombres" value="'.$varNombres.'">

			<h5>Apellidos:</h5>
			<input readonly class="block" type="text" name="apellidos" value="'.$varApellidos.'">

				</div>

				<div class="contenedor-f-b">

			
			<h5>Costo Consulta</h5> 
			<input id="1" type="text" name="costoConsulta" value="'.$varCostoConsulta.'">

			<h5>Costo Farmacia</h5> 
		    <input id="2" type="text" name="costoFarmacia" value="'.$varCostoFarmacia.'">

		    <h5>Costo Laboratorio</h5> 
		    <input id="3" type="text" name="costoLaboratorio" value="'.$varCostoLab.'">

		    <input  class="btn guardar btn-multi" type="button" id="boton_calc" value="Calcular Monto">

		    <h5>Costo Medicamentos</h5> 
		    <textarea class="text-multi" id="esuma" name="monto">'.$varMonto.'</textarea>

				</div>
			</div>



			<div class="subcontainer">
				<div class="botones">
										
					<input class="btn actualizar" type="submit" name="" value="Actualizar Montos">
				</div>
			</div>

			</form>
			';
			

			mysqli_close($conexionDB);

		?>


		<script>
	    var m1 = document.getElementById("1");
	    var m2 = document.getElementById("2");
	    var m3 = document.getElementById("3");
	    var boton_de_calcular = document.getElementById("boton_calc");
	    boton_de_calcular.addEventListener("click", res);

	    function res() {
	        var multi = parseFloat(m1.value) + parseFloat(m2.value) + parseFloat(m3.value);
	        document.getElementById("esuma").innerHTML=multi;
	    }
	  </script>

	</div>

	<div class="foot">
		© Rodolfo Chávez
	</div>

</body>
</html>