<?php

/**
 * @author: Alejandro Silla Tejero
 */

$nombre = "";
$pass = "";
$nivelEstudios = "";
$nacionalidad = "";
$email = "";
$idiomas = [];
$errores = [];
$imagenSubida = "";

require_once '../valida.php';

// Directorio donde se guardarán las imágenes
$nombreDirectorio = "img/";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recogida de datos del formulario
    $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : "";
    $pass   = isset($_POST['pass'])   ? $_POST['pass']          : "";
    $nivelEstudios = isset($_POST['nivelEstudios']) ? $_POST['nivelEstudios'] : "";
    $nacionalidad = isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : "";
    $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : "";
    $idiomas = isset($_POST['idiomas']) ? $_POST['idiomas'] : [];
    $imagenSubida = isset($_POST['imagenOculta']) ? $_POST['imagenOculta'] : "";

    // Validación solo si se presiona el botón "Validar"
    if (isset($_POST['validar'])) {
        // Validar nombre
        $errorNombre = validarNombre($nombre);
        if (!empty($errorNombre)) {
            $errores[] = $errorNombre;
        }

        // Validar contraseña
        $errorPass = validarPass($pass);
        if (!empty($errorPass)) {
            $errores[] = $errorPass;
        }

        // Validar email
        $errorEmail = validarEmail($email);
        if (!empty($errorEmail)) {
            $errores[] = $errorEmail;
        }

        // Validación de la imagen solo al validar
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            // Comprobamos que exista el directorio (y sea válido)
            if (!is_dir($nombreDirectorio)) {
                $errores[] = "El directorio '$nombreDirectorio' no existe o no es válido.";
            } else {
                // Comprobamos tamaño (máximo 50 KB)

                // Obtenemos el nombre del fichero original
                $nombreFichero = $_FILES['imagen']['name'];

                // Usamos pathinfo como alternativa (igualmente válida):
                $extension = strtolower(pathinfo($nombreFichero, PATHINFO_EXTENSION));

                // Definimos las extensiones válidas
                $extensionesValidas = ["jpg", "png", "gif"];

                if (!in_array($extension, $extensionesValidas)) {
                    $errores[] = "La extensión del fichero no es válida. Extensiones permitidas: jpg, png, gif.";
                } else {
                    // Generar nombre único con fecha-hora para evitar colisiones
                    $fechaHora = date("YmdHis");
                    $nombreFicheroUnico = $fechaHora . "-" . $nombreFichero;
                    $nombreCompleto = $nombreDirectorio . $nombreFicheroUnico;

                    // Subir el fichero al directorio
                    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $nombreCompleto)) {
                        $imagenSubida = $nombreCompleto;
                    } else {
                        $errores[] = "Error al mover el fichero al directorio definitivo.";
                    }
                }
            }
        } elseif (isset($_FILES['imagen']) && $_FILES['imagen']['error'] !== UPLOAD_ERR_NO_FILE) {
            // Si hay un error en la subida que no sea "no se ha subido ningún archivo"
            $errores[] = "No se puede subir más de 50 kB.";
        } elseif (empty($imagenSubida)) {
            // Si no se ha subido ningún archivo y no hay una imagen ya subida
            $errores[] = "No se ha subido ningún fichero.";
        }
    }

    // Si hemos pulsado 'Enviar' y no hay errores, redirigimos a la página de resultado
    if (isset($_POST['enviar']) && empty($errores)) {
        // Redirigimos pasando datos por GET, incluyendo la imagen
        header(
            'Location: ejercicio25resultado.php?nombre=' . urlencode($nombre)
                . '&email=' . urlencode($email)
                . '&nivelEstudios=' . urlencode($nivelEstudios)
                . '&idiomas=' . urlencode(implode(",", $idiomas))
                . '&imagen=' . urlencode($imagenSubida)
                // Incluimos también el nombre y el grupo:
                . '&autor=' . urlencode("Alejandro Silla Tejero")
                . '&grupo=' . urlencode("2DAW")
        );
        exit;
    }

    // Botón limpiar
    if (isset($_POST['limpiar'])) {
        $nombre = "";
        $pass = "";
        $nivelEstudios = "";
        $nacionalidad = "";
        $email = "";
        $idiomas = [];
        $errores = [];
        $imagenSubida = "";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 25 - Alejandro Silla Tejero</title>
</head>

<body>
    <h1>Ejercicio 25 - Alejandro Silla Tejero</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <!-- Campo oculto para limitar el tamaño del archivo a 50 KB -->
        <input type="hidden" name="MAX_FILE_SIZE" value="51200">

        <label for="nombre">Nombre completo: </label>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>"><br><br>

        <label for="pass">Contraseña (mínimo 6 caracteres): </label>
        <input type="password" name="pass" value="<?php echo htmlspecialchars($pass); ?>"><br><br>

        <label for="nivelEstudios">Nivel de estudios: </label>
        <select name="nivelEstudios">
            <option value="sinEstudios" <?php echo $nivelEstudios == 'sinEstudios' ? 'selected' : '' ?>>Sin Estudios</option>
            <option value="secundaria" <?php echo $nivelEstudios == 'secundaria' ? 'selected' : '' ?>>Educación Secundaria Obligatoria</option>
            <option value="bachillerato" <?php echo $nivelEstudios == 'bachillerato' ? 'selected' : '' ?>>Bachillerato</option>
            <option value="formacionProfesional" <?php echo $nivelEstudios == 'formacionProfesional' ? 'selected' : '' ?>>Formación Profesional</option>
            <option value="universidad" <?php echo $nivelEstudios == 'universidad' ? 'selected' : '' ?>>Estudios Universitarios</option>
        </select><br><br>

        <label for="nacionalidad">Nacionalidad: </label>
        <input type="radio" name="nacionalidad" value="espanola" <?php echo $nacionalidad == 'espanola' ? 'checked' : '' ?>> Española
        <input type="radio" name="nacionalidad" value="otra" <?php echo $nacionalidad == 'otra' ? 'checked' : '' ?>> Otra <br><br>

        <label for="idiomas">Idiomas:</label>
        <select name="idiomas[]" multiple size="5">
            <option value="espanol" <?php if (in_array("espanol", $idiomas)) echo "selected"; ?>>Español</option>
            <option value="ingles" <?php if (in_array("ingles", $idiomas)) echo "selected"; ?>>Inglés</option>
            <option value="frances" <?php if (in_array("frances", $idiomas)) echo "selected"; ?>>Francés</option>
            <option value="aleman" <?php if (in_array("aleman", $idiomas)) echo "selected"; ?>>Alemán</option>
            <option value="italiano" <?php if (in_array("italiano", $idiomas)) echo "selected"; ?>>Italiano</option>
        </select><br><br>

        <label for="email">Email: </label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>"><br><br>

        <label for="imagen">Adjuntar Foto (sólo jpg, gif, png | máx. 50KB): </label>
        <!-- Campo oculto para conservar la imagen si ya se subió -->
        <input type="hidden" name="imagenOculta" value="<?php echo htmlspecialchars($imagenSubida); ?>">
        <input type="file" name="imagen"><br><br>

        <input type="submit" name="validar" value="Validar">
        <input type="submit" name="enviar" value="Enviar">
        <input type="submit" name="limpiar" value="Limpiar">

        <?php
        // Mostrar errores si los hay
        if (!empty($errores)) {
            echo "<ul>";
            foreach ($errores as $error) {
                echo "<li style='color: red;'>$error</li>";
            }
            echo "</ul>";
        }

        // Si se pulsa Validar y no hay errores, mostramos un mensaje de éxito
        if (isset($_POST['validar']) && empty($errores)) {
            echo "<p style='color: green;'>Formulario validado correctamente</p>";
            // Mostrar datos introducidos
            echo "<p><strong>Nombre:</strong> " . htmlspecialchars($nombre) . "</p>";
            echo "<p><strong>Contraseña:</strong> " . htmlspecialchars($pass) . "</p>";
            echo "<p><strong>Nivel de estudios:</strong> " . htmlspecialchars($nivelEstudios) . "</p>";
            echo "<p><strong>Nacionalidad:</strong> " . htmlspecialchars($nacionalidad) . "</p>";

            if (!empty($idiomas)) {
                echo "<p><strong>Idiomas:</strong></p>";
                echo "<ul>";
                foreach ($idiomas as $idioma) {
                    echo "<li>" . htmlspecialchars($idioma) . "</li>";
                }
                echo "</ul>";
            }

            echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";

            // Mostrar imagen subida si existe
            if (!empty($imagenSubida)) {
                echo "<p><strong>Fichero subido con el nombre:</strong> " . htmlspecialchars($imagenSubida) . "</p>";
                echo "<img src='" . htmlspecialchars($imagenSubida) . "' alt='Imagen Subida' style='max-width: 200px;'>";
            }
        }
        ?>
    </form>
    
</body>

</html>