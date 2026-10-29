<?php

// Código 1
$a = array(
    'color' => 'rojo',
    'sabor' => 'dulce',
    'forma' => 'redonda',
    'nombre' => 'manzana',
    4
);

// Código 2
$b['color'] = 'rojo';
$b['sabor'] = 'dulce';
$b['forma'] = 'redonda';
$b['nombre'] = 'manzana';
$b[] = 4;

// Respuesta:
// Sí, son equivalentes.
// Ambos generan un array con las mismas claves y valores.

var_dump($a == $b);
?>