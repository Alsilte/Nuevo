<?php

/**
 * @author Alejandro Silla Tejero
 */

// Funcion que devuelve la quincena correspondiente
// a un dia del mes
function quincena($dia)
{
    // variables locales
    $resultado = "";
    
    // si el dia es menor o igual a 15 y mayor a 0 
    // es primera quincena
    if ($dia <= 15 && $dia > 0) {
        $resultado = "Primera quincena";
    } 
    // si el dia es mayor a 15 y menor o igual a 31
    // es segunda quincena
    elseif ($dia > 15 && $dia <= 31) {
        $resultado =  "Segunda quincena";
    } 
    // si no cumple con niguna de las condiciones anteriores
    // no es un numero valido
    else {
        $resultado = "El número no puede ser menor a 1 ni mayor a 31";
    }
    
    // se devuelve el resultado
    return $resultado;
}

if (isset($_POST['enviar'])) {

    // se recoge el dia que se ha escrito en el formulario
    $dia = $_POST['fecha'];
    
    // si el dia es un numero
    if (is_numeric($dia)) {
        // se llama a la funcion quincena y se muestra el resultado
        echo "<p>" . quincena($dia) . "</p>";
    } 
    // si el dia no es un numero
    else {
        // se muestra un mensaje de error
        echo "<p> El valor debe ser numérico.</p>";
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
    <h1>Ejercicio 2 - Alejandro Silla Tejero</h1>
    <form action="" method="post">
        <label for="fecha">Dia: </label>
        <input type="text" name="fecha" placeholder="dia">
        <input type="submit" name="enviar" value="Enviar">

    </form>
</body>

</html>
