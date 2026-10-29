
<?php

$estilos = ["claro", "oscuro", "primavera"];

$estilo = $_COOKIE["estilo"] ?? "claro";

if (!in_array($estilo, $estilos, true)) {
    $estilo = "claro";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nuevoEstilo = $_POST["estilo"] ?? "claro";

    if (in_array($nuevoEstilo, $estilos, true)) {

        setcookie(
            "estilo",
            $nuevoEstilo,
            time() + (30 * 24 * 60 * 60),
            "/Practica7/Ejercicio1/"
        );

        $estilo = $nuevoEstilo;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Elegir estilo CSS</title>

    <link rel="stylesheet"
          href="<?php echo htmlspecialchars($estilo); ?>.css">
</head>
<body>

    <h1>Personalizar página web</h1>

    <p>Elegí el aspecto que querés para esta página.</p>

    <form action="index.php" method="POST">

        <label for="estilo">Seleccionar estilo:</label>

        <select name="estilo" id="estilo">
            <option value="claro"
                <?php if ($estilo == "claro") echo "selected"; ?>>
                Claro
            </option>

            <option value="oscuro"
                <?php if ($estilo == "oscuro") echo "selected"; ?>>
                Oscuro
            </option>

            <option value="primavera"
                <?php if ($estilo == "primavera") echo "selected"; ?>>
                Primavera
            </option>
        </select>

        <button type="submit">Guardar estilo</button>

    </form>

    <h2>Bienvenid@</h2>

    <p>
        Esta página recuerda el estilo que seleccionaste
        gracias al uso de cookies.
    </p>

</body>
</html>
