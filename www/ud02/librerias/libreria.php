<?php

/**Realiza los seguintes pasos:

1. Crea un fichero PHP a modo de librería con todas las funciones creadas.
2. Escribe la diferencia entre `include`, `include_once`, `require` y `require_once` dentro del código de la librería de funciobes como un comentario del código fuente.
3. Descarga [**esta plantilla**](/03/template-307.zip) y divide el `index.php` de tal forma que tengas distintos recursos repartidos en ficheros:

Fichero         | Contiene el `div` con `id`
:-              |:-
`logo.php`      |`id="logo"`
`menu.php`      |`id="menu"`
`pictures.php`  |`id="pictures"`
`content.php`   |`id="content"`
`sidebar.php`   |`id="sidebar"`
`footer.php`    |`id="footer"`

Modifica el `index.php` para que cargue los recursos indicados en el paso anterior
 */

/*

include(): Inclúe e interpreta o contido do ficheiro.

include_once(): Funciona igual que include(), coa diferenza de que, 
se xa se incluiu o ficheiro anteriormente, non se volve a incluir.

require(): Funciona igual que igual que include(), coa diferenza de que
produce un erro fatal no caso de fallo.

require_once(): Funciona igual que igual que require(), coa diferenza 
de que, se xa se incluiu o ficheiro anteriormente, non se volve a 
incluir.

*/

function imprimeDixito($n)
{
    if (is_integer($n) && $n >= 0 && $n <= 9) {
        echo $n;
    }
}

function lonxitudeString($a)
{
    if (is_string($a)) {
        return strlen($a);
    }
}

function potencia($a, $b)
{
    return pow($a, $b);
}

function caracterVogal($c)
{
    return false;
}

function parOuImpar($n)
{
    if ($n % 2 == 0) {
        return "O número " . $n . " é par";
    } else {
        return "O número " . $n . " é impar";
    }
}

function maiusculas($a)
{
    if (is_string($a)) {
        return strtoupper($a);
    }
}

function zonaHoraria($tz)
{
    echo timezone_open($tz);
}

function postaSol()
{
    $lat = ini_get("date.default_latitude");
    $long = ini_get("date.default_longitude");
    $zenit = ini_get("date.default_zenith");
    $gmt = ini_get("date.default_gmt_offset");
    echo 'Hoxe sae o sol ás: ' . date_sunrise(time(), SUNFUNCS_RET_STRING, $lat, $long, $zenit, $gmt);
    echo 'Hoxe ponse o sol ás: ' . date_sunset(time(), SUNFUNCS_RET_STRING, $lat, $long, $zenit, $gmt);
}

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
