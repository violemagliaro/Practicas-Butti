
<?php

session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST["usuario"] ?? "";
    $clave = $_POST["clave"] ?? "";

    if ($usuario !== "" && $clave !== "") {

        $_SESSION["usuario"] = $usuario;
        $_SESSION["clave"] = $clave;

        header("Location: recuperar.php");
        exit;

    } else {
        echo "Debés ingresar usuario y clave.";
    }

} else {
    header("Location: formulario.php");
    exit;
}
?>
