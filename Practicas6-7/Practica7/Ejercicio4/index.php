
<?php

$tipo = $_COOKIE["tipoNoticia"] ?? "";

$noticias = [
    "politica" => "Se debate una nueva ley en el Congreso",
    "economia" => "Nuevas medidas para impulsar la economía",
    "deportes" => "El equipo local ganó el campeonato"
];

if (!array_key_exists($tipo, $noticias)) {
    $tipo = "";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Periódico Digital</title>
</head>
<body>

    <h1>Periódico Digital</h1>

    <h2>Últimas noticias</h2>

    <?php
    if ($tipo == "") {

        foreach ($noticias as $titular) {
            echo "<h3>" . htmlspecialchars($titular) . "</h3>";
        }

    } else {

        echo "<h3>" .
             htmlspecialchars($noticias[$tipo]) .
             "</h3>";
    }
    ?>

    <hr>

    <h2>Elegí qué noticias querés ver</h2>

    <form action="guardar.php" method="POST">

        <input type="radio" name="tipo"
               value="politica"
               <?php if ($tipo == "politica") echo "checked"; ?>>
        Noticia política

        <br>

        <input type="radio" name="tipo"
               value="economia"
               <?php if ($tipo == "economia") echo "checked"; ?>>
        Noticia económica

        <br>

        <input type="radio" name="tipo"
               value="deportes"
               <?php if ($tipo == "deportes") echo "checked"; ?>>
        Noticia deportiva

        <br><br>

        <button type="submit">Guardar preferencia</button>

    </form>

    <br>

    <a href="borrar.php">Borrar preferencia</a>

</body>
</html>
