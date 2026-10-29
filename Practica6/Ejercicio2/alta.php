
<?php
require_once "conexion.php";

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $ciudad = trim($_POST["ciudad"] ?? "");
    $pais = trim($_POST["pais"] ?? "");
    $habitantes = filter_var(
        $_POST["habitantes"] ?? null,
        FILTER_VALIDATE_INT
    );
    $superficie = filter_var(
        $_POST["superficie"] ?? null,
        FILTER_VALIDATE_FLOAT
    );
    $tieneMetro = $_POST["tieneMetro"] ?? "";

    if (
        $ciudad === "" ||
        $pais === "" ||
        $habitantes === false || $habitantes < 0 ||
        $superficie === false || $superficie < 0 ||
        !in_array($tieneMetro, ["0", "1"], true)
    ) {
        $mensaje = "Ingresá datos válidos.";
    } else {

        $sql = "INSERT INTO Ciudades
                (ciudad, pais, habitantes, superficie, tieneMetro)
                VALUES (?, ?, ?, ?, ?)";

        $consulta = mysqli_prepare($conexion, $sql);

        mysqli_stmt_bind_param(
            $consulta,
            "ssidi",
            $ciudad,
            $pais,
            $habitantes,
            $superficie,
            $tieneMetro
        );

        if (mysqli_stmt_execute($consulta)) {
            $mensaje = "Ciudad agregada correctamente.";
        } else {
            $mensaje = "Error al agregar la ciudad.";
        }

        mysqli_stmt_close($consulta);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de ciudades</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <h1>Agregar ciudad</h1>

    <p><?php echo htmlspecialchars($mensaje); ?></p>

    <form action="alta.php" method="POST">

        <label>Ciudad:</label>
        <input type="text" name="ciudad" required>

        <label>País:</label>
        <input type="text" name="pais" required>

        <label>Habitantes:</label>
        <input type="number" name="habitantes" min="0" required>

        <label>Superficie:</label>
        <input type="number" name="superficie"
               step="0.01" min="0" required>

        <label>¿Tiene metro?</label>
        <select name="tieneMetro">
            <option value="1">Sí</option>
            <option value="0">No</option>
        </select>

        <button type="submit">Agregar ciudad</button>

    </form>

    <br>
    <a href="index.php">Volver al menú</a>

</body>
</html>
