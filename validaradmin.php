<?php
	include("Conexion.php");
	$usuario = $_POST['email'];
	$contrasena =$_POST['password'];
	
        // $url = "localhost";
        // $user = "root";
        // $psw = "";
        // $bd = "Tec_web";
        // $port = 3306;
		// $conec = mysqli_connect($url, $user, $psw, $bd, $port);
		// $consulta = "SELECT * FROM ADMIN WHERE usuario = '$usuario' and clave = '$contrasena'";
		// $resul = mysqli_query($conec,$consulta);
		// $filas = mysqli_num_rows($resul);

		$conec  = new Conexion;
		$filas = $conec->validarAdmin($usuario, $contrasena);

		if($filas==1){
			header("location:menuAdmin.php");
		}
		else{
		echo"<style type='text/css'>
			a:link {
				color: #000;
				text-decoration: none;
			}
			a:visited {
				color: #000;
				text-decoration: none;
			}
			a:hover {
				color: #000;
				text-decoration: none;
			}
			a:active {
				color: #000;
				text-decoration: none;
			}
			img { 	position:absolute;
					top:0;
					left:0;
					right:0;
					bottom:0;
					margin:auto;
					height:auto;
					width: 20%;
					border: none;
			 }
			 
			 .center { 	
			        position:absolute;
					background: transparent;
					top:60%;
					left:0;
					right:0;
					bottom:0;
					margin:auto;
					height:60px;
					width: 30%;
					border: none;
			 }
			 
			 @media screen and (max-width: 1100px){
			 
			 img{
			 	width: 20%;
			 }
			 .center { 	
			        position:absolute;
					top:50%;
					background: transparent;
					left:0;
					right:0;
					bottom:0;
					margin:auto;
					height:70px;
					width: 60%;
			 }

			}

			@media screen and (max-width: 800px){
			img{
			 	width: 25%;
			 }
					.center { 	
			        position:absolute;
					top:30%;
					background: transparent;
					left:0;
					right:0;
					bottom:0;
					margin:auto;
					text-align: center;
					height:50px;
					width: 73%;
					border: none;
			 }
			}
	
		</style>";
			echo"<img src='res/753345.png'/>";
			echo"<form action='loginadmin.html' method='post'>";
			echo"<input class='center' type='submit' value='Usuario y/o contreaseña incorrectos (Da clic sobre el texto)' name='Enviar'></form>";
		}
			
?>