
<?php

trait CalculosCentroEstudos
{
 
    public function getNotas()
    {
        return $this->notas;
    }

    public function toString()
    {
        $listaDeNotas = "";
        foreach ($this->getNotas() as $nota) {
            $listaDeNotas .= "[$nota]";
        }
        return $listaDeNotas;
    }

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

trait MostrarCalculos
{
    public function saludo()
    {
        return "Bienvenido al centro de cálculo";
    }

    public function showCalculusStudyCenter()
    {
        echo "La información reunida de este objeto es: <br>
        Número de aprobados: " . $this->numeroDeAprobados() . "<br>",
        "Número de suspensos: " . $this->numeroDeSuspensos() . "<br>",
        "Nota media: " . $this->notaMedia();
    }
}

class NotasTrait extends CalculosCentroEstudos, MostrarCalculos
{

    //Propiedades
    public $notas = [5, 3, 8, 7, 6, 8, 9, 7, 5, 6, 3, 4, 5];

    //Uso de los traits
    use CalculosCentroEstudos;
    use MostrarCalculos;
}


$proba = new NotasTrait();
$proba->toString();
$proba->numeroDeAprobados();
$proba->numeroDeSuspensos();
$proba->notaMedia();
$proba->saludo();
$proba->showCalculusStudyCenter();

/*
1. Cree un *Trait* llamado ```CalculosCentroEstudos``` con las mismas funciones que la interfaz del ejercicio 4.5.
2. Cree otro *Trait* denominado ```MostrarCalculos``` con dos funciones: 
- la función de saludo que muestra "Bienvenido al centro de cálculo" 
- la función ```showCalculusStudyCenter```, que recibe el número de aprobados, suspensos y la calificación promedio y los muestra en la pantalla dándoles formato.
3. Cree una clase llamada ```NotasTrait``` que use los dos *traits* anteriores.

Escriba el código correspondiente para "probar" el código anterior.
*/
