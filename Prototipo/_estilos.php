<!--#Oscar Rodolfo Chávez Camey - Carnet 3090-19-13543 - Universidad Mariano Galvez de Guatemala - 8vo Semestre 2022

#Archivo de estilos en Php, añadido a los archivos principales mediante include y no mediante link debido a retraso de aplicacion y mayor compatibilidad con los archivos en php
-->
<style type="text/css">
/*Establece el tipo de fuente para todos los elementos de la pagina*/
*{
	font-family: sans-serif, helvetica;
}
/*Propiedades de cabezera que dice Prototipo en las paginas de la app*/
.head{
	background: red;
	width: 100%;
	height: 80px;
	user-select: none;
	text-align: center;
	top: 0;
	border-bottom: 4px solid black;
}
/*Propiedades del menu debajo se la cabezera que sirven para cambiar de pagina*/
.menu{
	background: black;
	list-style: none;
	height: auto;
	width: auto;
	padding: 0;

}
/*Alineacion de texto de los input es decir los campos donde se ingresa la informacion como Nombre, Apellio, etc.*/
input{
	text-align: center;
}
/*Propiedades de la lista de los elementos que compone el menu*/
li{
	display: inline-block;
	text-align: center;
}
/*Propiedades de los accesos de referencia para navegar entre los menus*/
a{
	display: inline-block;
	text-decoration: none;
	color: white;
	padding: 20px;
}
/*Propiedades al momento de pasar el cursor sobre la direcion del menu Ingresar Ficha*/
.Ingresar:hover{
	background: green;
}
/*Propiedades al momento de pasar el cursor sobre la direcion del menu Buscar Ficha*/
.Buscar:hover{
	background: blue;
	color: white;
}
/*Propiedades al momento de pasar el cursor sobre la direcion del menu Actualizar Ficha*/
.Actualizar:hover{
	background: orange;
}
/*Propiedades al momento de pasar el cursor sobre la direcion del menu Eliminar Ficha*/
.Eliminar:hover{
	background: red;
}
/*Propiedades del texto h1 en el sitio web*/
h1{
	display: inline-block;
	margin-left: 10px;
	color: white;
}
/*Propiedades de los titulos h2 en el sitio web*/
h2{
	text-align: center;
	height: 30px;
	padding-top: 5px;
}

.search{
	width: 100%;
	height: 50px;
	background: lightpink;
	justify-content: center;
}
/*Propiedes del contenedor utilizado para centrar algunos divs*/
.pre{
	margin: 0px auto;
	padding: auto;
	
	text-align: center;
}
/*Propiedades de los elementos para ingresar texto*/
input{
	margin: auto;
	width: 200px;
	height: 30px;


	display: inline-block;
}
/*Propiedades de las etiquetas de parrafo*/
p{
	font-size: 25px;
	text-align: center;
	display: inline-block;
	margin: 0;
}
/*Propiedades de las areas de texto para ingresar informacion como el campo Observaciones*/
textarea{
	display: block;
	width: 500px;
	height: 100px;
	margin: 10px auto 10px auto;
}
/*Contenedor principal donde van los elementos*/
.container{
	border: 5px solid black;
	border-radius: 30px;
	margin: auto auto 30px auto;
	width: 80%;
	height: auto;
	background: lightblue;
}
/*Propiedades del contenedor secundario utilizado para ordenar y centrar los elementos en pantalla*/
.subcontainer{
	height: auto;
	padding-top: 10px;
	padding-bottom: 10px;
	text-align: center;
}
/*Propiedades de los botones al final de los forularios*/
.btn{
	height: 50px;
	margin: auto;
	border: none;
	color: white;
	font-size: 20px;
}
/*Color y propiedades del boton reset*/
.reset{
	background: gray;
	margin-right: 30px;
}
/*Color y propiedades del boton rojo*/
.eliminar{
	background: red;
}
/*Color y propiedades del boton azul*/
.actualizar, .buscar{
	background: blue;
}
/*Color y propiedades del boton verde Guardar*/
.guardar{
	background: green;
}




</style>