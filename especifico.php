<?php
require_once("config/conexion.php");

require_once("models/Lenguajes.php");
$lenguajes = new Lenguajes();
$lenx = $lenguajes->get_lenguajes();

require_once("models/ColegioLogin.php");
$colegioLogin = new ColegioLogin();

$idColegio = $_REQUEST['id'];
if (is_null($_REQUEST['id'])) {
  echo "<script>window.location.href = 'principal.php'</script>";
}
$colegio = $colegioLogin->encontrarColegioPorId($idColegio);
if (count($colegio) <= 0) {
  echo "<script>alert('No existe id'); window.location.href = 'principal.php';  </script>";
} else {
  $colegio = $colegio[0];
}
?>

<!DOCTYPE html>
<html class="no-js" lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>School.com</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="">
  <!-- Listado CSS  -->
  <link rel="stylesheet" href="assets\css\style.css">
  <link rel="stylesheet" href="assets\css\style_especifico.css">
  <link rel="stylesheet" href="assets\css\widgets.css">
  <link rel="stylesheet" href="assets\css\responsive.css">
</head>

<header>
  <nav class="navbar navbar-light bg-light">
    <div class="col-md-2 col-xs-6" style="max-width: 200px;" >
      <a href="javascript:history.back()"><img class="logo text" src="assets\imgs\theme\logo6.png" alt=""></a>
    </div>
    <form class="form-inline">
      <a class="btn btn-warning my-1 my-sm-0 text-white" class="btn btn-primary btn-sm float-right" type="" href="login.php">Iniciar Sesión</a>
    </form>
  </nav>
</header>

<body>

  <section class="resultado_especifico">
    <div class="caja">
      <div>
        <h3 class="title"><?= $colegio['nombre_colegio'] ?></h3>
        <p class="title_info">Ubicación: <?= $colegio['inf_ubicacion'] ?> - Tel: <?= $colegio['tel'] ?> - Correo: <?= $colegio['correo'] ?></p>
      </div>
      <div class="contenedor shadow-lg p-3 bg-white rounded">
        <div class="adjustable">
          <div class="img-big rounded">
            <div class="rounded" style=" width:100%; height:100%; background-size:cover; background-position:center; background-repeat:no-repeat; background-image: url('<?= $colegio['img_principal'] ?>')" alt="img_principal">
            </div>
          </div>
          <div class="more">
            <div class="img-1 mb-3 rounded">
              <div class="rounded" style=" width:100%; height:100%; background-size:cover; background-position:center; background-repeat:no-repeat; background-image: url('<?= $colegio['img_secundarias_1'] ?>')" alt="img_secundarias_1">
              </div>
            </div>
            <div class="img-2  mb-3 rounded">
              <div class="rounded" style=" width:100%; height:100%; background-size:cover; background-position:center; background-repeat:no-repeat; background-image: url('<?= $colegio['img_secundarias_2'] ?>')" alt="img_secundarias_2">
              </div>
            </div>
            <div class="img-3 rounded">
              <div class="rounded" style=" width:100%; height:100%; background-size:cover; background-position:center; background-repeat:no-repeat; background-image: url('<?= $colegio['img_secundarias_3'] ?>')" alt="img_secundarias_3">
              </div>
            </div>
            <div class="img-4 rounded">
              <div class="rounded" style=" width:100%; height:100%; background-size:cover; background-position:center; background-repeat:no-repeat; background-image: url('<?= $colegio['img_secundarias_4'] ?>')" alt="img_secundarias_4">
              </div>
            </div>
          </div>
        </div> <br>
        <div class="texto">
          <div class="texto-info start ">
            <p><span class="font-weight-bold">Ciudad:</span> <?= ($colegio['ciudad']) ?></p>
          </div>
          <div class="texto-info">
            <p><span class="font-weight-bold">Caracter:</span> <?= ($colegio['caracter']) ?></p>
          </div>
          <div class="texto-info">
            <p><span class="font-weight-bold">Calendario:</span> <?= ($colegio['calendario']) ?></p>
          </div>
          <div class="texto-info">
            <p><span class="font-weight-bold">Horarios:</span> <?= ($colegio['horarios']) ?></p>
          </div>
          <div class="texto-info">
            <p><span class="font-weight-bold">Nivel:</span> <?= ($colegio['nivel']) ?></p>
          </div>
        </div>

        <div class="text-principal">
          <h5 class="text-title">Especialidades.</h5>
          <p><?= ($colegio['inf_especialidades']) ?> </p>
          <h5 class="text-title">Convenios.</h5>
          <p><?= ($colegio['inf_convenios']) ?> </p>
          <h5 class="text-title">Exigencias.</h5>
          <p><?= ($colegio['inf_exigencias']) ?> </p>
          <h5 class="text-title">Requisitos.</h5>
          <p><?= ($colegio['inf_requisitos']) ?> </p>
          <h5 class="text-title">Formacion Deportiva.</h5>
          <p><?= ($colegio['inf_deporte']) ?> </p>
          <h5 class="text-title">Formacion Economica.</h5>
          <p><?= ($colegio['inf_economia']) ?> </p>
        </div>
  </section>

  <footer class="blog-footer">
    <p>© 2022 | Theschools.com</p>
  </footer>


  <!-- Vendor JS-->
  <script src="assets\js\vendor\modernizr-3.5.0.min.js"></script>
  <script src="assets\js\vendor\jquery-1.12.4.min.js"></script>
  <script src="assets\js\vendor\popper.min.js"></script>
  <script src="assets\js\vendor\bootstrap.min.js"></script>
  <script src="assets\js\vendor\jquery.slicknav.js"></script>
  <script src="assets\js\vendor\slick.min.js"></script>
  <script src="assets\js\vendor\wow.min.js"></script>
  <script src="assets\js\vendor\jquery.ticker.js"></script>
  <script src="assets\js\vendor\jquery.vticker-min.js"></script>
  <script src="assets\js\vendor\jquery.scrollUp.min.js"></script>
  <script src="assets\js\vendor\jquery.nice-select.min.js"></script>
  <script src="assets\js\vendor\jquery.magnific-popup.js"></script>
  <script src="assets\js\vendor\jquery.sticky.js"></script>
  <script src="assets\js\vendor\perfect-scrollbar.js"></script>
  <script src="assets\js\vendor\waypoints.min.js"></script>
  <script src="assets\js\vendor\jquery.theia.sticky.js"></script>
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
  <!-- NewsBoard JS -->
  <script src="assets\js\main.js"></script>
</body>

</html>