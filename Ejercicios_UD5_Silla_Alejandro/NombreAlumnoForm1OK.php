<?php

/**
 * @author: Alejandro Silla Tejero
 */
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alejandro Silla - Formulario de registro</title>
</head>

<body>
    <h1>Alejandro Silla - Formulario de registro</h1>
    <form action="" method="get">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" maxlength="50"><br><br>
        <label for="apellidos">Apellidos: </label>
        <input type="text" name="apellidos" maxlength="200"><br><br>
        <label for="sexo">Sexo: </label>
        <input type="radio" name="sexo" value="M">Hombre
        <input type="radio" name="sexo" value="F">Mujer <br><br>
        <label for="correo">Correo: </label>
        <input type="text" name="correo" maxlength="250"><br><br>
        <label for="provincia">Provincia:</label>
        <select name="provincia">
            <option value="castellon">Castellón</option>
            <option value="valencia">Valencia</option>
            <option value="alicante">Alicante</option>
        </select> <br><br>
        <input type="checkbox" name="informacion" CHECKED> Deseo recibir información sobre novedades y ofertas <br><br>
        <input type="checkbox" name="condiciones"> Declaro haber leído y aceptar las condiciones generales
        del programa y la normativa sobre protección de datos <br><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>

    <?php

    // Comprueba si se ha enviado el formulario
    if (isset($_GET['enviar'])) {

        // Comprueba que el nombre sea alfabético
        if (ctype_alpha($_GET['nombre'])) {
            echo "<p> <i>Nombre:</i> <b>" . $_GET['nombre'] . "</b></p>";
        } else {
            echo "<p> Debe ser alfabético</p>";
        }

        // Comprueba que los apellidos sean alfabéticos
        if (ctype_alpha($_GET['apellidos'])) {
            echo "<p> <i>Apellidos:</i> <b>" . $_GET['apellidos'] . "</b></p>";
        } else {
            echo "<p> Debe ser alfabético</p>";
        }

        // Muestra el sexo seleccionado
        echo "<p> <i>Sexo:</i> <b>" . $_GET['sexo'] . "</b></p>";

        // Comprueba si el correo es válido
        if (filter_var($_GET['correo'], FILTER_VALIDATE_EMAIL)) {
            echo "<p> <i>Correo:</i> <b>" . $_GET['correo'] . "</b></p>";
        } else {
            echo "<p> Debe ser un correo</p>";
        }

        // Muestra la provincia seleccionada
        echo "<p> <i>Provincia:</i> <b>" . $_GET['provincia'] . "</b></p>";

        // Muestra si se ha marcado la casilla de "deseo recibir información"
        echo "<p> <i>Información:</i> <b>" . (isset($_GET['informacion']) ? "Desea información" : "No desea información") . "</b></p>";

        // Muestra si se ha marcado la casilla de "acepto las condiciones"
        echo "<p> <i>Condiciones:</i> <b>" . (isset($_GET['condiciones']) ? "Acepta condiciones" : "No acepta condiciones") . "</b></p>";
    }
    ?>
</body>

</html>
