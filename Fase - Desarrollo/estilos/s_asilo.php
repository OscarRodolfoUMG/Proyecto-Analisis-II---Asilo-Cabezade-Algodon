<style type="text/css">
	*{
		font-family: arial, sans-serif;
		padding: 0;
		margin: 0;
	}

	body{
		background:linear-gradient( white, cyan, blue); 
	}

	.head{
		background: #1D1DBE;
		width: 100%;
		height: 60px;
		text-align: left;
		padding-left: 10px;
		color: white;
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
		color: white;
		font-size: 30px;
		width: 100%;
		height: 35px;
	}

	h4{
		margin-top: 20px;
		font-size: 25px;
		text-align: center;
	}

	h5{
		text-align: center;
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
		padding-top: 0px;
		margin-right: 30px;
		justify-content: center;
		display: flex;
		text-decoration: none;
		font-size: 25px;
		background: white;
		border: 3px solid black;
		border-radius: 7px;
		color: black;
		width: 275px;
		height: 30px;
	}

	a:hover{
		background: #6262FA;
		color: white ;
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
		background:linear-gradient(to bottom,  #6262FA,  #6262FA, #7E7EFC);
		border: 4px solid white ;
		border-radius: 7px;

		min-height: 500px;
		width: 96%;
	}

	
	input, select{
		margin: 20px auto 20px auto;
		font-size: 20px;
		padding: 8px;
		display: block;
		width: 200px;
		height: 20px;
		text-align: center;
	}
	.red{
		color: red;
	}
	.green{
		color: green;
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

	.linear{
		display: inline-block;
		text-align: center;
		justify-content: center;
		align-items: center;

		
	}
	.sle{
		width: 400px;
		font-size: 15px;
		margin: 20px 20px 10px 2%;
	}
	.sle2{
		width: 550px;
		font-size: 15px;
		margin: 20px 40px 10px 4%;
	}
	.sle3{
		width: 200px;
		font-size: 15px;
		margin: 20px 30px 10px 20px;
	}
	.linput{
		width: 30%;
		margin: 20px 1% 10px 1%;
	}
	.ninput{
		width: 10%;
		margin: 20px 1% 10px 1%;
	}
	.linbtn{
		width: 150px;
		margin: 20px 1% 10px 2%;
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
		background: blue;
	}
	.actualizar:hover{
		background: lightblue;
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
		margin: 20px auto;
		max-width: 90%;
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
		background:#58D68D;
	}
	tr:hover td,
	tr:hover td .far{
		background: #58D68D;
	}
	

	th{
		padding: 10px;
		background-color: #138D75 ;

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
	.sen:hover{
		background: black !important;
	}

	.sen:active{
		background: yellow !important;
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
		background: cyan;
	}
	.contenedor-c-b{
		border: 3px solid black;
		border-radius: 30px;
		padding:10px;
		left: 650px;
		width: 400px;
		height: auto;
		background: limegreen;
	}



	.contenedor-diagnostico{
		display: flex;
		position: relative;
		justify-content: center;
		width: auto;
		height: auto;
	}
	.contenedor-d-a, .contenedor-d-b{
		margin: 20px;
	}
	.contenedor-d-a{
		border: 3px solid black;
		border-radius: 30px;
		padding-top: 80px;
		width: 600px;
		height: auto;
		background: orange;
	}
	.contenedor-d-b{
		border: 3px solid black;
		border-radius: 30px;
		padding-top: 20px;
		left: 650px;
		width: 600px;
		height: auto;
		background: limegreen;
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
	.report{
		
		text-align: center;
		justify-content: center;

		margin: 20px auto 20px auto;
		font-size: 30px;
		width: 500px;
		height: 40px;
		background: white;
		color: black;
		border: 3px solid blue;
	}

	.report:hover{
		background: purple;
		color: white;
		border: 3px solid white;
	}

	.foot{
		color: dimgray;
		padding-top: 10px;
		text-align: center;
		height: 40px;
		width: 100%;
	}

	

</style>