<?php
 abstract class Soporte{
    public string $titulo;
    protected int $numero;
    private float $precio;
    private static float $IVA = 0.21;
    public function __construct($titulo, $numero, $precio)
    {
        $this->titulo = $titulo;
        $this->numero = $numero;
        $this->precio = $precio;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getPrecioConIva()
    {
        $precioIva = $this->getPrecio();
        $precioIva = $precioIva * self::$IVA + $precioIva;
        return $precioIva;
    }

    public function getNumero()
    {
        return $this->numero;
    }

public function muestraResumen(){
    echo "{$this->titulo}<br>{$this->precio} € (IVA no incluido)<br>";
}

    public function getTitulo()
    {
        return $this->titulo;
    }
}