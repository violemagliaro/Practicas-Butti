
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = filter_input(
        INPUT_POST,
        "id",
        FILTER_VALIDATE_INT
    );

    if ($id && isset($_SESSION["carrito"][$id])) {
        unset($_SESSION["carrito"][$id]);
    }
}

header("Location: carrito.php");
exit;
?>
