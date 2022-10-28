<!--Oscar Rodolfo Chávez Camey - Carnet 3090-19-13543 - Universidad Mariano Galvez de Guatemala - 8vo Semestre 2022
Tipo de documento html, se usa php para procesar el codigo.-->

<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale-1.0">

    <!--#Include para utilizar los estilos en el documento "_estilos.php"-->
    <?php include "_estilos.php" ?>

    <title>Actualizado</title>
</head>
</html>
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
    <h2>Actualizar</h2>

    <!--Codigo php para ingresar a la base de datos-->
     <?php
       $mysql_host = 'mysql8001.site4now.net';    #direccion del sitio por smarasp.net
       $mysql_user = 'a8caee_oscarum';            #nombre de usuario para login phpmyadmin
       $mysql_pass = 'Zanahoria@77';              #contraseña para el login de phpmyadmin
       $mysql_db = 'db_a8caee_oscarum';           #nombre de la base de datos

      #variable para establecer la conexion con la base de datos
       $conexionDB = mysqli_connect ($mysql_host, $mysql_user, $mysql_pass, $mysql_db) #Nombre base de datos
       or  die("No se conecto a la DB");

       #Query actualizando los datos del registro id ingresar en "upp_prototipo.php" mediante la conexion con la base de datos
       mysqli_query ($conexionDB, "update prototipo set 
        fecha ='$_REQUEST[fecha]', 
        id_interno = $_REQUEST[id_interno], 
        nombre ='$_REQUEST[nombre]', 
        apellido ='$_REQUEST[apellido]', 
        motivo ='$_REQUEST[motivo]', 
        medico ='$_REQUEST[medico]', 
        especialidad ='$_REQUEST[especialidad]', 
        examenes ='$_REQUEST[examenes]', 
        resultado_ex = '$_REQUEST[resultado_ex]', 
        diagnostico ='$_REQUEST[diagnostico]', 
        medicamentos ='$_REQUEST[medicamentos]', 
        observaciones ='$_REQUEST[observaciones]'
       where  id_interno = $_REQUEST[id_interno]") 
       or die ("<div class='subcontainer'><p>No se logro Realizar la Actualización</p></div>");

       #mensaje de exito al actualizer el registro
       echo "<div class='subcontainer'><p>Registro Actualizado</p></div>";
     ?>
  </div>
</body>