
<?php
session_start();

require_once "conexion.php";

$sql = "SELECT * FROM catalogo ORDER BY id";

$resultado = mysqli_query($conexion, $sql);

$cantidad = array_sum($_SESSION["carrito"] ?? []);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de productos</title>
</head>
<body>

    <h1>Catálogo de productos</h1>

    <a href="carrito.php">
        Ver carrito (<?php echo $cantidad; ?>)
    </a>

    <br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Precio</th>
            <th>Acción</th>
        </tr>

        <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
        <tr>
            <td><?php echo $fila["id"]; ?></td>

            <td>
                <?php echo htmlspecialchars($fila["producto"]); ?>
            </td>

            <td>
                $<?php echo number_format($fila["precio"], 2, ",", "."); ?>
            </td>

            <td>
                <form action="agregar.php" method="POST">
                    <input type="hidden"
                           name="id"
                           value="<?php echo $fila["id"]; ?>">

                    <button type="submit">
                        Agregar al carrito
                    </button>
                </form>
            </td>
        </tr>
        <?php } ?>

    </table>

</body>
</html>

<?php
mysqli_free_result($resultado);
mysqli_close($conexion);
?>
