<?php

/**
 * Crea unha función chamada `comprobar_nif()` que reciba un NIF e devolva:
 *  `true` se o NIF é correcto.
 *  false` se o NIF non é correcto.
 * A letra do DNI é unha letra para comprobar que o número introducido anteriormente é correcto. Para obter a letra do DNI débense levar a cabo os seguintes pasos:
 * Dividimos o número entre 23.
 * Co resto da división anterior, obtemos a letra corresponde na seguinte táboa: 
 */

function comprobar_nif($nif)
{
    $letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
    $nifSinLetra = substr($nif, 0, -1);
    $letraIndicada = $nif[9];
    $resto = $nifSinLetra % 23;
    $letraCalculada = $letras[$resto];

    if ($letraIndicada === $letraCalculada) {
        return true;
    } else {
        return false;
    }
}
