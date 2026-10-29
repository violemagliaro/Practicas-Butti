
<?php
session_start();

require_once "conexion.php";

$carrito = $_SESSION["carrito"] ?? [];
$total = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de compras</title>
</head>
<body>

    <h1>Mi carrito de compras</h1>

    <?php if (empty($carrito)) { ?>

        <p>El carrito está vacío.</p>

    <?php } else { ?>

        <table border="1" cellpadding="10">
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th>Acción</th>
            </tr>

            <?php
            foreach ($carrito as $id => $cantidad) {

                $sql = "SELECT * FROM catalogo WHERE id = ?";

                $consulta = mysqli_prepare($conexion, $sql);
                mysqli_stmt_bind_param($consulta, "i", $id);
                mysqli_stmt_execute($consulta);

                $resultado = mysqli_stmt_get_result($consulta);
                $producto = mysqli_fetch_assoc($resultado);

                mysqli_stmt_close($consulta);

                if (!$producto) {
                    continue;
                }

                $subtotal = $producto["precio"] * $cantidad;

                $total += $subtotal;
            ?>

            <tr>
                <td>
                    <?php echo htmlspecialchars($producto["producto"]); ?>
                </td>

                <td>
                    $<?php echo number_format($producto["precio"], 2, ",", "."); ?>
                </td>

                <td><?php echo $cantidad; ?></td>

                <td>
                    $<?php echo number_format($subtotal, 2, ",", "."); ?>
                </td>

                <td>
                    <form action="quitar.php" method="POST">
                        <input type="hidden"
                               name="id"
                               value="<?php echo $id; ?>">
                        <button type="submit">Quitar</button>
                    </form>
                </td>
            </tr>

            <?php } ?>

        </table>

        <h2>
            Total: $<?php echo number_format($total, 2, ",", "."); ?>
        </h2>

        <form action="vaciar.php" method="POST">
            <button type="submit">Vaciar carrito</button>
        </form>

    <?php } ?>

    <br>
    <a href="index.php">Volver al catálogo</a>

</body>
</html>

<?php mysqli_close($conexion); ?>
