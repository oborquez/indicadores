-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 06, 2016 at 11:47 AM
-- Server version: 5.6.28-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yii_indicadores`
--

-- --------------------------------------------------------

--
-- Table structure for table `empresas`
--

CREATE TABLE IF NOT EXISTS `empresas` (
`id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `preguntas_aprobadas` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `empresas`
--

INSERT INTO `empresas` (`id`, `nombre`, `preguntas_aprobadas`) VALUES
(2, 'Memex', 0),
(3, 'Tiga AC', 0),
(4, 'Trolex', 0),
(5, 'Pamex', 0);

-- --------------------------------------------------------

--
-- Table structure for table `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
`id` int(11) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `indicadores`
--

CREATE TABLE IF NOT EXISTS `indicadores` (
`id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `clave` text NOT NULL,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL,
  `unidad` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `indicadores`
--

INSERT INTO `indicadores` (`id`, `id_usuario`, `clave`, `nombre`, `descripcion`, `unidad`) VALUES
(1, 8, 'M54', 'Cumplimiento de actividades', 'Descripcion', '%');

-- --------------------------------------------------------

--
-- Table structure for table `indicadores_periodos`
--

CREATE TABLE IF NOT EXISTS `indicadores_periodos` (
`id` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `periodo` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `indicadores_periodos`
--

INSERT INTO `indicadores_periodos` (`id`, `id_grupo`, `periodo`) VALUES
(1, 0, 'Enero-Marzo 2016'),
(2, 0, 'Abril-Junio 2016'),
(3, 0, 'Julio-Septiembre 2016');

-- --------------------------------------------------------

--
-- Table structure for table `indicadores_valores`
--

CREATE TABLE IF NOT EXISTS `indicadores_valores` (
`id` int(11) NOT NULL,
  `id_indicador` int(11) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `valor` double NOT NULL,
  `avalado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `indicadores_valores`
--

INSERT INTO `indicadores_valores` (`id`, `id_indicador`, `id_periodo`, `valor`, `avalado`) VALUES
(1, 1, 1, 30, 1),
(2, 1, 2, 0, 0),
(3, 1, 3, 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `indicadores_valores_archivos`
--

CREATE TABLE IF NOT EXISTS `indicadores_valores_archivos` (
`id` int(11) NOT NULL,
  `id_valor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `archivo` text NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `indicadores_valores_archivos`
--

INSERT INTO `indicadores_valores_archivos` (`id`, `id_valor`, `id_usuario`, `archivo`, `nombre`) VALUES
(1, 1, 14, '1AJYAORT.pdf', 'Reciboagua.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `indicadores_valores_comentarios`
--

CREATE TABLE IF NOT EXISTS `indicadores_valores_comentarios` (
`id` int(11) NOT NULL,
  `id_valor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `comentario` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `indicadores_valores_comentarios`
--

INSERT INTO `indicadores_valores_comentarios` (`id`, `id_valor`, `id_usuario`, `fecha`, `comentario`) VALUES
(1, 1, 14, '2016-09-06 11:14:48', 'COmment');

-- --------------------------------------------------------

--
-- Table structure for table `notificaciones`
--

CREATE TABLE IF NOT EXISTS `notificaciones` (
`id` int(11) NOT NULL,
  `cuerpo` text NOT NULL,
  `fecha` datetime NOT NULL,
  `asunto` text NOT NULL,
  `correo` text NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `cuerpo`, `fecha`, `asunto`, `correo`, `estado`) VALUES
(1, '<h1> Bienvenido a la herramienta de Clima Organizacional </h1>\n				<p> Apreciable test. </p>\n				<p> Le damos la más coordial de las bienvenidas a nuestra aplicación web, desarrollada especialmente para la consultoría de su empresa  </p>\n				<h2> Datos de acceso: </h2>\n				<p> \n					Puedes acceder a la siguiente dirección, introduciendo los datos que se presentan a continuación \n					<br /> URL: <a href=''http://climaorganizacional.empresainteligente.com''>http://climaorganizacional.empresainteligente.com</a>\n					<br /> USERNAME: test\n					<br /> PASSWORD: agocvql\n				</p>\n				<p><b>Nota: </b> Te recomendamos cambiar tu contraseña una vez que accedas a nuestra aplicación, en la sección de perfil</p>', '2015-05-30 11:48:00', 'Bienvenido a la herramienta de Clima Organizacional', 'tes@test.com', 0),
(2, '<h1> Bienvenido a la herramienta de Clima Organizacional </h1>\n				<p> Apreciable memex. </p>\n				<p> Le damos la más coordial de las bienvenidas a nuestra aplicación web, desarrollada especialmente para la consultoría de su empresa  </p>\n				<h2> Datos de acceso: </h2>\n				<p> \n					Puedes acceder a la siguiente dirección, introduciendo los datos que se presentan a continuación \n					<br /> URL: <a href=''http://climaorganizacional.empresainteligente.com''>http://climaorganizacional.empresainteligente.com</a>\n					<br /> USERNAME: memex\n					<br /> PASSWORD: agocvrl\n				</p>\n				<p><b>Nota: </b> Te recomendamos cambiar tu contraseña una vez que accedas a nuestra aplicación, en la sección de perfil</p>', '2015-05-30 11:48:00', 'Bienvenido a la herramienta de Clima Organizacional', 'memex@memex.com', 0),
(3, '<h1> Bienvenido a la herramienta de Clima Organizacional </h1>\n				<p> Apreciable memex. </p>\n				<p> Le damos la más coordial de las bienvenidas a nuestra aplicación web, desarrollada especialmente para la consultoría de su empresa  </p>\n				<h2> Datos de acceso: </h2>\n				<p> \n					Puedes acceder a la siguiente dirección, introduciendo los datos que se presentan a continuación \n					<br /> URL: <a href=''http://climaorganizacional.empresainteligente.com''>http://climaorganizacional.empresainteligente.com</a>\n					<br /> USERNAME: memex\n					<br /> PASSWORD: agocvsj\n				</p>\n				<p><b>Nota: </b> Te recomendamos cambiar tu contraseña una vez que accedas a nuestra aplicación, en la sección de perfil</p>', '2015-05-30 11:49:00', 'Bienvenido a la herramienta de Clima Organizacional', 'memex@memex.com', 0),
(4, '<h1> Bienvenido a la herramienta de Clima Organizacional </h1>\n				<p> Apreciable other. </p>\n				<p> Le damos la más coordial de las bienvenidas a nuestra aplicación web, desarrollada especialmente para la consultoría de su empresa  </p>\n				<h2> Datos de acceso: </h2>\n				<p> \n					Puedes acceder a la siguiente dirección, introduciendo los datos que se presentan a continuación \n					<br /> URL: <a href=''http://climaorganizacional.empresainteligente.com''>http://climaorganizacional.empresainteligente.com</a>\n					<br /> USERNAME: other\n					<br /> PASSWORD: agocvvl\n				</p>\n				<p><b>Nota: </b> Te recomendamos cambiar tu contraseña una vez que accedas a nuestra aplicación, en la sección de perfil</p>', '2015-05-30 11:50:00', 'Bienvenido a la herramienta de Clima Organizacional', 'other@other.com', 0),
(5, '<h1> Bienvenido a la herramienta de Clima Organizacional </h1>\n				<p> Apreciable lider. </p>\n				<p> Le damos la más coordial de las bienvenidas a nuestra aplicación web, desarrollada especialmente para la consultoría de su empresa  </p>\n				<h2> Datos de acceso: </h2>\n				<p> \n					Puedes acceder a la siguiente dirección, introduciendo los datos que se presentan a continuación \n					<br /> URL: <a href=''http://climaorganizacional.empresainteligente.com''>http://climaorganizacional.empresainteligente.com</a>\n					<br /> USERNAME: lider\n					<br /> PASSWORD: agocvwu\n				</p>\n				<p><b>Nota: </b> Te recomendamos cambiar tu contraseña una vez que accedas a nuestra aplicación, en la sección de perfil</p>', '2015-05-30 11:51:00', 'Bienvenido a la herramienta de Clima Organizacional', 'lider@lider.com', 0),
(6, '<h1> Bienvenido a la herramienta de Clima Organizacional </h1>\n				<p> Apreciable lider2. </p>\n				<p> Le damos la más coordial de las bienvenidas a nuestra aplicación web, desarrollada especialmente para la consultoría de su empresa  </p>\n				<h2> Datos de acceso: </h2>\n				<p> \n					Puedes acceder a la siguiente dirección, introduciendo los datos que se presentan a continuación \n					<br /> URL: <a href=''http://climaorganizacional.empresainteligente.com''>http://climaorganizacional.empresainteligente.com</a>\n					<br /> USERNAME: lider2\n					<br /> PASSWORD: agocwrm\n				</p>\n				<p><b>Nota: </b> Te recomendamos cambiar tu contraseña una vez que accedas a nuestra aplicación, en la sección de perfil</p>', '2015-05-30 12:00:00', 'Bienvenido a la herramienta de Clima Organizacional', 'lider@2.com', 0),
(7, '<h1> Bienvenido a la herramienta de Clima Organizacional </h1>\n				<p> Apreciable memexleader. </p>\n				<p> Le damos la más coordial de las bienvenidas a nuestra aplicación web, desarrollada especialmente para la consultoría de su empresa  </p>\n				<h2> Datos de acceso: </h2>\n				<p> \n					Puedes acceder a la siguiente dirección, introduciendo los datos que se presentan a continuación \n					<br /> URL: <a href=''http://climaorganizacional.empresainteligente.com''>http://climaorganizacional.empresainteligente.com</a>\n					<br /> USERNAME: memexleader\n					<br /> PASSWORD: agocwsx\n				</p>\n				<p><b>Nota: </b> Te recomendamos cambiar tu contraseña una vez que accedas a nuestra aplicación, en la sección de perfil</p>', '2015-05-30 12:00:00', 'Bienvenido a la herramienta de Clima Organizacional', 'memex@memex.com', 0),
(8, '<h1> Bienvenido a la herramienta de Clima Organizacional </h1>\n				<p> Apreciable webcom. </p>\n				<p> Le damos la más coordial de las bienvenidas a nuestra aplicación web, desarrollada especialmente para la consultoría de su empresa  </p>\n				<h2> Datos de acceso: </h2>\n				<p> \n					Puedes acceder a la siguiente dirección, introduciendo los datos que se presentan a continuación \n					<br /> URL: <a href=''http://climaorganizacional.empresainteligente.com''>http://climaorganizacional.empresainteligente.com</a>\n					<br /> USERNAME: webcom\n					<br /> PASSWORD: agocxed\n				</p>\n				<p><b>Nota: </b> Te recomendamos cambiar tu contraseña una vez que accedas a nuestra aplicación, en la sección de perfil</p>', '2015-05-30 12:05:00', 'Bienvenido a la herramienta de Clima Organizacional', 'webcom@nice.com', 0),
(9, '<h1> Bienvenido a la herramienta de Clima Organizacional </h1>\n				<p> Apreciable consultor. </p>\n				<p> Le damos la más coordial de las bienvenidas a nuestra aplicación web, desarrollada especialmente para la consultoría de su empresa  </p>\n				<h2> Datos de acceso: </h2>\n				<p> \n					Puedes acceder a la siguiente dirección, introduciendo los datos que se presentan a continuación \n					<br /> URL: <a href=''http://climaorganizacional.empresainteligente.com''>http://climaorganizacional.empresainteligente.com</a>\n					<br /> USERNAME: cons\n					<br /> PASSWORD: agocxew\n				</p>\n				<p><b>Nota: </b> Te recomendamos cambiar tu contraseña una vez que accedas a nuestra aplicación, en la sección de perfil</p>', '2015-05-30 12:05:00', 'Bienvenido a la herramienta de Clima Organizacional', 'con@sultor.com', 0),
(10, '<h1> Bienvenido a la herramienta de Clima Organizacional </h1>\n				<p> Apreciable texas. </p>\n				<p> Le damos la más coordial de las bienvenidas a nuestra aplicación web, desarrollada especialmente para la consultoría de su empresa  </p>\n				<h2> Datos de acceso: </h2>\n				<p> \n					Puedes acceder a la siguiente dirección, introduciendo los datos que se presentan a continuación \n					<br /> URL: <a href=''http://climaorganizacional.empresainteligente.com''>http://climaorganizacional.empresainteligente.com</a>\n					<br /> USERNAME: texas\n					<br /> PASSWORD: agomqae\n				</p>\n				<p><b>Nota: </b> Te recomendamos cambiar tu contraseña una vez que accedas a nuestra aplicación, en la sección de perfil</p>', '2015-06-01 11:34:00', 'Bienvenido a la herramienta de Clima Organizacional', 'texas@texascorp.com', 0),
(11, '<h1> Bienvenido a la herramienta de Evaluaciones </h1>\n				<p> Apreciable Usuario Texas. </p>\n				<p> Le damos la más coordial de las bienvenidas a nuestra aplicación web, desarrollada especialmente para la consultoría de su empresa  </p>\n				<h2> Datos de acceso: </h2>\n				<p> \n					Puedes acceder a la siguiente dirección, introduciendo los datos que se presentan a continuación \n					<br /> URL: <a href=''http://evaluaciones.empresainteligente.com''>http://evaluaciones.empresainteligente.com</a>\n					<br /> USERNAME: utexas\n					<br /> PASSWORD: agosaiq\n				</p>\n				<p><b>Nota: </b> Te recomendamos cambiar tu contraseña una vez que accedas a nuestra aplicación, en la sección de perfil</p>', '2015-06-02 13:55:00', 'Bienvenido a la herramienta de Evaluaciones', 'texas@usuario.com', 0),
(12, '<h1> Bienvenido a la herramienta de Evaluaciones </h1>\n				<p> Apreciable Texas user. </p>\n				<p> Le damos la más coordial de las bienvenidas a nuestra aplicación web, desarrollada especialmente para la consultoría de su empresa  </p>\n				<h2> Datos de acceso: </h2>\n				<p> \n					Puedes acceder a la siguiente dirección, introduciendo los datos que se presentan a continuación \n					<br /> URL: <a href=''http://evaluaciones.empresainteligente.com''>http://evaluaciones.empresainteligente.com</a>\n					<br /> USERNAME: tuser\n					<br /> PASSWORD: agosasa\n				</p>\n				<p><b>Nota: </b> Te recomendamos cambiar tu contraseña una vez que accedas a nuestra aplicación, en la sección de perfil</p>', '2015-06-02 13:59:00', 'Bienvenido a la herramienta de Evaluaciones', 'texasuser@texas.co', 0),
(13, '<h1> Bienvenido a la herramienta de Evaluaciones </h1>\n				<p> Apreciable texas user 2. </p>\n				<p> Le damos la más coordial de las bienvenidas a nuestra aplicación web, desarrollada especialmente para la consultoría de su empresa  </p>\n				<h2> Datos de acceso: </h2>\n				<p> \n					Puedes acceder a la siguiente dirección, introduciendo los datos que se presentan a continuación \n					<br /> URL: <a href=''http://evaluaciones.empresainteligente.com''>http://evaluaciones.empresainteligente.com</a>\n					<br /> USERNAME: tuser2\n					<br /> PASSWORD: agosasx\n				</p>\n				<p><b>Nota: </b> Te recomendamos cambiar tu contraseña una vez que accedas a nuestra aplicación, en la sección de perfil</p>', '2015-06-02 13:59:00', 'Bienvenido a la herramienta de Evaluaciones', 'tuser2@texas.co', 0),
(14, '<h1> Bienvenido a la herramienta de Evaluaciones </h1>\n				<p> Apreciable texas user 3. </p>\n				<p> Le damos la más coordial de las bienvenidas a nuestra aplicación web, desarrollada especialmente para la consultoría de su empresa  </p>\n				<h2> Datos de acceso: </h2>\n				<p> \n					Puedes acceder a la siguiente dirección, introduciendo los datos que se presentan a continuación \n					<br /> URL: <a href=''http://evaluaciones.empresainteligente.com''>http://evaluaciones.empresainteligente.com</a>\n					<br /> USERNAME: tuser3\n					<br /> PASSWORD: agosaty\n				</p>\n				<p><b>Nota: </b> Te recomendamos cambiar tu contraseña una vez que accedas a nuestra aplicación, en la sección de perfil</p>', '2015-06-02 14:00:00', 'Bienvenido a la herramienta de Evaluaciones', 'tuser3@texas.co', 0),
(15, '<h1> Bienvenido a la herramienta de Evaluaciones </h1>\n				<p> Apreciable Texas User 4. </p>\n				<p> Le damos la más coordial de las bienvenidas a nuestra aplicación web, desarrollada especialmente para la consultoría de su empresa  </p>\n				<h2> Datos de acceso: </h2>\n				<p> \n					Puedes acceder a la siguiente dirección, introduciendo los datos que se presentan a continuación \n					<br /> URL: <a href=''http://evaluaciones.empresainteligente.com''>http://evaluaciones.empresainteligente.com</a>\n					<br /> USERNAME: tuser4\n					<br /> PASSWORD: agosavu\n				</p>\n				<p><b>Nota: </b> Te recomendamos cambiar tu contraseña una vez que accedas a nuestra aplicación, en la sección de perfil</p>', '2015-06-02 14:01:00', 'Bienvenido a la herramienta de Evaluaciones', 'tuser4@texas.co', 0),
(16, '<h1> Bienvenido a la herramienta de Evaluaciones </h1>\n				<p> Apreciable Texas User 5. </p>\n				<p> Le damos la más coordial de las bienvenidas a nuestra aplicación web, desarrollada especialmente para la consultoría de su empresa  </p>\n				<h2> Datos de acceso: </h2>\n				<p> \n					Puedes acceder a la siguiente dirección, introduciendo los datos que se presentan a continuación \n					<br /> URL: <a href=''http://evaluaciones.empresainteligente.com''>http://evaluaciones.empresainteligente.com</a>\n					<br /> USERNAME: tuser5\n					<br /> PASSWORD: agosawq\n				</p>\n				<p><b>Nota: </b> Te recomendamos cambiar tu contraseña una vez que accedas a nuestra aplicación, en la sección de perfil</p>', '2015-06-02 14:01:00', 'Bienvenido a la herramienta de Evaluaciones', 'tuser5@texasco.com', 0),
(17, '<h1> Bienvenido a la herramienta de Evaluaciones </h1>\n				<p> Apreciable Texas User 6. </p>\n				<p> Le damos la más coordial de las bienvenidas a nuestra aplicación web, desarrollada especialmente para la consultoría de su empresa  </p>\n				<h2> Datos de acceso: </h2>\n				<p> \n					Puedes acceder a la siguiente dirección, introduciendo los datos que se presentan a continuación \n					<br /> URL: <a href=''http://evaluaciones.empresainteligente.com''>http://evaluaciones.empresainteligente.com</a>\n					<br /> USERNAME: tuser6\n					<br /> PASSWORD: agosbci\n				</p>\n				<p><b>Nota: </b> Te recomendamos cambiar tu contraseña una vez que accedas a nuestra aplicación, en la sección de perfil</p>', '2015-06-02 14:03:00', 'Bienvenido a la herramienta de Evaluaciones', 'tuser6@gmail.com', 0),
(18, '<h1> Has cambiado tu contraseña </h1>\n				<p> Apreciable texas user 2. </p>\n				<p> Le enviamos la información solicitada.</p>\n				<h2> Datos de acceso: </h2>\n				<p> \n					Puedes acceder a la siguiente dirección, introduciendo los datos que se presentan a continuación \n					<br /> URL: <a href=''http://evaluaciones.empresainteligente.com''>http://evaluaciones.empresainteligente.com</a>\n					<br /> USERNAME: tuser2\n					<br /> PASSWORD: password\n				</p>\n				<p><b>Nota: </b> Te recomendamos cambiar tu contraseña una vez que accedas a nuestra aplicación, en la sección de perfil</p>', '2015-08-05 17:43:00', 'Solicitud de cambio de contraseña', 'tuser2@texas.co', 0),
(19, '<h1> Has cambiado tu contraseña </h1>\n				<p> Apreciable texas user 2. </p>\n				<p> Le enviamos la información solicitada.</p>\n				<h2> Datos de acceso: </h2>\n				<p> \n					Puedes acceder a la siguiente dirección, introduciendo los datos que se presentan a continuación \n					<br /> URL: <a href=''http://evaluaciones.empresainteligente.com''>http://evaluaciones.empresainteligente.com</a>\n					<br /> USERNAME: tuser2\n					<br /> PASSWORD: password\n				</p>\n				<p><b>Nota: </b> Te recomendamos cambiar tu contraseña una vez que accedas a nuestra aplicación, en la sección de perfil</p>', '2015-08-05 17:43:00', 'Solicitud de cambio de contraseña', 'tuser2@texas.co', 0),
(20, '<h1> Solicitud de cambio de contraseña </h1>\n				<p> Apreciable texas user 2. </p>\n				<p> Le enviamos la información solicitada.</p>\n				<h2> Datos de acceso: </h2>\n				<p> \n					Puedes acceder a la siguiente dirección, introduciendo los datos que se presentan a continuación \n					<br /> URL: <a href=''http://evaluaciones.empresainteligente.com''>http://evaluaciones.empresainteligente.com</a>\n					<br /> USERNAME: tuser2\n					<br /> PASSWORD: AHAVKQI\n				</p>\n				<p><b>Nota: </b> Te recomendamos cambiar tu contraseña una vez que accedas a nuestra aplicación, en la sección de perfil</p>', '2015-08-05 17:45:00', 'Solicitud de cambio de contraseña', 'tuser2@texas.co', 0),
(21, '<h1> Solicitud de cambio de contraseña </h1>\n				<p> Apreciable texas. </p>\n				<p> Le enviamos la información solicitada.</p>\n				<h2> Datos de acceso: </h2>\n				<p> \n					Puedes acceder a la siguiente dirección, introduciendo los datos que se presentan a continuación \n					<br /> URL: <a href=''http://evaluaciones.empresainteligente.com''>http://evaluaciones.empresainteligente.com</a>\n					<br /> USERNAME: texas\n					<br /> PASSWORD: AHBXSNC\n				</p>\n				<p><b>Nota: </b> Te recomendamos cambiar tu contraseña una vez que accedas a nuestra aplicación, en la sección de perfil</p>', '2015-08-11 11:56:00', 'Solicitud de cambio de contraseña', 'texas@texascorp.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `nombre` text NOT NULL,
  `email` text NOT NULL,
  `rol` tinyint(4) NOT NULL,
  `image` text NOT NULL,
  `id_grupo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_empresa`, `username`, `password`, `nombre`, `email`, `rol`, `image`, `id_grupo`) VALUES
(1, 0, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrador', 'oborquez@empresainteligente.com', 3, '/resources/users/1.jpg', 0),
(8, 1, 'other', 'aa0047712a3dd38c4cab259881ae3d38', 'other', 'other@other.com', 1, '/assets/PixelAdmin/images/pixel-admin/avatar.png', 0),
(14, 3, 'texas', '3e194b5730ed8b868224b80ac8d7eed9', 'texas', 'texas@texascorp.com', 2, '/assets/PixelAdmin/images/pixel-admin/avatar.png', 0),
(16, 3, 'tuser', '3e194b5730ed8b868224b80ac8d7eed9', 'Texas user', 'texasuser@texas.co', 1, '/assets/PixelAdmin/images/pixel-admin/avatar.png', 0),
(17, 3, 'tuser2', 'f1547e4599bf9afaa93ce84988d0bbfc', 'texas user 2', 'tuser2@texas.co', 1, '/resources/users/17.jpg', 0),
(18, 3, 'tuser3', '3e194b5730ed8b868224b80ac8d7eed9', 'texas user 3', 'tuser3@texas.co', 1, '/assets/PixelAdmin/images/pixel-admin/avatar.png', 0),
(19, 3, 'tuser4', '3e194b5730ed8b868224b80ac8d7eed9', 'Texas User 4', 'tuser4@texas.co', 1, '/assets/PixelAdmin/images/pixel-admin/avatar.png', 0),
(20, 3, 'tuser5', 'd1512452381bffbc48c7376541a970bf', 'Texas User 5', 'tuser5@texasco.com', 1, '/assets/PixelAdmin/images/pixel-admin/avatar.png', 0),
(21, 3, 'tuser6', '4623bdea61865a3c6ed36b502b8bfa0a', 'Texas User 6', 'tuser6@gmail.com', 1, '/assets/PixelAdmin/images/pixel-admin/avatar.png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grupos`
--
ALTER TABLE `grupos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indicadores`
--
ALTER TABLE `indicadores`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indicadores_periodos`
--
ALTER TABLE `indicadores_periodos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indicadores_valores`
--
ALTER TABLE `indicadores_valores`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indicadores_valores_archivos`
--
ALTER TABLE `indicadores_valores_archivos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indicadores_valores_comentarios`
--
ALTER TABLE `indicadores_valores_comentarios`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notificaciones`
--
ALTER TABLE `notificaciones`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `empresas`
--
ALTER TABLE `empresas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `grupos`
--
ALTER TABLE `grupos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `indicadores`
--
ALTER TABLE `indicadores`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `indicadores_periodos`
--
ALTER TABLE `indicadores_periodos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `indicadores_valores`
--
ALTER TABLE `indicadores_valores`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `indicadores_valores_archivos`
--
ALTER TABLE `indicadores_valores_archivos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `indicadores_valores_comentarios`
--
ALTER TABLE `indicadores_valores_comentarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notificaciones`
--
ALTER TABLE `notificaciones`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
