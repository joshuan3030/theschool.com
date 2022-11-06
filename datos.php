<?php
session_start();
require_once("config/conexion.php");

require_once("models/Lenguajes.php");
$lenguajes = new Lenguajes();
$lenx = $lenguajes->get_lenguajes();

require_once("models/Curso.php");
$cursodestacado = new Curso();
$curdx = $cursodestacado->get_curso_destacado();

$curx = $cursodestacado->get_curso();

if (!isset($_SESSION['usuario'])) {
  echo "<script>alert('Usuario no Logeado')</script>";
  // redirigir a login

  echo "<script>window.location.href = 'login.php'</script>";
} else {
  // echo "usuario logueado: " . $_SESSION['usuario'];
}

require_once("models/ColegioLogin.php");
require_once("config/uploads.php");

$methodo = $_SERVER['REQUEST_METHOD'];
$actualizarcolegio = new ColegioLogin();
if ($methodo == "POST") {
  // var_dump($_POST);
  $nombre_institucion = $_POST['nombre'];
  $nit = $_POST['nit'];
  $tel = $_POST['tel'];
  $correo = $_POST['correo'];
  $ubicacion = $_POST['ubicacion'];
  $introduccion = $_POST['introduccion'];
  $ciudad = $_POST['ciudad'];
  $calendario = $_POST['calendario'];
  $caracter = $_POST['caracter'];
  $horarios = isset($_POST['horarios_manana']) && isset($_POST['horarios_tarde']) ? "mañana-tarde" : (isset($_POST['horarios_manana']) ? "mañana" : "tarde");
  $nivel = isset($_POST['nivel_primaria']) && isset($_POST['nivel_secundaria']) ? "primaria-secundaria" : (isset($_POST['nivel_primaria']) ? "primaria" : "secundaria");
  $especialidades = $_POST['especialidades'];
  $convenios = $_POST['convenios'];
  $exigencias = $_POST['exigencias'];
  $requisitos = $_POST['requisitos'];
  $inf_economia = $_POST['inf_economia'];
  $inf_deportiva = $_POST['inf_deportiva'];
  $idcolegio = $_SESSION['usuario'];
  #$img_principal = $_POST['img_principal'];
  // echo "img:";
  // var_dump($_FILES);
  $rutaImg = subirImagen($_FILES["img_principal"]);
  $rutaImg1 = subirImagen($_FILES["img_secundarias_1"]);
  $rutaImg2 = subirImagen($_FILES["img_secundarias_2"]);
  $rutaImg3 = subirImagen($_FILES["img_secundarias_3"]);
  $rutaImg4 = subirImagen($_FILES["img_secundarias_4"]);
  $img_principal = "http://localhost/school.com/" . $rutaImg;
  $img_secundarias_1 = "http://localhost/school.com/" . $rutaImg1;
  $img_secundarias_2 = "http://localhost/school.com/" . $rutaImg2;
  $img_secundarias_3 = "http://localhost/school.com/" . $rutaImg3;
  $img_secundarias_4 = "http://localhost/school.com/" . $rutaImg4;
  // echo $img_principal;
  // echo $img_secundarias_1;
  // echo $img_secundarias_2;
  // echo $img_secundarias_3;
  // echo $img_secundarias_4;
  // $img_secundarias = $_POST['img_secundarias'];

  // guardar datos en BD
  $actualizarcolegio->actualizarColegio($idcolegio, $nombre_institucion, $nit, $tel, $correo, $ubicacion, $introduccion, $especialidades, $convenios, $exigencias, $requisitos, $inf_economia, $inf_deportiva, $ciudad, $calendario, $caracter, $horarios, $nivel, $img_principal, $img_secundarias_1, $img_secundarias_2, $img_secundarias_3, $img_secundarias_4);

  // echo "<script>window.location.href = 'login.php'</script>";
}

$colegio = $actualizarcolegio->encontrarColegioPorId($_SESSION['usuario']);
$colegio = $colegio[0];
// var_dump($colegio);

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
  <link rel="stylesheet" href="assets\css\style_login.css">
  <link rel="stylesheet" href="assets\css\style.css">
  <link rel="stylesheet" href="assets\css\widgets.css">
  <link rel="stylesheet" href="assets\css\responsive.css">
  <script src="https://kit.fontawesome.com/732ce8fa55.js" crossorigin="anonymous"></script>
</head>

