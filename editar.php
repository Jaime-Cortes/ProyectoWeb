<?php
	include('Conexion.php');
    //Se obtienen los datos de la base de datos
    $boleta = $_GET["boleta"];
    $conexion = new Conexion;
    $alumno = new Alumno();
    $alumno = $conexion->consultarAlumno($boleta);

	if (isset($_POST['editar'])){
		header("location:editRA.html");
  	}
?>