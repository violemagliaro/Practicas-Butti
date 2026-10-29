
<?php

/*
EJERCICIO 2 - PRÁCTICA 4: PHP

Indicar si los siguientes códigos son equivalentes.


========== INCISO A ==========

CÓDIGO 1:

$i = 1;
while ($i <= 10) {
    print $i++;
}

CÓDIGO 2:

$i = 1;
while ($i <= 10):
    print $i;
    $i++;
endwhile;

CÓDIGO 3:

$i = 0;
do {
    print ++$i;
} while ($i < 10);


RESPUESTA:

Sí, los tres códigos son equivalentes.

Los tres muestran los números del 1 al 10.

Salida: 12345678910

Diferencias:

- Código 1: utiliza while con postincremento ($i++).
  Primero muestra el valor y después lo incrementa.

- Código 2: utiliza la sintaxis alternativa de while.
  Primero muestra $i y después lo incrementa.

- Código 3: utiliza do while con preincremento (++$i).
  Primero incrementa el valor y después lo muestra.

Aunque utilizan estructuras diferentes, producen
la misma salida por pantalla.


========== INCISO B ==========

CÓDIGO 1:

for ($i = 1; $i <= 10; $i++) {
    print $i;
}

CÓDIGO 2:

for ($i = 1; ; $i++) {
    if ($i > 10) {
        break;
    }
    print $i;
}

CÓDIGO 3:

$i = 1;
for (;;) {
    if ($i > 10) {
        break;
    }
    print $i;
    $i++;
}

CÓDIGO 4:

for ($i = 1; $i <= 10; print $i, $i++);


RESPUESTA:

Sí, los cuatro códigos son equivalentes.

Todos muestran los números del 1 al 10.

Salida: 12345678910

Diferencias:

- Código 1: utiliza un for tradicional.

- Código 2: utiliza un for sin condición central.
  La finalización se controla con if y break.

- Código 3: utiliza un for infinito.
  El incremento se hace dentro del bucle y
  se utiliza break para finalizar.

- Código 4: utiliza un for con el cuerpo vacío.
  La impresión y el incremento se realizan
  en la tercera expresión del for.


========== INCISO C ==========

CÓDIGO 1:

if ($i == 0) {
    print "i equals 0";
} elseif ($i == 1) {
    print "i equals 1";
} elseif ($i == 2) {
    print "i equals 2";
}

CÓDIGO 2:

switch ($i) {
    case 0:
        print "i equals 0";
        break;
    case 1:
        print "i equals 1";
        break;
    case 2:
        print "i equals 2";
        break;
}


RESPUESTA:

Sí, para este ejemplo los códigos son equivalentes.

Ambos evalúan el valor de $i y muestran:

$i = 0 → i equals 0
$i = 1 → i equals 1
$i = 2 → i equals 2

Para otros valores no muestran nada.

Diferencias:

- if / elseif: evalúa condiciones una por una.
- switch: compara el valor de una expresión con
  diferentes casos.

- break evita que se ejecuten los casos siguientes.

En general, if y switch no siempre son equivalentes,
pero en este ejercicio producen los mismos resultados.
*/


// ========== INCISO A ==========

echo "<h2>Inciso A</h2>";

$i = 1;
while ($i <= 10) {
    print $i++;
}

echo "<br>";

$i = 1;
while ($i <= 10):
    print $i;
    $i++;
endwhile;

echo "<br>";

$i = 0;
do {
    print ++$i;
} while ($i < 10);


// ========== INCISO B ==========

echo "<h2>Inciso B</h2>";

for ($i = 1; $i <= 10; $i++) {
    print $i;
}

echo "<br>";

for ($i = 1; ; $i++) {
    if ($i > 10) {
        break;
    }
    print $i;
}

echo "<br>";

$i = 1;
for (;;) {
    if ($i > 10) {
        break;
    }
    print $i;
    $i++;
}

echo "<br>";

for ($i = 1; $i <= 10; print $i, $i++);


// ========== INCISO C ==========

echo "<h2>Inciso C</h2>";

$i = 1;

if ($i == 0) {
    print "i equals 0";
} elseif ($i == 1) {
    print "i equals 1";
} elseif ($i == 2) {
    print "i equals 2";
}

echo "<br>";

switch ($i) {
    case 0:
        print "i equals 0";
        break;
    case 1:
        print "i equals 1";
        break;
    case 2:
        print "i equals 2";
        break;
}

?>
