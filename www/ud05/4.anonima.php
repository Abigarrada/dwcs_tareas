
<?php

$object = new class($altura, $base)
{
    private $altura;
    private $base;
    public function __construct($altura, $base)
    {
        $this->altura = $altura;
        $this->base = $base;
    }
    public function area() {
        return ($this->base * $this->altura) / 2;
    }
};

/*

Utilizando una **clase anónima** crea diferentes objetos con los siguientes requisitos:
- La clase tiene **dos propiedades**:
    - `$base`
    - `$altura`
- La clase tiene **dos métodos**:
    - `area()`: devolve la (base * altura) / 2 .

Escribe un ejemplo de uso.
*/

