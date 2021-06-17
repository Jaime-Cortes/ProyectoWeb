<?php
	$usuario = $_POST['email'];
	$contrasena =$_POST['password'];

        $url = "localhost";
        $user = "root";
        $psw = "";
        $bd = "Tec_web";
        $port = 3306;
		$conec = mysqli_connect($url, $user, $psw, $bd, $port);
		
		$consulta = "SELECT * FROM ADMIN WHERE usuario = '$usuario' and clave = '$contrasena'";
		$resul = mysqli_query($conec,$consulta);
		$filas = mysqli_num_rows($resul);

		if($filas==1){
			header("location:mainadmin.html");
		}
		else 
			echo "Error en la autentificacion";

		mysqli_free_result($resul);
		mysqli_close($conec);
?>