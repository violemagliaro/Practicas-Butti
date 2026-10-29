
<?php

$nombre = $_COOKIE["nombreUsuario"] ?? "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nuevoNombre = trim($_POST["nombre"] ?? "");

    if ($nuevoNombre !== "") {
        setcookie(
            "nombreUsuario",
            $nuevoNombre,
            time() + (30 * 24 * 60 * 60),
            "/Practica7/Ejercicio3/"
        );
        $nombre = $nuevoNombre;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nombre de usuario</title>
</head>
<body>

    <h1>Registro de usuario</h1>

    <?php if ($nombre !== "") { ?>

        <p>
            Último usuario ingresado:
            <strong>
                <?php echo htmlspecialchars($nombre); ?>
            </strong>
        </p>

    <?php } else { ?>

        <p>Todavía no se ingresó ningún usuario.</p>

    <?php } ?>

    <form action="index.php" method="POST">

        <label>Nombre de usuario:</label>

        <input
            type="text"
            name="nombre"
            value="<?php echo htmlspecialchars($nombre); ?>"
            required
        >

        <button type="submit">Guardar nombre</button>

    </form>

</body>
</html>
