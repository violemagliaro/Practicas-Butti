
<?php

setcookie(
    "tipoNoticia",
    "",
    time() - 3600,
    "/Practica7/Ejercicio4/"
);

header("Location: index.php");
exit;
?>
