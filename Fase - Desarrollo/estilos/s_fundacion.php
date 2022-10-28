<style type="text/css">
	*{
		font-family: arial, sans-serif;
		padding: 0;
		margin: 0;
	}

	body{
		background:linear-gradient( white, cyan, #A50707); 
	}

	.head{
		background: #B91A1A;
		width: 100%;
		height: 60px;
		color: white;
		text-align: left;
		padding-left: 10px;
	}
	h1{
		padding-top: 10px;
	}

	h2{
		text-align: left;
		padding-top: 5px;
		padding-left: 5px;
		background:linear-gradient(to right,  white,  white, cyan, cyan, cyan, cyan);
		width: 100%;
		height: 35px;
		border-bottom: 5px solid white;

	}
	h3{
		text-align: center;
		padding-top: 15px;
		font-size: 30px;
		width: 100%;
		height: 35px;
		color: white;
	}

	h4{
		text-align: center;
		margin-top: 20px;
		font-size: 25px;
	}
	h5{
		text-align: center;
		font-size: 20px;
		text-align: center;
	}
	h5:first-child{
		margin-top: 20px;
		font-size: 20px;
		text-align: center;
	}
	.error{
		color: red;
	}
	.bien{
		color: green;
	}

	ul{
		display: flex;
		list-style: none;
		display: inline-block;
		margin: 20px;
		width: 95%;
	}
	li{
		display: inline-block;
	}
	a{
		padding-top: 0;
		margin-right: 30px;
		justify-content: center;
		display: flex;
		text-decoration: none;
		font-size: 25px;
		background: white;
		border: 3px solid black;
		border-radius: 7px;
		color: red;
		width: 200px;
		height: 30px;
	}

	a:hover{
		background: #F67313;
		color: white;
		border-color: white;
	}
	.cerrar{
		background: red;
		border: none;
		margin: 0;
		padding-top: 20px;
		position: absolute;
		border: 3px solid white;
		color: white;
		top: 15px;
		right: 20px;
		width: 200px;
		height: 50px;
	}

	.cerrar:hover{
		background: white;
		color: red;
		border-color: red;
		
	}

	.container{
		position: relative;
		margin: 0px 20px 20px 20px;
		background: linear-gradient(red, #F4D03F);
		border: 3px solid white;
		border-radius: 7px;

		min-height: 500px;
		width: 96%;
	}

	.sub-menu{
		margin-bottom: 0;
	}
	.sub-menu a{
		border: ;
		padding-top: 0;
		margin-right: 20px;
		margin-bottom: 10px;
		justify-content: center;
		display: flex;
		text-decoration: none;
		font-size: 25px;
		background: white;
		border: 3px solid black;
		border-radius: 30px;
		color: red;
		width: 250px;
		height: 30px;
	}

	.sub-menu a:hover{
		background: #CD230B;
		color: white;
		border-color: white;
	}

	form{

	}
	input, select{
		margin: 2px auto 20px auto;
		font-size: 20px;
		padding: 8px;
		display: block;
		width: 300px;
		height: 20px;
		text-align: center;
	}

	.block{
		margin: 2px auto 20px auto;
		font-size: 20px;
		padding: 8px;
		display: block;
		width: 300px;
		height: 20px;
		text-align: center;
		user-select: none;
		background: grey;
	}

	.esp{
		width: 500px;
		height: 20px;
	}

	.correcto{
		margin: 20px auto;
		padding-top: 20px;
		height: 50px;
		width: 550px;
		text-align: center;
		background: green;
		color: white;
		border: 3px solid white;
	}

	.incorrecto{
		margin: 20px auto;
		padding-top: 20px;
		height: 80px;
		width: 550px;
		text-align: center;
		background: red;
		color: white;
		border: 3px solid white;
	}

	textarea{
		padding: 5px;
		font-size: 15px;
		display: block;
		min-width: 500px;
		min-height: 100px;
		max-width: 600px;
		max-height: 150px;
		margin: 10px auto 20px auto;
	}
	.blockA{
		text-align: center;
		user-select: none;
		background: lightgrey;
	}


	select{
		height: 40px;
	}

	.btn{
		display: inline-block;
		height: 40px;
		width: 200px;
		margin-right: 20px;
		margin-left: 20px;
		color: white;
		border: none;
	}

	.btn-multi{
		display: inline-block;
		position: relative;
		margin-top: 20px;
		margin-bottom: 0;
		left: 46.5%;
		right: 50%;
		transform: translate(-50%, -50%);
		text-align: center;
		justify-content: center;
	}

	.text-multi{
		min-width: 300px;
		min-height: 25px;
		max-width: 300px;
		max-height: 25px;
		margin: 2px auto 20px auto;
		font-size: 20px;
		padding: 8px;
		display: block;
		
		text-align: center;
	}

	.subcontainer{
		text-align: center;
	}
	.botones{
		margin: 0 auto;
	}
	.reset{
		background: gray;
	}
	.reset:hover{
		background: #BFC1BD;
	}
	.guardar{
		background: green;
	}
	.guardar:hover{
		background: #57E017;
	}

	.actualizar{
		background: #216AFC;
	}
	.actualizar:hover{
		background: #437FF8;
	}

	.red{
		color: red;
	}
	.green{
		color: green;
	}
	.noti{
		background: #D3B32D ;
		min-height:200px;
		width: 50%;
		text-align: center;
		margin: 20px auto 10px auto;
		border: 5px solid black;
		border-radius: 20px;
	}

	.sub-container{
		margin-top: 20px;
		text-align: center;
	}
	.volver{
		background: gray;
		color: white;
		padding: 10px;
		margin: 0 auto;
		height: 30px;
	}
	.volver:hover{
		background: white;
		color: gray;
		border-color: black;
	}

	table{
		border-collapse: collapse;
		border: 1px solid black;
		background: #F39C12;
		margin: 20px auto;
	}

	td{
		padding: 10px;
		border: 1px solid black;
		text-align: center;
		background: white;
		font-size: 15px;
	}
	tr:hover td .sen,
	tr:hover td .sen .far{
		background: #F4D03F  ;
	}
	tr:hover td,
	tr:hover td .far{
		background: #F4D03F ;
	}
	

	th{
		padding: 10px;
		background-color: #F39C12 ;

	}
	.sen {
		padding: 2px 5px;
		text-align: center;
		border-radius: 0;
		color: white;
		margin-right: 0;
		font-size: 14px;
		background: limegreen !important;
		width: auto;
		height: 20px;
		border: 1px solid black;
	}
	.nen {
		padding: 2px 5px;
		text-align: center;
		border-radius: 0;
		color: white;
		margin-right: 0;
		font-size: 14px;
		background: red !important;
		width: auto;
		height: 20px;
		border: 1px solid black;
	}
	.sen:hover{
		background: black !important;
	}

	.sen:active{
		background: yellow !important;
	}

	.contenedor-fundacion{
		display: flex;
		position: relative;
		justify-content: center;
		width: auto;
		height: auto;
	}
	.contenedor-f-a, .contenedor-f-b{
		margin: 20px;
	}
	.contenedor-f-a{
		border: 3px solid black;
		border-radius: 30px;
		padding-top:10px;
		width: 600px;
		height: auto;
		background: cyan;
	}
	.contenedor-f-b{
		border: 3px solid black;
		border-radius: 30px;
		padding-top:10px;
		left: 650px;
		width: 600px;
		height: auto;
		background: #D7DBDD;
	}


	.contenedor-cuenta{
		display: flex;
		position: relative;
		justify-content: center;
		width: auto;
		height: auto;
	}
	.contenedor-c-a, .contenedor-c-b{
		margin: 20px;
	}
	.contenedor-c-a{
		border: 3px solid black;
		border-radius: 30px;
		padding:10px;
		width: 800px;
		height: auto;
		
		background:linear-gradient(to right,  white, cyan, cyan, cyan);
	}
	.contenedor-c-b{
		border: 3px solid black;
		border-radius: 30px;
		padding:10px;
		left: 650px;
		width: 400px;
		height: auto;
		background:linear-gradient(to left,  white,  white, cyan, cyan, cyan, cyan);
	}
	.foot{
		color: dimgray;
		padding-top: 10px;
		text-align: center;
		height: 40px;
		width: 100%;
	}

	

</style>