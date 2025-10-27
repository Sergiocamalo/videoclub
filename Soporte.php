<?php
 class Soporte{
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
        $precioIva = $this.getPrecio();
        $precioIva = $precioIva * $IVA;
        return $precioIva;
    }

    public function getNumero()
    {
        return $this->numero;
    }

public function muestraResumen(){
    echo "$titulo<br>$precio (IVA no incluido)";
}
}