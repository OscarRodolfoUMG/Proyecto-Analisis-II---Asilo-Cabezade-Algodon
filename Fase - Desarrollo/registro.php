<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registro</title>
  
    <link rel="shortcut icon" href="img/icono.jpg" />
    <?php 
      include "estilos/s_registro.php";
     ?>

  </head>
  <body>
    <head>
        <div class="head">
          Bienvenido a Nuestro Asilo Cabeza de Algodon
        </div>
    </head>

    <section class="formulario">

        <h5>Registro</h5>

        <form action = "modelo/suscriber.php" method ="post">
          <h3>Nombres</h3>
          <input required class="control" type="text" name="nombre" value="" placeholder=" Nombre">
          <h3>Apellidos</h3>
          <input required class="control" type="text" name="apellido" value="" placeholder=" Apellido">
          <h3>Feca de Nacimiento</h3>
          <input required class="control" type="date" name="fecha_nac" value="">
          <h3>Nombre de Usuario</h3>
          <input required class="control" type="text" name="usuario" value="" placeholder=" Nombre de Usuario">
          <h3>Correo Electronico Familiar</h3>
          <input required class="control" type="email" name="mail" value="" placeholder=" Correo Electronico Encargado">
          <h3>Constraseña</h3>
          <input required class="control" type="password" name="contraseña" value="" placeholder=" Contraseña">
          <h3>Repetir Contraseña</h3>
          <input required class="control" type="password" name="contraseña2" value="" placeholder=" Repetir Contraseña">
          <input class="btn" type="submit" name="" value="Registrar">

        </form>

    </section>

    <footer>
      <div class="footer">
        Contactanos al servicio al cliente +502 8765 4321
      </div>
    </footer>

  </body>
</html>
