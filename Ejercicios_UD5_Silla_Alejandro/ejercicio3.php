<?php

/**
 * @author Alejandro Silla Tejero
 */

// Función para convertir entre euros y pesetas
function conversor($cantidad, $convertir)
{
    $peseta = 166.39;
    $cambio = "";
    // Convertir de euros a pesetas
    if ($convertir == "pesetas") {
        $cambio =  $cantidad * $peseta . "pts";
    // Convertir de pesetas a euros
    } elseif ($convertir == "euros") {
        $cambio = $peseta / $cantidad . "€";
    }

    return $cambio;
}

if (isset($_POST['enviar'])) {

    $cantidad = $_POST['cantidad'];
    $convertir = $_POST['convertir'];

    // Validación para asegurar que la cantidad es numérica
    if (is_numeric($cantidad)) {
        echo "<p>" . conversor($cantidad, $convertir) . "</p>";
    } else {
        echo "El valor debe ser númerico";
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
    <h1>Ejercicio 3 - Alejandro Silla Tejero</h1>
    <form action="" method="post">
        <label for="cantidad">Cantidad: </label>
        <input type="text" name="cantidad"><br><br>
        <!-- Opciones de conversión -->
        <input type="radio" name="convertir" value="pesetas">Euros(€) a pesetas(pts)
        <input type="radio" name="convertir" value="euros">Pesetas(pts) a euros(€) <br><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>

</html>
