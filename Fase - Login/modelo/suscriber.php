<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registro</title>
    
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

        <h5>Registro</h5>
          <!--
        <form action = "suscriber.php" method ="post">
          
          <input class="control" type="text" name="nombre" value="" placeholder=" Nombre">
          <input class="control" type="text" name="apellido" value="" placeholder=" Apellido">
          <input class="control" type="date" name="fecha_nac" value="">
          <input class="control" type="text" name="usuario" value="" placeholder=" Nombre de Usuario">
          <input class="control" type="text" name="mail" value="" placeholder=" Correo Electronico Encargado">
          <input class="control" type="password" name="contraseña" value="" placeholder=" Contraseña">
          <input class="control" type="password" name="contraseña2" value="" placeholder=" Repetir Contraseña">
          <input class="btn" type="submit" name="" value="Registrar">
          
        </form>
        -->

        <?php 
          $varUsuario = "$_REQUEST[usuario]";
          $varNombres = "$_REQUEST[nombre]";
          $varApellidos = "$_REQUEST[apellido]";
          $varFecha_nac = "$_REQUEST[fecha_nac]";
          $varMail = "$_REQUEST[mail]";
          $varPass = "$_REQUEST[contraseña]";
          $varPass2 = "$_REQUEST[contraseña2]";

          //echo "varUsuario: ".$varUsuario."<br>" ; 
          //echo "varNombres: ".$varNombres."<br>";
          //echo "varApellidos: ".$varApellidos."<br>";
          //echo "varFecha_nac: ".$varFecha_nac."<br>";
          //echo "varMail: ".$varMail."<br>";
          //echo "varPass: ".$varPass."<br>";
          //echo "varPass2: ".$varPass2."<br>";

          if($varPass != $varPass2)
          {
            echo "<h4 class='error'>Las contraseñas deben ser identicas</h4>";
          }else if($varPass == "" || $varPass2 == ""|| $varUsuario == ""|| $varNombres == ""|| $varApellidos == ""
                    || $varFecha_nac == ""|| $varMail == "")
          {
            echo "<h4 class='error'>Debe rellenar todos los campos</h4>";
          }else{

            try{
                $mysql_host = 'mysql8001.site4now.net';    #direccion del sitio por smarasp.net
                $mysql_user = 'a8caee_oscarum';            #nombre de usuario para login phpmyadmin
                $mysql_pass = 'Zanahoria@77';              #contraseña para el login de phpmyadmin
                $mysql_db = 'db_a8caee_oscarum';           #nombre de la base de datos

               #variable para establecer la conexion con la base de datos
               $conexionDB = mysqli_connect ($mysql_host, $mysql_user, $mysql_pass, $mysql_db)
               or  die("No se conecto a la DB"); #mensaje en caso no conecte

               
               mysqli_query ($conexionDB, "insert into usuario(userName, pass, nombres, apellidos, userType, eMail, fecha_nac) 
               values ('$_REQUEST[usuario]',
                       '$_REQUEST[contraseña2]',
                       '$_REQUEST[nombre]',
                       '$_REQUEST[apellido]',
                        1,
                       '$_REQUEST[mail]',
                       '$_REQUEST[fecha_nac]')")
               or die ("<div class='subcontainer'><h4>No se Ingreso el Registro</h4></div>");

               #mensaje de exito al ingresar el registro en la base de datos
               echo "<h4 class='bien'>Registro Ingresado</h4>";
             }catch(Exception $e){
                echo "Exception : ",$e->getMessage();
             }
            }
      ?>

      <div class="btn-reg">
        <a class="btn-volver" href="javascript:history.back()"> Volver a Registro</a>
        <a class="btn-iniciar" href="../login.php">Iniciar Sesion</a>
    </section>

    <footer>
      <div class="footer">
        Contactanos al servicio al cliente +502 8765 4321
      </div>
    </footer>

  </body>
</html>
