<?php

/**
 * @author Alejandro Silla Tejero
 */

if (isset($_POST['enviar'])) {
    // Recoge el correo introducido por el usuario
    $email = $_POST['correo'];
    // Recoge el correo de confirmación
    $confirmarEmail = $_POST['confirmarCorreo'];
    // Comprueba si el usuario quiere recibir publicidad
    $publicidad = isset($_POST['publicidad']) ? "on" : "off";

    // Valida el formato del correo y que ambos correos coincidan
    if (filter_var($email, FILTER_VALIDATE_EMAIL) && $email === $confirmarEmail) {
        // Redirige a otra página con los datos del correo y preferencia de publicidad
        header("Location: confirmar.php?correo=$email&publicidad=$publicidad");
        exit;
    } else {
        // Muestra un mensaje de error si el formato no es válido o los correos no coinciden
        echo "<p>Los correos no coinciden o el formato no es válido</p>";
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
    <h1>Ejercicio 22 - Alejandro Silla Tejero</h1>

    <form method="post" action="">
        <fieldset>
            <legend>Newsletter</legend>
            <label for="correo">Correo:</label>
            <input type="text" name="correo" maxlength="250" placeholder="usuario@ejemplo.com"><br><br>
            <label for="confirmarCorreo">Confirma tu correo: </label>
            <input type="text" name="confirmarCorreo"><br><br>
            <input type="checkbox" name="publicidad"> Deseo recibir publicidad <br><br>
            <input type="reset" name="borrar" value="Borrar">
            <input type="submit" name="enviar" value="Enviar">
        </fieldset>
    </form>
</body>

</html>
