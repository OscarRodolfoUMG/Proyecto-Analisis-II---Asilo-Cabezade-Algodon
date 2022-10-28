<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Donaciones</title>
    
    <link rel="shortcut icon" href="../img/icono.jpg" />
    <?php 
      include "../../estilos/s_donaciones.php";
     ?>


  </head>
  <body>
    <head>
        <div class="head">
          Bienvenido a nuestro Asilo de Algodon
        </div>
    </head>

    <section class="formulario sus">

        <h5>Donaciones</h5>
        
        <?php 
          $varNombres = "$_REQUEST[nombres]";
          $varTarjeta = "$_REQUEST[tarjeta]";
          $varMonto = "$_REQUEST[monto]";


          if($varNombres == "" || $varTarjeta == "")
          {
            echo "<h4 class='error'>Debe rellenar todos los campos</h4>";
          }else{

            try{
                $varMotivo = "Donado por ".$varNombres." ".$varTarjeta;

                $mysql_host = 'mysql8001.site4now.net';    #direccion del sitio por smarasp.net
                $mysql_user = 'a8caee_oscarum';            #nombre de usuario para login phpmyadmin
                $mysql_pass = 'Zanahoria@77';              #contraseña para el login de phpmyadmin
                $mysql_db = 'db_a8caee_oscarum';           #nombre de la base de datos

               #variable para establecer la conexion con la base de datos

               $conexionDB = mysqli_connect ($mysql_host, $mysql_user, $mysql_pass, $mysql_db)
               or  die("No se conecto a la DB"); #mensaje en caso no conecte

               $query1 = 'select idCuenta from cuenta where userName = "Asilo" ';

               $resultado = mysqli_query ($conexionDB, $query1);
               $error_message = mysqli_error($conexionDB);

              
               while ($row = mysqli_fetch_assoc($resultado)){ 
                  $varID = $row['idCuenta'];
                  
               }

               $query2 = 'insert into movimiento_cuenta(idCuenta, idTipoMovimiento, motivoMovimiento, montoMovimiento, fechaMovimiento) 
               values ('.$varID.',
                        1,
                       "'.$varMotivo.'",
                       '.$varMonto.',
                        now()  )
                       ';

               $respuesta = mysqli_query ($conexionDB, $query2);
               $error_message = mysqli_error($conexionDB);

              mysqli_close($conexionDB);
                           
               #mensaje de exito al ingresar el registro en la base de datos
               echo "<h4 class='bien'>Gracias por su Donación</h4>";
             }catch(Exception $e){
                echo "Exception : ",$e->getMessage();
             }
            }
      ?>

      <div class="btn-reg">
        <a class="btn-volver" href="javascript:history.back()"> Volver a Donaciones</a>
        <a class="btn-iniciar" href="../../home.php">Ir al Inicio</a>
    </section>

    <footer>
      <div class="footer">
        Contactanos al servicio al cliente +502 8765 4321
      </div>
    </footer>

  </body>
</html>
