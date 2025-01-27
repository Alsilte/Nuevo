<?php

/**
 * @author Alejandro Silla Tejero
 */

// Funcion que recibe un array de minutos de llamadas y devuelve el coste total de las llamadas
function costeLlamada($llamadas)
{
    // Coste minimo por llamada
    $costeMinimo = 0.1;

    // Inicializamos el coste total
    $costeTotal = 0;

    // Recorremos el array de llamadas y calculamos el coste total
    foreach ($llamadas as $minutos) {
        // Si la llamada dura menos de 3 minutos, el coste es el minimo
        if ($minutos < 3) {
            $costeTotal += $costeMinimo;
        } 
        // Si la llamada dura mas de 3 minutos, el coste es el minimo + el coste por minuto adicional
        else {
            $costeTotal += $costeMinimo + ($minutos - 3) * 0.05;
        }
    }
    return $costeTotal;
}

if (isset($_POST['enviar'])) {

    $llamada1 = $_POST['llamada1'];
    $llamada2 = $_POST['llamada2'];
    $llamada3 = $_POST['llamada3'];
    $llamada4 = $_POST['llamada4'];
    $llamada5 = $_POST['llamada5'];
    $llamadas = [$llamada1, $llamada2, $llamada3, $llamada4, $llamada5];

    // Comprobamos que los valores sean numericos
    if (is_numeric($llamada1) && is_numeric($llamada2) && is_numeric($llamada3) && is_numeric($llamada4) && is_numeric($llamada5)) {
        // Mostramos el coste total de las llamadas
        echo "<p>" .  costeLlamada($llamadas) .  "€ cuestan las 5 llamadas. </p>";
    } else {
        // Si no son numericos, mostramos un mensaje de error
        echo "<p> Los valores deben ser numéricos </p>";
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
    <h1>Ejercicio 7 - Alejandro Silla Tejero</h1>
    <form action="" method="post">
        <label for="llamada1">Llamada 1: </label>
        <input type="text" name="llamada1"><br><br>
        <label for="llamada2">Llamada 2: </label>
        <input type="text" name="llamada2"><br><br>
        <label for="llamada3">Llamada 3: </label>
        <input type="text" name="llamada3"><br><br>
        <label for="llamada4">Llamada 4: </label>
        <input type="text" name="llamada4"><br><br>
        <label for="llamada5">Llamada 5: </label>
        <input type="text" name="llamada5"><br><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>

</html>
