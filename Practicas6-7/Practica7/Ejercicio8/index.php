
<?php
require_once "conexion.php";

$busqueda = trim($_GET["busqueda"] ?? "");


$canciones = [];


if ($busqueda !== "") {

    $sql = "SELECT canciones
            FROM buscador
            WHERE canciones LIKE ?
            ORDER BY canciones";

    $consulta = mysqli_prepare($conexion, $sql);

    $texto = "%" . $busqueda . "%";

    mysqli_stmt_bind_param(
        $consulta,
        "s",
        $texto
    );

    mysqli_stmt_execute($consulta);

    $resultado = mysqli_stmt_get_result($consulta);

    // Recorrer las canciones encontradas
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $canciones[] = $fila["canciones"];
    }

    mysqli_stmt_close($consulta);
}

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscador de canciones</title>
</head>
<body>

    <h1>Buscador de canciones</h1>

    <form action="index.php" method="GET">

        <label>Nombre de la canción:</label>

        <input
            type="text"
            name="busqueda"
            value="<?php echo htmlspecialchars($busqueda, ENT_QUOTES, 'UTF-8'); ?>"
            placeholder="Ingresá una canción"
            required
        >

        <button type="submit">Buscar</button>

    </form>

    <hr>

    <?php if ($busqueda !== "") { ?>

        <h2>Resultados de la búsqueda</h2>

        <?php if (count($canciones) > 0) { ?>

            <ul>
                <?php foreach ($canciones as $cancion) { ?>

                    <li>
                        <?php echo htmlspecialchars($cancion, ENT_QUOTES, 'UTF-8'); ?>
                    </li>

                <?php } ?>
            </ul>

        <?php } else { ?>

            <p>No se encontraron canciones.</p>

        <?php } ?>

    <?php } ?>

</body>
</html>
