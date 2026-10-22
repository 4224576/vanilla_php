<?php
    
    $variables = [];

  
    $linea = fgets(STDIN);
    $datos = explode(" ", trim($linea));
    
    $num1 = (float)$datos[1];
    $num2 = (float)$datos[2];
    $operador= $datos[0];
    $resultado = 0;

  

  switch ($operador) {
    case 'x':
        $resultado= $num1 * $num2;
      echo '<p>', $num1, ' ', $operador, ' ', $num2, ' = ', $resultado,'</p>';
      break;
    case '+':
        $resultado= $num1 + $num2;
      echo '<p>', $num1, ' ', $operador, ' ', $num2, ' = ', $resultado,'</p>';
      break;
    case '-':
        $resultado= $num1 - $num2;
      echo '<p>', $num1, ' ', $operador, ' ', $num2, ' = ', $resultado,'</p>';
      break;
    case ':':
        $resultado= $num1 / $num2;
      echo '<p>', $num1, ' ', $operador, ' ', $num2, ' = ', $resultado,'</p>';
      break;    
    default:
     echo 'Error';
  }
?>