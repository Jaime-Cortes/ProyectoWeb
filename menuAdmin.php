<?php
    include('Conexion.php');

    $conexion = new Conexion;
    $alumnos = $conexion->consultarTodosAlumnos();

   echo "<form action='editRA.php' method='get'>";
    echo "<input type='text' name='boleta'/>";
    echo "<input type='text' value='true' name='Admin' hidden/>";
    echo "<input type='submit' value='Consultar' name='Consultar'/></form>";
    echo "<br>";
    echo "<table border=1>";
    echo "<tr><th>Boleta</th><th>Editar</th><th>Borrar</tr>";
    for ($i = 0; $i < count($alumnos); $i++) {
        echo "<tr>";
        echo "<td>".$alumnos[$i]->boleta."</td>";
        echo  "<td><form action='editRA.php' method='get'>";
                echo "<input type='text' value='".$alumnos[$i]->boleta."' name='boleta' hidden/>";
                echo "<input type='text' value='true' name='Admin' hidden/>";
                echo "<input type='submit' value='Editar' name='editar'/></form></td>";
        echo  "<td><form action='eliminar.php'>";
                echo "<input type='text' value='".$alumnos[$i]->boleta."' name='boleta' hidden/>";
                echo "<input type='submit' value='Eliminar'/></form></td>";
    }
    echo "</table>";

    

?>