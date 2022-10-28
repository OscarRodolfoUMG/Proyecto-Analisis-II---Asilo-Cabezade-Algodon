<!--Oscar Rodolfo Chávez Camey - Carnet 3090-19-13543 - Universidad Mariano Galvez de Guatemala - 8vo Semestre 2022
Tipo de documento html, se usa php para procesar el codigo.-->
<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale-1.0">
    <title>Add - Ficha</title>

    <!--#Include para utilizar los estilos en el documento "_estilos.php"-->
    <?php include "_estilos.php" ?>

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
    <!--Contendor de los compor del formulario-->
    <div class="container">
        <!--Titulo del Formulario-->
        <h2>Ingresar Registro</h2>

        
        <!--Codigo php para ingresar a la base de datos-->
         <?php
         $mysql_host = 'mysql8001.site4now.net';    #direccion del sitio por smarasp.net
         $mysql_user = 'a8caee_oscarum';            #nombre de usuario para login phpmyadmin
         $mysql_pass = 'Zanahoria@77';              #contraseña para el login de phpmyadmin
         $mysql_db = 'db_a8caee_oscarum';           #nombre de la base de datos

           #variable para establecer la conexion con la base de datos
           $conexionDB = mysqli_connect ($mysql_host, $mysql_user, $mysql_pass, $mysql_db)
           or  die("No se conecto a la DB"); #mensaje en caso no conecte

           #Query a ejecutar mediante la conexion con la base de datos recibiendo como parametros los datos del formulario enviados en "prototipo.php"
           mysqli_query ($conexionDB, "insert into prototipo(fecha, id_interno, nombre, apellido, motivo, medico, especialidad, examenes, resultado_ex, diagnostico, medicamentos, observaciones) 
           values ('$_REQUEST[fecha]',$_REQUEST[id_interno],'$_REQUEST[nombre]','$_REQUEST[apellido]',
                   '$_REQUEST[motivo]','$_REQUEST[medico]','$_REQUEST[especialidad]','$_REQUEST[examenes]',
                   '$_REQUEST[resultado_ex]','$_REQUEST[diagnostico]','$_REQUEST[medicamentos]',
                   '$_REQUEST[observaciones]')")
           or die ("<div class='subcontainer'><p>No se Ingreso el Registro</p></div>");

           #mensaje de exito al ingresar el registro en la base de datos
           echo "<div class='subcontainer'><p>Registro Ingresado</p></div>";
         ?>
    </div>

</body>