
<?php

function comprobar_nombre_usuario($nombre_usuario) {


    if (strlen($nombre_usuario) < 3 || strlen($nombre_usuario) > 20) {
        echo $nombre_usuario . " no es válido<br>";
        return false;
    }

    $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_";


    for ($i = 0; $i < strlen($nombre_usuario); $i++) {
        if (strpos($permitidos, substr($nombre_usuario, $i, 1)) === false) {
            echo $nombre_usuario . " no es válido<br>";
            return false;
        }
    }

    echo $nombre_usuario . " es válido<br>";
    return true;
}


comprobar_nombre_usuario("Sofia123");
comprobar_nombre_usuario("ab");
comprobar_nombre_usuario("Juan Perez");
comprobar_nombre_usuario("Maria_25");
comprobar_nombre_usuario("Pedro@123");

// Respuesta:
// Sofia123 es válido.
// ab no es válido (menos de 3 caracteres).
// Juan Perez no es válido (contiene un espacio).
// Maria_25 es válido.
// Pedro@123 no es válido (contiene @).
?>
