<?php


function suma (array $n1): int{
        $suma=0;
        for($i=1; $i<count($n1); $i++){
            $suma+=$n1[$i];
        }
        return $suma;
}

function media (array $n2):float{
    $media=0;
    $media=suma($n2)/(count($n2)-1);
    return $media;
}




while ($linea = fgets(STDIN)){
    $datos = explode(" ", trim($linea));

    if(count($datos)<=2){
        echo '<p>(Error) No dispongo de suficientes argumentos.</p>';
    }else{
        switch($datos[0]){
            case "suma":
                    echo '<p>La suma de los números es: ', suma($datos),'</p>';
                break;
            case "media":
                    echo '<p>La media de los números es: ', media($datos),'</p>';
                break;
            default:
                echo '<p>(Error) Operación no permitida</p>';
        }
    }

    echo "\n";

}    
