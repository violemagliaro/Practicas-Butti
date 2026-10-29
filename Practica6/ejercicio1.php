
<?php
/*

// 1. Para inicializar una conexión con un servidor MySQL,
// PHP ofrece la función:
mysqli_connect()

// 2. Los tres parámetros generalmente necesarios son:
// - Nombre del servidor (localhost).
// - Nombre del usuario (root).
// - Contraseña del usuario.

// 3. Para seleccionar una base de datos se utiliza:
mysqli_select_db()

// 4. Esta función recibe como parámetros:
// - La conexión al servidor MySQL.
// - El nombre de la base de datos.

// 5. La función mysqli_query() se utiliza para:
// Ejecutar consultas SQL, como SELECT, INSERT,
// UPDATE y DELETE.

// 6. Los parámetros que requiere son:
// - La conexión a la base de datos.
// - La consulta SQL que se desea ejecutar.

// 7. La cláusula or die() se utiliza para:
// Detener la ejecución del script cuando ocurre un error.

// 8. La función mysqli_error() se utiliza para:
// Obtener una descripción del último error
// producido en la conexión MySQL.

--------------------------------------------------
EXPLICACIÓN DEL CÓDIGO
--------------------------------------------------

while ($fila = mysqli_fetch_array($vResultado))

// Recorre las filas obtenidas de una consulta SQL.
// mysqli_fetch_array() devuelve una fila del resultado.
// El while continúa mientras existan filas.

<tr>

// Crea una fila en una tabla HTML.

<td> echo $fila[0]; </td>
<td> echo $fila[1]; </td>
<td> echo $fila[2]; </td>

// Muestra los valores de las tres primeras
// columnas de la fila actual.

mysqli_free_result($vResultado);

// Libera la memoria utilizada por el resultado
// de la consulta.

mysqli_close($link);

// Cierra la conexión con el servidor MySQL.


CONCLUSIÓN


// El código obtiene los resultados de una consulta
// a una base de datos MySQL y los muestra en una
// tabla HTML.

// Recorre cada registro mediante un ciclo while,
// muestra los valores de sus columnas y, al finalizar,
// libera los resultados y cierra la conexión.
*/
?>
