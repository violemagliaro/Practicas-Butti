
<?php
/*
EJERCICIO 1 - PRÁCTICA 4: PHP

1) VARIABLES Y SUS TIPOS:

$a = TRUE;     → Boolean (booleano)
$b = "xyz";    → String (cadena de caracteres)
$c = 'xyz';    → String (cadena de caracteres)
$d = 12;       → Integer (entero)

Otras variables:
$i → Parámetro de la función doble(), numérico.
$f → Integer, almacena el resultado de doble().
$g → Integer, almacena el resultado de la operación +=.


2) OPERADORES:

=    → Asignación.
*    → Multiplicación.
+=   → Asignación con suma.
++   → Incremento en una unidad.
?:   → Operador ternario (condicional).


3) FUNCIONES Y PARÁMETROS:

doble($i):
    Función definida por el programador.
    Recibe un parámetro $i y devuelve su doble.

gettype($variable):
    Devuelve el tipo de dato de una variable.

is_int($d):
    Comprueba si $d es un entero.

is_string($a):
    Comprueba si $a es una cadena.


4) ESTRUCTURAS DE CONTROL:

if (is_int($d)):
    Si $d es entero, le suma 4.

if (is_string($a)):
    Si $a es una cadena, muestra su valor.
    En este caso no se ejecuta porque $a es booleano.

Operador ternario:
    $d = $a ? ++$d : $d*3;

    Si $a es verdadero, incrementa $d.
    Si es falso, multiplica $d por 3.


5) SALIDA POR PANTALLA:

booleanstringstringinteger1xyzxyz184444

Explicación:
- gettype() muestra los cuatro tipos de datos.
- $d comienza en 12 y aumenta a 16.
- Como $a es TRUE, $d aumenta a 17.
- doble($d++) devuelve 34 y luego $d vale 18.
- $f aumenta de 34 a 44.
- $g toma el valor 44.
- echo muestra todos los valores sin espacios.
*/

// Función que devuelve el doble de un número
function doble($i) {
    return $i * 2;
}

// Declaración de variables
$a = TRUE;
$b = "xyz";
$c = 'xyz';
$d = 12;

// Mostrar los tipos de las variables
echo gettype($a);
echo gettype($b);
echo gettype($c);
echo gettype($d);

// Estructuras de control
if (is_int($d)) {
    $d += 4;
}

if (is_string($a)) {
    echo "Cadena: $a";
}

// Operaciones
$d = $a ? ++$d : $d * 3;
$f = doble($d++);
$g = $f += 10;

// Mostrar resultados
echo $a, $b, $c, $d, $f, $g;

?>
