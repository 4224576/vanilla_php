<?php
declare(strict_types=1);


while ($linea = fgets(STDIN)) {
    $numero = (int) trim($linea);?>
<p><?php echo $numero ?> = <?php echo imprimeFactoresPrimos(factoresPrimos($numero)) ?></p>
<?php
}

function factoresPrimos(int $numero): array {
    $x = 2;
    $factores = [];

    while ($numero != 1) {
        if ($numero % $x == 0) {
            if (array_key_exists($x, $factores)) {
                $factores[$x] = $factores[$x] + 1;
            } else {
                $factores[$x] = 1;
            }
            $numero = intdiv($numero, $x);
        } else {
            $x++;
        }
    }
    return $factores;
}

function imprimeFactoresPrimos(array $factoresArray): string {
    $respuesta = "";
    foreach ($factoresArray as $clave => $valor) {
        $respuesta = $respuesta . $clave . " ^ " . $valor . " * ";
    }
    return substr($respuesta, 0, strlen($respuesta) - 3);
}