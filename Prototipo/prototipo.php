<!--Oscar Rodolfo Chávez Camey - Carnet 3090-19-13543 - Universidad Mariano Galvez de Guatemala - 8vo Semestre 2022
Tipo de documento html, se usa php para procesar el codigo.-->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--#Include para utilizar los estilos en el documento "_estilos.php"-->
	<?php include "_estilos.php" ?>

	<title>Ficha - Nueva Ficha</title>
	
	<!--#insercion de un icono en fase de pruebas-->
	<link rel="icon" type="text/css" href="https://e7.pngegg.com/pngimages/310/331/png-clipart-innovation-art-pink-geometric-shapes-miscellaneous-blue.png">
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
	<!--Contendor de los capos del formulario-->
	<div class="container">
		<h2>Ingresar - Nueva Ficha</h2>

		
		<!--Formulario para ingresar los datos de la ficha-->
		<form action = "add_prototipo.php" method ="post">

			<!--Contenedor para ingresar la fecha-->
			<div class="subcontainer fecha">
				<div class="pre">
				<p>Fecha   </p><input type="date" name="fecha">
				</div>
			</div>

			<!--Contenedor del id de la ficha-->
			<div class="subcontainer interno">
				<p>ID Interno </p><input type="text" name="id_interno">
			</div>

			<!--Contenedor de los campos Nombre y apellido-->
			<div class="subcontainer nombres">
				<p>Nombre </p><input type="text" name="nombre">
				<p>Apellido</p><input type="text" name="apellido">
			</div>

			<!--Contenedor del campo Motivo-->
			<div class="subcontainer motivo">
				<div class="pre">
				<p>Motivo de Visita</p><textarea name="motivo"></textarea>
				</div>
			</div>

			<!--Contenedor del campo medico-->
			<div class="subcontainer medico">
				<p>Medico </p><input type="text" name="medico">
				<p>Especialidad</p><input type="text" name="especialidad">
			</div>

			<!--Contenedor del campo examenes realizados-->
			<div class="subcontainer examens">
				<p>Examenes realizados </p><textarea name="examenes" ></textarea>
			</div>

			<!--Contenedor del campo resultado de examenes-->
			<div class="subcontainer resultados">
				<p>Resultados de Examenes </p><textarea name="resultado_ex"></textarea>
			</div>

			<!--Contenedor del campo Diagnostico-->
			<div class="subcontainer diagnostico">
				<p>Diagnostico </p><textarea name="diagnostico"></textarea>
			</div>

			<!--Contenedor de compo medicamentos-->
			<div class="subcontainer medicamento">
				<p>Medicamento </p><textarea name="medicamentos"></textarea>
			</div>

			<!--Contenedor del campo Observaciones-->
			<div class="subcontainer observaciones">
				<p>Observaciones </p><textarea name="observaciones"></textarea>
			</div>

			<!--Contenedor de los botones al final del Documento-->
			<div class="subcontainer botones">
				<!--Boton reset para borrar los datos ingresador actualmente en la ficha-->
				<input class="btn reset" type="reset" name="" value="Borrar">
				<!--Boton Guardar el cual prepara los datos para ser leidos en el archivo "add_prototipo.php"-->
				<input class="btn guardar" type="submit" name="" value="Guardar">
			</div>

		</form>


		 <?php
		   
		 ?>

	</div>
	
</body>
</html>