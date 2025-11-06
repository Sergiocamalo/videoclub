<?php
include_once "CintaDeVideo.php";
include_once "Dvd.php";
include_once "Juego.php";
include_once "Cliente.php";

//instanciamos un par de objetos cliente
$cliente1 = new Cliente("Bruce Wayne", 23);
$cliente2 = new Cliente("Clark Kent", 33);

//mostramos el número de cada cliente creado 
echo "<br>El identificador del cliente 1 es: " . $cliente1->getNumero();
echo "<br>";
echo "<br>El identificador del cliente 2 es: " . $cliente2->getNumero() . "<br>";

//instancio algunos soportes 
$soporte1 = new CintaDeVideo("Los cazafantasmas", 23, 3.5, 107);
echo "<br>";
$soporte2 = new Juego("The Last of Us Part II", 26, 49.99, "PS4", 1, 1);
echo "<br>";
$soporte3 = new Dvd("Origen", 24, 15, "es,en,fr", "16:9");
echo "<br>";
$soporte4 = new Dvd("El Imperio Contraataca", 4, 3, "es,en", "16:9");
echo "<br>";

//alquilo algunos soportes
$cliente1->alquilar($soporte1);
echo "<br>";
$cliente1->alquilar($soporte2);
echo "<br>";
$cliente1->alquilar($soporte3);
echo "<br>";


//voy a intentar alquilar de nuevo un soporte que ya tiene alquilado
$cliente1->alquilar($soporte1);
echo "<br>";
//el cliente tiene 3 soportes en alquiler como máximo
//este soporte no lo va a poder alquilar
$cliente1->alquilar($soporte4);
echo "<br>";
//este soporte no lo tiene alquilado
$cliente1->devolver(23);
echo "<br>";
$cliente1->listarAlquileres();
echo "<br>";


//devuelvo un soporte que sí que tiene alquilado
$cliente1->devolver(4);
echo "<br>";
//alquilo otro soporte
$cliente1->alquilar($soporte4);
echo "<br>";
//listo los elementos alquilados
$cliente1->listarAlquileres();
echo "<br>";
//este cliente no tiene alquileres
$cliente2->devolver(2);
echo "<br>";
