<?php
if (isset($_POST['enviar'])) {
    // Recoger los datos del formulario
    $nivelEstudios = $_POST['nivelEstudios'];
    // Si 'situacionActual' está definido, obtener sus valores (puede ser un array si se seleccionan varias opciones)
    $situacionActual = isset($_POST['situacionActual']) ? $_POST['situacionActual'] : [];
    // Obtener los valores de hobbies, puede ser un array si se seleccionan múltiples opciones
    $hobbies = isset($_POST['hobbies']) ? $_POST['hobbies'] : [];
    // Obtener el valor de 'otrosHobbies', que es un campo de texto
    $otrosHobbies = $_POST['otrosHobbies'];

    // Validar que el campo nivelEstudios no esté vacío
    if (empty($nivelEstudios)) {
        $error = "Debes seleccionar un nivel de estudios.";
    } elseif (empty($situacionActual)) {
        $error = "Debes seleccionar al menos una situación actual.";
    }

    // Si no hay errores, redirigir a la página de resultados
    if (!isset($error)) {
        // Se utiliza 'header' para redirigir al usuario a otra página (resultados.php)
        // En la URL de la redirección, se pasan los datos recogidos, asegurándose de que no haya problemas con caracteres especiales o espacios
        header('Location: ejercicio23resultados.php?nivelEstudios=' . urlencode($nivelEstudios) .
            // Convertir el array de 'situacionActual' en una cadena separada por comas, luego usar urlencode para garantizar que sea seguro para la URL
            '&situacionActual=' . urlencode(implode(', ', $situacionActual)) .
            // Lo mismo para los hobbies, convertir el array en una cadena separada por comas y asegurarse de que sea seguro para la URL
            '&hobbies=' . urlencode(implode(', ', $hobbies)) .
            // 'otrosHobbies' es solo un campo de texto, por lo que simplemente lo pasamos y lo aseguramos con urlencode
            '&otrosHobbies=' . urlencode($otrosHobbies));
        exit; // Asegura que no se ejecute más código después de la redirección
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
    <h1>Ejercicio 23 - Alejandro Silla Tejero</h1>

    <form action="" method="post">
        <label for="nivelEstudios">Nivel de estudios:</label>
        <select name="nivelEstudios">
            <option value="">Selecciona un nivel</option>
            <option value="primaria">Primaria</option>
            <option value="secundaria">Secundaria</option>
            <option value="bachillerato">Bachillerato</option>
            <option value="universidad">Universidad</option>
        </select> <br><br>

        <label for="situacionActual">Situación actual:</label><br>
        <select name="situacionActual[]" multiple>
            <option value="estudiando">Estudiando</option>
            <option value="trabajando">Trabajando</option>
            <option value="buscandoEmpleo">Buscando empleo</option>
            <option value="desempleado">Desempleado</option>
        </select><br><br>

        <label for="hobbies">Hobbies:</label><br>
        <input type="checkbox" name="hobbies[]" value="deportes"> Deportes
        <input type="checkbox" name="hobbies[]" value="lectura"> Lectura
        <input type="checkbox" name="hobbies[]" value="viajar"> Viajar
        <input type="checkbox" name="hobbies[]" value="otros"> Otros
        <input type="text" name="otrosHobbies" placeholder="Especifique"> <br><br>

        <input type="submit" name="enviar" value="Enviar">

        <!-- Si hay un error, mostrarlo en pantalla -->
        <?php if (isset($error)) {
            echo "<p style='color: red;'>$error</p>";
        } ?>
    </form>
</body>

</html>