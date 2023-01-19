
<?php

class Data
{
    public static $calendario = "Calendario gregoriano";

    public static function getData()
    {
        $ano = date('Y'); //Nos da el año actual 
        $mes = date('m');
        $dia = date('d');
        return $dia . '/' . $mes . '/' . $ano;
    }

    public static function getCalendar()
    {
        return self::$calendario;
    }

    public static function getHora()
    {
        $hora = date('H');
        $minuto = date('i');
        $segundo = date('s');

        return $hora . ':' . $minuto . ':' . $segundo;
    }

    public static function getDataHora()
    {
        return self::getData() . " " . self::getHora();
    }
}
