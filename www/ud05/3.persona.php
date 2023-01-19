
<?php

abstract class Persona
{

    //Propiedades
    private $id;
    protected $nombre;
    protected $apellidos;

    //Constructor
    function __construct($nombre, $apellidos)
    {
        $this->id++;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
    }

    //Métodos abstractos
    abstract function setNombre($nombre);
    abstract function getNombre();
    abstract function setApellidos($apellidos);
    abstract function getApellidos();
    abstract function action();
}

class Usuarios extends Persona
{

    //Métodos de la clase abstracta
    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    function getNombre()
    {
        return $this->nombre;
    }
    function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }
    function getApellidos()
    {
        $this->apellidos;
    }
    function action()
    {
        echo "Nombre: " . $this->getNombre() . "<br>",
        "Apellido: " . $this->getApellidos() . "<br>",
        "Tipo: Usuario";
    }
}

class Administradores extends Persona
{

    //Métodos de la clase abstracta
    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    function getNombre()
    {
        return $this->nombre;
    }
    function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }
    function getApellidos()
    {
        $this->apellidos;
    }
    function action()
    {
        echo "Nombre: " . $this->getNombre() . "<br>",
        "Apellido: " . $this->getApellidos() . "<br>",
        "Tipo: Administrador";
    }
}

$user1 = new Usuarios("Ana", "Barcia Pérez");
$user2 = new Usuarios("Antonio", "Cardenal Ruiz");
$admin1 = new Usuarios("Manuel", "Navarro López");
$admin2 = new Usuarios("María", "Álvarez Moro");

$user1->action();
$user2->action();
$admin1->action();
$admin2->action();