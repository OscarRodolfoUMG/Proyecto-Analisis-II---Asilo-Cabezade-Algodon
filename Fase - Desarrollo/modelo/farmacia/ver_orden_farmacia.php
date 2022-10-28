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
	<?php include "../../estilos/s_farmacia.php" ?>

	<title>Farmacia - Asilo</title>


</head>
<body>
	
	<div class="head">
		<h1>Asilo de Algodon Ventana Farmacia</h1><a class="cerrar" href="../../controlador/cerrarsesion.php">Cerrar Sesion</a>
	</div>
	<div class="intername">
		<h2>Bienvenido <?php echo $_SESSION['usuario'];?> </h2>
	</div>

	<ul class="menu">
        <li><a class="nav_sol" 			href="fichas_farmacia.php">Ordenes Consulta</a></li>
        <li><a class="nav_fichas" 		href="recetas_farmacia.php">Recetas Medicamentos</a></li>
    </ul>

	<div class="container">
		<h3>Nueva Receta Medicamentos</h3>
		
		<?php 
			$vFicha = $_REQUEST['id'];
			

			$mysql_host = 'mysql8001.site4now.net';    #direccion del sitio por smarasp.net
			$mysql_user = 'a8caee_oscarum';            #nombre de usuario para login phpmyadmin
			$mysql_pass = 'Zanahoria@77';              #contraseña para el login de phpmyadmin
			$mysql_db = 'db_a8caee_oscarum';           #nombre de la base de datos

			#variable para establecer la conexion con la base de datos
			$conexionDB = mysqli_connect ($mysql_host, $mysql_user, $mysql_pass, $mysql_db)
			or  die("No se conecto a la DB"); #mensaje en caso no conecte

			$query1 = 'select F.idFicha, C.idConsulta, U.userName, U.nombres, U.apellidos, U.fecha_nac, F.fechaVisita,  C.idConsulta, C.ordenMedicamentos
				from ficha_visita F
				inner join usuario U on U.username = F.username
				inner join solicitud S on F.idSolicitud = S.idSolicitud
				inner join consulta C on F.idFicha = C.idFicha
				where F.idFicha = '.$vFicha.'
				';

			$resultado = mysqli_query ($conexionDB, $query1);
			$error_message = mysqli_error($conexionDB);
			
			
			function CalculaEdad( $fecha ) {
			    list($Y,$m,$d) = explode("-",$fecha);
			    return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
			}

			while ($row = mysqli_fetch_assoc($resultado)){ 
					$varUserName = $row['userName'];
					$varNombres = $row['nombres'];
					$varApellidos = $row['apellidos'];
					$varFechaNac = $row['fecha_nac'];
					$varFechaVisita = $row['fechaVisita'];
					
					$varConsulta = $row['idConsulta'];
					$varOrdenesMed = $row['ordenMedicamentos'];
			}


			echo '<form action = "add_farmacia.php" method ="post">

			<div class="contenedor-farmacia">
				<div class="contenedor-f-a">
			<h5>ID Ficha:</h5>
			<input readonly class="block" type="text" name="idFicha" value="'.$vFicha.'">

			<h5>Fecha y Hora para Visita Medica</h5>
			<input readonly class="block" type="datetime-local" name="fechahora" value="'.$varFechaVisita.'">

			<h5>Nombre de Usuario:</h5> 
			<input readonly class="block" type="text" name="userName" value="'.$varUserName.'">

			<h5>Nombres:</h5>
			<input readonly class="block" type="text" name="nombres" value="'.$varNombres.'">

			<h5>Apellidos:</h5>
			<input readonly class="block" type="text" name="apellidos" value="'.$varApellidos.'">

			<h5>Edad:</h5>
			<input readonly class="block" type="text" name="fecha_nac" value="'.CalculaEdad($varFechaNac).'">

				</div>

				<div class="contenedor-f-b">

			<h5>ID Farmacia:</h5> 
			<input readonly class="block" type="text" name="idConsulta" value="'.$varConsulta.'">

			<h5>Ordenes Medicamentos</h5>
			<textarea readonly class="block" name="ordenEx">'.$varOrdenesMed.'</textarea>

			<h5>Descripcion Medicamento</h5>
			<textarea name="descripcionMedicamentos"></textarea>
			

			<h5>Precio Medicamento</h5> 
			<input id="1" type="text" name="precioMedicamento">

			<h5>Cantidad Medicamento</h5> 
		    <input id="2" type="text" name="cantidadMedicamento">

		    <input  class="btn guardar btn-multi" type="button" id="boton_calc" value="Calcular Monto">

		    <h5>Costo Medicamentos</h5> 
		    <textarea class="text-multi" id="esuma" name="multi">-Resultado-</textarea>

				</div>
			</div>



			<div class="subcontainer">
				<div class="botones">
					<input class="btn reset" type="reset" name="" value="Borrar">
					
					<input class="btn guardar" type="submit" name="" value="Agregar Entrega">
				</div>
			</div>

			</form>
			';
			

			mysqli_close($conexionDB);  

		?>
	</div>
	
 
	  <script>
	    var m1 = document.getElementById("1");
	    var m2 = document.getElementById("2");
	    var boton_de_calcular = document.getElementById("boton_calc");
	    boton_de_calcular.addEventListener("click", res);

	    function res() {
	        var multi = m1.value * m2.value;
	        document.getElementById("esuma").innerHTML=multi;
	    }
	  </script>

	<div class="foot">
		© Rodolfo Chávez
	</div>

</body>
</html>