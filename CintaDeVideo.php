<?php
include_once "Soporte.php";
class CintaDeVideo extends Soporte
{
    private int $duracion;

    public function __construct($titulo, $numero, $precio, $duracion)
    {
        parent::__construct($titulo, $numero, $precio);
        $this->duracion = $duracion;
    }
    public function muestraResumen()
    {
        parent::muestraResumen();
        echo "Duración: {$this->duracion}";
    }

}
