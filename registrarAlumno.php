<?php
	include("Conexion.php");
	if (isset($_POST['Aceptar'])){
		session_start();
		$conexion = new Conexion;
		$alumno = $_SESSION["alumno"];
		$conexion->registrarAlumno($alumno);
		echo "alumno registrado";
		header("location:pdf.php?boleta=$alumno->boleta");
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

	session_start();
	$_SESSION["alumno"]=$alumno;

	$conexion = new Conexion;
	$estado = $conexion->getEstado($alumno->estado);

	echo "<style type='text/css'>";
		 echo "@import url('formatocss/resultado.css');";
	echo"</style>";
		
		echo"<div id='informacion'>";
	    echo "<br><p class='title'>Hola $alumno->nombre, verifica que los datos que ingresaste sean correctos:</p><br>
			Nombre(s) : $alumno->nombre, <br/>
			Apellido Paterno  : $alumno->paterno<br/>
			Apellido Materno : $alumno->materno<br/>
			Boleta : $alumno->boleta<br/>
			Fecha de nacimiento : $alumno->nacimiento<br/>
			Genero :  $alumno->genero<br/>
			CURP : $alumno->curp<br/>
			Calle : $alumno->calle<br/>
			Colonia : $alumno->colonia<br/>
			Codigo Postal : $alumno->cp<br/>
			Numero de telefono : $alumno->tel<br/>
			Correo Electronico : $alumno->email<br/>";
			if($alumno->procedencia == "0"){
				echo "Escuela de procedencia: $alumno->otra<br/>";
			}else{
				echo "Escuela de procedencia: CECyT $alumno->procedencia<br/>";
			}
			echo "Estado de procedencia : $estado<br/>";
			echo "Promedio escolar en la medio superior : $alumno->promedio</br>
			ESCOM fue tu : $alumno->opcion opcion<br/>";
		echo"</div>";

		echo"<form  method='POST' action='registrarAlumno.php'>
		<input type='submit' value='Aceptar' name='Aceptar' >
		</form>
		<form  method='get' action='editRA.php'>
		<input type='submit' value='Editar'>
		</form>";
	  }

?>