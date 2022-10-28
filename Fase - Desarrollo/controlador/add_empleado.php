<!DOCTYPE html>
<html>
<head>
	<?php
		session_start();
		//echo "Nombre de usuario: ".$_SESSION['usuario'];

		if (!isset($_SESSION['usuario'])) {
		    header('location: ../home.php');
		}
	?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" href="../img/icono.jpg" />
	<?php include "../estilos/s_fundacion.php" ?>

	<title>Fundacion</title>


</head>
<body>
	
	<div class="head">
		<h1>Asilo de Algodon Ventana Fundación</h1><a class="cerrar" href="../../controlador/cerrarsesion.php">Cerrar Sesion</a>
	</div>
	<div class="intername">
		<h2>Bienvenido <?php echo $_SESSION['usuario']; ?> </h2>
	</div>

	<ul class="menu">
        <li><a class="nav_sol" href="../modelo/fundacion/solicitudes_fundacion.php">Solicitudes</a></li>
        <li><a class="nav_fichas" href="../modelo/fundacion/fichas_fundacion.php">Fichas Internos</a></li>
        <li><a class="nav_empleados" href="../modelo/fundacion/empleados_fundacion.php">Empleados</a></li>
        <li><a class="nav_caja" href="../modelo/fundacion/caja_fundacion.php">Caja</a></li>
    </ul>

	<div class="container">

		<h3>Empleados</h3>

		<ul class="sub-menu">
	        <li><a class="sub-nav" href="../modelo/fundacion/empleados_ver_fundacion.php">Ver Todos</a></li>
	        <li><a class="sub-nav" href="../modelo/fundacion/empleados_add_fundacion.php">Añadir</a></li>
	        <li><a class="sub-nav" href="../modelo/fundacion/empleados_borrar_fundacion.php">Borrar</a></li>
    	</ul>

    	<div class="noti">
		<?php 
          $varUsuario = "$_REQUEST[userName]";
          $varPass = "$_REQUEST[contraseña]";
          $varPass2 = "$_REQUEST[contraseña2]";
          $varNombres = "$_REQUEST[nombres]";
          $varApellidos = "$_REQUEST[apellidos]";
          $varEspecialidad = "$_REQUEST[especialidad]";
          $varPuesto = "$_REQUEST[puesto]";
          
		  //echo "varUsuario: ".$varUsuario."<br>";
          //echo "varContraseña: ".$varPass."<br>";
          //echo "varContraseña2: ".$varPass2."<br>";
          //echo "varNombres: ".$varNombres ."<br>";
          //echo "varApellidos: ".$varApellidos ."<br>";
          //echo "varEspecialidad: ".$varEspecialidad ."<br>";
          //echo "varPuesto: ".$varPuesto ."<br>";
         

          if($varPass != $varPass2)
          {
            echo "<h4 class='error'>Las contraseñas deben ser identicas</h4>";
          }else if($varPass == "" || $varPass2 == ""|| $varUsuario == ""|| $varNombres == ""|| $varApellidos == ""
                    || $varPuesto == ""){
            echo "<h4 class='error'>Registro No Ingresado <br>
            						- Las Contraselas deben ser Identicas<br>
            						- Los Campos de Usuario, Nombres,<br>
            						  Apellidos y Puesto son Obligatorios<br>
            						</h4>";
            
          }else{

            try{
                $mysql_host = 'mysql8001.site4now.net';    #direccion del sitio por smarasp.net
                $mysql_user = 'a8caee_oscarum';            #nombre de usuario para login phpmyadmin
                $mysql_pass = 'Zanahoria@77';              #contraseña para el login de phpmyadmin
                $mysql_db = 'db_a8caee_oscarum';           #nombre de la base de datos

               #variable para establecer la conexion con la base de datos
               $conexionDB = mysqli_connect ($mysql_host, $mysql_user, $mysql_pass, $mysql_db)
               or  die("No se conecto a la DB"); #mensaje en caso no conecte

               $query1 = "insert into usuario(userName, pass, nombres, apellidos, userType, eMail, fecha_nac) 
               values ('$_REQUEST[userName]',
                       '$_REQUEST[contraseña2]',
                       '$_REQUEST[nombres]',
                       '$_REQUEST[apellidos]',
                        5,
                       'Ninguno',
                       '00/00/00')";
               
               $registroON = mysqli_query ($conexionDB, $query1);
               $error_message = mysqli_error($conexionDB);
               

        if( $error_message == ""){ //If de usuario inexistente

               echo "<h4 class='bien'>Nuevo Usuario Ingresado</h4>";

               //Validar Especialidad en base de datos
               $query2 = 'select * from Especialidad Where descripcionEsp = "'.$varEspecialidad.'"';

               $resultado = mysqli_query ($conexionDB, $query2)
               or die ("<div class='subcontainer'><h4 class='error'>Query Incorrecto</h4></div>");

               $varIdEspecialidad;

               while ($row = mysqli_fetch_assoc($resultado)){ 
							       $varIdBD = $row['idEspecialidad'];
							       $varDescBD = $row['descripcionEsp'];
		     							}	
		     	//en el caso que exista, ingresar la ID de la especialidad en la base de datos
		     	if( mysqli_num_rows($resultado) > 0){
			      	
			      	$varIdEspecialidad = $varIdBD;

			    }else{
			    	
			    	#mensaje de registro no encontrado
				    	echo "<h4 class='bien'>Ingresando Nueva Especialidad...</h4>";

				    	
				    	$query3 = 'insert into Especialidad (descripcionEsp) values("'.$varEspecialidad.'")';

				    	mysqli_query ($conexionDB, $query3)
	            or die ("<h4 class='error'>No se Ingreso la Especialidad</h4>");

	            $queryR = 'select * from Especialidad where descripcionEsp = "'.$varEspecialidad.'" ';

	            $resultadoId = mysqli_query ($conexionDB, $queryR)
	            or die ("<h4 class='error'>No se Ingreso la Especialidad</h4>");

	            while ($row = mysqli_fetch_assoc($resultadoId)){ 
					       $varIdBD = $row['idEspecialidad'];
					       $varDescBD = $row['descripcionEsp'];
			     			 }

			     	$varIdEspecialidad = $varIdBD;
			    	}

			    	$query4 = 'insert into Empleado(userName, idEspecialidad, idPuesto) values 
			    			( "'.$varUsuario.'", "'.$varIdEspecialidad.'","'.$varPuesto.'")';

				    mysqli_query ($conexionDB, $query4)
				    or die ("<h4 class='error'>Empleado no Ingresado</h4>");

			    
      	}else{
      		echo "<h4 class='error'>Usuario ya existente</h4>";
      	}



             }catch(Exception $e){
                echo "Exception : ",$e->getMessage();
             }//fin trycatch
            }//Fin if de comprobacion de campos
      ?>

	</div>
		<div class="sub-container">
		<a class="volver" href="javascript:history.back()"> Volver a Registro</a>
		</div>

	</div>

	<div class="foot">
		© Rodolfo Chávez
	</div>

</body>
</html>