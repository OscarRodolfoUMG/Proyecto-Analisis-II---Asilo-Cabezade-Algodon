<!DOCTYPE html>
<html>
<head>

	<?php
		session_start();
		//echo "Nombre de usuario: ".$_SESSION['usuario'];

		if (!isset($_SESSION['usuario'])){
		    header('location: ../../home.php');
		}
	?>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" href="../../img/icono.jpg" />
	<?php include "../../estilos/s_interno.php" ?>

	<title>Inicio - Interno</title>


</head>
<body>
	
	<div class="head">
		<h1>Asilo de Algodon Ventana Interno</h1><a class="cerrar" href="../../controlador/cerrarsesion.php">Cerrar Sesion</a>
	</div>
	<div class="intername">
		<h2>Bienvenido <?php echo $_SESSION['usuario']; ?> </h2>
	</div>

	<ul class="menu">
        <li><a class="nav_fichas" href="fichas_interno.php">Fichas Medicas</a></li>
        <li><a class="nav_datos" href="datos_interno.php">Datos</a></li>
        <li><a class="nav_cuenta" href="cuenta_interno.php">Cuenta</a></li>
    </ul>

	<div class="container">

		<h3>Cambiar Contraseña</h3>
		
		<?php 
		  $varUser = $_SESSION['usuario'];
		  $varPass = "$_REQUEST[pass]";
          $varPass1 = "$_REQUEST[nPass1]";
          $varPass2 = "$_REQUEST[nPass2]";

          //echo "varUsuario: ".$varUsuario."<br>" ; 
          //echo "varNombres: ".$varNombres."<br>";
          //echo "varApellidos: ".$varApellidos."<br>";
          //echo "varFecha_nac: ".$varFecha_nac."<br>";
          //echo "varMail: ".$varMail."<br>";
          //echo "varPass: ".$varPass."<br>";
          //echo "varPass2: ".$varPass2."<br>";
          	$mysql_host = 'mysql8001.site4now.net';    #direccion del sitio por smarasp.net
	        $mysql_user = 'a8caee_oscarum';            #nombre de usuario para login phpmyadmin
	        $mysql_pass = 'Zanahoria@77';              #contraseña para el login de phpmyadmin
	        $mysql_db = 'db_a8caee_oscarum';           #nombre de la base de datos

	       #variable para establecer la conexion con la base de datos
	       $conexionDB = mysqli_connect ($mysql_host, $mysql_user, $mysql_pass, $mysql_db)
	       or  die("No se conecto a la DB"); #mensaje en caso no conecte

	       $query = 'select pass from usuario where userName = "'.$varUser.'"
                  	';

            $resp = mysqli_query ($conexionDB, $query);
            $varPassDB = "";
            while ($row = mysqli_fetch_assoc($resp)){ 
                $varPassDB = $row['pass'];
            }
            mysqli_close($conexionDB);
            if ($varPassDB != $varPass){
		    	echo '<h4 class="incorrecto">Contraseña Actual Incorrecta</h4>';
			}else if($varPass1 != $varPass2){
            	echo '<h4 class="incorrecto">Las Contraseñas deben ser Identicas</h4>';      
          	}else{

            try{
                $mysql_host = 'mysql8001.site4now.net';    #direccion del sitio por smarasp.net
                $mysql_user = 'a8caee_oscarum';            #nombre de usuario para login phpmyadmin
                $mysql_pass = 'Zanahoria@77';              #contraseña para el login de phpmyadmin
                $mysql_db = 'db_a8caee_oscarum';           #nombre de la base de datos

               #variable para establecer la conexion con la base de datos
               $conexionDB = mysqli_connect ($mysql_host, $mysql_user, $mysql_pass, $mysql_db)
               or  die("No se conecto a la DB"); #mensaje en caso no conecte

                $query1 = 'update usuario set pass = "'.$varPass1.'"
                		   where userName = "'.$varUser.'"
                            ';

                $resp1 = mysqli_query ($conexionDB, $query1);
                
                mysqli_close($conexionDB);

                echo '<h4 class="correcto">Cambio de Contraseña Exitoso</h4>';   

             }catch(Exception $e){
                echo "Exception : ",$e->getMessage();
             }
            }
      ?>
		<div class="subcontainer">
			<div class="botones">
				<input class="btn reset" onclick="history.back()" type="reset" name="" value="Regresar">
			</div>
		</div>	

	</div>

	<div class="foot">
		© Rodolfo Chávez
	</div>

</body>
</html>