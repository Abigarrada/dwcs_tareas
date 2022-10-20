<?php
// 1. Escribe un programa que pase de grados Fahrenheit a Celsius.

$gradosFarenheit = 15;

$conversionCelsius = ($gradosFarenheit - 32) * 5 / 9;

echo $gradosFarenheit . "ºF equivalen a " . $conversionCelsius . "ºC <br/>";

/* 2. Crea un programa en PHP que declare e inicialice dos variables 
 x e y con los valores 20 y 10 respectivamente y muestre la suma, 
 la resta, la multiplicación, la división y el módulo de ambas variables. (Optativo) Haz dos versiones de este ejercicios.
 a. Guarda los resultados en nuevas variables.*/

$x = 20;
$y = 10;

$suma = $x + $y;

echo "La suma de " . $x . " más " . $y . "es igual a " . $suma . "<br/>";

$resta = $x - $y;

echo "La resta de " . $x . " menos " . $y . "es igual a " . $resta . "<br/>";

$multiplicacion = $x * $y;

echo "La multiplicación de " . $x . " por " . $y . "es igual a " . $multiplicacion . "<br/>";

$division = $x / $y;

echo "La división de " . $x . " entre " . $y . "es igual a " . $division . "<br/>";

$modulo = $x % $y;

echo "El módulo de " . $x . " entre " . $y . "es igual a " . $modulo . "<br/>";

// b. Sin utilizar variables intermedias.

echo "La suma de " . $x . " más " . $y . "es igual a " . $x + $y . "<br/>";

echo "La resta de " . $x . " menos " . $y . "es igual a " . $x - $y . "<br/>";

echo "La multiplicación de " . $x . " por " . $y . "es igual a " . $x * $y . "<br/>";

echo "La división de " . $x . " entre " . $y . "es igual a " . $x / $y . "<br/>";

echo "El módulo de " . $x . " entre " . $y . "es igual a " . $x % $y . "<br/>";

// Escribe un programa que imprima por pantalla los cuadrados de los 30 primeros números naturales.

for ($i = 1; $i <= 30; $i++) {
    echo "El cuadrado de " . $i . " es " . $i * $i . "<br/>";
}

/* 5. Hacer un programa php que calcule el área y el perímetro de un 
 rectángulo (área=base*altura y (perímetro=2*base+2*altura). 
 Debéis declarar las variables base=20 y altura=10. */

$base = 20;
$altura = 10;

$area = $base * $altura;
$perimetro = (2 * $base) + (2 * $altura);

echo "El área del rectángulo con base " . $base . " y altura " . $altura . " es " . $area . "<br/>";
echo "El perímetro del rectángulo con base " . $base . " y altura " . $altura . " es " . $perimetro . "<br/>";
