<?php
define('NOMBRE_CENTRO', 'CIFP Carlos III');

$curriculos =  [
    ['alumno' => 'Ana López',    'ciclo' => 'DAW',  'video' => 'https://youtu.be/curriculo1', 'foto' => 'https://youtu.be/curriculo1'],
    ['alumno' => 'Marcos Pérez', 'ciclo' => 'DAM',  'video' => 'https://youtu.be/curriculo2', 'foto' => 'https://youtu.be/curriculo1'],
    ['alumno' => 'Laura García', 'ciclo' => 'ASIR', 'video' => 'https://youtu.be/curriculo3', 'foto' => 'https://youtu.be/curriculo1'],
    ['alumno' => 'Yuri FAz', 'ciclo' => 'DAW', 'video' => 'https://youtube.com/shorts/z6OE8dhyu6Y?si=Y2k4AK5bqGffqGWX', 'foto' => 'https://youtu.be/curriculo1']
  ];

   function mostrarCurriculo(array $curriculo) {
    echo '<li>', $curriculo['alumno'], ' — ', $curriculo['ciclo'], ' — <a href="', $curriculo['video'], '">vídeo</a></li>';
  }

  echo '<h1>', NOMBRE_CENTRO, ' — Currículos</h1>';
  echo '<ul>';
  
  foreach ($curriculos as $curriculo) {
    mostrarCurriculo($curriculo);
  }
  echo '</ul>';
?>