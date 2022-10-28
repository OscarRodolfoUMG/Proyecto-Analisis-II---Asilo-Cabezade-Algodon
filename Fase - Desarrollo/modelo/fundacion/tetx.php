<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<title>Fundacion</title>


</head>
<body>
	
	
		

	<div class="container">
		<h3>Grabar Visita Medica22</h3>
		
		


		<?php 
			// El mensaje
			$mensaje = "Línea 1\r\nLínea 2\r\nLínea 3";

			// Si cualquier línea es más larga de 70 caracteres, se debería usar wordwrap()
			$mensaje = wordwrap($mensaje, 70, "\r\n");

			$headers =  'MIME-Version: 1.0' . "\r\n"; 
			$headers .= 'From: Your name <info@address.com>' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

			// Enviarlo
			mail('rodol_oscar@hotmail.com', 'Mi título', $mensaje, $headers);

		 ?>
	</div>

	<div class="foot">
		© Rodolfo Chávez
	</div>

</body>
</html>