<?php
declare(strict_types=1);
$linea = fgets(STDIN);
$datos = explode(" ", trim($linea));


function operacion(array $datos): string{
if(count($datos) < 3){
    $datos[0]="(Error) No dispongo de suficientes argumentos.";
    echo '<p>', $datos[0], '</p';
}else{
        switch($datos[0]){
            case "suma":
                $suma=0;
                function suma(array $datos):int{
                    for($i=1; $i < count($datos - 1); $i++){
                     $suma=+$datos[i];
                    }
                    return $suma;
                }
                $datos[0] = "La suma de los números es: ", suma($datos);
                return $datos[0];
                break;
            case "media":
                $media=0;
                function media(array $datos):float{
                    for($i=1; $i<count($datos - 1); $i++){
                        $media=suma($datos)/count($datos - 1);
                        return $media;
                    }
                $datos[0]="La media de los números es: ", media($datos);
                return $datos[0];
                }
                break;
            default:
                $datos[0]=(Error) Operación no permitida;
                return $datos[0];
        }
    }    
} 
operacion($datos);
?>