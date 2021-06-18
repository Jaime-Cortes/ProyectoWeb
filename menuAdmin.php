<?php
    include('Conexion.php');
	session_start();
	if(!isset($_SESSION["admin"])){
		header("location:index.html");
	}else{
		if(!$_SESSION["admin"]){
			header("location:index.html");
		}
	}

    $conexion = new Conexion;
    $alumnos = $conexion->consultarTodosAlumnos();

	
	echo "<style type='text/css'>";
		 echo "@import url('formatocss/adminmain.css');";
	echo"</style>";
	echo"<header>";
				echo"<section id='nametitle'>";
				echo"<p class='titles'>Hola administrador</p>";
				echo"</section>";
					echo"<nav id='main'>";
					echo"<ul>";
						echo"<li><a href='RegistroAlumno.html'>Registar alumno</a></li>";
						echo"<li><a href='closeSession.php'>Salir</a></li>";
					echo"</ul>";
					echo"</nav>";
			echo"</header>";
	echo "<section id='vista_consultar'>";
		echo "<form action='editRA.php' method='get'>";
		echo "<input class='consult' type='text' name='boleta'/>";
		echo "<input type='text' value='true' name='Admin' hidden/>";
		echo "<input class='button' type='submit' value='Consultar' name='Consultar'/></form>";
	echo "</section>";
    echo "<br>";
	echo "<section id='vista_table'>";
		echo "<table border=1>";
		echo "<thead><tr><th>Nombre</th><th>Boleta</th><th>Escuela de procedencia</th><th>Editar</th><th>Borrar</tr></thead>";
		for ($i = 0; $i < count($alumnos); $i++) {
			echo "<tr>";
			echo "<td>".$alumnos[$i]->nombre." "; 
			echo $alumnos[$i]->paterno." "; 
			echo $alumnos[$i]->materno."</td>";
			echo "<td>".$alumnos[$i]->boleta."</td>";
			echo "<td>".$alumnos[$i]->procedencia."</td>";
			echo  "<td><form action='editRA.php' method='get'>";
					echo "<input type='text' value='".$alumnos[$i]->boleta."' name='boleta' hidden/>";
					echo "<input type='text' value='true' name='Admin' hidden/>";
					echo "<input type='image'  value='Editar' name='editar' src='res/104668.png' width='40px'/></form></td>";
			echo  "<td><form action='eliminar.php'>";
					echo "<input type='text' value='".$alumnos[$i]->boleta."' name='boleta' hidden/>";
					echo "<input type='image' src='res/eliminar.png' value='Eliminar' width='40px'/></form></td>";
		}
		echo "</table>";
	echo "</section>";

    

?>