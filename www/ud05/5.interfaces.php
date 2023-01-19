
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
    public $notas = [];


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
    public function numeroDeAprobados(): int
    {

        return false;
    }
    public function numeroDeSuspensos(): int
    {

        return false;
    }
    public function notaMedia(): float
    {

        return false;
    }
}

/*

1. Declara una **interface** llamada `CalculosCentroEstudios` con los siguientes métodos:
    - ```numeroDeAprobados```, que devuelve el número de aprobados.
    - ```numeroDeSuspensos```, que devuelve el número de suspensos.
    - ```notaMedia```, que devuelve la nota media.

2. Crea una clase ```Notas```:
    - Tendrá un atributo llamado ```notas```. Este atributo será un array con diferentes notas enteras. 
    - Tendrá una función abstracta ```toString()```. Esta función pasará el array a string y lo devolverá. Ejemplo:

    ```php
        public function toString()
        {
            $listaDeNotas = "";
            foreach ($this->get_notas() as $nota) {
                $listaDeNotas .= "[$nota]";
            }
            return $listaDeNotas;
        }
    ```

3. Crea por último, una clase denominada ```NotasDaw``` que hereda de la clase ```Notas``` e implementa ```CalculosCentroEstudos```.
4. Escribe el código correspondente para "testear" la anterior clase:
    -  Crea un objeto de la clase ```NotasDaw``` e invocar todos los métodos de esta clase mostrando por pantalla los resultados.
    
*/
