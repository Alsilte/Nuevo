<?php

/**
 * @author Alejandro Silla Tejero
 */

if (isset($_POST['enviar'])) {
    // Recogemos los datos del formulario
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $edad = $_POST['edad'];
    $peso = $_POST['peso'];
    $sexo = $_POST['sexo'];
    $estadoCivil = $_POST['estadoCivil'];
    // Comprobamos si se han enviado aficiones, si no, inicializamos como un array vacío
    $aficiones = isset($_POST['aficiones']) ? $_POST['aficiones'] : [];

    // Creamos un array para almacenar errores
    $errores = [];

    // Validamos si el nombre y apellidos no están vacíos y contienen solo letras y espacios
    if (empty($nombre) || empty($apellidos)) {
        $errores[] = "El nombre y los apellidos son obligatorios.";
    } elseif (!preg_match('/^[a-zA-Z\s]+$/', $nombre) || !preg_match('/^[a-zA-Z\s]+$/', $apellidos)) {
        $errores[] = "El nombre y los apellidos deben contener solo letras y espacios.";
    }

    // Verificamos que la edad no esté vacía y sea un número
    if (empty($edad) || !is_numeric($edad)) {
        $errores[] = "La edad debe ser un número.";
    }

    // Verificamos que el peso no esté vacío y sea un número
    if (empty($peso) || !is_numeric($peso)) {
        $errores[] = "El peso debe ser un número.";
    }elseif ($peso < 10 || $peso > 150) {
        $errores[] = "El peso debe estar entre 10 y 150 kg.";
    }

    // Validamos que el sexo esté seleccionado
    if (empty($sexo)) {
        $errores[] = "El sexo es obligatorio.";
    }

    // Validamos que el estado civil esté seleccionado
    if (empty($estadoCivil)) {
        $errores[] = "El estado civil es obligatorio.";
    }

    // Si no hay errores, redirigimos a la página de resultados con los datos
    if (empty($errores)) {
        header('Location: ejercicio24resultados.php?nombre=' . urlencode($nombre) .
            '&apellidos=' . urlencode($apellidos) .
            '&edad=' . urlencode($edad) .
            '&peso=' . urlencode($peso) .
            '&sexo=' . urlencode($sexo) .
            '&estadoCivil=' . urlencode($estadoCivil) .
            '&aficiones=' . urlencode(implode(',', $aficiones)));
        exit; // Aseguramos que no se ejecute más código después de la redirección
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
    <h1>Ejercicio 24 - Alejandro Silla Tejero</h1>

    <form action="" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre"><br>
        <label for="apellidos">Apellidos: </label>
        <input type="text" name="apellidos"><br>
        <label for="edad">Edad: </label>
        <input type="text" name="edad"><br>
        <label for="peso">Peso: </label>
        <input type="text" name="peso"><br>
        <label for="sexo">Sexo: </label>
        <input type="radio" name="sexo" value="M"> Hombre
        <input type="radio" name="sexo" value="F"> Mujer <br>
        <label for="estadoCivil">Estado Civil: </label>
        <select name="estadoCivil">
            <option value=""></option>
            <option value="Soltero">Soltero</option>
            <option value="Casado">Casado</option>
            <option value="Viudo">Viudo</option>
            <option value="Divorciado">Divorciado</option>
            <option value="otro">Otro</option>
        </select><br>
        <label for="aficiones">Aficiones: </label>
        <input type="checkbox" name="aficiones[]" value="cine"> Cine
        <input type="checkbox" name="aficiones[]" value="deporte"> Deporte
        <input type="checkbox" name="aficiones[]" value="Literatura"> Literatura
        <input type="checkbox" name="aficiones[]" value="musica"> Música
        <input type="checkbox" name="aficiones[]" value="comics"> Cómics
        <input type="checkbox" name="aficiones[]" value="series"> Series
        <input type="checkbox" name="aficiones[]" value="videojuegos"> Videojuegos<br>

        <input type="reset" name="borrar" value="Borrar">
        <input type="submit" name="enviar" value="Enviar">

        <!-- Mostrar errores si los hay -->
        <?php
        if (isset($errores) && !empty($errores)) {
            foreach ($errores as $error) {
                echo "<p style='color: red;'>$error</p>";
            }
        }
        ?>
    </form>
</body>

</html>

