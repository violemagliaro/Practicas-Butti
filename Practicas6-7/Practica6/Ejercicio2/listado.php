
<?php
require_once "conexion.php";

$paginado = isset($_GET["paginado"])
            && $_GET["paginado"] == 1;

$porPagina = 4;
$pagina = filter_input(INPUT_GET, "pagina", FILTER_VALIDATE_INT);

if (!$pagina || $pagina < 1) {
    $pagina = 1;
}

$totalPaginas = 1;

if ($paginado) {

    $resultadoTotal = mysqli_query(
        $conexion,
        "SELECT COUNT(*) AS total FROM Ciudades"
    );

    $filaTotal = mysqli_fetch_assoc($resultadoTotal);
    $total = $filaTotal["total"];

    $totalPaginas = max(1, ceil($total / $porPagina));
    $pagina = min($pagina, $totalPaginas);

    $inicio = ($pagina - 1) * $porPagina;

    $sql = "SELECT * FROM Ciudades
            ORDER BY id
            LIMIT $porPagina OFFSET $inicio";

} else {

    $sql = "SELECT * FROM Ciudades ORDER BY id";
}

$resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de ciudades</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <h1>Listado de ciudades</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Ciudad</th>
                <th>País</th>
                <th>Habitantes</th>
                <th>Superficie</th>
                <th>Tiene metro</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
        <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
                <td><?php echo $fila["id"]; ?></td>

                <td>
                    <?php echo htmlspecialchars($fila["ciudad"]); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($fila["pais"]); ?>
                </td>

                <td><?php echo $fila["habitantes"]; ?></td>

                <td><?php echo $fila["superficie"]; ?></td>

                <td>
                    <?php
                    echo $fila["tieneMetro"] == 1 ? "Sí" : "No";
                    ?>
                </td>

                <td>
                    <a href="modificar.php?id=<?php echo $fila['id']; ?>">
                        Modificar
                    </a>

                    <a href="baja.php?id=<?php echo $fila['id']; ?>">
                        Eliminar
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <?php if ($paginado) { ?>

        <div class="paginacion">

            <?php for ($i = 1; $i <= $totalPaginas; $i++) { ?>

                <a href="listado.php?paginado=1&pagina=<?php echo $i; ?>">
                    <?php echo $i; ?>
                </a>

            <?php } ?>

        </div>

    <?php } ?>

    <br>
    <a href="alta.php">Agregar ciudad</a>
    <br><br>
    <a href="index.php">Volver al menú</a>

</body>
</html>

<?php

mysqli_free_result($resultado);
mysqli_close($conexion);
?>
