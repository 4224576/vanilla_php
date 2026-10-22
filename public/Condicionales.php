<?php
$linea = fgets(STDIN);
$datos = explode(" ", trim($linea));


$jugador1 = 1;
$jugador2 = 2;

if ($datos[0] === $datos[1]) {
    echo 'Ha habido empate a ', $datos[0];
  } elseif ($datos[0] > $datos[1]) {
    echo 'El jugador ganador es el ', $jugador1, 'con ', $datos[0];
  } else {
    echo 'El jugador ganador es el ', $jugador2, 'con ', $datos[1];
  }

?>