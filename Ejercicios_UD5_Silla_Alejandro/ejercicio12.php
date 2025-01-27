<?php

/**
 * @author Alejandro Silla Tejero
 */

// Inicializo la clave y los intentos
$intentos = 4;

// Si no se ha enviado el formulario de la clave
if (!isset($_POST['clave'])) {
    $clave = 1234;
    $intentos = 4; // 4 intentos
} else {
    $clave = $_POST['clave'];
    $intentos = $_POST['intentos'];
}

// Funcion que genera el formulario para introducir la clave
function generar_formulario($intentos, $clave)
{
    ?>
    <h3><?php echo "Intentos restantes: " . $intentos; ?></h3>
    <form action="" method="post">
        <label for="num">Clave:</label>
        <input type="text" name="combinacion" maxlength="4" required>
        <input type="hidden" name="clave" value="<?php echo $clave; ?>">
        <input type="hidden" name="intentos" value="<?php echo $intentos; ?>">
        <input type="submit" value="Enviar" name="enviar">
    </form>
    <?php
}

// Funcionamiento del ejercicio
if (isset($_POST['enviar'])) {
    // Recojo la combinación del form
    $combinacion = $_POST["combinacion"];
    // Compruebo que sea numérico
    if (is_numeric($combinacion)) {
        // Boolean para tratar el final del juego
        $find = false;
        // Lógica del programa
        if ($intentos > 0) {
            if ($combinacion == $clave) {
                echo "<p style='color: green;'>La caja fuerte se ha abierto satisfactoriamente.</p>";
                $find = true;
                $intentos = 0; // Finaliza el juego
            } else if ($combinacion != $clave) {
                echo "<p style='color: red;'>Lo siento, esa no es la combinación.</p>";
                $intentos--;
            }
        } else if ($intentos == 0 && !$find) {
            echo "No has acertado la combinación, la combinación era: " . $clave;
        }
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
    <h1>Ejercicio 12 - Alejandro Silla Tejero</h1>
    <?php
    if ($intentos > 0) {
        // Genero el formulario para introducir la clave
        generar_formulario($intentos, $clave);
    }
    ?>
</body>

</html>
