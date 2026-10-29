
<?php

session_start();

require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: index.php");
    exit;
}
+
$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    die("Producto inválido.");
}

$sql = "SELECT id FROM catalogo WHERE id = ?";

$consulta = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($consulta, "i", $id);
mysqli_stmt_execute($consulta);

$resultado = mysqli_stmt_get_result($consulta);
$producto = mysqli_fetch_assoc($resultado);

mysqli_stmt_close($consulta);
mysqli_close($conexion);

if (!$producto) {
    die("El producto no existe.");
}

if (!isset($_SESSION["carrito"])) {
    $_SESSION["carrito"] = [];
}


if (isset($_SESSION["carrito"][$id])) {
    $_SESSION["carrito"][$id]++;
} else {
    $_SESSION["carrito"][$id] = 1;
}

header("Location: carrito.php");
exit;
?>
