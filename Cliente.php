<?php
    include_once("Soporte.php");
class Cliente {
    private string $nombre;
    private string $numero;
    private int $maxAlquilerConcurrente;
    private int $numSoportesAlquilados = 0;
    private array $soportesAlquilados = [];

    public function __construct(string $nombre, string $numero, int $maxAlquilerConcurrente = 3) {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
    }

    public function getNumero(): string {
        return $this->numero;
    }

    public function setNumero(string $numero): void {
        $this->numero = $numero;
    }

    public function getNumSoportesAlquilados(): int {
        return $this->numSoportesAlquilados;
    }

    public function muestraResumen(): void {
        echo "Cliente: {$this->nombre}\n<br>";
        echo "Alquileres actuales: " . count($this->soportesAlquilados) . "\n<br>";
    }

    public function tieneAlquilado(Soporte $s): bool {
        foreach ($this->soportesAlquilados as $soporte) {
            if ($soporte->getNumero() === $s->getNumero()) {
                return true;
            }
        }
        return false;
    }

    public function alquilar(Soporte $s): bool {
        if ($this->tieneAlquilado($s)) {
            echo "El soporte '{$s->getTitulo()}' ya está alquilado por el cliente.\n<br>";
            return false;
        }

        if (count($this->soportesAlquilados) >= $this->maxAlquilerConcurrente) {
            echo "No se puede alquilar '{$s->getTitulo()}'. Ha alcanzado el máximo de alquileres ({$this->maxAlquilerConcurrente}).\n<br>";
            return false;
        }

        $this->soportesAlquilados[] = $s;
        $this->numSoportesAlquilados++;
        echo "El soporte '{$s->getTitulo()}' ha sido alquilado correctamente.\n<br>";
        return true;
    }

    public function devolver(int $numSoporte): bool {
        foreach ($this->soportesAlquilados as $index => $soporte) {
            if ($soporte->getNumero() === $numSoporte) {
                unset($this->soportesAlquilados[$index]);
                $this->soportesAlquilados = array_values($this->soportesAlquilados);
                echo "El soporte '{$soporte->getTitulo()}' ha sido devuelto correctamente.\n<br>";
                return true;
            }
        }
        echo "El soporte con número $numSoporte no está alquilado por el cliente.\n<br>";
        return false;
    }

    public function listarAlquileres(): void {
        $cantidad = count($this->soportesAlquilados);
        echo "El cliente '{$this->nombre}' tiene actualmente $cantidad alquiler(es):\n<br>";

        if ($cantidad === 0) {
            echo "No hay soportes alquilados.\n<br>";
            return;
        }

        foreach ($this->soportesAlquilados as $soporte) {
            $soporte->muestraResumen();
        }
    }
}