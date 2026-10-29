
<?php

session_start();

if (isset($_SESSION["usuario"]) &&
    isset($_SESSION["clave"])) {

    $usuario = $_SESSION["usuario"];
    $clave = $_SESSION["clave"];

} else {

    echo "No hay datos guardados en la sesión.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Datos de sesión</title>
</head>
<body>

    <h1>Datos recuperados de la sesión</h1>

    <p>
        Usuario:
        <?php echo htmlspecialchars($usuario); ?>
    </p>

    <p>
        Clave:
        <?php echo str_repeat("*", strlen($clave)); ?>
    </p>

    <a href="formulario.php">Volver al formulario</a>

</body>
</html>
