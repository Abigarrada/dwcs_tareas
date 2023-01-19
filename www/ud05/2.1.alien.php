
<?php

class Alien
{
    public $nombre;
    public $numberOfAliens = 0;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
        $this->numberOfAliens++;
    }

    public function getNumberOfAliens()
    {
        return $this->numberOfAliens;
    }
}

$alien1 = new Alien("Pepe");
$alien2 = new Alien("Paco");
$alien3 = new Alien("Pato");
$alien4 = new Alien("Pepo");
$alien5 = new Alien("Pico");

$alien1->getNumberOfAliens();
