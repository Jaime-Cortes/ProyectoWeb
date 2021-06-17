<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>
	<h3>Recibir datos del formulario</h3>
	<p>
		
		<form  method="POST" action="registrarAlumno.php">
			<input type="submit" value="Aceptar" name="Aceptar" >

			<input type="submit" value="Reset">
		</form>
		<?php
			include("registrarAlumno.php");
		?>
		
		
	</p>
<body>
</body>
</html>