<?php

/**
 * @Author: Alejandro Silla Tejero
 * 
 * Este script permite seleccionar palabras en inglés y muestra
 * sus traducciones al castellano al enviar el formulario.
 */

$palabras = [
    "house",
    "tree",
    "cat",
    "dog",
    "car",
    "table",
    "book",
    "pen",
    "phone",
    "computer",
    "mouse",
];

$palabrasCastellano = [
    "casa",
    "arbol",
    "gato",
    "perro",
    "coche",
    "mesa",
    "libro",
    "lapiz",
    "telefono",
    "ordenador",
    "raton",
];

// Procesa la solicitud POST cuando el formulario es enviado
if (isset($_POST['enviar'])) {
    $opcion = $_POST['palabras']; // Recoge las palabras seleccionadas
    foreach ($opcion as $value) {
        // Muestra la traducción correspondiente
        echo "<p>La traducción de " . $palabras[$value - 1] . " es: " . $palabrasCastellano[$value - 1] . "</p>";
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
    <h1>Ejercicio 17 - Alejandro Silla Tejero</h1>
    <form action="" method="post">
        <label for="palabras">Palabras en ingles: </label><br>
        <select name="palabras[]" multiple size="10">
            <!-- Lista de palabras en inglés para seleccionar -->
            <option value="1">house</option>
            <option value="2">tree</option>
            <option value="3">cat</option>
            <option value="4">dog</option>
            <option value="5">car</option>
            <option value="6">table</option>
            <option value="7">book</option>
            <option value="8">pen</option>
            <option value="9">phone</option>
            <option value="10">computer</option>
        </select><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>

</html>
