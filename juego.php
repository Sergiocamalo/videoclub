<?php
require_once "Soporte.php";

class Juego extends Soporte
{
    private int $minNumJugadores;
    private int $maxNumJugadores;
    private string $consola;

    public function __construct(
        string $titulo, int $numero, float $precio,
        string $consola,
        int $minNumJugadores,
        int $maxNumJugadores
    ) {
        parent::__construct($titulo, $numero, $precio);
        $this->consola=$consola;
        $this->minNumJugadores = $minNumJugadores;
        $this->maxNumJugadores = $maxNumJugadores;
    }

    public function muestraJugadoresPosibles(): void
    {
        if ($this->minNumJugadores === $this->maxNumJugadores) {
            if ($this->minNumJugadores === 1) {
                echo "Para un jugador<br>";
            } else {
                echo "Para {$this->minNumJugadores} jugadores<br>";
            }
        } else {
            echo "De {$this->minNumJugadores} a {$this->maxNumJugadores} jugadores<br>";
        }
    }
    public function muestraResumen()
    {
        echo "<br>Juego para: {$this->consola}<br>";
        parent::muestraResumen();
        $this->muestraJugadoresPosibles();
        echo "<br>";
    }
 }

