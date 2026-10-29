
<?php
session_start();


if (isset($_SESSION["nombre"])) {

    $nombre = $_SESSION["nombre"];
    $mensaje = "¡Bienvenido, " .
        htmlspecialchars($nombre, ENT_QUOTES, "UTF-8") . "!";

} else {

    $mensaje = "No podés visitar esta página. " .
               "Primero debés ingresar un correo válido.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenida</title>
</head>
<body>

    <h1>Página de bienvenida</h1>

    <p><?php echo $mensaje; ?></p>

    <a href="formulario.php">Volver al formulario</a>

</body>
</html>
