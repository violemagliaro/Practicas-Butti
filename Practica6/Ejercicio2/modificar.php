
<?php
require_once "conexion.php";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    die("Identificador inválido.");
}

$mensaje = "";


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

    $nombre = trim($_POST["ciudad"] ?? "");
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
        $nombre === "" ||
        $pais === "" ||
        $habitantes === false || $habitantes < 0 ||
        $superficie === false || $superficie < 0 ||
        !in_array($tieneMetro, ["0", "1"], true)
    ) {
        $mensaje = "Ingresá datos válidos.";
    } else {

        // Actualizar los datos
        $sql = "UPDATE Ciudades
                SET ciudad = ?,
                    pais = ?,
                    habitantes = ?,
                    superficie = ?,
                    tieneMetro = ?
                WHERE id = ?";

        $consulta = mysqli_prepare($conexion, $sql);

        mysqli_stmt_bind_param(
            $consulta,
            "ssidii",
            $nombre,
            $pais,
            $habitantes,
            $superficie,
            $tieneMetro,
            $id
        );

        if (mysqli_stmt_execute($consulta)) {
            $mensaje = "Ciudad modificada correctamente.";
            $ciudad = [
                "ciudad" => $nombre,
                "pais" => $pais,
                "habitantes" => $habitantes,
                "superficie" => $superficie,
                "tieneMetro" => $tieneMetro
            ];
        } else {
            $mensaje = "Error al modificar la ciudad.";
        }

        mysqli_stmt_close($consulta);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar ciudad</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <h1>Modificar ciudad</h1>

    <p><?php echo htmlspecialchars($mensaje); ?></p>

    <form action="modificar.php?id=<?php echo $id; ?>"
          method="POST">

        <label>Ciudad:</label>
        <input type="text" name="ciudad"
               value="<?php echo htmlspecialchars($ciudad['ciudad']); ?>"
               required>

        <label>País:</label>
        <input type="text" name="pais"
               value="<?php echo htmlspecialchars($ciudad['pais']); ?>"
               required>

        <label>Habitantes:</label>
        <input type="number" name="habitantes" min="0"
               value="<?php echo $ciudad['habitantes']; ?>"
               required>

        <label>Superficie:</label>
        <input type="number" name="superficie"
               step="0.01" min="0"
               value="<?php echo $ciudad['superficie']; ?>"
               required>

        <label>¿Tiene metro?</label>
        <select name="tieneMetro">

            <option value="1"
                <?php if ($ciudad["tieneMetro"] == 1) echo "selected"; ?>>
                Sí
            </option>

            <option value="0"
                <?php if ($ciudad["tieneMetro"] == 0) echo "selected"; ?>>
                No
            </option>

        </select>

        <button type="submit">Guardar cambios</button>

    </form>

    <br>
    <a href="listado.php">Volver al listado</a>

</body>
</html>
