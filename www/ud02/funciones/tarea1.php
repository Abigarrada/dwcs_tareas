<?php
//1. Crea una función que reciba un carácter e imprima se o carácter é un díxito entre 0 e 9.

function imprimeDixito($n)
{
    if (is_integer($n) && $n >= 0 && $n <= 9) {
        echo $n;
    }
}

// 2. Crea una función que reciba un string e devolva a súa lonxitude.

function lonxitudeString($a)
{
    if (is_string($a)) {
        return strlen($a);
    }
}

// 3. Crea una función que reciba dous número a e b e devolva o número a elevado a b.

function potencia($a, $b)
{
    return pow($a, $b);
}

// 4. Crea una función que reciba un carácter e devolva true se o carácter é unha vogal.

function caracterVogal($c)
{
    return false;
}

// 5. Crea una función que reciba un número e devolva se o número é par ou impar.

function parOuImpar($n)
{
    if ($n % 2 == 0) {
        return "O número " . $n . " é par";
    } else {
        return "O número " . $n . " é impar";
    }
}

// 6. Crea una función que reciba un string e devolva o string en maiúsculas.

function maiusculas($a)
{
    if (is_string($a)) {
        return strtoupper($a);
    }
}

// 7. Crea una función que imprima a zona horaria (timezone) por defecto utilizada en PHP.

function zonaHoraria($t)
{
    echo timezone_open($t);
}

// 8. Crea una función que imprima a hora á que sae e se pon o sol para a localización por defecto. Debes comprobar como axustar as coordenadas (latitude e lonxitude) predeterminadas do teu servidor.
function postaSol($lat, $long)
{
    $lat = ini_get("date.default_latitude");
    $long = ini_get("date.default_longitude");
    $zenit = ini_get("date.default_zenith");
    $gmt = ini_get("date.default_gmt_offset");
    echo 'Hoxe sae o sol ás: ' . date_sunrise(time(), SUNFUNCS_RET_STRING, $lat, $long, $zenit, $gmt);
    echo 'Hoxe ponse o sol ás: ' . date_sunset(time(), SUNFUNCS_RET_STRING, $lat, $long, $zenit, $gmt);
}
