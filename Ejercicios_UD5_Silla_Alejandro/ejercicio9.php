<?php

/**
 * @author Alejandro Silla Tejero
 */

// Funcion que multiplica un numero por los numeros del 1 al 10 y devuelve el resultado en un string
function multiplicar($num)
{

    $texto = "";
    for ($i = 0; $i <= 10; $i++) {
        // Concatenamos el resultado de la multiplicacion al string 
        $texto .= $num . " x " . $i . " = " . $num * $i . "<br>";
    }

    // Devolvemos el string con los resultados
    return $texto;
}

// Si se ha enviado el formulario
if (isset($_POST['enviar'])) {
    // Recogemos el valor de la opcion seleccionada
    $opcion = $_POST['tabla'];

    // Iteramos sobre las opciones seleccionadas y mostramos el resultado de la multiplicacion
    foreach ($opcion as $value) {
        echo "<p>" . multiplicar($value) . "</p>";
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
    <h1>Ejercicio 9 - Alejandro Silla Tejero</h1>
    <form action="" method="post">
        <label for="tabla">Tabla de multiplicar: </label>
        <select name="tabla[]">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>

</html>
