<?php
/*====================================================================+
|| # Formulario PHP - Desarrollo Web 2016 - Universidad de Valparaíso
|+====================================================================+
|| # Copyright © 2016 Miguel González Aravena. All rights reserved.
|| # https://github.com/MiguelGonzalezAravena/FormularioPHP
|+====================================================================*/

// Función para evitar inyecciones
function Filtro($texto) {
  return htmlspecialchars(trim($texto), ENT_QUOTES); //evitan que caracteres que dejen la caga en la db o inyeccciones sql
}
//trim borran espacio 

// Variables
// Variables
$directorio = 'C:/wamp/www/FormularioPHP/assets/';
$nombre = isset($_POST['nombre']) ? Filtro($_POST['nombre']) : '';
$apeliido = isset($_POST['apeliido']) ? Filtro($_POST['apeliido']) : '';
$fecha = isset($_POST['fecha']) ? Filtro($_POST['fecha']) : '';
$pagina = isset($_POST['pagina']) ? Filtro($_POST['pagina']) : '';
$correo = isset($_POST['correo']) ? Filtro($_POST['correo']) : '';
$color = isset($_POST['color']) ? Filtro($_POST['color']) : '';
 //isset(determina si viene un valor) recibe el campo y lo guarda con una variable y pasa por filtro pa sacar carateres especiales 
$area = isset($_POST['area']) ? Filtro($_POST['area']) : '';
$region = isset($_POST['region']) ? Filtro($_POST['region']) : '';
$sexo = isset($_POST['sexo']) ? Filtro($_POST['sexo']) : '';
$error = '';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Proyecto para enseñar el funcionamiento de un formulario en PHP">
  <meta name="keywords" content="html, bootstrap, php, formulario, desarrollo, web">
  <meta name="author" content="Miguel González Aravena">
  <title>Formulario enviado</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap-theme.min.css">

</head>
<body>
<div class="container">
  <span style="padding-top: 10px;"></span>
<?php
// Mostrar contenido
if($enviado == 1 && $contenido == 1) {
  echo '<pre>';
  print_r($_POST);
  echo '</pre>';
  exit;
} else if(empty($nombre)) {
  $error = 'Por favor, ingrese su nombre.';
} else if(empty($apeliido)) {
  $error = 'Por favor, ingrese su apellido.';
} else if(empty($fecha)) {
  $error = 'Por favor, ingrese su fecha de nacimiento.'; 
} else if(empty($sexo)) {
  $error = 'Por favor, ingrese su sexo.';
}

// Vista de error
if(!empty($error)) {
?>
<div class="alert alert-info">
  <i class="glyphicon glyphicon-info-sign"></i>
  <?php echo $error; ?>
</div>
<a href="./" class="btn btn-warning">
  <i class="glyphicon glyphicon-chevron-left"></i>
  Volver
</a>
<?php
// Vista de éxito
} else {
  // Subir imagen
  move_uploaded_file($foto['tmp_name'], $foto_subida);
?>
  <h3>¡Formulario enviado satisfactoriamente!</h3>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Datos enviados</h3>
    </div>
    <div class="panel-body">
      <p>Muchas Gracias <b><?php echo $nombre; ?></b><b><?php echo $apellido; ?></b>,</p>
      <p>La siguiente informacion ha sido registrada</p> 
      <p>fecha de nacimiento es <b><?php echo $fecha; ?></b></p>
      <p>
        Tu sexo es: <b><?php echo ($sexo == 'm' ? 'Masculino' : 'Femenino'); ?></b>
      </p>
      <p>Region <b>?php echo $region; ?</b></p>
      <!--<p>
        Tu foto de perfil es: <br />
        <img src="./assets/<?php echo $nombre_foto; ?>" class="thumbnail">
      </p>
      <p>
        Tu descripción es: <br />
        <blockquote>
          <?php echo $descripcion; ?>
        </blockquote>
      </p>
      <p>
        Tu año de ingreso es: <b><?php echo $anio; ?></b>
      </p>
      <p>-->
        Tu <b><?php echo ($area == 1 ? 'sí' : 'no'); ?></b>Ciencia</b>
      </p>
      <p>
        Tu <b><?php echo ($area == 2 ? 'sí' : 'no'); ?></b>Deportes</b>
      </p>
      <p>
        Tu <b><?php echo ($area == 3 ? 'sí' : 'no'); ?></b>Pintura Rupestre</b>
      </p>
      <p>
        Tu <b><?php echo ($area == 1 ? 'sí' : 'no'); ?></b>Video de gatos</b>
      </p>
      <p>pagina<b><?php echo $pagina; ?></b></p>
      <p>correo<b><?php echo $correo; ?></b></p>
      <p>color<b><?php echo $color; ?></b></p>
    </div>
    <div class="panel-footer">
      <div class="text-right">
        <a href="./" class="btn btn-primary">
          <i class="glyphicon glyphicon-chevron-left"></i>
          Volver
        </a>
      </div>
    </div>
  </div>
<?php } ?>
  <!-- Pie de página -->
  <footer>
    <div class="text-center">
      <i class="glyphicon glyphicon-leaf"></i>
      Desarrollado por <a href="https://github.com/MiguelGonzalezAravena" target="_blank">Alguien</a>
    </div>
  </footer>
</div>
</body>
</html>