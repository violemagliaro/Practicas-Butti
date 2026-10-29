
<?php


$resultado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $nombre = trim($_POST["nombre"] ?? "");
    $correoAmigo = trim($_POST["correoAmigo"] ?? "");


    if ($nombre === "" ||
        !filter_var($correoAmigo, FILTER_VALIDATE_EMAIL)) {

        $resultado = "Ingresá datos válidos.";

    } else {

        $destinatario = $correoAmigo;
        $asunto = "Te recomiendo este sitio web";

        $sitio = "http://localhost/Practica5/";

        $mensaje = "
        <html>
        <body>
            <h2>¡Te recomendaron una página web!</h2>
            <p>" . htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8') .
            " te recomienda visitar nuestro sitio.</p>
            <p>
                <a href='$sitio'>Visitar sitio web</a>
            </p>
        </body>
        </html>
        ";

        $cabeceras = "MIME-Version: 1.0\r\n";
        $cabeceras .= "Content-type: text/html; charset=UTF-8\r\n";
        $cabeceras .= "From: webmaster@ejemplo.com\r\n";

        if (mail($destinatario, $asunto, $mensaje, $cabeceras)) {
            $resultado = "Recomendación procesada para su envío.";
        } else {
            $resultado = "Error al enviar la recomendación.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recomendar sitio</title>
</head>
<body>

    <h2>Recomendar nuestro sitio a un amigo</h2>

    <form action="ejercicio3.php" method="POST">

        <label>Tu nombre:</label>
        <input type="text" name="nombre" required>

        <br><br>

        <label>Correo :</label>
        <input type="email" name="correoAmigo" required>

        <br><br>

        <input type="submit" value="Enviar recomendación">

    </form>

    <p>
        <?php echo htmlspecialchars($resultado, ENT_QUOTES, 'UTF-8'); ?>
    </p>

</body>
</html>
