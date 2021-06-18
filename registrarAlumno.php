<?php
	include("Conexion.php");
	if (isset($_POST['Aceptar'])){
		session_start();
		$conexion = new Conexion;
		$alumno = $_SESSION["alumno"];
		$conexion->registrarAlumno($alumno);
		echo '<script>alert("Alumno registrado");</script>';
        echo '<script>window.open("pdf.php?boleta='.$alumno->boleta.'","_blank");</script>';
        echo '<script>window.location.href="index.html"</script>';
  	}else{
	$alumno = new Alumno;
    $alumno->nombre = $_POST["nombre"];
    $alumno->paterno = $_POST["apeP"];
    $alumno->materno = $_POST["apeM"];
    $alumno->boleta = $_POST["boleta"];
    $alumno->nacimiento = $_POST["fecha"];
    $alumno->genero = $_POST["genero"];
    $alumno->curp = $_POST["curp"];
    //Contacto
    $alumno->calle = $_POST["calle"];
    $alumno->colonia = $_POST["colonia"];
    $alumno->cp = $_POST["cp"];
    $alumno->tel = $_POST["telefono"];
    $alumno->email = $_POST["correo"];
    //Procedencia
    $alumno->procedencia = $_POST["escuela"];
    $alumno->estado = $_POST["estado"];
    $alumno->promedio = $_POST["promedio"];
    $alumno->opcion = $_POST["opcionESCOM"];
    $alumno->otra = $_POST["otra"];

	$alumno->idEscuela =  $alumno->procedencia;
	$alumno->idEstado = $alumno->estado;

	session_start();
	$_SESSION["alumno"]=$alumno;

	$conexion = new Conexion;
	$estado = $conexion->getEstado($alumno->estado);

	echo "<style type='text/css'>";
		 echo "@import url('formatocss/resultado.css');";
	echo"</style>";
		echo"<header>";
			echo"<section id='esc_left'>";
		    	echo"<center><img src='res/IPN.png' alt=''/></center>";
			echo"</section>";
			echo"<div>";
			echo"<section id='nametitle'>";
				echo"<p class='titles'>BIENVENIDO A NUESTRA ESCOMUNIDAD $alumno->nombre</p>";
			echo"</section>";
			echo"<section id='esc_right'>";
				echo"<center><img src='logoESCOM2x.png' alt=''/></center>";
			echo"</section>";
			echo"</div>";
		echo"</header>";
		echo"<section id='contenido'>";
			echo"<section id='contenido_1'>";
				echo"<p></p>";
			echo"</section>";
			echo"<section id='contenido_2'>";
				echo "<br><p class='title'>Verifica que los datos que ingresaste sean correctos:</p><br>
				<b>Nombre(s) :</b> $alumno->nombre <br/>
				<b>Apellido Paterno  :</b> $alumno->paterno<br/>
				<b>Apellido Materno :</b> $alumno->materno<br/>
				<b>Boleta :</b> $alumno->boleta<br/>
				<b>Fecha de nacimiento :</b> $alumno->nacimiento<br/>
				<b>Genero :</b>  $alumno->genero<br/>
				<b>CURP :</b> $alumno->curp<br/>
				<b>Calle :</b> $alumno->calle<br/>
				<b>Colonia :</b> $alumno->colonia<br/>
				<b>Codigo Postal :</b> $alumno->cp<br/>
				<b>Numero de telefono :</b> $alumno->tel<br/>
				<b>Correo Electronico :</b> $alumno->email<br/>";
			if($alumno->procedencia == "0"){
				echo "<b>Escuela de procedencia:</b> $alumno->otra<br/>";
			}else{
				echo "<b>Escuela de procedencia:</b> CECyT $alumno->procedencia<br/>";
			}
			echo "<b>Estado de procedencia :</b> $estado<br/>";
			echo "<b>Promedio escolar en la medio superior :</b> $alumno->promedio</br>
			<b>ESCOM fue tu :</b> $alumno->opcion opcion<br/>";
			
			echo"<section id='button_1'>";
				echo"<form  method='POST' action='registrarAlumno.php'>
					<input type='submit' value='Aceptar' name='Aceptar' class='button'>
					</form>";
			echo"</section>";
			echo"<section id='button_2'>";
				echo"<form  method='get' action='editRA.php'>
				<input type='submit' value='Editar' class='button'>
				</form>";;
			echo"</section>";
			echo"</section>";
			echo"<section id='contenido_3'>";
				echo"<p></p>";
			echo"</section>";
		echo"</section>";
	  }

?>