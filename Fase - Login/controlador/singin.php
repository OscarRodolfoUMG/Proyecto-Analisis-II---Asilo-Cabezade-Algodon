<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    
    <title>Iniciar Sesion</title>

   	<link rel="shortcut icon" href="../img/icono.jpg" />
    <?php 
      include "../estilos/s_registro.php";
     ?>


  </head>
  <body>
    <head>
        <div class="head">
          Bienvenido a nuestro Asilo de Algodon
        </div>
    </head>

    <section class="formulario sus">

        <h5>Iniciar Sesion</h5>
          <!--
        <form action = "controlador/singin.php" method ="post">

          <input class="control" type="text" name="Usuario" value="" placeholder=" Usuario">
          <input class="control" type="password" name="Contra" value="" placeholder=" Contraseña">

          <input class="btn" type="submit" name="" value="Ingresar">

        </form>

        -->

        <?php 
          $varUsuario = "$_REQUEST[Usuario]";
          $varContraseña = "$_REQUEST[Contra]";

	        $mysql_host = 'mysql8001.site4now.net';    #direccion del sitio por smarasp.net
	        $mysql_user = 'a8caee_oscarum';            #nombre de usuario para login phpmyadmin
	        $mysql_pass = 'Zanahoria@77';              #contraseña para el login de phpmyadmin
	        $mysql_db = 'db_a8caee_oscarum';           #nombre de la base de datos

	        #variable para establecer la conexion con la base de datos
	        $conexionDB = mysqli_connect ($mysql_host, $mysql_user, $mysql_pass, $mysql_db)
	        or  die("No se conecto a la DB"); #mensaje en caso no conecte

	        $query = 'select * from usuario Where userName = "'.$varUsuario.'"';

	   		#Variable resultado encargada de recibir las cadenas de datos encontrados en la tabla de la base de datos
			$resultado = mysqli_query ($conexionDB, $query) 
			or die ("<div class='subcontainer'><h4 class='error'>Nombre de Usuario o Contraseña Incorrecta.</h4></div>");

		       while ($row = mysqli_fetch_assoc($resultado)){ 
			       $varUsuarioBD = $row['userName'];
			       $varContraseñaBD = $row['pass'];
			       $varTypeBD = $row['userType'];
		     	}

		     	#Revisa que se halla encontrado el usuario
		     	if( mysqli_num_rows($resultado) > 0){
			      	$relleno = true;
			      	
			      	echo "<h4 class='error'>Nombre de Usuario o Contraseña Incorrecta</h4>";

			      	if(($varUsuario == $varUsuarioBD)&&($varContraseña == $varContraseñaBD)){
			      		switch ($varTypeBD) {
			      			case '1':
			      				session_start();
			      				$_SESSION['usuario'] = $varUsuarioBD;
			      				header("Location: ../modelo/interno/consultas_interno.php");
								exit;
			      				break;

			      			case '2':
			      				session_start();
			      				$_SESSION['usuario'] = $varUsuarioBD;
			      				header("Location: ../modelo/medico_gen/internos_medicogen.php");
								exit;
			      				break;

			      				case '3':
			      				session_start();
			      				$_SESSION['usuario'] = $varUsuarioBD;
			      				header("Location: ../modelo/asilo/reportes_asilo.php");
								exit;
			      				break;

			      			case '4':
			      				session_start();
			      				$_SESSION['usuario'] = $varUsuarioBD;
			      				header("Location: ../modelo/fundacion/empleados_fundacion.php");
								exit;
			      				break;

			      				case '5':
			      				session_start();
			      				$_SESSION['usuario'] = $varUsuarioBD;

			      		    $query = 'select * from empleado Where userName = "'.$varUsuario.'"';

			      		    $puesto = mysqli_query ($conexionDB, $query) 
										or die ("<h4 class='error'>No encontrado singin</h4>");

										while ($row = mysqli_fetch_assoc($puesto)){ 
								       $varPuestoBD = $row['idPuesto'];
							     	}
												switch ($varPuestoBD) {
													case '1':
															header("Location: ../modelo/consulta/fichas_consulta.php");
														break;
													
													default:
														// code...
														break;
												}

			      				
								exit;
			      				break;
			      			
			      			default:
			      				// code...
			      				break;
			      		}
			      	}


			    }else{
			    	$relleno = false;
			    	#mensaje de registro no encontrado
			    	echo "<div class='subcontainer'><h4 class='error' >Nombre de Usuario o Contrasela Incorrecta</h4></div>";
			    	
			    }
            
      ?>

      <div class="btn-reg">
        <a class="btn-volver" href="javascript:history.back()"> Volver a Registro</a>
    </section>

    <footer>
      <div class="footer">
        Contactanos al servicio al cliente +502 8765 4321
      </div>
    </footer>

  </body>
</html>
