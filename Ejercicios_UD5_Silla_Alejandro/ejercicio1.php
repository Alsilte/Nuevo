<?php

/**
 * @author Alejandro Silla Tejero
 */

// Función que recibe dos números y un operador, y devuelve el resultado de la operación
function operar($num1, $num2, $operador){

    $resultado = "";

    // Comprobamos el operador y realizamos la operación correspondiente
    if ($operador == "+") {
        $resultado = $num1 + $num2;
    } elseif ($operador == "-") {
        $resultado = $num1 - $num2;
    } elseif ($operador == "*") {
        $resultado = $num1 * $num2;
    } elseif ($operador == "/") {
        // Comprobamos que el divisor no sea cero
        if ($num2 == 0) {
            $resultado = "No se puede dividir por cero";
        } else {
            $resultado = $num1 / $num2;
        }
    }

    // Devolvemos el resultado
    return $num1 . " " . $operador . " " . $num2 .  " = " . $resultado;
}

// Comprobamos si se ha enviado el formulario
if (isset($_POST['enviar'])) {

    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];

    // Comprobamos que los valores sean numéricos
    if (is_numeric($num1) && is_numeric($num2)) {
        $operador = $_POST['operaciones'];
        // Iteramos sobre los operadores seleccionados y mostramos el resultado de cada operación
        foreach ($operador as $value) {
            echo "<p>" . operar($num1, $num2, $value) . "<p>";
        }
    }else{
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

    <h1>Ejercicio 1 - Alejandro Silla Tejero</h1>
    <form action="" method="post">
        <label for="num1">Número 1:</label><br>
        <input type="text" name="num1"><br>
        <label for="num2">Número 2:</label><br>
        <input type="text" name="num2"><br><br>
        <select name="operaciones[]" multiple>
            <option value="+" name="+">Suma</option>
            <option value="-" name="-">Resta</option>
            <option value="/" name="/">División</option>
            <option value="*" name="*">Multiplicación</option>
        </select><br><br>
        <input type="submit" name="enviar" value="Enviar">


    </form>
</body>

</html>
