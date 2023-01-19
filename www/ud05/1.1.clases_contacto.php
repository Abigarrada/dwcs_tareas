
<?php

class Contacto
{

    //Propiedades privadas

    private $nombre;
    private $apellido;
    private $numeroTelefono;

    //Constructor con 3 argumentos

    public function __construct($nombre, $apellido, $numeroTelefono)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->numeroTelefono = $numeroTelefono;
    }

    //Destructor

    public function __destruct()
    {
        echo "Se destruye el objeto de nombre: " . $this->nombre;
    }

    //Setters y Getters

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setNumeroTelefono($numeroTelefono)
    {
        $this->numeroTelefono = $numeroTelefono;
    }

    public function getNumeroTelefono()
    {
        return $this->numeroTelefono;
    }

    //Métodos

    public function muestraInformacion()
    {
        echo "La información reunida de este objeto es: <br>
                Nombre: " . $this->getNombre() . "<br>",
        "Apellido: " . $this->getApellido() . "<br>",
        "Número de teléfono: " . $this->getNumeroTelefono();
    }
}

//Objetos

$contacto1 = new Contacto("Marta", "Gómez", "611455677");
$contacto2 = new Contacto("Carlos", "Pérez", "666112336");
$contacto3 = new Contacto("Sara", "López", "699885334");


$contacto1->muestraInformacion();
$contacto2->muestraInformacion();
$contacto3->muestraInformacion();
