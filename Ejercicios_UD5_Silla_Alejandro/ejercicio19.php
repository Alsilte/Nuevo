<?php

/**
 * @author: Alejandro Silla Tejero
 */

// Formulario para recoger los datos del horario
// Seleccion del curso, módulo y horas
// Mostrará un horario generado en una tabla

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alejandro Silla Tejero</title>
</head>

<body>
    <h1>Ejercicio 19 - Alejandro Silla Tejero</h1>
    <form action="" method="post">
        <fieldset>
            <legend>Seleccione el Curso</legend>
            <input type="radio" name="curso" value="1º ESO"> 1º ESO<br>
            <input type="radio" name="curso" value="2º ESO"> 2º ESO<br>
            <input type="radio" name="curso" value="3º ESO"> 3º ESO<br>
            <input type="radio" name="curso" value="4º ESO"> 4º ESO<br>
        </fieldset>

        <fieldset>
            <legend>Seleccione el Módulo</legend>
            <select name="modulo">
                <option value="Matematicas">Matemáticas</option>
                <option value="Lengua">Lengua</option>
                <option value="Ciencias">Ciencias</option>
                <option value="Historia">Historia</option>
            </select>
        </fieldset>

        <fieldset>
            <legend>Seleccione las Horas</legend>
            <input type="checkbox" name="horas[]" value="8-9"> 8:00 - 9:00<br>
            <input type="checkbox" name="horas[]" value="9-10"> 9:00 - 10:00<br>
            <input type="checkbox" name="horas[]" value="10-11"> 10:00 - 11:00<br>
            <input type="checkbox" name="horas[]" value="11-12"> 11:00 - 12:00<br>
        </fieldset>

        <input type="submit" name="enviar" value="Generar Horario">
    </form>

    <?php
    if (isset($_POST['enviar'])) {
        $curso = $_POST['curso'];
        $modulo = $_POST['modulo'];
        $horas = isset($_POST['horas']) ? implode(", ", $_POST['horas']) : "No especificadas";

        // Mostrar el horario generado en una tabla
        echo "<h2>Horario Generado</h2>";
        echo "<table border='10'>";
        echo "<tr><th>Curso</th><td>$curso</td></tr>";
        echo "<tr><th>Módulo</th><td>$modulo</td></tr>";
        echo "<tr><th>Horas</th><td>$horas</td></tr>";
        echo "</table>";
    }
    ?>
</body>

</html>
