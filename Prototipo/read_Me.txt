El inicio del sitio es pestaña Ingresar Ficha la cual tiene
el nombre de "prototipo.php". En esta estan los campos para 
ingresar una nueva ficha a la base de datos, de este archivo
el formulario se envia al archivo "add_prototipo.php" en este
se encuentra el codigo para enviar los datos a la base de datos.

La pestaña Buscar Ficha es la "prototipoBuscar.php" aca se ingresa
el id de la ficha para mandarlo mediante el formulario a 
"searh_protitipo2.php", antes existia al 1 que me sirvio de base pero
lo borre por que ya no servia.

La pestaña Actualizar Ficha es la de "prototipoActualizar" aca se
ingresa el id de la ficha para ser buscada en el el archivo
"upp_prototipo.php" donde se podran modificar los datos a actualizar
luego se rediecciona al archivo "update_prototipo.php" para 
hacer el update al registro.

La pestala Eliminar Ficha es el archivo "prototipoEliminar.php"
permite ingresar el id de la ficha a eliminar para esto el boton
te manda al archivo "delete_prototipo.php" el cual es el que 
contiene el codigo con la conexion a la base de datos.

Resumen:
prototipo.php   ->  add_prototipo.php
prototipoBuscar.php   ->  search2_prototipo.php
prototipoEliminar.php   ->  detele_prototipo.php
prototipoActualizar.php -> upp_prototipo.php -> update_prototipo.php

*El archivo "_estilos.php" tiene la etiqueta de los estilos 
en css para el html de la pagina.



