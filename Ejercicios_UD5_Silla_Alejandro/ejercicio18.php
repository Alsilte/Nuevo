<?php

/**
 * @author Alejandro Silla Tejero
 */

function media($numeros)
{
    $total = 0;
    foreach ($numeros as $value) {
        $total += $value; // Suma todos los valores para calcular la media
    }
    return $total / count($numeros); // Devuelve la media
}

function moda($numeros)
{
    $moda = [];
    foreach ($numeros as $value) {
        if (!isset($moda[$value])) {
            $moda[$value] = 0; // Inicializa el contador si no existe
        }
        $moda[$value]++;
    }

    $max = max($moda); // Encuentra la frecuencia más alta
    $resultados = array_keys($moda, $max); // Obtiene los números con frecuencia máxima

    if ($max == 1) {
        return []; // Si la frecuencia máxima es 1, no hay moda
    }

    return $resultados; // Retorna los números que son moda
}

function mediana($numeros)
{
    sort($numeros); // Ordena el array para calcular la mediana
    $count = count($numeros);
    $indice = floor($count / 2);

    if ($count % 2 == 1) {
        return $numeros[$indice]; // Retorna el número central si la cantidad es impar
    } else {
        return [$numeros[$indice - 1], $numeros[$indice]]; // Retorna los dos centrales si es par
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
    <h1>Ejercicio 18 - Alejandro Silla Tejero</h1>
    <form action="" method="post">

        <label for="cantidad">Cantidad: </label>
        <input type="text" name="cantidad" value="<?= isset($_POST['cantidad']) ? $_POST['cantidad'] : '' ?>"><br><br>

        <?php
        if (isset($_POST['enviar']) && !isset($_POST['calcular'])) {
            $cantidad = $_POST['cantidad'];
            if (is_numeric($cantidad) && $cantidad > 0) {
                echo "<input type='hidden' name='cantidad' value='$cantidad'>";

                for ($i = 1; $i <= $cantidad; $i++) { // Genera campos para cada número
                    echo "<label for='num$i'>Número $i: </label>";
                    echo "<input type='text' name='num$i'><br>";
                }

                echo "<br>";
                echo "<label for='Media'>Media: </label>";
                echo "<input type='checkbox' name='Media'><br>";
                echo "<label for='Moda'>Moda: </label>";
                echo "<input type='checkbox' name='Moda'><br>";
                echo "<label for='Mediana'>Mediana: </label>";
                echo "<input type='checkbox' name='Mediana'><br>";

                echo "<br><input type='submit' name='calcular' value='Calcular'>";
            } else {
                echo "Por favor, introduce un número válido para la cantidad.";
            }
        }

        if (isset($_POST['calcular'])) {
            $cantidad = $_POST['cantidad'];
            $numeros = [];

            for ($i = 1; $i <= $cantidad; $i++) {
                if (isset($_POST["num$i"]) && is_numeric($_POST["num$i"])) {
                    $numeros[] = floatval($_POST["num$i"]);
                } else {
                    echo "Todos los valores deben ser numéricos.";
                    exit; // Salida si hay un valor no numérico
                }
            }

            $calcularMedia = isset($_POST['Media']);
            $calcularModa = isset($_POST['Moda']);
            $calcularMediana = isset($_POST['Mediana']);

            echo "<h2>Resultados:</h2>";

            if ($calcularMedia) {
                $media = media($numeros);
                echo "<p><strong>Media:</strong> $media</p>";
            } else {
                echo "<p><strong>Media:</strong> No se ha calculado la media.</p>";
            }

            if ($calcularModa) {
                $moda = moda($numeros);
                if (count($moda) > 0) {
                    echo "<p><strong>Moda:</strong> " . implode(", ", $moda) . "</p>";
                } else {
                    echo "<p><strong>Moda:</strong> No hay moda, todos los números son únicos.</p>";
                }
            } else {
                echo "<p><strong>Moda:</strong> No se ha calculado la moda.</p>";
            }

            if ($calcularMediana) {
                $mediana = mediana($numeros);
                if (is_array($mediana)) {
                    echo "<p><strong>Mediana:</strong> " . implode(", ", $mediana) . "</p>";
                } else {
                    echo "<p><strong>Mediana:</strong> $mediana</p>";
                }
            } else {
                echo "<p><strong>Mediana:</strong> No se ha calculado la mediana.</p>";
            }

            if (!$calcularMedia && !$calcularModa && !$calcularMediana) {
                echo "<p>No seleccionaste ninguna opción de cálculo.</p>";
            }
        }
        ?>

        <br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>

</html>
