
<?php
session_start();

require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: formulario.php");
    exit;
}

$mail = trim($_POST["mail"] ?? "");

unset($_SESSION["nombre"]);

if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    die("Correo electrónico inválido.");
}

$sql = "SELECT nombre FROM alumnos WHERE mail = ?";

$consulta = mysqli_prepare($conexion, $sql);

mysqli_stmt_bind_param(
    $consulta,
    "s",
    $mail
);

mysqli_stmt_execute($consulta);

$resultado = mysqli_stmt_get_result($consulta);

if ($fila = mysqli_fetch_assoc($resultado)) {

    $_SESSION["nombre"] = $fila["nombre"];

    header("Location: bienvenida.php");
    exit;

} else {

    $mensaje = "No existe un alumno con ese correo.";
}

mysqli_stmt_close($consulta);
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado de búsqueda</title>
</head>
<body>

    <h2><?php echo htmlspecialchars($mensaje); ?></h2>

    <a href="formulario.php">
        Volver al formulario
    </a>

</body>
</html>