<header>
  <nav class="navbar navbar-light bg-light">
    <div class="col-md-2 col-xs-6  ">
      <a href="/school.com/principal.php"><img class="logo text" src="assets\imgs\theme\logo6.png" alt=""></a>
    </div>
    <form class="form-inline">
      <a class="btn my-1 my-sm-0 text-white" class="btn btn-primary btn-sm float-right" type="" href="login.php">Iniciar Sesión</a>
    </form>
  </nav>
</header>

<body>

  <section class="login-block">
    <div class="container datos_container">
      <div class="row">
        <div class="col-md-12 login-sec">
          <h2 class="text-center">Registra Los Datos</h2>
          <form method="post" class="was-validated" enctype="multipart/form-data">
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <label class="form-label" for="form6Example1">Nombre De La Institución</label>
                  <input placeholder="Example: Institución Educativa..." type="text" id="form6Example1" class="form-control" name="nombre" value="<?php echo isset($colegio) ? $colegio['nombre_colegio'] : "" ?>" required />
                </div>
              </div>
              <div class="col">
                <div class="form-outline">
                  <label class="form-label" for="form6Example2">NIT</label>
                  <input type="text" id="form6Example2" class="form-control" name="nit" value="<?php echo isset($colegio) ? $colegio['nit'] : "" ?>" required />
                </div>
              </div>
            </div>

            <!-- Text input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form6Example3">Teléfono</label>
              <input placeholder="Example: Numero de telefono." type="text" id="form6Example3" class="form-control" name="tel" value="<?php echo isset($colegio) ? $colegio['tel'] : "" ?>" required />
            </div>

            <div class="form-outline mb-4">
              <label class="form-label" for="form6Example3">Correo</label>
              <input placeholder="Example: @gmail.com." type="email" id="form6Example3" class="form-control" name="correo" value="<?php echo isset($colegio) ? $colegio['correo'] : "" ?>" required />
            </div>

            <!-- Text input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form6Example4">Información De Ubicación</label>
              <input placeholder="Example: Cra-Cll Barrio." type="text" id="form6Example4" class="form-control" name="ubicacion" value="<?php echo isset($colegio) ? $colegio['inf_ubicacion'] : "" ?>" required />
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form6Example5">Mensaje De Introducción</label>
              <input placeholder="Escribe un breve mensaje, que sea llamativo." type="text" id="form6Example5" class="form-control" name="introduccion" value="<?php echo isset($colegio) ? $colegio['introduccion'] : "" ?>" required />
            </div>

            <!-- Number input -->
            <div class="form-outline mb-4">
              <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Ciudad</label>
              <select class="custom-select my-1 mr-sm-2" name="ciudad" required id="inlineFormCustomSelectPref">
                <option selected value="">-</option>
                <option <?= $colegio['ciudad'] == "Arauca" ? "selected" : "" ?> value="Arauca">Arauca</option>
                <option <?= $colegio['ciudad'] == "Armenia" ? "selected" : "" ?> value="Armenia">Armenia</option>
                <option <?= $colegio['ciudad'] == "Barranquilla" ? "selected" : "" ?> value="Barranquilla">Barranquilla</option>
                <option <?= $colegio['ciudad'] == "Bogotá" ? "selected" : "" ?> value="Bogotá">Bogotá</option>
                <option <?= $colegio['ciudad'] == "Bucaramanga" ? "selected" : "" ?> value="Bucaramanga">Bucaramanga</option>
                <option <?= $colegio['ciudad'] == "Cali" ? "selected" : "" ?> value="Cali">Cali</option>
                <option <?= $colegio['ciudad'] == "Cartagena" ? "selected" : "" ?> value="Cartagena">Cartagena</option>
                <option <?= $colegio['ciudad'] == "Cúcuta" ? "selected" : "" ?> value="Cúcuta">Cúcuta</option>
                <option <?= $colegio['ciudad'] == "Florencia" ? "selected" : "" ?> value="Florencia">Florencia</option>
                <option <?= $colegio['ciudad'] == "Ibagué" ? "selected" : "" ?> value="Ibagué">Ibagué</option>
                <option <?= $colegio['ciudad'] == "Leticia" ? "selected" : "" ?> value="Leticia">Leticia</option>
                <option <?= $colegio['ciudad'] == "Manizales" ? "selected" : "" ?> value="Manizales">Manizales</option>
                <option <?= $colegio['ciudad'] == "Medellín" ? "selected" : "" ?> value="Medellín">Medellín</option>
                <option <?= $colegio['ciudad'] == "Mitú" ? "selected" : "" ?> value="Mitú">Mitú</option>
                <option <?= $colegio['ciudad'] == "Mocoa" ? "selected" : "" ?> value="Mocoa">Mocoa</option>
                <option <?= $colegio['ciudad'] == "Montería" ? "selected" : "" ?> value="Montería">Montería</option>
                <option <?= $colegio['ciudad'] == "Neiva" ? "selected" : "" ?> value="Neiva">Neiva</option>
                <option <?= $colegio['ciudad'] == "Pasto" ? "selected" : "" ?> value="Pasto">Pasto</option>
                <option <?= $colegio['ciudad'] == "Pereira" ? "selected" : "" ?> value="Pereira">Pereira</option>
                <option <?= $colegio['ciudad'] == "Popayán" ? "selected" : "" ?> value="Popayán">Popayán</option>
                <option <?= $colegio['ciudad'] == "Puerto Carreño" ? "selected" : "" ?> value="Puerto Carreño">Puerto Carreño</option>
                <option <?= $colegio['ciudad'] == "Puerto Inírida" ? "selected" : "" ?> value="Puerto Inírida">Puerto Inírida</option>
                <option <?= $colegio['ciudad'] == "Quibdó" ? "selected" : "" ?> value="Quibdó">Quibdó</option>
                <option <?= $colegio['ciudad'] == "Riohacha" ? "selected" : "" ?> value="Riohacha">Riohacha</option>
                <option <?= $colegio['ciudad'] == "San Andrés" ? "selected" : "" ?> value="San Andrés">San Andrés</option>
                <option <?= $colegio['ciudad'] == "San José del Guaviare" ? "selected" : "" ?> value="San José del Guaviare">San José del Guaviare</option>
                <option <?= $colegio['ciudad'] == "Santa Marta" ? "selected" : "" ?> value="Santa Marta">Santa Marta</option>
                <option <?= $colegio['ciudad'] == "Sincelejo" ? "selected" : "" ?> value="Sincelejo">Sincelejo</option>
                <option <?= $colegio['ciudad'] == "Tunja" ? "selected" : "" ?> value="Tunja">Tunja</option>
                <option <?= $colegio['ciudad'] == "Valledupar" ? "selected" : "" ?> value="Valledupar">Valledupar</option>
                <option <?= $colegio['ciudad'] == "Villavicencio" ? "selected" : "" ?> value="Villavicencio">Villavicencio</option>
                <option <?= $colegio['ciudad'] == "Yopal" ? "selected" : "" ?> value="Yopal">Yopal</option>
              </select>
            </div>

            <!-- Message input -->
            <div class="form-outline mb-4" id="radio_button_1">
              <label class="my-1 mr-2" for="radio_button_1">Calendario</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="calendario" id="exampleRadios1" value="a" <?php echo isset($colegio) ? ($colegio['calendario'] == 'a' ? "checked" : "") : "" ?> required>
                <label class="form-check-label" for="exampleRadios1" value="a">
                  <div class="invalid-feedback">Example invalid feedback text</div>
                  A
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="calendario" id="exampleRadios2" value="b" <?php echo isset($colegio) ? ($colegio['calendario'] == 'b' ? "checked" : "") : "" ?> required>
                <label class="form-check-label" for="exampleRadios2" value="b">
                  B
                </label>
              </div>
            </div>

            <!-- Message input -->
            <div class="form-outline mb-4" id="radio_button_2">
              <label class="my-1 mr-2" for="radio_button_2">Carácter</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="caracter" id="exampleRadios3" value="publico" <?php echo isset($colegio) ? ($colegio['caracter'] == 'publico' ? "checked" : "") : "" ?> required>
                <label class="form-check-label" for="exampleRadios3" value="publico">
                  Publico
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="caracter" id="exampleRadios4" value="privado" <?php echo isset($colegio) ? ($colegio['caracter'] == 'privado' ? "checked" : "") : "" ?> required>
                <label class="form-check-label" for="exampleRadios4" value="privado">
                  Privado
                </label>
              </div>
            </div>


            <!-- text input -->
            <div class="form-outline mb-4">
              <label class="my-1 mr-2" for="radio_button_1">Horarios</label>
              <br />
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="horarios_manana" value="true" <?php echo isset($colegio) ? ($colegio['horarios'] == 'mañana' || $colegio['horarios'] == 'mañana-tarde' ? "checked" : "") : "" ?>>
                <label class="form-check-label" for="inlineCheckbox1">Mañana</label>
              </div>
              <br />
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="horarios_tarde" value="true" <?php echo isset($colegio) ? ($colegio['horarios'] == 'tarde' || $colegio['horarios'] == 'mañana-tarde' ? "checked" : "") : "" ?>>
                <label class="form-check-label" for="inlineCheckbox2">Tarde</label>
              </div>
            </div>
            <!-- text input -->
            <div class="form-outline mb-4">
              <label class="my-1 mr-2" for="radio_button_1">Nivel</label>
              <br />
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="nivel_secundaria" value="true" <?php echo isset($colegio) ? ($colegio['nivel'] == 'secundaria' || $colegio['nivel'] == 'primaria-secundaria' ? "checked" : "") : "" ?>>
                <label class="form-check-label" for="inlineCheckbox3" value="secundaria">Secundaria</label>
              </div>
              <br />
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox4" name="nivel_primaria" value="true" <?php echo isset($colegio) ? ($colegio['nivel'] == 'primaria' || $colegio['nivel'] == 'primaria-secundaria' ? "checked" : "") : "" ?>>
                <label class="form-check-label" for="inlineCheckbox4" value="primaria">Primaria</label>
              </div>
            </div>

            <!-- text input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form6Example6">Especialidades</label>
              <input placeholder="Escribe cosas por las cual se especializa tu institución." type="text" id="form6Example6" class="form-control" name="especialidades" value="<?php echo isset($colegio) ? $colegio['inf_especialidades'] : "" ?>" required />
            </div>

            <div class="form-outline mb-4">
              <label class="form-label" for="form6Example7">Convenios</label>
              <input placeholder="Escribe los convenios con organizaciones, que cuenta tu institución en busca de beneficio para los estudiantes ." type="text" id="form6Example7" class="form-control" name="convenios" value="<?php echo isset($colegio) ? $colegio['inf_convenios'] : "" ?>" required />
            </div>

            <div class="form-outline mb-4">
              <label class="form-label" for="form6Example8">Exigencias</label>
              <input placeholder="Escribe las exigencias presentes hacia los estudiantes." type="text" id="form6Example8" class="form-control" name="exigencias" value="<?php echo isset($colegio) ? $colegio['inf_exigencias'] : "" ?>" required />
            </div>

            <div class="form-outline mb-4">
              <label class="form-label" for="form6Example9">Requisitos</label>
              <input placeholder="Escribe los requisitos que debe cumplir un estudiantes para ingresar a la institución." type="text" id="form6Example9" class="form-control" name="requisitos" value="<?php echo isset($colegio) ? $colegio['inf_requisitos'] : "" ?>" required />
            </div>

            <div class="form-outline mb-4">
              <label class="form-label" for="form6Example10">Formación economica</label>
              <input placeholder="Escribe como es la educación economica que se brinda a los estudiantes." type="text" id="form6Example10" class="form-control" name="inf_economia" value="<?php echo isset($colegio) ? $colegio['inf_economia'] : "" ?>" required />
            </div>

            <div class="form-outline mb-4">
              <label class="form-label" for="form6Example11">Formación deportivas</label>
              <input placeholder="Detalla la formación deportiva en tu institución." type="text" id="form6Example11" class="form-control" name="inf_deportiva" value="<?php echo isset($colegio) ? $colegio['inf_deporte'] : "" ?>" required />
            </div>

            <div class="form-group">
              <label for="exampleFormControlFile1" class="h6">Imagen Principal </label>
              <input type="file" class="form-control-file" id="img_principal" accept=".png,.jpeg,.jpg,image/*" name="img_principal" required> <br>
            </div>

            <div class="form-group">
              <label for="exampleFormControlFile1"> 1- Imágenes Secundarias</label>
              <input type="file" class="form-control-file" id="img_secundaria_1" accept=".png,.jpeg,.jpg,image/*" name="img_secundarias_1" required>
            </div>

            <div class="form-group">
              <label for="exampleFormControlFile1" style="display: block ;"> 2- Imágenes Secundarias</label>
              <input type="file" class="form-control-file1" id="img_secundaria_2" accept=".png,.jpeg,.jpg,image/*" name="img_secundarias_2" required>
            </div>

            <div class="form-group">
              <label for="exampleFormControlFile1"> 3- Imágenes Secundarias</label>
              <input type="file" class="form-control-file " id="img_secundaria_3" accept=".png,.jpeg,.jpg,image/*" name="img_secundarias_3" required>
            </div>

            <div class="form-group">
              <label for="exampleFormControlFile1"> 4- Imágenes Secundarias</label>
              <input type="file" class="form-control-file" id="img_secundaria_4" accept=".png,.jpeg,.jpg,image/*" name="img_secundarias_4" required>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Subir Informacion</button>
            <a href="sesion.php" style="color: white; padding-left: 30px; padding-right: 30px;" type="" class="btn btn-warning mb-4">Salir</a>
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
          </form>
        </div>
      </div>
    </div>
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