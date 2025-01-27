<?php

/**
 * @author Alejandro Silla Tejero
 */

// Funcion que recibe un numero de horas y devuelve el sueldo semanal
// si son 40 horas o menos, se paga a 12 euros la hora
// si son mas de 40 horas, se paga a 16 euros por las horas extras
function salarioHoras($horas){
    $sueldo = 0;

    // si son 40 horas o menos
    if($horas <= 40){
        $sueldo = $horas * 12 . "€ semanales.";
    }elseif($horas > 40){
        // calculamos el sueldo inicial
        $sueldoIncial = 480;
        // calculamos las horas extras
        $horasextra = $horas - 40 ;
        // calculamos el sueldo total
        $sueldo = ($horasextra * 16) + $sueldoIncial .  "€ semanales.";
    }

    return $sueldo;
}

if (isset($_POST['enviar'])) {
    $horas = $_POST['horas'];

    // si el valor es numerico
    if (is_numeric($horas)) {
        // llamamos a la funcion y mostramos el resultado
        echo "<p>" . salarioHoras($horas) . "</p>";
    }else{
        // si no es numerico, mostramos un mensaje de error
        echo "<p> El valor debe ser númerico. </p>";
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
    <h1>Ejercicio 4 - Alejandro Silla Tejero</h1>
    <form action="" method="post">
        <label for="horas">Dime las horas semanales: </label>
        <input type="text" name="horas">
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>
</html>
