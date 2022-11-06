<?php
session_start();
require_once("config/conexion.php");

require_once("models/Lenguajes.php");
$lenguajes = new Lenguajes();
$lenx = $lenguajes->get_lenguajes();

require_once("models/ColegioLogin.php");
$colegioLogin = new ColegioLogin();

$ciudad = "";
$caracter = "";
$calendario = "";
$horario = "";
$nivel = "";
$methodo = $_SERVER['REQUEST_METHOD'];
if ($methodo == "GET") {
  $todosColegios = $colegioLogin->obtenerTodosColegios();
} elseif ($methodo == "POST") {

  $ciudad = $_POST['ciudad'];
  $caracter = $_POST['caracter'];
  $calendario = $_POST['calendario'];
  $horario = $_POST['horario'];
  $nivel = $_POST['nivel'];
  // Buscar datos en BD con filtro
  $todosColegios = $colegioLogin->filtrarColegios($ciudad, $caracter, $calendario, $horario, $nivel);
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
  <link rel="stylesheet" href="assets\css\style_principal.css">
  <link rel="stylesheet" href="assets\css\widgets.css">
  <link rel="stylesheet" href="assets\css\responsive.css">
  <link rel="stylesheet" href="assets\css\style-principal">
  <script src="https://kit.fontawesome.com/732ce8fa55.js" crossorigin="anonymous"></script>
</head>
 
<header>
  <nav class="navbar navbar-light bg-light ">
    <div class="col-md-2 col-xs-6" style="max-width: 200px;" >
      <a href="principal.php"><img class="logo text" src="assets\imgs\theme\logo6.png" alt=""></a>
    </div>
    <form action="" method="get" class="form-inline">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="busqueda" >
      <a class="btn my-1 my-sm-0 text-white btn-warning" style="margin-right: 20px; margin-left: -6px;" type="submit" name="enviar" id="" value="buscar" ><i class="fa-solid fa-magnifying-glass"></i></a>
      <a href="/school.com/login.php"  class="btn btn-warning my-1 my-sm-0 text-white" class="btn btn-primary btn-sm float-right" type="">Iniciar Sesión</a>
    </form>
  </nav>
</header>

<body>

  <section class="responsable">
    <section class="buscador ">
      <div class="formulario shadow-sm p-3 mb-5 bg-white rounded">
        <div class="caja">
          <h2 class="text-center">Buscador</h2>
          <hr>
          <form method="post">
            <div class="form-group">
              <label for="CiudadLabelSelect1">Ciudad</label>
              <select class="form-control" name="ciudad" id="ciudadSelect1">
                <option selected>-</option>
                <option <?= $ciudad == "Arauca" ? "selected" : "" ?> value="Arauca">Arauca</option>
                <option <?= $ciudad == "Armenia" ? "selected" : "" ?> value="Armenia">Armenia</option>
                <option <?= $ciudad == "Barranquilla" ? "selected" : "" ?> value="Barranquilla">Barranquilla</option>
                <option <?= $ciudad == "Bogotá" ? "selected" : "" ?> value="Bogotá">Bogotá</option>
                <option <?= $ciudad == "Bucaramanga" ? "selected" : "" ?> value="Bucaramanga">Bucaramanga</option>
                <option <?= $ciudad == "Cali" ? "selected" : "" ?> value="Cali">Cali</option>
                <option <?= $ciudad == "Cartagena" ? "selected" : "" ?> value="Cartagena">Cartagena</option>
                <option <?= $ciudad == "Cúcuta" ? "selected" : "" ?> value="Cúcuta">Cúcuta</option>
                <option <?= $ciudad == "Florencia" ? "selected" : "" ?> value="Florencia">Florencia</option>
                <option <?= $ciudad == "Ibagué" ? "selected" : "" ?> value="Ibagué">Ibagué</option>
                <option <?= $ciudad == "Leticia" ? "selected" : "" ?> value="Leticia">Leticia</option>
                <option <?= $ciudad == "Manizales" ? "selected" : "" ?> value="Manizales">Manizales</option>
                <option <?= $ciudad == "Medellín" ? "selected" : "" ?> value="Medellín">Medellín</option>
                <option <?= $ciudad == "Mitú" ? "selected" : "" ?> value="Mitú">Mitú</option>
                <option <?= $ciudad == "Mocoa" ? "selected" : "" ?> value="Mocoa">Mocoa</option>
                <option <?= $ciudad == "Montería" ? "selected" : "" ?> value="Montería">Montería</option>
                <option <?= $ciudad == "Neiva" ? "selected" : "" ?> value="Neiva">Neiva</option>
                <option <?= $ciudad == "Pasto" ? "selected" : "" ?> value="Pasto">Pasto</option>
                <option <?= $ciudad == "Pereira" ? "selected" : "" ?> value="Pereira">Pereira</option>
                <option <?= $ciudad == "Popayán" ? "selected" : "" ?> value="Popayán">Popayán</option>
                <option <?= $ciudad == "Puerto Carreño" ? "selected" : "" ?> value="Puerto Carreño">Puerto Carreño</option>
                <option <?= $ciudad == "Puerto Inírida" ? "selected" : "" ?> value="Puerto Inírida">Puerto Inírida</option>
                <option <?= $ciudad == "Quibdó" ? "selected" : "" ?> value="Quibdó">Quibdó</option>
                <option <?= $ciudad == "Riohacha" ? "selected" : "" ?> value="Riohacha">Riohacha</option>
                <option <?= $ciudad == "San Andrés" ? "selected" : "" ?> value="San Andrés">San Andrés</option>
                <option <?= $ciudad == "San José del Guaviare" ? "selected" : "" ?> value="San José del Guaviare">San José del Guaviare</option>
                <option <?= $ciudad == "Santa Marta" ? "selected" : "" ?> value="Santa Marta">Santa Marta</option>
                <option <?= $ciudad == "Sincelejo" ? "selected" : "" ?> value="Sincelejo">Sincelejo</option>
                <option <?= $ciudad == "Tunja" ? "selected" : "" ?> value="Tunja">Tunja</option>
                <option <?= $ciudad == "Valledupar" ? "selected" : "" ?> value="Valledupar">Valledupar</option>
                <option <?= $ciudad == "Villavicencio" ? "selected" : "" ?> value="Villavicencio">Villavicencio</option>
                <option <?= $ciudad == "Yopal" ? "selected" : "" ?> value="Yopal">Yopal</option>
              </select>
            </div>
            <div class="form-group">
              <label for="caracterLabelSelect1">Carácter</label>
              <select class="form-control" name="caracter" id="caracterSelect1">
                <option value="privado-publico">Privado - Publico</option>
                <option value="privado" <?= $caracter == "privado" ? "selected" : "" ?>>Privado</option>
                <option value="publico" <?= $caracter == "publico" ? "selected" : "" ?>>Publico</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Calendario</label>
              <select class="form-control" name="calendario" id="exampleFormControlSelect1">
                <option value="a-b">A - B</option>
                <option value="a" <?= $calendario == "a" ? "selected" : "" ?>>A</option>
                <option value="b" <?= $calendario == "b" ? "selected" : "" ?>>B</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Horarios</label>
              <select class="form-control" name="horario" id="exampleFormControlSelect1">
                <option value="mañana-tarde">Mañana - Tarde</option>
                <option value="mañana" <?= $horario == "mañana" ? "selected" : "" ?>>Mañana</option>
                <option value="tarde" <?= $horario == "tarde" ? "selected" : "" ?>>Tarde</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Nivel</label>
              <select class="form-control" name="nivel" id="exampleFormControlSelect1">
                <option value="primaria-secundaria">Primaria - Secundaria</option>
                <option value="primaria" <?= $nivel == "primaria" ? "selected" : "" ?>>Primaria</option>
                <option value="secundaria" <?= $nivel == "secundaria" ? "selected" : "" ?>>Secundaria</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary mx-auto">Buscar</button>
          </form>
        </div>
      </div>
    </section>
    <section class="resultado">
      <div>
        <h3 class="title">¡Encuentra A Tu Gusto!</h3>
      </div> <br>
      <?php
       for ($i = 0; $i < sizeof($todosColegios); $i++) {
      ?>
        <div class="contenedor shadow-sm p-3 mb-4 bg-white rounded">
          <div class="adjustable">
            <div class="img rounded">
              <div class="rounded" style=" width:100%; height:100%; background-size:cover; background-position:center; background-repeat:no-repeat; background-image: url('<?php echo  isset($todosColegios[$i]['img_principal']  ) ? $todosColegios[$i]['img_principal'] : "";   ?>')" alt="img_principal" >
              </div>
            </div>
            <div class="texto">
              <h4><?php echo  $todosColegios[$i]['nombre_colegio'] ?> </h4>
              <p><?php echo  $todosColegios[$i]['introduccion']  ?> </p>
            </div>
          </div> <br>
          <div class="info">
            <a class="enlace_info" href="especifico.php?id=<?= $todosColegios[$i]['id'] ?>">Toda La Informacion </a>
            <p> <?php echo  $todosColegios[$i]['inf_ubicacion'] ?> Tel: <?php echo  $todosColegios[$i]['tel'] ?> Correo: <?php echo  $todosColegios[$i]['correo'] ?></p>
          </div>
        </div>
      <?php
      }
      ?>

    </section>
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
  <!-- NewsBoard JS -->
  <script src="assets\js\main.js"></script>
</body>

</html>