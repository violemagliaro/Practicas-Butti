
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = trim($_POST["nombre"] ?? "");
    $correo = trim($_POST["correo"] ?? "");
    $consulta = trim($_POST["consulta"] ?? "");

    if ($nombre === "" || $consulta === "" ||
        !filter_var($correo, FILTER_VALIDATE_EMAIL)) {

        echo "Por favor, ingresá datos válidos.";

    } else {


        $destinatario = "webmaster@ejemplo.com";

        $asunto = "Nueva consulta desde la web";


        $mensaje = "
        <html>
        <body>
            <h2>Nueva consulta</h2>
            <p><b>Nombre:</b> " . htmlspecialchars($nombre) . "</p>
            <p><b>Correo:</b> " . htmlspecialchars($correo) . "</p>
            <p><b>Consulta:</b><br>" .
                nl2br(htmlspecialchars($consulta)) . "</p>
        </body>
        </html>
        ";


        $cabeceras = "MIME-Version: 1.0\r\n";
        $cabeceras .= "Content-type: text/html; charset=UTF-8\r\n";
        $cabeceras .= "From: webmaster@ejemplo.com\r\n";
        $cabeceras .= "Reply-To: " . $correo . "\r\n";


        if (mail($destinatario, $asunto, $mensaje, $cabeceras)) {
            echo "Consulta enviada correctamente.";
        } else {
            echo "Error al enviar la consulta.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contacto</title>
</head>
<body>

    <h2>Formulario de contacto</h2>

    <form action="ejercicio2.php" method="POST">

        <label>Nombre:</label>
        <input type="text" name="nombre" required>

        <br><br>

        <label>Correo electrónico:</label>
        <input type="email" name="correo" required>

        <br><br>

        <label>Consulta:</label>
        <textarea name="consulta" required></textarea>

        <br><br>

        <input type="submit" value="Enviar consulta">

    </form>

</body>
</html>
