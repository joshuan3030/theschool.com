<?php
require_once("config/conexion.php");

require_once("models/Lenguajes.php");
$lenguajes = new Lenguajes();
$lenx = $lenguajes->get_lenguajes();

require_once("models/Curso.php");
$cursodestacado = new Curso();
$curdx = $cursodestacado->get_curso_destacado();

$curx = $cursodestacado->get_curso();


require_once("models/ColegioLogin.php");

$methodo = $_SERVER['REQUEST_METHOD'];
if ($methodo == "POST") {
  $colegioLogin = new ColegioLogin();
  var_dump($_POST);
  $usuario = $_POST['usuario'];
  $password = $_POST['password'];
  print_r("usuario: " . $usuario . "|password:" . $password);
  // guardar datos en BD
  $colegioLogin->guardarCredenciales($usuario, $password);

  echo "<script>window.location.href = 'login.php'</script>";
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
  <link rel="shortcut icon" type="image/x-icon" href="assets\imgs\theme\logo3.png">
  <!-- Listado CSS  -->
  <link rel="stylesheet" href="assets\css\style.css">
  <link rel="stylesheet" href="assets\css\widgets.css">
  <link rel="stylesheet" href="assets\css\responsive.css">
</head>

<body>

  <section class="login-block">
    <div class="container register_container">
      <div class="row">
        <div class="col-md-12 login-sec">
          <h2 class="text-center">REGÍSTRATE AHORA</h2>
          <form class="login-form needs-validation" method="post" novalidate>
            <div class="form-group">
              <label for="exampleInputEmail1" class="text-uppercase">USUARIO</label>
              <input type="text" name="usuario" class="form-control" placeholder="" required="required">
              <div class="invalid-feedback">
                Ingrese el nombre de usuario
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1" class="text-uppercase">CONTRASEÑA</label>
              <input type="password" name="password" class="form-control" placeholder="" required="required">
              <div class="invalid-feedback">
                Ingrese una contraseña
              </div>
            </div>

            <div class="form-check">
              <!-- <label class="form-check-label">
              <input type="checkbox" class="form-check-input">
              <small>Recordarme</small>
            </label> -->
              <button type="submit" class="btn btn-login float-right">Subir</button>
            </div>
          </form>
          <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
              'use strict';
              window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                  form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                      event.preventDefault();
                      event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                  }, false);
                });
              }, false);
            })();
          </script>
          <!-- <div class="copy-text">Created with by Grafreez</div> -->
          <div class="copy-text">¿Tienes una cuenta? <a href="login.php">Inicia</a></div>

        </div>
      </div>
    </div>
  </section>
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
  <!-- NewsBoard JS -->
  <script src="assets\js\main.js"></script>
</body>

</html>