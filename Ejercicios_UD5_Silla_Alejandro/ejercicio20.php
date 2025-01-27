<?php

/**
 * @author: Alejandro Silla Tejero
 */
// Comprueba si se ha enviado el formulario y se ha definido la variable hora
if (isset($_POST['enviar'])) {
    $hora = $_POST['hora'];
    $saludo = "";

    // Comprueba que la hora sea un número
    if (is_numeric($hora)) {
        // Comprueba el rango de la hora y asigna el saludo correspondiente
        if ($hora >= 6 && $hora <= 12) {
            $saludo = "Buenos días";
        } elseif ($hora >= 13 && $hora <= 20) {
            $saludo = "Buenas tardes";
        } elseif ($hora >= 21 && $hora <= 24 || $hora > 0 && $hora <= 5) {
            $saludo = "Buenas noches";
        } else {
            $saludo = "La hora introducida no es correcta";
        }
    } else {
        $saludo = "La hora introducida debe ser un número";
    }

    // Muestra el saludo en la pantalla
    echo "<h2>$saludo</h2>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alejandro Silla Tejero</title>
</head>

<body>
    <h1>Ejercicio 20 - Alejandro Silla Tejero</h1>
    <form action="" method="post">
        <label for="hora">Introduce una hora: </label>
        <input type="text" name="hora">
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>

</html>
