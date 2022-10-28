<style type="text/css">
	*{
		font-family: arial, sans-serif;
		padding: 0;
		margin: 0;
	}

	body{
		background:linear-gradient(to bottom, cyan, #F552F5);
	}

	.head{
		background: #B215BF  ;
		width: 100%;
		height: 60px;
		color: white;
		text-align: left;
	}
	h1{
		padding-top: 10px;
		padding-left: 20px;
	}

	h2{
		text-align: left;
		padding-top: 3px;
		padding-left: 5px;
		background:linear-gradient(to right,  white,  white, cyan, cyan, cyan, cyan);
		width: 100%;
		height: 30px;
		border-bottom: 5px solid white ;

	}
	h3{
		text-align: center;
		padding-top: 15px;
		font-size: 30px;
		width: 100%;
		height: 35px;
	}

	h4{
		margin-top: 20px;
		font-size: 25px;
	}
	h5{
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
		color: purple;
		width: 275px;
		height: 30px;
	}

	a:hover{
		background: #9A46F8 ;
		color: white ;
		border-color: white ;
	}
	.cerrar{
		background: red;
		border: none;
		margin: 0;
		padding-top: 15px;
		position: absolute;
		border: 3px solid white;
		color: white;
		top: 15px;
		right: 20px;
		width: 200px;
		height: 45px;
	}

	.cerrar:hover{
		background: white;
		color: red;
		border-color: red;
		
	}

	.container{
		position: relative;
		margin: 0px 20px 20px 20px;
		background: linear-gradient(#9A46F8, #AD6EF4 );
		border: 4px solid white;
		border-radius: 7px;

		min-height: 500px;
		width: 96%;
	}

	.sub-menu{
		margin-bottom: 0;
	}
	.sub-menu a{
		border: ;
		padding-top: 10px;
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
		height: 40px;
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

	.btn{
		display: inline-block;
		height: 40px;
		width: 200px;
		margin-right: 20px;
		margin-left: 20px;
		color: white;
		border: none;
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

	.borrar{
		background: red;
	}
	.borrar:hover{
		background: #F0565B;
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


	table{
		border-collapse: collapse;
		border: 1px solid black;
		background: #E706F5 ;
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
		background: #BB8FCE;
	}
	tr:hover td,
	tr:hover td .far{
		background: #BB8FCE;
	}
	

	th{
		padding: 10px;
		background-color: #E706F5  ;

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
	.del {
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
	.del:hover{
		background: black !important;
	}
	.del:active{
		background: yellow !important;
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
		background: linear-gradient(orange, #9A46F8, #9A46F8, #9A46F8,cyan);
		
	}
	.contenedor-d-b{
		border: 3px solid black;
		border-radius: 30px;
		
		left: 650px;
		width: 600px;
		height: auto;
		
		background: linear-gradient( limegreen,#9A46F8,#9A46F8,#9A46F8, cyan);
	}

	.foot{
		color: dimgray;
		padding-top: 10px;
		text-align: center;
		height: 40px;
		width: 100%;
	}

	

</style>