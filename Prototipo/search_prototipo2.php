<!--Oscar Rodolfo Chávez Camey - Carnet 3090-19-13543 - Universidad Mariano Galvez de Guatemala - 8vo Semestre 2022
Tipo de documento html, se usa php para procesar el codigo.-->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--#Include para utilizar los estilos en el documento "_estilos.php"-->
	<?php include "_estilos.php" ?>

	<title>Busqueda - Ficha</title>

</head>
<body>
	<!--Palabra Prototipo en la cebezera del sitio-->
	<div class="head"> 
		<h1>Prototipo</h1>
	</div>

	<!--Barra de navegacion Buscar, Ingresar, Actualizar y Eliminar Ficha-->
	<ul class="menu">
		<li><a class="Buscar" href="prototipoBuscar.php">Buscar Ficha</a></li>
        <li><a class="Ingresar" href="prototipo.php">Ingresar Ficha</a></li>
        <li><a class="Actualizar" href="prototipoActualizar.php">Actualizar Ficha</a></li>
        <li><a class="Eliminar" href="prototipoEliminar.php">Eliminar Ficha</a></li>
	</ul>

	<!--Contendor de los campos del formulario-->
	<div class="container">
	<h2>Resultado de Busqueda</h2>

		<!--Codigo php para ingresar a la base de datos-->
		<?php 

			$mysql_host = 'mysql8001.site4now.net';    #direccion del sitio por smarasp.net
      $mysql_user = 'a8caee_oscarum';            #nombre de usuario para login phpmyadmin
      $mysql_pass = 'Zanahoria@77';              #contraseña para el login de phpmyadmin
      $mysql_db = 'db_a8caee_oscarum';           #nombre de la base de datos

      #variable para establecer la conexion con la base de datos
	    $conexionDB = mysqli_connect ($mysql_host, $mysql_user, $mysql_pass, $mysql_db) #Nombre base de datos
	    or  die("No se conecto a la DB");

	    #Query recibiendo como parametro el id ingresado en el input del formulario en "prototipoBuscar.php"
	   	$query = "select * from prototipo Where id_interno = $_REQUEST[id_interno]";

	   	#Variable resultado encargada de recibir las cadenas de datos encontrados en la tabla de la base de datos
			$resultado = mysqli_query ($conexionDB, $query) or die ("<div class='subcontainer'><p>Registro no Encontrado</p></div>");

			
			   		#Ciclo encargado de recorrer las filas alamacenadas en la variable $resultado hasta que llege al ultimo dato
		       while ($row = mysqli_fetch_assoc($resultado)){ 
			       $varIdInterno = $row['id_interno'];
			       $varNombre = $row['nombre'];
			       $varApellido = $row['apellido'];
			       $varFecha = $row['fecha'];
			       $varMotivo = $row['motivo'];
			       $varMedico = $row['medico'];
			       $varEspecialidad = $row['especialidad'];
			       $varExamenes = $row['examenes'];
			       $varResultado = $row['resultado_ex'];
			       $varDiagnostico = $row['diagnostico'];  
			       $varMedicamentos = $row['medicamentos']; 
			       $varObservaciones = $row['observaciones'];
		     	}

		     	#if encargad de validar que se hayan guardado datos en la variable resultado
		     	if( mysqli_num_rows($resultado) > 0){
			      	$relleno = true;
			    }else{
			    	$relleno = false;
			    	#mensaje de registro no encontrado
			    	echo "<div class='subcontainer'><p>Registro no Encontrado</p></div>";
			    }

			    #liberacion de la cadena $resultado
		     	mysqli_free_result($resultado);

		     	#if encargado de mostrar los campos rellenos de informacion en el caso se encuentren los datos en la base de datos
		     	if ($relleno) {
		     		
		     	
			     	echo '<form action = "upp_prototipo.php" method ="post">

						<div class="subcontainer fecha">
							<div class="pre">
							<p>Fecha   </p><input type="date" readonly = "readonly" name="fecha" value="'.$varFecha.'">
							</div>
						</div>

						<div class="subcontainer interno">
							<p>ID Interno </p><input type="text" readonly = "readonly" name="id_interno" value="'.$varIdInterno.'">
						</div>

						<div class="subcontainer nombres">
							<p>Nombre </p><input type="text" readonly = "readonly" name="nombre" value="'.$varNombre.'">
							<p>Apellido</p><input type="text" readonly = "readonly" name="apellido" value="'.$varApellido.'">
						</div>

						<div class="subcontainer motivo">
							<div class="pre">
							<p>Motivo de Visita</p><textarea name="motivo" readonly = "readonly" >'.$varMotivo.'</textarea>
							</div>
						</div>

						<div class="subcontainer medico">
							<p>Medico </p><input type="text" readonly = "readonly" name="medico" value="'.$varMedico.'">
							<p>Especialidad</p><input type="text" readonly = "readonly" name="especialidad" value="'.$varEspecialidad.'">
						</div>

						<div class="subcontainer examens">
							<p>Examenes realizados </p><textarea name="examenes" readonly = "readonly">'.$varExamenes.'"</textarea>
						</div>

						<div class="subcontainer resultados">
							<p>Resultados de Examenes </p><textarea name="resultado_ex" readonly = "readonly">'.$varResultado.'</textarea>
						</div>

						<div class="subcontainer diagnostico">
							<p>Diagnostico </p><textarea name="diagnostico" readonly = "readonly">'.$varDiagnostico.'</textarea>
						</div>

						<div class="subcontainer medicamento">
							<p>Medicamento </p><textarea name="medicamentos" readonly = "readonly">'.$varMedicamentos.'</textarea>
						</div>

						<div class="subcontainer observaciones">
							<p>Observaciones </p><textarea name="observaciones" readonly = "readonly">'.$varObservaciones.'</textarea>
						</div>

						

					</form>';
			
			}

	     	?>
	</div>
	
</body>
</html>