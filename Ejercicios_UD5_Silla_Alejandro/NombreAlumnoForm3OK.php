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
    <title>Alejandro Silla - Formulario de registro 3</title>
</head>
<body>
    <h1>Alejandro Silla - Formulario de registro 3</h1>
    <form action="" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" maxlength="50"><br><br>
        <label for="apellidos">Apellidos: </label>
        <input type="text" name="apellidos" maxlength="200"><br><br>
        <label for="correo">Correo: </label>
        <input type="text" name="correo" maxlength="250"></label><br><br>
        <label for="usuario">Usuario: </label>
        <input type="text" name="usuario" maxlength="5"><br><br>
        <label for="pass">Contraseña:</label>
        <input type="password" name="pass" maxlength="15"><br><br>
        <label for="sexo">Sexo: </label>
        <input type="radio" name="sexo" value="M">Hombre
        <input type="radio" name="sexo" value="F">Mujer <br><br>
        <label for="provincia">Provincia:</label>
        <select name="provincia" >
            <option value=""></option>
            <option value="castellon">Castellón</option>
            <option value="valencia">Valencia</option>
            <option value="alicante">Alicante</option>
        </select> <br><br>
        <label for="horario">Horario de contacto: </label>
        <select name="horario[]" multiple size="2">
            <option value=" 8-14">De 8 a 14 horas</option>
            <option value="14-18">De 14 a 18 horas</option>
            <option value="18-21">De 18 a 21 horas</option>
        </select> <br><br>
        <label for="conocer[]">¿Cómo nos ha conocido?</label> <br>
        <input type="checkbox" name="conocer[]" value="amigo"> Un amigo
        <input type="checkbox" name="conocer[]" value="web"> Web
        <input type="checkbox" name="conocer[]" value="otros"> Otros <br><br>
        <label for="comentarios">Comentario:</label>
        <textarea name="comentarios" cols="60" rows="6"></textarea><br><br>
        <input type="checkbox" name="informacion" checked>Deseo recibir información sobre novedades y ofertas <br><br>
        <input type="checkbox" name="condiciones"> Declaro haber leído y aceptar las condiciones generales
        del programa y la normativa sobre protección de datos <br><br>
        <input type="submit" name="enviar" value="Enviar">
        <input type="reset" name="borrar" value="Limpiar">
    </form>

    <?php

        if (isset($_POST['enviar'])) {
        
            if (ctype_alpha($_POST['nombre'])) {
                echo "<p> <i>Nombre:</i> <b>" . $_POST['nombre'] . "</b></p>";
            } else {
                echo "<p><b> Debe ser alfabético</b></p>";
            }            
            if (ctype_alpha($_POST['apellidos'])) {
                echo "<p> <i>Apellidos:</i> <b>" . $_POST['apellidos'] . "</b></p>";
            } else {
                echo "<p> <b>Debe ser alfabético</b></p>";
            }
            if (filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {
                echo "<p> <i>Correo:</i> <b>" . $_POST['correo'] . "</b></p>";
            } else {
                echo "<p><b> Debe ser un correo</b></p>";
            }            
            echo "<p><i>Usuario: </i><b> ". $_POST['usuario'] . "</b></p>";
            echo "<p><i>Contraseña</i><b> ". $_POST['pass'] . "</b></p>";
            echo "<p><i>Sexo: </i><b> ". $_POST['sexo'] . "</b></p>";
            echo "<p><i>Provincia: </i><b> ". $_POST['provincia'] . "</b></p>";
            echo "<p><i>Horario: </i><b> ". (isset($_POST['horario'])? implode(", ", $_POST['horario']) : "No ha seleccionado") . "</b></p>";
            echo "<p><i>Conocido por: </i><b> ". (isset($_POST['conocer']) ? implode(", ",$_POST['conocer']) : "No ha seleccionado") . "</b></p>";
            echo "<p><i>Comentario: </i><b> ". $_POST['comentario'] . "</b></p>";
            echo "<p><i>Información: </i><b>" . (isset($_POST['informacion']) ? "Quiere información" : "No quiere información") . "</b></p>";
            echo "<p><i>Condiciones: </i><b>" . (isset($_POST['condiciones']) ? "Acepta condiciones" : "No acepta condiciones") . "</b></p>";

           
        }
        

        ?>
</body>
</html>