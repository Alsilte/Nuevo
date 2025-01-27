<?php

/**
 * @author: Alejandro Silla Tejero
 */


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alejandro Silla - Formulario de registro 4</title>
</head>

<body>
    <h1>Alejandro Silla - Formulario de registro 4</h1>
    <form action="" method="POST">
        <fieldset>
            <legend><b>Bloque Datos Personales</b></legend><br>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" maxlength="50" placeholder="Escriba su nombre"><br><br>
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" maxlength="200" placeholder="Escriba su apellido"><br><br>
            <label for="correo">Correo: </label>
            <input type="text" name="correo" maxlength="250" placeholder="usuario@empresa.com"><br><br>
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" maxlength="5" placeholder="Escriba su nombre de usuario"><br><br>
            <label for="pass">Contraseña:</label>
            <input type="password" name="pass" maxlength="15" placeholder="Escriba una contraseña"><br><br>
            <label for="sexo">Sexo:</label>
            <input type="radio" name="sexo" value="M" CHECKED> Hombre
            <input type="radio" name="sexo" value="F"> Mujer <br><br>
        </fieldset>

        <fieldset>
            <legend><b>Bloque Datos de contacto</b></legend><br>
            <label for="provincia">Provincia:</label>
            <select name="provincia">
                <option value=""> </option>
                <option value="castellon">Castellón</option>
                <option value="valencia">Valencia</option>
                <option value="alicante">Alicante</option>
            </select> <br><br>
            <label for="horario">Horario de contacto:</label>
            <select name="horario[]" multiple size="3">
                <option value=" 8-14">De 8 a 14 horas</option>
                <option value="14-18">De 14 a 18 horas</option>
                <option value="18-21">De 18 a 21 horas</option>
            </select><br><br>
            <label for="conocer">¿Cómo nos ha conocido?</label><br>
            <input type="checkbox" name="conocer[]" value="amigo"> Un amigo
            <input type="checkbox" name="conocer[]" value="web"> Web
            <input type="checkbox" name="conocer[]" value="otros"> Otros
        </fieldset>

        <fieldset>
            <legend><b>Bloque Datos de la incidencia</b></legend><br>
            <label for="incidencia">Tipo incidencia:</label>
            <select name="incidencia">
                <option value=""></option>
                <option value="telFijo">Teléfono fijo</option>
                <option value="movil">Teléfono móvil</option>
                <option value="internet">Internet</option>
                <option value="television">Televisión</option>
            </select><br><br>
            <label for="comentarioIncidencia">Comentario incidencia:</label>
            <textarea name="comentarioIncidencia" cols="40" rows="4"></textarea>
        </fieldset><br>

        <fieldset>
            <input type="submit" name="enviar" value="Enviar">
            <input type="reset" name="borrar" value="Limpiar">
        </fieldset>
    </form>

    <?php
    if (isset($_POST['enviar'])) {
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $correo = $_POST['correo'];
        $usuario = $_POST['usuario'];
        $pass = $_POST['pass'];
        $sexo = $_POST['sexo'];
        $provincia = $_POST['provincia'];
        $horario = $_POST['horario'];
        $conocer = $_POST['conocer'];
        $comentarioIncidencia = $_POST['comentarioIncidencia'];
        $incidencia = $_POST['incidencia'];

        echo " <p><i>Nombre: </i><b>" . strtoupper($nombre) . " </b></p>";
        echo " <p><i>Apellidos: </i><b>" . strtoupper($apellidos) . " </b></p>";
        echo " <p><i> Correo: </i><b>" . strtoupper($correo) . "</b></p>";
        echo " <p><i> Usuario: </i><b>" .  strtoupper($usuario) . "</b></p>";
        echo " <p><i> Contrasenya: </i><b>" .  strtoupper($pass) . "</b></p>";
        echo " <p><i>Sexo: </i><b>" . strtoupper($sexo) . " </b></p>";
        echo " <p><i> Provincia: </i><b>" . strtoupper($provincia) . "</b></p>";
        echo "<p><i>Horario de contacto: </i><b>" . (isset($horario) ? strtoupper(implode(" - ", $horario)) : "No especificado") . "</b></p>";
        echo "<p><i> Fuentes: </i><b>" . (isset($conocer) ? strtoupper(implode("-", $conocer)) : "Fuente no especificada") . "</b></p>";
        echo "<p><i> Tipo de incidencia: </i><b>" . strtoupper($incidencia) . "</b></p>";
        echo " <p><i> Comentario: </i><b>" . strtoupper($comentarioIncidencia) . "</b></p>";
    }
    ?>

</body>

</html>