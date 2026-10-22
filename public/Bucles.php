<?php

$linea = fgets(STDIN);
$datos = explode(" ", trim($linea));

$resultado = 0;
$contador = 0;

 while ($datos[$contador] != 0) {
    $contador++;
    $resultado += $datos[$contador];

  }

    echo 'Se han sumado ', $i, ' números, dando como resultado un total de ', $resultado;

?>