<?php

/**
 * @author Alejandro Silla Tejero
 */

// Función que recibe un caracter y devuelve 
// un texto que indica el tipo de caracter que es
function caracter($caracter)
{

    $texto  = "";

    // Comprobamos si es un caracter mayuscula
    if (ctype_upper($caracter)) {
        $texto =  "Es una letra mayúscula.\n";
    // Comprobamos si es un caracter minuscula
    } elseif (ctype_lower($caracter)) {
        $texto =  "Es una letra minúscula.\n";
    // Comprobamos si es un caracter numerico
    } elseif (ctype_digit($caracter)) {
        $texto =  "Es un carácter numérico.\n";
    // Comprobamos si es un caracter en blanco
    } elseif (ctype_space($caracter)) {
        $texto =  "Es un carácter en blanco.\n";
    // Comprobamos si es un caracter de puntuación
    } elseif (ctype_punct($caracter)) {
        $texto =  "Es un carácter de puntuación.\n";
    // Si no es ninguno de los anteriores, es un caracter especial
    } else {
        $texto =  "Es un carácter especial.\n";
    }

    return $texto;
}

if (isset($_POST['enviar'])) {
    $caracter = $_POST['caracter'];

    echo "<p>" . caracter($caracter) . "</p>";
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
    <h1>Ejercicio 5 - Alejandro Silla Tejero</h1>
    <form action="" method="post">
        <label for="caracter">Escribe un carácter: </label>
        <input type="text" name="caracter" maxlength="1">
        <input type="submit" value="Enviar" name="enviar">
    </form>
</body>

</html>
