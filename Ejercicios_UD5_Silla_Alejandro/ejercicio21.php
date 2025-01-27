<?php

/**
 * @author Alejandro Silla Tejero
 */

// Definimos un listado de zonas horarias
$zonasHorarias = array(
    'Africa/Cairo',
    'Africa/Johannesburg',
    'Africa/Lagos',
    'Africa/Nairobi',
    'America/Argentina/Buenos_Aires',
    'America/Bogota',
    'America/Chicago',
    'America/Los_Angeles',
    'America/Mexico_City',
    'America/New_York',
    'America/Santiago',
    'America/Sao_Paulo',
    'Asia/Bangkok',
    'Asia/Hong_Kong',
    'Asia/Jakarta',
    'Asia/Kuala_Lumpur',
    'Asia/Seoul',
    'Asia/Shanghai',
    'Asia/Singapore',
    'Asia/Tokyo',
    'Asia/Taipei',
    'Asia/Ulaanbaatar',
    'Europe/Amsterdam',
    'Europe/Athens',
    'Europe/Berlin',
    'Europe/London',
    'Europe/Madrid',
    'Europe/Paris',
    'Pacific/Auckland',
    'Pacific/Honolulu',
    'Pacific/Sydney'
);

// Procesamos la solicitud POST al enviar el formulario
if (isset($_POST['enviar'])) {
    $zonaHoraria = $_POST['zonaHoraria'];
    
    // Verificamos si la zona horaria está en nuestro listado
    if (in_array($zonaHoraria, $zonasHorarias)) {
        // Configuramos la zona horaria seleccionada
        date_default_timezone_set($zonaHoraria);
        // Mostramos la hora actual de la zona horaria seleccionada
        echo "<p>Hora actual en $zonaHoraria: " . date("H:i:s") . "</p>";
    } else {
        // Mensaje de error si la zona horaria no es válida
        echo "<p>La zona horaria seleccionada no existe.</p>";
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
    <h1>Ejercicio 21 - Alejandro Silla Tejero</h1>
    <form action="" method="post">
        <label for="zonaHoraria">Zona horaria: </label>
        <select name="zonaHoraria" id="zonaHoraria">
            <option value="">Seleccione una zona horaria</option>
            <?php
            // Generamos las opciones del select a partir del listado de zonas horarias
            foreach ($zonasHorarias as $zonaHoraria) {
            ?>
                <option value="<?= $zonaHoraria ?>"><?= $zonaHoraria ?></option>
            <?php
            }
            ?>
        </select>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>

</html>
