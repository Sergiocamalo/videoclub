<?php
include "Soporte.php";

// Al convertir Soporte a una clase abstracta, ya no podemos instanciarla directamente.
// $soporte1 = new Soporte("Tenet", 22, 3); 
// echo "<strong>" . $soporte1->titulo . "</strong>"; 
// echo "<br>Precio: " . $soporte1->getPrecio() . " euros"; 
// echo "<br>Precio IVA incluido: " . $soporte1->getPrecioConIVA() . " euros";
// $soporte1->muestraResumen();

echo "<br><br>"; // Añadimos un espacio para separar las pruebas

include "CintaDeVideo.php";
$miCinta = new CintaDeVideo("Los cazafantasmas", 23, 3.5, 107);
echo "<strong>" . $miCinta->titulo . "</strong><br>";
$miCinta->muestraResumen();

echo "<br><br>"; // Añadimos un espacio para separar las pruebas

include "Dvd.php";
$miDvd = new Dvd("Origen", 24, 15, "es,en,fr", "16:9");
echo "<strong>" . $miDvd->titulo . "</strong><br>";
$miDvd->muestraResumen();

echo "<br><br>"; // Añadimos un espacio para separar las pruebas

include "juego.php";
$miJuego = new Juego("The Last of Us Part II", 26, 49.99, "PS4", 1, 1);
echo "<strong>" . $miJuego->titulo . "</strong>";
$miJuego->muestraResumen();
