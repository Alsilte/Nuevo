<?php

/**
 * @author: Alejandro Silla Tejero
 */

// Recoger los datos de la URL, y asignarlos a variables, en caso de que esten vacios, asignar un string vacio
// Se utiliza el operador ternario para asignar el valor de la variable en caso de que esten definidas
$nivelEstudios = isset($_GET['nivelEstudios']) ? $_GET['nivelEstudios'] : '';
$situacionActual = isset($_GET['situacionActual']) ? $_GET['situacionActual'] : '';
$hobbies = isset($_GET['hobbies']) ? $_GET['hobbies'] : '';
$otrosHobbies = isset($_GET['otrosHobbies']) ? $_GET['otrosHobbies'] : '';

// Mostrar los datos recogidos en la pantalla, utilizando htmlspecialchars para escapar los caracteres especiales
// y mostrar correctamente los datos en la pantalla
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alejandro Silla Tejero</title>
</head>

<body>
    <h1>Ejercicio 23 -Datos Recogidos</h1>
    <p><strong>Nivel de estudios:</strong> <?php echo htmlspecialchars($nivelEstudios) ?></p>
    <p><strong>Situación actual:</strong> <?php echo htmlspecialchars($situacionActual) ?></p>
    <p><strong>Hobbies:</strong> <?php echo htmlspecialchars($hobbies) ?></p>
    <p><strong>Otros hobbies:</strong> <?php echo htmlspecialchars($otrosHobbies) ?></p>
</body>

</html>
