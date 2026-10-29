
<?php

session_start();

if (!isset($_SESSION["paginas_visitadas"])) {
    $_SESSION["paginas_visitadas"] = 0;
}

$_SESSION["paginas_visitadas"]++;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página 2</title>
</head>
<body>

    <h2>Página 2</h2>

    <p>Páginas visitadas durante la sesión:
        <?php echo $_SESSION["paginas_visitadas"]; ?>
    </p>

    <a href="ejercicio4.php">Ir a la página 1</a>
    <br><br>
    <a href="pagina3.php">Ir a la página 3</a>

</body>
</html>
