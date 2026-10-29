
<?php


// APARTADO A
$fun = getdate();

// Respuesta:
// Muestra la fecha y hora actuales del servidor.
// La salida varía según el momento de ejecución.

echo "Has entrado en esta pagina a las "
    . $fun['hours'] . " horas, con "
    . $fun['minutes'] . " minutos y "
    . $fun['seconds'] . " segundos, del "
    . $fun['mday'] . "/"
    . $fun['mon'] . "/"
    . $fun['year'];

echo "<hr>";

// APARTADO B
function sumar($sumando1, $sumando2) {
    $suma = $sumando1 + $sumando2;
    echo $sumando1 . "+" . $sumando2 . "=" . $suma;
}

sumar(5, 6);

// Respuesta: 5+6=11
?>
