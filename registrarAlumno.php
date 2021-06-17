<?php
	include("Conexion.php");
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

	    echo "<br> Hola $alumno->nombre, verifica que los datos que ingresaste sean correctos:<br>
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
			Correo Electronico : $alumno->email<br/>
			Escuela de procedencia : $alumno->procedencia<br/>
			Estado de procedencia : $alumno->estado<br/>
			Promedio escolar en la medio superior : $alumno->promedio</br>
			ESCOM fue tu : $alumno->opcion opcion<br/>";

	if (isset($_POST['ok'])){
		$conexion = new Conexion;
		$conexion->registrarAlumno($alumno);
  	}

?>