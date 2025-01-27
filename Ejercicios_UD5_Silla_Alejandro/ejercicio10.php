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
    <h1>Ejercicio 10 - Alejandro Silla Tejero</h1>
    <form action="" method="post">
        <!-- Pedimos la cantidad de trabajadores para generar los campos de entrada -->
        <label for="cantidad">Cantidad de trabajadores: </label>
        <input type="text" name="cantidad"><br>

        <?php
        // Calcula el salario promedio de un array de salarios
        function mediaSalario($array)
        {
            $numTrabajadores = count($array); // Contamos los trabajadores, si no hay devuelve 0
            if ($numTrabajadores === 0) return 0; // Evita el error de dividir por cero

            $totalSalarios = array_sum($array); // Suma todos los salarios del array
            return $totalSalarios / $numTrabajadores; // Calcula la media
        }

        // Encuentra el salario máximo entre todos los trabajadores
        function salarioMax($array)
        {
            return max($array); // Devuelve el salario más alto
        }

        // Encuentra el salario mínimo entre todos los trabajadores
        function salarioMin($array)
        {
            return min($array); // Devuelve el salario más bajo
        }

        // Procesa el formulario al ser enviado
        if (isset($_POST['enviar'])) {
            // Chequea que la cantidad ingresada sea un número
            if (is_numeric($_POST['cantidad'])) {
                echo "<label for='trabajadores'> Trabajadores: </label><br>";
                // Genera los campos de entrada para cada trabajador
                for ($i = 1; $i <= $_POST['cantidad']; $i++) {
                    echo "<label for='trabajador[$i]'>Trabajador $i </label>";
                    echo "<input type='text' name='trabajador[$i]'>"; // Campo para el nombre del trabajador
                    echo "<label for='salario[$i]'>Salario </label>";
                    echo "<input type='text' name='salario[$i]'><br>"; // Campo para el salario del trabajador
                }
                // Selección múltiple para el tipo de cálculo de salario deseado
                echo '<label for="salario"> Tipo de salario: </label>
                      <select name="salarioTipo[]" multiple size="3">
                          <option value="salarioMax">Salario máximo</option>
                          <option value="salarioMin">Salario mínimo</option>
                          <option value="salarioProm">Salario medio</option>
                      </select>';
            }

            // Si los trabajadores y sus salarios están definidos
            if (isset($_POST['trabajador']) && isset($_POST['salario'])) {
                $trabajadores = []; // Array para almacenar nombres y salarios
                foreach ($_POST['trabajador'] as $key => $value) {
                    // Agrega solo trabajadores con salarios no vacíos
                    if (!empty($_POST['salario'][$key])) {
                        $trabajadores[$value] = $_POST['salario'][$key]; // Asocia el nombre al salario
                    }
                }

                // Procesa el tipo de cálculo seleccionado
                foreach ($_POST['salarioTipo'] as $value) {
                    if ($value == 'salarioMax') {
                        // Muestra el salario máximo
                        echo "<p>Salario máximo: " . salarioMax($trabajadores) . "</p>";
                    }
                    if ($value == 'salarioMin') {
                        // Muestra el salario mínimo
                        echo "<p>Salario mínimo: " . salarioMin($trabajadores) . "</p>";
                    }
                    if ($value == 'salarioProm') {
                        // Muestra el salario promedio
                        echo "<p>Salario medio: " . mediaSalario($trabajadores) . "</p>";
                    }
                }
            }
        }
        ?>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>

</html>
