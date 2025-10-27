<?php
include_once "Soporte.php";
 class Dvd extends Soporte{
    private string $idiomas;
    private string $formatoPantalla;

    public function __construct($titulo, $numero, $precio, $idiomas, $formatoPantalla)
    {
        parent::__construct($titulo, $numero, $precio);
        $this->idiomas = $idiomas;
        $this->formatoPantalla = $formatoPantalla;
    }
    public function muestraResumen()
    {
        parent::muestraResumen();
        echo "Idiomas: {$this->idiomas}<br> Formato Pantalla: {$this->formatoPantalla}";
    }
 }