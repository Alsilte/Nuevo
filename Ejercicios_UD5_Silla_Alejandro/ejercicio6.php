<?php

/**
 * @author Alejandro Silla Tejero
 * 
 * Funcion para validar una hora. Recibe una cadena en formato H:i:s y devuelve true si es una hora correcta y false en caso contrario
 */
function validarHora($hora)
{
    // Creo un objeto DateTime con la hora pasada por parametro
    $fecha = DateTime::createFromFormat("H:i:s", $hora);
    
    // Compruebo que la fecha se ha creado correctamente y que el formato de la fecha es el mismo que el que se ha pasado por parametro
    return $fecha && $fecha->format('H:i:s') === $hora;
}


if (isset($_POST['enviar'])) {

    $hora = $_POST['hora'];

    if (validarHora($hora)) {
        echo "<p> La hora es correcta </p>";
    } else {
        echo "<p> La hora no es correcta </p>";
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alejandro Silla Tejero</title>
</head>

<body>
    <h1>Ejercicio 6 - Alejandro Silla Tejero</h1>
    <form action="" method="post">
        <label for="fecha">Dime la hora: </label>
        <input type="text" name="hora">
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>

</html>
