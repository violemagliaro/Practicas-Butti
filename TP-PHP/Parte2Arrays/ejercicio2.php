
<?php
// EJERCICIO 2 - ARRAYS Y FUNCIONES
// Consigna: Indicar las salidas correspondientes.

// APARTADO A
$matriz = array("x" => "bar", 12 => true);

echo $matriz["x"];
echo $matriz[12];

// Respuesta A: bar1

echo "<hr>";

// APARTADO B
$matriz = array(
    "unamatriz" => array(6 => 5, 13 => 9, "a" => 42)
);

echo $matriz["unamatriz"][6];
echo $matriz["unamatriz"][13];
echo $matriz["unamatriz"]["a"];

// Respuesta B: 5942

echo "<hr>";

// APARTADO C
$matriz = array(5 => 1, 12 => 2);
$matriz[] = 56;
$matriz["x"] = 42;

unset($matriz[5]);
unset($matriz);

// Respuesta C: No muestra nada por pantalla.
// El array queda eliminado.
?>
