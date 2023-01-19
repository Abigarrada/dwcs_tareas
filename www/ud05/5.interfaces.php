
<?php

interface CalculosCentroEstudios
{
    public function numeroDeAprobados();
    public function numeroDeSuspensos();
    public function notaMedia();
}

abstract class Notas
{

    //Propiedades
    public $notas = [];

    //Métodos 
    public abstract function toString();
}


class NotasDaw extends Notas implements CalculosCentroEstudios
{

    //Propiedades
    public $notas = [5, 3, 8, 7, 6, 8, 9, 7, 5, 6, 3, 4, 5];


    //Métodos propios
    public function getNotas()
    {
        return $this->notas;
    }

    //Métodos de la clase abstracta
    public function toString()
    {
        $listaDeNotas = "";
        foreach ($this->getNotas() as $nota) {
            $listaDeNotas .= "[$nota]";
        }
        return $listaDeNotas;
    }

    //Métodos de la interfaz
    public function numeroDeAprobados()
    {
        $numeroDeAprobados = 0;
        foreach ($this->getNotas() as $nota) {
            if ($nota >= 5) {
                $numeroDeAprobados++;
            }
        }

        return $numeroDeAprobados;
    }
    public function numeroDeSuspensos()
    {
        $numeroDeSuspensos = 0;
        foreach ($this->getNotas() as $nota) {
            if ($nota <= 5) {
                $numeroDeSuspensos++;
            }
        }

        return $numeroDeSuspensos;
    }
    public function notaMedia()
    {
        $suma = 0;
        foreach ($this->getNotas() as $nota) {
            $suma = $suma + $nota;
        }

        $media = $suma / count($this->getNotas());

        return $media;
    }
}

$proba = new NotasDaw();
$proba->toString();
$proba->numeroDeAprobados();
$proba->numeroDeSuspensos();
$proba->notaMedia();
