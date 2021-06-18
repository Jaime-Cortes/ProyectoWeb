<?php
	include('Conexion.php');
    //Se obtienen los datos de la base de datos
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

    $conexion = new Conexion;
    $conexion->editarAlumno($alumno);
    header("location:menuAdmin.php");
?>