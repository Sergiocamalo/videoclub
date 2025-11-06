<?php
include_once "Cliente.php";
include_once "Soporte.php";
include_once "CintaDeVideo.php";
include_once "Dvd.php";
include_once "Juego.php";

class Videoclub
{
    private string $nombre;
    private array $productos  = [];
    private int $numProductos = 0;
    private array $socios     = [];
    private int $numSocios    = 0;

    public function __construct(string $nombre)
    {
        $this->nombre = $nombre;
    }

    private function incluirProducto(Soporte $producto): void
    {
        $this->productos[] = $producto;
        $this->numProductos++;
    }

    public function incluirCintaVideo(string $titulo, float $precio, int $duracion): void
    {
        $numero = $this->numProductos + 1;
        $this->incluirProducto(new CintaDeVideo($titulo, $numero, $precio, $duracion));
    }

    public function incluirDvd(string $titulo, float $precio, string $idiomas, string $pantalla): void
    {
        $numero = $this->numProductos + 1;
        $this->incluirProducto(new Dvd($titulo, $numero, $precio, $idiomas, $pantalla));
    }

    public function incluirJuego(string $titulo, float $precio, string $consola, int $minJ, int $maxJ): void
    {
        $numero = $this->numProductos + 1;
        $this->incluirProducto(new Juego($titulo, $numero, $precio, $consola, $minJ, $maxJ));
    }

    public function incluirSocio(string $nombre, string $numero, int $maxAlquileresConcurrentes = 3): void
    {
        $this->socios[] = new Cliente($nombre, $numero, $maxAlquileresConcurrentes);
        $this->numSocios++;
    }

    public function listarProductos(): void
    {
        echo "<h3>Productos en Videoclub '{$this->nombre}'</h3>";

        if ($this->numProductos === 0) {
            echo "No hay productos.<br>";
            return;
        }

        foreach ($this->productos as $producto) {
            $producto->muestraResumen();
        }
    }

    public function listarSocios(): void
    {
        echo "<h3>Socios del Videoclub '{$this->nombre}'</h3>";

        if ($this->numSocios === 0) {
            echo "No hay socios registrados.<br>";
            return;
        }

        foreach ($this->socios as $socio) {
            $socio->muestraResumen();
        }
    }

    public function alquilarSocioProducto(string $numeroCliente, int $numeroSoporte): void
    {

        $cliente = null;
        foreach ($this->socios as $s) {
            if ($s->getNumero() === $numeroCliente) {
                $cliente = $s;
                break;
            }
        }

        if (! $cliente) {
            echo "No existe un socio con número {$numeroCliente}.<br>";
            return;
        }

        $producto = null;
        foreach ($this->productos as $p) {
            if ($p->getNumero() === $numeroSoporte) {
                $producto = $p;
                break;
            }
        }

        if (! $producto) {
            echo "No existe un producto con número {$numeroSoporte}.<br>";
            return;
        }

        $cliente->alquilar($producto);
    }
}
