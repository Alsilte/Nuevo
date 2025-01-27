<?php

/**
 * @author Alejandro Silla Tejero
 */
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alejandro Silla Tejero</title>
</head>

<body>
    <h1>Ejercicio 11 - Alejandro Silla Tejero</h1>
    <form action="" method="post">
        <!-- Campo para ingresar la cantidad de trabajadores -->
        <label for="cantidad">Cantidad de trabajadores: </label>
        <input type="text" name="cantidad"><br>

        <?php
        // Función para calcular la media de salarios
        function salarioAumentado($salario, $porcentaje)
        {

            $salarioAumentado = $salario + ($salario * $porcentaje / 100);

            return $salarioAumentado;
        }

        // Comienza a procesar el formulario al enviar
        if (isset($_POST['enviar'])) {
            // Verifica que la cantidad de trabajadores sea un número
            if (is_numeric($_POST['cantidad'])) {
                echo "<label for='trabajadores'> Trabajadores: </label><br>";
                // Genera campos de entrada para cada trabajador
                for ($i = 1; $i <= $_POST['cantidad']; $i++) {
                    echo "<label for='trabajador[$i]'>Trabajador $i </label>";
                    echo "<input type='text' name='trabajador[$i]'>"; // Nombre del trabajador
                    echo "<label for='salario[$i]'>Salario </label>";
                    echo "<input type='text' name='salario[$i]'><br><br>"; // Salario del trabajador
                }
                // Selección para el tipo de cálculo de salario
                echo '<label for="salario"> Porcentaje de aumento: </label>
                    <input type="text" name="porcentaje">';
            } else {
                echo "La cantidad de trabajadores debe ser un número <br>";
            }

            // Procesa los salarios de los trabajadores si están definidos
            if (isset($_POST['trabajador']) && isset($_POST['salario'])) {
                $trabajadores = []; // Array para almacenar los trabajadores y sus salarios
                foreach ($_POST['trabajador'] as $key => $value) {
                    // Solo agrega trabajadores que tienen un salario definido
                    $trabajadores[$value] = $_POST['salario'][$key]; // Asocia el nombre con el salario

                }

                foreach ($trabajadores as $nombre => $salario) {
                    echo "<p> Salario actual de $nombre: $salario €. Salario aumentado: " . salarioAumentado($salario, $_POST['porcentaje']) . " €.</p>";
                }
            }
        }
        ?>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>

</html>
