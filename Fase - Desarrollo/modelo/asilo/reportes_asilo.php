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
		<h3>Reportes</h3>
		
		<a class="report" href="reporte_costos_cita_medica.php">Costos por Visita Medica</a>
		<a class="report" href="reporte_analisis_ficha.php">Analisis Ficha Medica</a>
		<a class="report" href="reporte_cobros_paciente.php">Cobros Pacientes</a>
		<a class="report" href="reporte_pagos_fundacion.php">Pagos a la Fundacion</a>
		<a class="report" href="reporte_entradas_cobros.php">Entradas y Cobros</a>
		<a class="report" href="reporte_examenes.php">Examenes Paciente</a>
		<a class="report" href="reporte_medicamentos.php">Medicamentos Paciente</a>


		

	</div>

	<div class="foot">
		© Rodolfo Chávez
	</div>

</body>
</html>