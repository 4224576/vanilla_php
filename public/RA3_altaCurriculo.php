<?php
/**
 * Enviar el formulario vacío: -El nombre del alumno es obligatorio. -Elige uno de los ciclos de la lista.
 * if ($alumno === '') {
 * $errores['alumno'] = 'El nombre del alumno es obligatorio.';
 * f (!array_key_exists($codCiclo, $this->ciclos)) {
 * $errores['ciclo'] = 'Elige uno de los ciclos de la lista.';
 * 
 * //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 * 
 * Un nombre con espacios al principio y al final ( Ana López ):Ana Lopez (DAW)
 * Sin errores el trim quita los espacios: $alumno = trim($datos['alumno'] ?? '');
 * 
 * ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 * 
 * Vídeo http://youtu.be/curriculo1 (sin la s) y vídeo javascript:alert('XSS'): El vídeo debe ser una URL que empiece por https:// y El vídeo debe ser una URL que empiece por https://.
 * if ($video !== ''
 * && (filter_var($video, FILTER_VALIDATE_URL) === false || !str_starts_with($video, 'https://'))) {
 * $errores['video'] = 'El vídeo debe ser una URL que empiece por https://';
 * En los dos da el mismo errors, la diferencia es que en el segudno quitando el "tupe=url" aun no sirve porque esa comprobacion la hace el navegador pero el servidor es el que valida.
 * 
 * //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 * 
 * Con las herramientas de desarrollo, cambia el value de una opción del desplegable por FP y envía: Elige uno de los ciclos de la lista.
 * Al introducirlo sale el mismo error ya que sucede algo parecido al ejercicio anterior, al no estar FP dentro del servidor no lo cuenta como un ciclo.
 * 
 * Datos correctos, con vídeo y sin vídeo: Ana Lopez (DAM) Ciclo: Desarrollo de Aplicaciones Multiplataforma — titulación de Técnico Superior Vídeo: ver vídeo // Ana Lopez (DAW) Ciclo: Desarrollo de Aplicaciones Web — titulación de Técnico Superior Vídeo: sin vídeo
 * 
 */
 declare(strict_types=1);

 require_once __DIR__ . '/../src/RA3_formularios.php';
 require_once __DIR__ . '/../src/ValidadorCurriculo.php';

 const NOMBRE_CENTRO = 'CIFP Carlos III';

 // Catálogo de ciclos del centro. En el Bloque 6 saldrá de la base de datos.
 $ciclos = [
     'DAW'  => new Ciclo(1, 'DAW', 'Desarrollo de Aplicaciones Web', Ciclo::GRADO_SUPERIOR),
     'DAM'  => new Ciclo(2, 'DAM', 'Desarrollo de Aplicaciones Multiplataforma', Ciclo::GRADO_SUPERIOR),
     'ASIR' => new Ciclo(3, 'ASIR', 'Administración de Sistemas Informáticos en Red', Ciclo::GRADO_SUPERIOR),
     'SMR'  => new Ciclo(4, 'SMR', 'Sistemas Microinformáticos y Redes', Ciclo::GRADO_MEDIO),
 ];

 $validador = new ValidadorCurriculo($ciclos);
 $datos     = [];
 $errores   = [];
 $curriculo = null;

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     $datos   = $_POST;
     $errores = $validador->validar($datos);

     if ($errores === []) {
         // Sin base de datos no hay quien asigne el id: usamos 1 (Bloque 6).
         $curriculo = $validador->crearCurriculo($datos, 1);
     }
 }
 ?>
 <!DOCTYPE html>
 <html lang="es">
 <head>
   <meta charset="UTF-8">
   <title>Alta de currículo — <?= NOMBRE_CENTRO ?></title>
 </head>
 <body>
   <h1><?= NOMBRE_CENTRO ?> — Alta de currículo</h1>

   <?php if ($curriculo !== null): ?>
     <section class="resultado">
       <h2>Currículo validado</h2>
       <p class="exito"><?= e($curriculo->descripcion()) ?></p>
       <p>Ciclo: <?= e($curriculo->ciclo->nombre) ?> — titulación de <?= e($curriculo->ciclo->titulacion()) ?></p>
       <p>Vídeo:
         <?php if ($curriculo->videoCurriculum !== null): ?>
           <a href="<?= e($curriculo->videoCurriculum) ?>">ver vídeo</a>
         <?php else: ?>
           sin vídeo
         <?php endif; ?>
       </p>
       <p><a href="RA3_altaCurriculo.php">Dar de alta otro currículo</a></p>
     </section>
   <?php else: ?>
     <?php if ($errores !== []): ?>
       <ul class="errores">
         <?php foreach ($errores as $error): ?>
           <li><?= e($error) ?></li>
         <?php endforeach; ?>
       </ul>
     <?php endif; ?>

     <form action="RA3_altaCurriculo.php" method="post">
       <p>
         <label>Alumno
           <input name="alumno" value="<?= e($datos['alumno'] ?? '') ?>">
         </label>
       </p>
       <p>
         <label>Ciclo
           <select name="ciclo">
             <option value="">— Elige un ciclo —</option>
             <?php foreach ($ciclos as $codigo => $ciclo): ?>
               <option value="<?= e($codigo) ?>" <?= ($datos['ciclo'] ?? '') === $codigo ? 'selected' : '' ?>><?= e($ciclo->descripcion()) ?></option>
             <?php endforeach; ?>
           </select>
         </label>
       </p>
       <p>
         <label>Vídeo de presentación (opcional)
           <input name="video" type="url" value="<?= e($datos['video'] ?? '') ?>">
         </label>
       </p>
       <button type="submit">Dar de alta</button>
     </form>
   <?php endif; ?>
 </body>
 </html>