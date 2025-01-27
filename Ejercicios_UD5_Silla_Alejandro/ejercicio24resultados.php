<?php

/**
 * @author: Alejandro Silla Tejero
 */

// Recoger los datos de la URL

// Si el dato existe y no esta vacio lo guardo en la variable
$nombre = $_GET["nombre"] ? $_GET["nombre"] : '';
$apellidos = $_GET["apellidos"] ? $_GET["apellidos"] : '';
$edad = $_GET['edad'] ? $_GET["edad"] : '';
$peso = $_GET['peso'] ? $_GET["peso"] : '';
$sexo = $_GET['sexo'] ? $_GET["sexo"] : '';
$estadoCivil = $_GET['estadoCivil'] ? $_GET["estadoCivil"] : '';

// Si el array de aficiones existe y no esta vacio lo guardo en la variable
$aficiones = isset($_GET['aficiones'])  ? $_GET["aficiones"] : '';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alejandro Silla Tejero</title>
</head>

<body>
    <h1>Ejercicio 24 -Datos Recogidos</h1>
    <p><strong>Nombre:</strong> <?php echo htmlspecialchars($nombre) ?></p>
    <p><strong>Apellidos:</strong> <?php echo htmlspecialchars($apellidos) ?></p>
    <p><strong>Edad:</strong> <?php echo htmlspecialchars($edad) ?></p>
    <p><strong>Peso:</strong> <?php echo htmlspecialchars($peso) ?></p>
    <p><strong>Sexo:</strong> <?php echo htmlspecialchars($sexo) ?></p>
    <p><strong>Estado Civil:</strong> <?php echo htmlspecialchars($estadoCivil) ?></p>
    <p><strong>Aficiones:</strong> <?php echo htmlspecialchars($aficiones) ?></p>
</body>

</html>
