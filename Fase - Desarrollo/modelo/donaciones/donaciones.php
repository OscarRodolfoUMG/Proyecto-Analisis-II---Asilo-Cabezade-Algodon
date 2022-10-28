<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Donaciones</title>
    
    <link rel="shortcut icon" href="img/icono.jpg" />
    <?php 
      include "../../estilos/s_donaciones.php";
     ?>

  </head>
  <body>
    <head>
        <div class="head">
          Donaciones Asilo Cabeza de Algodon
        </div>
    </head>

    <section class="formulario">

        <h5>Donaciones</h5>

        <form action = "add_donaciones.php" method ="post">
          <h3>Nombre Tarjeta</h3>
          <input required class="control" type="text" name="nombres" value="" placeholder=" Nombre Tarjeta" autocomplete="off">
          <h3>Numero de Tarjeta</h3>
          <input required class="control" type="text" name="tarjeta" value="" placeholder=" Numero de Tarjeta" autocomplete="off">
          <h3>Codigo de Seguridad</h3>
          <input required class="control small" type="password" name="num" value="" placeholder=" Codigo de Seguridad" autocomplete="off">
          <h3>Cantidad</h3>
          <input required class="control small" type="number" step="0.01" name="monto" value="" placeholder=" (Q.)" autocomplete="off">

          <input class="btn " type="submit" name="" value="Donar">

        </form>

    </section>

    <footer>
      <div class="footer">
        Contactanos al servicio al cliente +502 8765 4321
      </div>
    </footer>

  </body>
</html>
