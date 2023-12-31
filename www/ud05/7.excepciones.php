
<?php 

class ExPropia extends Exception {

}

class ExPropiaClass {
    static function testNumber($n){
        if($n == 0){
            throw new ExPropia('El número no puede ser igual a 0.');
        }
    }
}

/*
1. Defina una nueva clase de excepción llamada ```ExPropia```que extienda de ```Excepcion```. No debe hacer nada más. 
2. Crea una clase llamada ```ExPropiaClass```, con un método estático 
```testNumber``` que recibe un número. Si el número es cero lanza una 
excepción del tipo ```ExPropia```. La excepción no está atrapada 
dentro de esta clase. 
3. Lance el método ```testNumber``` con diferentes valores, capturando las posibles excepciones.
*/

