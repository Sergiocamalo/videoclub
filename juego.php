<?php
require_once "Soporte.php";

class Juego extends Soporte {
    public function __construct(
        string $titulo, int $numero, float $precio,
        string $consola,
        int $minNumJugadores,
        int $maxNumJugadores
    ) {
        parent::__construct($titulo, $numero, $precio);
    }


    public function muestraJugadoresPosibles(): void {
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

    
    public function muestraResumen(): void {
        echo "<br>Juego para: {$this->consola}<br>";
        parent::muestraResumen();
        $this->muestraJugadoresPosibles();
    }
}
