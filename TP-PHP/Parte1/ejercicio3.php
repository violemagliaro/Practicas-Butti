
<?php

/*
EJERCICIO 3 - PRÁCTICA 4: PHP

========== INCISO A ==========

El código genera una tabla HTML utilizando PHP.

- La variable $row = 5 indica la cantidad de filas.
- La variable $col = 2 indica la cantidad de columnas.
- Se utilizan dos ciclos for anidados.

El primer for recorre las filas.
El segundo for crea las columnas de cada fila.

Las etiquetas HTML utilizadas son:
<table> → crea la tabla.
<tr>    → crea una fila.
<td>    → crea una celda.

&nbsp; permite colocar un espacio en blanco
dentro de cada celda.

RESULTADO:
Una tabla de 5 filas y 2 columnas,
con bordes y celdas vacías.


========== INCISO B ==========

El código permite ingresar una edad mediante
un formulario HTML y evaluarla utilizando PHP.

- isset() comprueba si se envió el formulario.
- $_POST recibe los datos enviados.
- $_SERVER['PHP_SELF'] contiene la ruta del
  archivo PHP que se está ejecutando.
- El método POST envía los datos del formulario.

Si todavía no se envió el formulario,
se muestra un campo para ingresar la edad.

Cuando el usuario presiona "Ir",
PHP recibe la edad y comprueba su valor.

Si la edad es mayor o igual a 21:
    Muestra "Mayor de edad".

Si la edad es menor que 21:
    Muestra "Menor de edad".

IMPORTANTE:
El código utiliza 21 años como límite,
tal como aparece en la consigna.
*/


// ========== INCISO A ==========

echo "<h2>Inciso A - Tabla HTML</h2>";

echo "<table width='90%' border='1'>";

$row = 5;
$col = 2;

for ($r = 1; $r <= $row; $r++) {
    echo "<tr>";

    for ($c = 1; $c <= $col; $c++) {
        echo "<td>&nbsp;</td>\n";
    }

    echo "</tr>\n";
}

echo "</table>\n";


// ========== INCISO B ==========

echo "<h2>Inciso B - Formulario de edad</h2>";

if (!isset($_POST['submit'])) {
?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        Edad: <input name="age" size="2">
        <input type="submit" name="submit" value="Ir">
    </form>

<?php
} else {

    $age = $_POST['age'];

    if ($age >= 21) {
        echo "Mayor de edad";
    } else {
        echo "Menor de edad";
    }
}

?>
