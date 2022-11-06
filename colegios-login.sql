-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2022 a las 05:08:21
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `paginawebphp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colegios-login`
--

CREATE TABLE `colegios-login` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contrasena` varchar(16) NOT NULL,
  `nombre_colegio` varchar(100) NOT NULL,
  `nit` varchar(10) NOT NULL,
  `tel` varchar(25) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `inf_ubicacion` varchar(50) NOT NULL,
  `introduccion` varchar(200) NOT NULL,
  `ciudad` varchar(20) NOT NULL,
  `caracter` varchar(20) NOT NULL,
  `horarios` varchar(20) NOT NULL,
  `nivel` varchar(20) NOT NULL,
  `calendario` varchar(5) NOT NULL,
  `inf_especialidades` varchar(450) NOT NULL,
  `inf_convenios` varchar(450) NOT NULL,
  `inf_exigencias` varchar(450) NOT NULL,
  `inf_deporte` varchar(450) NOT NULL,
  `inf_requisitos` varchar(450) NOT NULL,
  `inf_economia` varchar(450) NOT NULL,
  `img_principal` varchar(500) NOT NULL,
  `img_secundarias_1` varchar(500) NOT NULL,
  `img_secundarias_2` varchar(500) NOT NULL,
  `img_secundarias_3` varchar(500) NOT NULL,
  `img_secundarias_4` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `colegios-login`
--

INSERT INTO `colegios-login` (`id`, `usuario`, `contrasena`, `nombre_colegio`, `nit`, `tel`, `correo`, `inf_ubicacion`, `introduccion`, `ciudad`, `caracter`, `horarios`, `nivel`, `calendario`, `inf_especialidades`, `inf_convenios`, `inf_exigencias`, `inf_deporte`, `inf_requisitos`, `inf_economia`, `img_principal`, `img_secundarias_1`, `img_secundarias_2`, `img_secundarias_3`, `img_secundarias_4`) VALUES
(20, 'jose', '1234', 'Liceo Alejandro De Humboldt - Sede Principal', '0934230', '8204124-8204125', 'liceoadh@gmail.com', 'Carrera 2° # 15N-404 Barrio Pomona', 'Institución que busca el mejor futuro para el estudiante, Termina tu bachiller con 3 títulos y preparado para la universidad.', 'Popayán', 'publico', 'mañana', 'primaria-secundaria', 'a', 'El liceo Alejandro de Humboldt es una institución especializada en promover un mejor futuro para tu hijo, ya que si te gradúas en esta, saldrás con tres títulos. Titulo de bachilleré, Titulo de técnico con el instituto I.T.S, Titulo de técnico con el Sena y también una preparación especializada para las pruebas de estados (ICFES).   ', 'Nuestra institución cuenta con convenios con institutos, como el I.T.S y el Sena, con el objetivo de promover un mejor futuro para nuestros estudiantes.', 'Nuestra institución como tal no es muy exigente, como tal solo se pide a los estudiantes velar por cumplir el manual de convivencia, donde se encuentran sus deberes y las normas del colegio.', 'Nuestra institución cuenta con las instalaciones y actividades deportivas, también actividades de competencia para que los estudiantes se puedan destacar y educar deportivamente.', 'No existen requisitos para un estudiante, nuestra institución es la puerta a oportunidades para todos.', 'En el Liceo, tenemos como prioridad educar a nuestros estudiantes financieramente, y como requisitos para graduarse, necesitan haber construido un emprendimiento.', 'http://localhost/school.com/assets/imgs/uploads/2 sec.jfif', 'http://localhost/school.com/assets/imgs/uploads/liceo.png', 'http://localhost/school.com/assets/imgs/uploads/4 sec.jfif', 'http://localhost/school.com/assets/imgs/uploads/3 sec.jfif', 'http://localhost/school.com/assets/imgs/uploads/1 sec.jfif'),
(33, 'samuel', '1234', 'Institución Educativa Comercial Del Norte', '1190010001', '8373056-8373052', 'comercialdelnorte@gmail.com', 'CL 73N NO 9-21', 'Nuestra Institución es de muy alta calidad, buscamos siempre que los estudiantes se capaciten mas de lo normal y puedan salir preparados.', 'Popayán', 'publico', 'mañana-tarde', 'primaria-secundaria', 'a', 'Nuestra especialidad es brindar conocimientos y experiencias a nuestros estudiantes para que sean mejor capacitados.', 'Principalmente nuestros convenios son con el Sena, el cual nos permite brindar una variedad de formaciones adicionales', 'Principalmente nos enfocamos en que los estudiantes se identifique y representen muy bien a nuestra institución. ', 'no hay limite para formarte físicamente y deportivamente en nuestra institución. ', 'En nuestra institución normalmente se requiere haber tenido un historial de buen desempeño académico en sus anteriores colegios.', 'Nuestro principal enfoque es capacitar a los estudiantes financieramente.', 'http://localhost/school.com/assets/imgs/uploads/comercial_Prin.jpg', 'http://localhost/school.com/assets/imgs/uploads/comercial1.jpg', 'http://localhost/school.com/assets/imgs/uploads/comercial2.jpg', 'http://localhost/school.com/assets/imgs/uploads/comercial3.jfif', 'http://localhost/school.com/assets/imgs/uploads/comercial4.jpg'),
(35, 'colegio1', 'colegio1', 'DON BOSCO', '11900100', '3017728565 - 3102851131', 'donbosco@gmail.com', 'CR 9 # 13-45 SAN RAFAEL', 'El Don Bosco una institución con las puertas abiertas ', 'Popayán', 'publico', 'mañana-tarde', 'primaria-secundaria', 'a', 'Institución especializada en el aprendizaje de los estudiantes para un mejor rendimiento y desempeño en si vida diaria.', 'Sena, Precavit', 'Alta disciplina mayor rendimiento ', 'Mejorar salud y rendimiento con profesores en educación física y canchas en buen estado.', 'disciplina , buen rendimiento académico ', 'Educamos a nuestros estudiantes hacia un futuro mejor ', 'http://localhost/school.com/assets/imgs/uploads/imp.jpg', 'http://localhost/school.com/assets/imgs/uploads/im1.jpg', 'http://localhost/school.com/assets/imgs/uploads/im2.jpg', 'http://localhost/school.com/assets/imgs/uploads/im3.jpg', 'http://localhost/school.com/assets/imgs/uploads/im4.JPG'),
(36, 'colegio2', 'colegio2', 'ACADEMIA ARTISTICA CHAMALU', '31900100', '3118905667', 'uea@gmail.com', 'CL 5 33 62', 'Especial para ti!', 'Popayán', 'privado', 'mañana-tarde', 'primaria', 'a', 'nos especializamos en hacer dibujos', 'con muchos paises', 'Nuestra institución cuenta con convenios con institutos, como el I.T.S y el Sena, con el objetivo de promover un mejor futuro para nuestros estudiantes.', 'convenios con la universidad del cauca', 'ser responsables y educados', 'inspiramos a ser emprendedores', 'http://localhost/school.com/assets/imgs/uploads/chamalu.jpeg', 'http://localhost/school.com/assets/imgs/uploads/descarga (3).jfif', 'http://localhost/school.com/assets/imgs/uploads/descarga (4).jfif', 'http://localhost/school.com/assets/imgs/uploads/descarga (5).jfif', 'http://localhost/school.com/assets/imgs/uploads/academia-artistica-chamalut-76766.jpg'),
(37, 'colegio3', 'colegio3', 'Escuela Normal Superior De Popayán ', '1190010006', '8388905-8221490-8221', 'normalsuperior@gmail.com', 'CL 17 11 A 43', 'normal superior te da la bienvenida con las puertas abiertas.', 'Popayán', 'publico', 'mañana', 'primaria-secundaria', 'a', 'Nos especializamos en tener un buen rendimiento académico para nuestros estudiantes ', 'Contamos con muchos convenios, especial mente con el Sena', 'Alta disciplina, mayor rendimiento, responsabilidad ', 'Mejorar salud y rendimiento con profesores en educación física y canchas en buen estado.', 'responsabilidad, buen rendimiento', 'Educamos para un mejor futuro del pais ', 'http://localhost/school.com/assets/imgs/uploads/superior.jpg', 'http://localhost/school.com/assets/imgs/uploads/superior1.jfif', 'http://localhost/school.com/assets/imgs/uploads/superior2.jfif', 'http://localhost/school.com/assets/imgs/uploads/superior3.jfif', 'http://localhost/school.com/assets/imgs/uploads/superior4.jfif'),
(38, 'colegio4', 'colegio4', 'COL COLOMBIA JARDIN INFANTIL MAFALDA', '31900100', '8384033 ', 'cccolombi@gmail.com', 'CL 6 A 21 A 03', 'hermoso centro de aprendizaje, especializado para tu hijo.', 'Popayán', 'privado', 'mañana-tarde', 'primaria-secundaria', 'b', 'especialización en el deporte ', 'Nuestra institución cuenta con convenios con institutos, como el I.T.S y el Sena, universidad del cauca con el objetivo de promover un mejor futuro para nuestros estudiantes.', 'compromiso y ética ', 'contamos con formaciones deportivas en futbol ciclismo natación voleibol entre otros', 'no haber repetido años ', 'inspiramos a ser unos grandes empresarios ', 'http://localhost/school.com/assets/imgs/uploads/mafalda.jpg', 'http://localhost/school.com/assets/imgs/uploads/descarga (7).jfif', 'http://localhost/school.com/assets/imgs/uploads/IMG-20160225-WA0011.jpg', 'http://localhost/school.com/assets/imgs/uploads/13417593_1266564873361550_6884890767994109184_n.jpg', 'http://localhost/school.com/assets/imgs/uploads/descarga (6).jfif'),
(39, 'colegio5', 'colegio5', 'INSTITUCION EDUCATIVA GABRIELA MINISTRAL ', '11900100', '88233099	', 'gabrielaministral@gmail.com', 'CR 6 PUENTE VIEJO CAUCA	', 'Grabriela Ministral te ofrece una educación de alta calidad ', 'Popayán', 'publico', 'mañana-tarde', 'primaria-secundaria', 'a', 'Nos especializamos en mejorar tu rendimiento académico para mejorar el futuro de nuestros estudiantes ', 'zena, its', 'Alta disciplina un buen rendimiento académico', 'profesores especializados en educación física y canchas en buen estado ', 'disciplina , buen rendimiento académico y responsabilidad ', 'Nos encargamos de especializar a nuestros estudiantes a tener o lograr un mejor futuro ', 'http://localhost/school.com/assets/imgs/uploads/ministral.jpg', 'http://localhost/school.com/assets/imgs/uploads/im1.jpg', 'http://localhost/school.com/assets/imgs/uploads/im2.jpg', 'http://localhost/school.com/assets/imgs/uploads/im3.jpg', 'http://localhost/school.com/assets/imgs/uploads/im5.jpg'),
(41, 'colegio6', 'colegio6', 'CENTRO EDUCATIVO DEL CAUCA', '319001005', '8380164', 'educativo@delcauca.com', 'KR 5 3 43', 'Nuestra Institución es de muy alta calidad, buscamos siempre que los estudiantes se capaciten mas de lo normal y puedan salir preparados.', 'Popayán', 'privado', 'mañana', 'secundaria', 'b', 'Nuestra especialidad es brindar conocimientos y experiencias a nuestros estudiantes para que sean mejor capacitados.', 'Principalmente nuestros convenios son con el Sena, el cual nos permite brindar una variedad de formaciones adicionales', 'Principalmente nos enfocamos en que los estudiantes se identifique y representen muy bien a nuestra institución. ', 'Nuestro principal enfoque es capacitar a los estudiantes financieramente.', 'Principalmente nos enfocamos en que los estudiantes se identifique y representen muy bien a nuestra institución. ', 'En nuestra institución normalmente se requiere haber tenido un historial de buen desempeño académico en sus anteriores colegios.', 'http://localhost/school.com/assets/imgs/uploads/centro.jpg', 'http://localhost/school.com/assets/imgs/uploads/centro1.jpg', 'http://localhost/school.com/assets/imgs/uploads/centro2.jfif', 'http://localhost/school.com/assets/imgs/uploads/centro3.jpg', 'http://localhost/school.com/assets/imgs/uploads/centro4.jfif');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `colegios-login`
--
ALTER TABLE `colegios-login`
  ADD PRIMARY KEY (`id`,`nit`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `colegios-login`
--
ALTER TABLE `colegios-login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
