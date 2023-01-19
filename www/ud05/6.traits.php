
<?php 

trait CalculosCentroEstudos {
    public function numeroDeAprobados(){
        return false;
    }
    public function numeroDeSuspensos()
    {
        return false;
    }
    public function notaMedia()
    {
        return false;
    }
}

trait MostrarCalculos {
    public function saludo(){
        return "Bienvenido al centro de cálculo";
    }

    public function showCalculusStudyCenter(){
        echo "La información reunida de este objeto es: <br>
        Número de aprobados: " . $this->numeroDeAprobados() . "<br>",
        "Número de suspensos: " . $this->numeroDeSuspensos() . "<br>",
        "Nota media: " . $this->notaMedia();
    }
}

class NotasTrait implements CalculosCentroEstudos, MostrarCalculos {
    
    //Implementación de los traits
    
    public function numeroDeAprobados()
    {
        return false;
    }
    public function numeroDeSuspensos()
    {
        return false;
    }
    public function notaMedia()
    {
        return false;
    }

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


/*
1. Cree un *Trait* llamado ```CalculosCentroEstudos``` con las mismas funciones que la interfaz del ejercicio 4.5.
2. Cree otro *Trait* denominado ```MostrarCalculos``` con dos funciones: 
- la función de saludo que muestra "Bienvenido al centro de cálculo" 
- la función ```showCalculusStudyCenter```, que recibe el número de aprobados, suspensos y la calificación promedio y los muestra en la pantalla dándoles formato.
3. Cree una clase llamada ```NotasTrait``` que use los dos *traits* anteriores.

Escriba el código correspondiente para "probar" el código anterior.
*/

