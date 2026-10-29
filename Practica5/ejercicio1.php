
<?php

$destinatario = "sofiagibe@gmail.com";


$asunto = "Prueba de correo desde PHP";


$cuerpo = "
<html>
<head>
    <title>Correo de prueba</title>
</head>
<body>
    <h2>Hola!</h2>
    <p>Este es un correo enviado desde PHP.</p>
    <p>Ejercicio 1 - Práctica 5 de Entornos Gráficos.</p>
</body>
</html>
";

$cabeceras = "MIME-Version: 1.0\r\n";
$cabeceras .= "Content-type: text/html; charset=UTF-8\r\n";
$cabeceras .= "From: remitente@ejemplo.com\r\n";


if (mail($destinatario, $asunto, $cuerpo, $cabeceras)) {
    echo "Correo enviado correctamente.";
} else {
    echo "Error al enviar el correo.";
}
?>
