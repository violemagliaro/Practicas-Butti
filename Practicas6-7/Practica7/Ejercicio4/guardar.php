
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $tipo = $_POST["tipo"] ?? "";

    $permitidos = ["politica", "economia", "deportes"];

    if (in_array($tipo, $permitidos, true)) {

        setcookie(
            "tipoNoticia",
            $tipo,
            time() + (30 * 24 * 60 * 60),
            "/Practica7/Ejercicio4/"
        );
    }
}

header("Location: index.php");
exit;
?>
