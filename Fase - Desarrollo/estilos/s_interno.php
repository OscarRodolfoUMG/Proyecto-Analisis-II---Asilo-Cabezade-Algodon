<style type="text/css">
	*{
		font-family: arial, sans-serif;
		padding: 0;
		margin: 0;
	}

	body{
		background: #47BBF4;
	}

	.head{
		background: #2874A6;
		padding-left: 10px;
		width: 100%;
		height: 60px;
		color: white;
		text-align: left;
	}
	h1{
		padding-top: 10px;
	}

	h2{
		text-align: left;
		padding-left: 5px;
		padding-top: 5px;
		background:linear-gradient(to right,  white,  white, cyan, cyan, cyan, cyan);
		width: 100%;
		height: 35px;
		border-bottom: 5px solid white;

	}
	h3{
		text-align: center;
		padding-top: 20px;
		padding-bottom: 10px;
		font-size: 30px;
		width: 100%;
		height: 35px;
	}

	h4{
		text-align: center;
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

	ul{
		display: flex;
		list-style: none;
		display: inline-flex;
		margin: 20px;
	}
	a{
		border: ;
		padding-top: 0px;
		margin-right: 30px;
		justify-content: center;
		display: flex;
		text-decoration: none;
		font-size: 25px;
		background: white;
		border: 3px solid black;
		border-radius: 7px;
		color: blue;
		width: 200px;
		height: 30px;
	}

	a:hover{
		background: #0AACB1;
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
		background:linear-gradient(to bottom,  #85C1E9,  #85C1E9, #A5D6F6);
		border: 4px solid white ;
		border-radius: 7px;

		min-height: 500px;
		width: 96%;
	}

	.sub-container{
		margin-top: 20px;
		text-align: center;
	}
	.subcontainer{
		margin-top: 20px;
		text-align: center;
	}
	.pagos{
		margin-top: 0px;
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
	.linear{
		display: inline-block;
		text-align: center;
		justify-content: center;
		align-items: center;	
	}
	.sle3{
		width: 200px;
		font-size: 20px;
		margin: 20px 30px 10px 20px;
	}
	.linput{
		width: 35%;
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
	input{
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
		padding: 20px;
		height: auto;
		width: 550px;
		text-align: center;
		background: green;
		color: white;
		border: 3px solid white;
	}

	.incorrecto{
		margin: 20px auto;
		padding: 20px;
		height: auto;
		width: 550px;
		text-align: center;
		background: red;
		color: white;
		border: 3px solid white;
	}

	.error, .bien{
	    margin: 20px;
	    color: red;
	    font-size: 20px;
	    text-align: center;
	  }

	  .bien{  
	    color: green;
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

	table{
		border-collapse: collapse;
		border: 1px solid black;
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

	.contenedor-interno{
		display: flex;
		position: relative;
		justify-content: center;
		width: auto;
		height: auto;
	}
	.contenedor-i-a, .contenedor-i-b{
		margin: 20px;
	}
	.contenedor-i-a{
		border: 3px solid black;
		border-radius: 30px;
		padding-top:80px;
		width: 600px;
		height: auto;
		background: cyan;
	}
	.contenedor-i-b{
		border: 3px solid black;
		border-radius: 30px;
		padding-top:10px;
		left: 650px;
		width: 600px;
		height: auto;
		background: limegreen;
	}

	.contenedor-cobros{
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

	.cuenta{
		
		text-align: center;
		justify-content: center;

		margin: 80px auto 30px auto;
		font-size: 50px;
		width: 700px;
		height: 60px;
		
	}

	

	.foot{
		color: dimgray;
		padding-top: 10px;
		text-align: center;
		height: 40px;
		width: 100%;
	}

	.titulos{
		
	}

</style>