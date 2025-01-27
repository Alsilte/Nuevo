<?php

/**
 * @author Alejandro Silla Tejero
 */

// Función para validar una fecha en el formato especificado
function validarfecha($fecha)
{
    // Crear un objeto DateTime con el formato 'Y:m:d:H:i:s'
    $fechaObj = DateTime::createFromFormat("Y:m:d:H:i:s", $fecha);
    // Verificar que la fecha se haya creado correctamente y coincida con el formato
    return $fechaObj && $fechaObj->format('Y:m:d:H:i:s') === $fecha;
}

// Función para comparar dos fechas y devolver la diferencia en un formato legible
function compararfechas($fechaInicial, $fechaFinal)
{
    // Calcular la diferencia entre las dos fechas
    $diferenciaCalc = $fechaInicial->diff($fechaFinal);
    // Formatear la diferencia en años, meses, días, horas, minutos y segundos
    $diferencia = $diferenciaCalc->format('%y años, %m meses, %d días, %h horas, %i minutos, %s segundos');
    return $diferencia;
}

// Comprobar si se ha enviado el formulario
if (isset($_POST['enviar'])) {
    $fechaInicialStr = $_POST['fechaInicio'];
    $fechaFinalStr = $_POST['fechaFinal'];

    // Validar los formatos de las fechas
    if (validarfecha($fechaInicialStr) && validarfecha($fechaFinalStr)) {
        // Crear objetos DateTime a partir de las cadenas válidas
        $fechaInicial = DateTime::createFromFormat("Y:m:d:H:i:s", $fechaInicialStr);
        $fechaFinal = DateTime::createFromFormat("Y:m:d:H:i:s", $fechaFinalStr);
        // Mostrar la diferencia entre las fechas
        echo "<p>" . compararfechas($fechaInicial, $fechaFinal) . "</p>";
    } else {
        // Mensaje de error si las fechas no son válidas
        echo "<p> Las fechas no son correctas, el formato debe ser yyyy:mm:dd:hh:min:s </p>";
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
    <h1>Ejercicio 8 - Alejandro Silla Tejero</h1>
    <form action="" method="post">
        <label for="fechaInicio">Fecha inicio: </label>
        <input type="text" name="fechaInicio" placeholder="yyyy:mm:dd:hh:mm:ss"><br><br>
        <label for="fechaFinal">Fecha final: </label>
        <input type="text" name="fechaFinal" placeholder="yyyy:mm:dd:hh:mm:ss"><br><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>

</html>
