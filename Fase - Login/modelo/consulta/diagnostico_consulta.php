<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" href="../../img/icono.jpg" />
	<?php include "../../estilos/s_consulta.php" ?>

	<title>Consulta - Asilo</title>


</head>
<body>
	<?php
		session_start();
		//echo "Nombre de usuario: ".$_SESSION['usuario'];

		if (!isset($_SESSION['usuario'])) {
		    header('location: ../../home.php');
		}
	?>
	<div class="head">
		<h1>Asilo de Algodon Ventana Consulta</h1><a class="cerrar" href="../../controlador/cerrarsesion.php">Cerrar Sesion</a>
	</div>
	<div class="intername">
		<h2>Bienvenido <?php echo $_SESSION['usuario'];?> </h2>
	</div>

	<ul class="menu">
        <li><a class="nav_sol" 			href="fichas_consulta.php">Fichas Consulta</a></li>
        <li><a class="nav_fichas" 		href="diagnostico_consulta.php">Diagnostico</a></li>
        
    </ul>

	<div class="container">
		<h3>Diagnostico</h3>
		

		

	</div>

	<div class="foot">
		© Rodolfo Chávez
	</div>

</body>
</html>