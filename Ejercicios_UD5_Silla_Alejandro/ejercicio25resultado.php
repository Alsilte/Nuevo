<?php
/**
 * @author: Alejandro Silla Tejero
 */

// Recuperar los datos enviados por la URL
$nombre = isset($_GET['nombre']) ? htmlspecialchars($_GET['nombre']) : "No especificado";
$email = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : "No especificado";
$nivelEstudios = isset($_GET['nivelEstudios']) ? htmlspecialchars($_GET['nivelEstudios']) : "No especificado";
$idiomas = isset($_GET['idiomas']) ? htmlspecialchars($_GET['idiomas']) : "No especificado";
$imagen = isset($_GET['imagen']) ? htmlspecialchars($_GET['imagen']) : null;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del Formulario</title>
</head>

<body>
    <h1>El archivo se ha subido con éxito</h1>
    <h2>Alejandro Silla Tejero - 2ºDAW</h2>

    <p><strong>Nombre completo:</strong> <?= $nombre ?></p>
    <p><strong>Email:</strong> <?= $email ?></p>
    <p><strong>Nivel de estudios:</strong> <?= $nivelEstudios ?></p>

    
    <p><strong>Idiomas:</strong></p>
    <?php if (!empty($idiomas)): ?>
        <ul>
            <?php foreach (explode(',', $idiomas) as $idioma): ?>
                <li><?= htmlspecialchars($idioma) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No especificados.</p>
    <?php endif; ?>

        <p><strong>Imagen subida:</strong></p>
        <img src="<?= $imagen ?>" alt="Imagen Subida" style="max-width: 200px;">
</body>

</html>
