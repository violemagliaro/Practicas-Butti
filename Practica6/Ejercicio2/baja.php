
<?php
require_once "conexion.php";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    die("Identificador de ciudad inválido.");
}

$sql = "SELECT * FROM Ciudades WHERE id = ?";
$consulta = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($consulta, "i", $id);
mysqli_stmt_execute($consulta);

$resultado = mysqli_stmt_get_result($consulta);
$ciudad = mysqli_fetch_assoc($resultado);
mysqli_stmt_close($consulta);

if (!$ciudad) {
    die("La ciudad no existe.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = "DELETE FROM Ciudades WHERE id = ?";
    $consulta = mysqli_prepare($conexion, $sql);

    mysqli_stmt_bind_param($consulta, "i", $id);

    if (mysqli_stmt_execute($consulta)) {
        mysqli_stmt_close($consulta);
        header("Location: listado.php");
        exit;
    }

    mysqli_stmt_close($consulta);
    die("Error al eliminar la ciudad.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar ciudad</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <h1>Eliminar ciudad</h1>

    <p>
        ¿Estás seguro de que querés eliminar
        la ciudad
        <strong>
            <?php echo htmlspecialchars($ciudad["ciudad"]); ?>
        </strong>?
    </p>

    <form action="baja.php?id=<?php echo $id; ?>"
          method="POST">

        <button type="submit">Confirmar eliminación</button>

    </form>

    <br>
    <a href="listado.php">Cancelar</a>

</body>
</html>
