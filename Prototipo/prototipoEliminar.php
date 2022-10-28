<!--Oscar Rodolfo Chávez Camey - Carnet 3090-19-13543 - Universidad Mariano Galvez de Guatemala - 8vo Semestre 2022
Tipo de documento html, se usa php para procesar el codigo.-->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--#Include para utilizar los estilos en el documento "_estilos.php"-->
	<?php include "_estilos.php" ?>
	<title>Ficha - Eliminar</title>
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
		<h2>Eliminar Ficha - Ingrese ID</h2>

		<!--Formulario para eliminar la ficha que aparezca en el id se recomienda buscar antes de eliminar-->
		<form action = "delete_prototipo.php" method ="post">

			<!--Contenedor del campo id de la ficha para ingresarla-->
			<div class="subcontainer interno">
				<input type="text" name="id_interno">
			</div>

			<br> <!--Salto de Linea estetico-->

			<!--Contenedor del boton Eliminar del formulario-->
			<div class="subcontainer botones">

				<!--Boton para preparar el id en el archivo "delete_prototipo.php"-->
				<input class="btn eliminar" type="submit" name="" value="Eliminar">
			</div>

		</form>


		 <?php
		   
		 ?>

	</div>
	
</body>
</html>