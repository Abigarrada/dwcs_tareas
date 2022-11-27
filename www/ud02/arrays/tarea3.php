<?php

/* 
1. Cree una matriz con 30 posiciones y que contenga números aleatorios 
entre 0 y 20 (inclusive). Uso de la función rand. 
Imprima la matriz creada anteriormente.
*/

for ($i = 0; $i < 30; $i++) {
    $array[$i] = rand(0, 20);
    foreach ($array as $value) {
        echo $value . "<br/>";
    }
}

/*
2. Cree una matriz con los siguientes datos: Batman, Superman, Krusty, Bob, Mel y Barney.
Elimine la última posición de la matriz.
Imprima la posición donde se encuentra la cadena ‘Superman’.
Agregue los siguientes elementos al final de la matriz: Carl, Lenny, Burns y Lisa.
Ordene los elementos de la matriz e imprima la matriz ordenada.
Agregue los siguientes elementos al comienzo de la matriz: Apple, Melon, Watermelon.
*/

$personajes = ["Batman", "Superman", "Krusty", "Bob", "Mel", "Barney"];

array_pop($personajes);

echo $personajes[1];

array_push($personajes, "Carl", "Lenny", "Burns", "Lisa");

asort($personajes);

for ($i = 0; $i < count($personajes); $i++) {
    echo $personajes[$i] . "<br/>";
}

array_unshift($personajes, "Apple", "Melon", "Watermelon");

/*
3. (Optativo) Cree una copia de la matriz con el nombre copia con elementos del 3 al 5.
Agregue el elemento ‘Pera’ al final de la matriz.
*/

$copia = array_slice($personajes, -2, 1);
array_push($copia, "Pera");
