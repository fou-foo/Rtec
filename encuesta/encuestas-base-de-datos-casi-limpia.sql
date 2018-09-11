-- phpMyAdmin SQL Dump
-- version 2.11.8.1deb5+lenny4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 22, 2018 at 12:42 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6-1+lenny8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `encuestas`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumnos`
--

CREATE TABLE IF NOT EXISTS `alumnos` (
  `matricula` varchar(12) collate latin1_spanish_ci NOT NULL,
  `nombre` varchar(30) collate latin1_spanish_ci NOT NULL,
  `apellido1` varchar(20) collate latin1_spanish_ci NOT NULL,
  `apellido2` varchar(20) collate latin1_spanish_ci NOT NULL,
  `sexo` varchar(1) collate latin1_spanish_ci NOT NULL,
  `fechanacimiento` varchar(20) collate latin1_spanish_ci NOT NULL,
  `pais` varchar(40) collate latin1_spanish_ci NOT NULL,
  `estado` varchar(40) collate latin1_spanish_ci NOT NULL,
  `ciudad` varchar(40) collate latin1_spanish_ci NOT NULL,
  `correotec` varchar(20) collate latin1_spanish_ci NOT NULL,
  `correopersonal1` varchar(50) collate latin1_spanish_ci NOT NULL,
  `correopadres` varchar(70) collate latin1_spanish_ci NOT NULL,
  `telefono` varchar(20) collate latin1_spanish_ci NOT NULL,
  `mobil` varchar(20) collate latin1_spanish_ci NOT NULL,
  `clave` varchar(50) collate latin1_spanish_ci NOT NULL,
  PRIMARY KEY  (`matricula`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `alumnos`
--

INSERT INTO `alumnos` (`matricula`, `nombre`, `apellido1`, `apellido2`, `sexo`, `fechanacimiento`, `pais`, `estado`, `ciudad`, `correotec`, `correopersonal1`, `correopadres`, `telefono`, `mobil`, `clave`) VALUES
('A00168100', 'Eduardo', 'Uresti', 'Charre', 'M', '13/10/1958', 'México', 'Tamaulipas', 'Ciudad Madero', 'euresti@itesm.mx', '', '', '', '', '143d665b679323df96563f8b1eee3b47');

-- --------------------------------------------------------

--
-- Table structure for table `encuesta`
--

CREATE TABLE IF NOT EXISTS `encuesta` (
  `numero` smallint(3) NOT NULL,
  `descripcion` text collate latin1_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `preguntas` smallint(3) NOT NULL default '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `encuesta`
--

INSERT INTO `encuesta` (`numero`, `descripcion`, `fecha`, `preguntas`) VALUES
(1, 'Encuesta 1 de la DiMA', '2017-08-01', 72);

-- --------------------------------------------------------

--
-- Table structure for table `indicadores`
--

CREATE TABLE IF NOT EXISTS `indicadores` (
  `idencuesta` smallint(2) NOT NULL default '1',
  `numero` smallint(2) NOT NULL default '1',
  `descripcion` text collate latin1_spanish_ci NOT NULL,
  `valorinferior` float NOT NULL,
  `valormayor` float NOT NULL,
  `minimo` smallint(1) NOT NULL default '4',
  `debilidaddiscurso` text collate latin1_spanish_ci NOT NULL,
  `debilidadlinkinterno` text collate latin1_spanish_ci NOT NULL,
  `debilidadlinkextrerno` text collate latin1_spanish_ci NOT NULL,
  `debilidadarticulosinteres` text collate latin1_spanish_ci NOT NULL,
  `mensajefortaleza` text collate latin1_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `indicadores`
--

INSERT INTO `indicadores` (`idencuesta`, `numero`, `descripcion`, `valorinferior`, `valormayor`, `minimo`, `debilidaddiscurso`, `debilidadlinkinterno`, `debilidadlinkextrerno`, `debilidadarticulosinteres`, `mensajefortaleza`) VALUES
(1, 1, 'Hábitos académicos', 14, 15, 4, 'Realiza un análisis de tus resultados académicos y como has llegado a ellos, por lo cual te invitamos a generar estrategias y nuevos hábitos que te ayuden a tener éxito académico en tu próximo semestre.', 'Para trabajar tus hábitos académicos acude a <br>\r\n<B>Mejoramiento Académico</b><br> CETEC Torre norte 7mo piso, ext. 2198 <br>http://dma.mty.itesm.mx/<br><br> <b>Mentores Académicos de Excelencia</b> http://asesoriasmaes.mty.itesm.mx/', '', 'Los siguientes articulos pueden ser de tu interés.<ul>	<li>http://www.metaaprendizaje.net/habitos-de-estudio/</li>	<li>http://noticias.universia.es/portada/noticia/2014/03/28/1091462/7-habitos-estudio-claves-triunfar-universidad.html</li>\r\n</ul>', 'Tienes estrategias para un buen rendimiento académico y estas actividades te pueden llevar al  exito académico en tu vida profesional. Recuerda que los hábitos están asociados con la constancia, sigue así.'),
(1, 2, 'Hábitos Alimenticios', 14, 15, 4, 'La percepción que tienes en cuanto a tu  alimentación podría mejorar siguiendo recomendaciones para asi tener una dieta balanceada día a día; te recomendamos revisar los siguientes enlaces.', 'Programa de Bienestar Integral para Alumnos http://tecdeportes.mty.itesm.mx/index.html  \r\nDifusión Cultural http://www.mty.itesm.mx/dae/ddc/ ', 'Fuera de nuestra institución podrás encontrar las siguientes instituciones: CONARTE, Consejo para la Cultura y las Artes de Nuevo León.  www.conarte.org.mx  \r\nInstituto Estatal de Cultura Física y Deporte \r\nindenl.gob.mx/', 'http://www.salud180.com/nutricion-y-ejercicio/5-consejos-para-mejorar-tus-habitos-alimentarios-0 https://habitualmente.com/habitos-alimenticios/', 'Continua con  tus  rutinas de alimentación  para  tener una vida saludable. Recuerda que la alimentación forma parte de nuestro bienestar integral.'),
(1, 3, 'Apoyo familiar', 14, 15, 4, 'La familia es una de las redes de apoyo más importante con la que contamos todos, te invitamos a revisar los siguientes enlaces para conocer como puedes mejorar tu relación con ellos. \r\n', 'Mejoramiento Académico  CETEC Torre norte 7mo piso, ext. 2198 http://dma.mty.itesm.mx/  \r\n\r\nAsesoría y Consejería Aulas 3 305 ext. 3516 y 3517\r\n\r\nLínea de apoyo 24hrs  018008139500 (bienestar emocional, nutricional, salud física, equilibrio financiero, legal)\r\n', '', 'Los siguientes articulos pueden ser de tu interés.•	http://www.metaaprendizaje.net/habitos-de-estudio/\r\n•	http://noticias.universia.es/portada/noticia/2014/03/28/1091462/7-habitos-estudio-claves-triunfar-universidad.html\r\n\r\n', '\r\nTu familia te brinda un buen nivel de soporte que te apoya para tus decisiones en tu vida personal y académica. Sigue fortaleciendo esa relación, será clase para tu éxito.'),
(1, 4, 'Manejo de las emociones', 14, 15, 4, 'Las emociones ejercen un papel fundamental en nuestra conducta y nuestro pensamiento, por lo cual el conocer como podemos manejarlas forma un papel importante para nuestra salud, revisa los siguientes enlaces para conocer más sobre el tema.\r\n', 'Acercate a Mejoramiento Académico  CETEC Torre norte 7mo piso, ext. 2198 http://dma.mty.itesm.mx/    \r\n\r\nAsesoría y Consejería Aulas 3 305 ext. 3516 y 3517 /Línea de apoyo 24hrs  018008139500 (bienestar emocional, nutricional, salud física, equilibrio financiero, legal)\r\n', 'Fuera de nuestra institución podrás encontrar las siguientes instituciones. Los resultados obtenidos son ajenos a nuestra institución: Unidad de Servicios Psicológicos (Facultad de Psicología, UANL)\r\nCalle Dr. Carlos Canseco 110\r\nColonia Mitras Centro. Monterrey, Nuevo León\r\nTeléfono (81) 8347 4687, 8348 1065, 2724 y 3866 http://psicologia.uanl.mx/"\r\n', 'https://www.hifamily.es/familia-escuela-una-relacion-abocada-al-exito/\r\n', 'Demuestras un buen manejo de tus emociones y acciones, la inteligencia emocional te llevará lejos en tus éxitos tanto académicos como en tu vida personal.'),
(1, 5, 'Autocontrol', 14, 15, 4, 'Es probable que te preocupe la manera en la que respondes ante ciertos eventos; te sugerimos revisar tus dudas en los siguientes enlaces para conocer como podrías mejorar.\r\n', 'Atención psicológica en el Campus\r\n\r\nTeléfono del CAMPUS 8358 2000\r\n\r\nMejoramiento Académico  CETEC Torre norte 7mo piso, ext. 2198 http://dma.mty.itesm.mx/  \r\nAsesoría y Consejería Aulas 3 305 ext. 3516 y 3517\r\n                 \r\nLínea de apoyo 24hrs  018008139500"\r\n\r\nTeléfono del CAMPUS 8358 2000\r\nAsesoría y Consejería Aulas 3 305 ext. 3516 y 3517\r\nMejoramiento Académico  CETEC Torre norte 7mo piso, ext. 2198 http://dma.mty.itesm.mx/                   \r\nLínea de apoyo 24hrs  018008139500\r\n', 'Fuera de nuestra institución podrás encontrar las siguientes instituciones: Unidad de Servicios Psicológicos (Facultad de Psicología, UANL)\r\nCalle Dr. Carlos Canseco 110\r\nColonia Mitras Centro. Monterrey, Nuevo León\r\nTeléfono (81) 8347 4687, 8348 1065, 2724 y 3866 http://psicologia.uanl.mx/\r\n', 'http://online-psicologia.blogspot.mx/2007/12/tcnicas-de-autocontrol.html https://www.lifeder.com/10-tecnicas-de-autocontrol/\r\n', 'Demuestras un buen nivel de autocontrol para responder antes nuevas situación de la vida y adaptación a los cambios que surgen en el ambiente. Lo cual es una habilidad importante en nuestro mundo actual cambiante. Continua fortaleciendo esta habilidad.'),
(1, 6, 'Relaciones sociales', 14, 15, 4, 'Las relaciones sociales pueden ser fundamentales para todos debido a que nos apoyan a interactuar con nuestro entorno; de acuerdo a los resultados obtenidos es probable que puedas mejorar en este aspecto revisando los siguientes enlaces.\r\n', 'Atención psicológica en el Campus  Teléfono del CAMPUS 8358 2000\r\nMejoramiento Académico  CETEC Torre norte 7mo piso, ext. 2198 http://dma.mty.itesm.mx/        \r\n\r\nAsesoría y Consejería Aulas 3 305 ext. 3516 y 3517\r\n          \r\nLínea de apoyo 24hrs  018008139500"\r\n', 'Fuera de nuestra institución podrás encontrar las siguientes instituciones: Unidad de Servicios Psicológicos (Facultad de Psicología, UANL)\r\nCalle Dr. Carlos Canseco 110\r\nColonia Mitras Centro. Monterrey, Nuevo León\r\nTeléfono (81) 8347 4687, 8348 1065, 2724 y 3866 http://psicologia.uanl.mx/\r\n', 'https://www.muyinteresante.es/salud/articulo/las-relaciones-sociales-ayudan-a-mantener-sano-nuestro-cerebro https://girocognitivo.wordpress.com/2012/04/25/los-beneficios-de-las-relaciones-sociales-para-la-salud/ http://www.tendencias21.net/Las-buenas-relaciones-familiares-y-sociales-principal-causa-de-la-felicidad_a936.html\r\n', 'Sigues cuidando y manteniendo contacto con tus amistades, gracias a ello cuentas con una red de apoyo en tus relaciones interpersonales. Continua fortaleciendo estas relaciones serán fundamentales para mejorar en todos los aspectos de tu vida.\r\n'),
(1, 7, 'Mis emociones', 14, 15, 4, 'Las emociones ejercen un papel fundamental en nuestra conducta y nuestro pensamiento, por lo cual el conocer como podemos manejarlas forma un papel importante para nuestra salud. A continuación te mostramos algunas estrategias para poder trabajar sobre ello.\r\n', 'Atención psicológica en el Campus\r\nTeléfono del CAMPUS 8358 2000\r\nMejoramiento Académico  CETEC Torre norte 7mo piso, ext. 2198 http://dma.mty.itesm.mx/     \r\n\r\nAsesoría y Consejería Aulas 3 305 ext. 3516 y 3517\r\n              \r\nLínea de apoyo 24hrs  018008139500"\r\n', 'Fuera de nuestra institución podrás encontrar las siguientes instituciones: Unidad de Servicios Psicológicos (Facultad de Psicología, UANL)\r\nCalle Dr. Carlos Canseco 110\r\nColonia Mitras Centro. Monterrey, Nuevo León\r\nTeléfono (81) 8347 4687, 8348 1065, 2724 y 3866 http://psicologia.uanl.mx/\r\n', 'Los siguientes artículos pueden ser de tu interes •	http://psicologaonline.es/Manejo_emociones.html\r\n•	http://vinculando.org/psicologia_psicoterapia/manejo-emociones-educacion.html\r\n"\r\n', 'Cuentas con estrategias adecuadas para poder expresar tus emociones en la mayoría de las ocasiones, lo cuál será fundamental para poder conocer que es lo que buscas y como puedes alcanzarlo.\r\n'),
(1, 8, 'Actividades de tiempo libre', 14, 15, 4, 'Las actividades recreativas nos ayudan a tener un momento de relajación fuera de nuestras actividades rutinarias; podrías consultar información en los siguientes enlaces para generar estrategias y mejorar en este aspecto.', 'Programa de Bienestar Integral para Alumnos http://tecdeportes.mty.itesm.mx/index.html  \r\nDifusión Cultural http://www.mty.itesm.mx/dae/ddc/ ', 'Fuera de nuestra institución podrás encontrar las siguientes instituciones: CONARTE, Consejo para la Cultura y las Artes de Nuevo León.  www.conarte.org.mx  \r\nInstituto Estatal de Cultura física y Deporte \r\nindenl.gob.mx/', 'http://www.cuidandote.com.mx/actividad/los-beneficios-de-las-actividades-recreativas/ http://noticias.universia.com.ar/en-portada/noticia/2013/11/22/1065017/cuales-son-ventajas-realizar-actividad-fisica.html', 'Posees equilibrio entre tus actividades extracadémicas y tu vida académica, esta relación puede ayudarte ante las situaciones de estrés que vivas durante el semestre. Continua fortaleciendo y generando espacio para estas actividades durante toda tu vida académica.\r\n'),
(1, 9, 'Sexualidad', 14, 15, 4, 'La salud sexual es un estado de bienestar físico, mental y social en relación con la sexualidad. Requiere un enfoque positivo y respetuoso de la sexualidad y de las relaciones sexuales, así como la posibilidad de tener experiencias sexuales placenteras y seguras, libres de toda coacción, discriminación y violencia. Si tu has estado en riesgo entorno a tu salud sexual acercate a recibir información o bien orientación.\r\n', 'Atención psicológica en el Campus\r\nTeléfono del CAMPUS 8358 2000\r\n\r\nMejoramiento Académico  CETEC Torre norte 7mo piso, ext. 2198.\r\n\r\nAsesoría y Consejería Aulas 3 305 ext. 3516 y 3517\r\n\r\n', 'Puedes buscar información sobre sexualidad y tu salud sexual en :         \r\n   Consejo Estatal para la Prevención y el Control del SIDA\r\nCalle Zuazua 259 Sur Centro\r\nMonterrey Nuevo León CP 64000 Teléfono:+52 (82) 83435589\r\nCorreo: contacto@ssnl.gob.mx\r\n', 'http://www.sexualidades.com.mx/articulos/sexualidad.html \r\nhttp://www.amssac.org/biblioteca/\r\n', 'Posees autocuidado de tu sexualidad y salud sexual lo cual es esencial para una vida de bienestar saludable. Continua cuidando de ti mismo y de los demás.\r\n'),
(1, 10, 'Uso de espacios virtuales', 14, 15, 4, 'Es importante revisar la manera en que invertimos el tiempo en nuestras diversas actividades y conocer la forma más segura de hacer uso de las herramientas virtuales. Puedes consultar información en:\r\n', 'FALTA TELEFONO DE TI', 'PSIPRE\r\nLoma Larga 2524, Col. Obispado Monterrey N.L. México CP 64060\r\nTel. 8342 0000, 8401 6902 y 03 / 01800.00.MENTE (63683)\r\nhttp://www.psipre.com \r\n\r\nCentro de Integración Juvenil A.C.\r\nwww.cij.gob.mx \r\nDIRECCIÓN\r\nAv. Dr. Raul Calderón González No. 240  Col. Sertoma, entre Loma Redonda y Av. La Clínica  C.P. 64710 Monterrey, N.L.\r\nTelefonos: (81) 83 48 02 91 (81) 83 33 14 75\r\n\r\n', 'http://www.cic.mx/utiliza-los-videojuegos-de-manera-responsable-y-controlada/\r\n', 'La relación que mantienes en los espacios virtuales la utilizas de manera responsable y respetuosa. Recuerda siempre manejar tu información de forma segura y responsable.\r\n'),
(1, 11, 'Vida académica', 14, 15, 4, 'Notamos que existen aspectos de tu vida académica sobre los que puedes reflexionar y trabajar para adquirir nuevos aprendizajes, consulta más información en:\r\n', 'Mejoramiento Académico  CETEC Torre norte 7mo piso, ext. 2198\r\nAsesoría y Consejería Aulas 3 305 ext. 3516 y 3517\r\n', '', 'Los siguientes articulos pueden ser de tu interés.•	http://www.metaaprendizaje.net/habitos-de-estudio/\r\n•	http://noticias.universia.es/portada/noticia/2014/03/28/1091462/7-habitos-estudio-claves-triunfar-universidad.html\r\n\r\n', 'Las experiencias del pasado  que  has tenido durante tu trayectoria académica y los aprendizajes que te han dejado, te permiten recordarlas de manera positiva y estratégica.\r\nSigue acumulando buenas experiencias para tu vida. \r\n'),
(1, 12, 'Adaptación', 14, 15, 4, 'Encontramos que es posible que te preocupe la forma en cómo te adaptas a nuevas situaciones, podrías consultar dudas en:\r\n', 'Mejoramiento Académico  CETEC Torre norte 7mo piso, ext. 2198\r\n', 'Fuera de nuestra institución podrás encontrar las siguientes instituciones: Unidad de Servicios Psicológicos (Facultad de Psicología, UANL)\r\nCalle Dr. Carlos Canseco 110\r\nColonia Mitras Centro. Monterrey, Nuevo León\r\nTeléfono (81) 8347 4687, 8348 1065, 2724 y 3866 http://psicologia.uanl.mx/\r\n', '', 'Posees la habilidad de hacerle frente fácilmente a las nuevas experiencias que surjan en la vida. Continua revisando la forma en la que te adaptas a nuevas situaciones para fortalecer esta habilidad en ti.\r\n'),
(1, 13, 'Consumo de sustancias', 14, 15, 4, 'Actualmente es muy probable que te encuentres en una situación de riesgo vinculada al uso de sustancias, te invitamos a que puedas obtener mayor información acerca del tema en:\r\n', 'CAT Departamento de Prevención, Edificio administrativo de centrales – 2piso, http://prevencion.mty.itesm.mx/contacto.html\r\n', 'Centro de Integración Juvenil A.C.\r\nwww.cij.gob.mx \r\nDIRECCIÓN\r\nAv. Dr. Raul Calderón González No. 240  Col. Sertoma, entre Loma Redonda y Av. La Clínica  C.P. 64710 Monterrey, N.L.\r\nTelefonos: (81) 83 48 02 91 (81) 83 33 14 75\r\n', 'Biblioteca Virtual en Adicciones\r\nhttp://www.biblioteca.cij.gob.mx/ \r\n\r\n', 'Reconoces las situaciones entorno al consumo de drogas que ponen en riesgo tu salud. Poseer información acerca de lo que sucede y los riesgos que conlleva nos ayuda a continuar cuidando de nosotros mismos y de los demás.\r\n'),
(1, 14, 'Orientación sexual', 14, 15, 4, 'La orientación sexual \r\nEs un reconocimiento personal de mis atracciones, afinidades, experiencias o fantasías entorno a uno u otro sexo. Puede manifestarse en forma de comportamientos, pensamientos, fantasías o deseos sexuales, o en una combinación de estos elementos.\r\nNadie puede obligar o lastimarte por reconocer una parte de ti. Por ello si tu te sientes confundid@ o agredid@ por tu orientación sexual no dudes en acercarte a:\r\n', 'Atención psicológica en el Campus\r\nTeléfono del CAMPUS 8358 2000\r\nMejoramiento Académico  CETEC Torre norte 7mo piso, ext. 2198                              \r\n\r\nAsesoría y Consejería Aulas 3 305 ext. 3516 y 3517\r\n \r\n\r\nGrupo Estudiantil AIRE https://www.facebook.com/AIRE.MTY/"\r\n', 'Link sobre Familia, sociedad y sexualidad AC https://www.facebook.com/familiaysociedadac/posts/1407444662627483            \r\n\r\n  CONAPRED Consejo Nacional para prevenir la discriminación http://www.conapred.org.mx/\r\n', 'http://www.amssac.org/biblioteca/definiciones-basicas/                                                                                                          http://ilga.org/es/               \r\n', 'Tienes aceptación, respeto y tolerancia entorno a tu orientación sexual y la de los otros. Continua  contribuyendo a generar un ambiente y armonía y respeto a tu alrededor.\r\n'),
(1, 15, 'Mis metas y el TEC', 14, 15, 4, 'Tus metas académicas, profesionales y personales tal vez aun no han sido claras, por lo cual se te invita a realizar un análisis a consciencia para trabajar esta área, puedes acudir a:\r\n', 'Centro de Vida y Carrera (CVC) Cetec torre norte 4° piso, https://cvc.itesm.mx/portal/page/portal/CVC/01\r\n', '\r\n', 'http://noticias.universia.es/empleo/noticia/2014/11/28/1116007/7-maneras-alcanzar-metas-profesionales.html           http://jurbys.blogspot.mx/2011/02/las-metas-personales-o-profesionales.html\r\n', 'Posees claridad en tus metas académicas y en tu elección del TEC como institución. La visión de nuestra dirección en nuestras metas tanto académicas como personales, genera el camino al éxito.\r\n'),
(1, 16, 'Autocuidado', 14, 15, 4, 'La manera en como percibes y trabajas el área relacionada a tu salud y el autocuidado que te das a ti mismo en este aspecto, no ha sido del todo claro, te recomendamos analizar algunos aspectos que pudieran fortalecerte en esta área como:', 'CAT Departamento de Prevención, Edificio administrativo de centrales – 2piso, http://prevencion.mty.itesm.mx/contacto.html                 http://www.itesm.mx/wps/wcm/connect/ITESM/Tecnologico+de+Monterrey/Preparatoria/Vida+Estudiantil/Bienestar+integral/', 'Jurisdicción Sanitaria #3 SSNL ( PASIA )\r\nAgustín Lara (Av, Chapultepec)\r\nMonterrey, Nuevo León', 'http://www.nl.gob.mx/salud', 'Cuentas con alternativas de autocuidado entorno a tu salud física. Continua reconociéndolas para generar un bienestar integral en tu persona.'),
(1, 17, 'Responsabilidad social', 14, 15, 4, 'La responsabilidad social es la manera en como te involucras, participas y propones en comunicación y bienestar para con los demás; te invitamos a seguir informandote para poder fortalecerte y proponer aspectos favorables en tu interacción con los demás, puedas acudir a:', 'Dirección de Asuntos Estudiantiles, Asuntos disciplinarios, Centro Estudiantil 2do. Piso Oficina 226, http://dae.mty.itesm.mx/ubicacion.htm        ETHOS: consulta, reporta y transforma, https://secure.ethicspoint.com/domain/media/es/gui/36326/index.html', 'http://www.responsabilidadsocial.mx/recomendado/', '<ul>\r\n<li><a href="http://www.elfinanciero.com.mx/opinion/la-etica-y-la-responsabilidad-social.html" target="_BLANK">El Financiero</a> </li> \r\n<li><a href=http://www.responsabilidadsocial.mx/"  target="_BLANK">Responsabilidad Social</a> </li>\r\n</ul> ', 'Las acciones que realizan los alumnos como muestra de su compromiso, como miembros dentro de una sociedad, ya sea como individuos o dentro de un grupo, es lo que nos define como persona. Continua involucrándote y participando para generar espacios de armonía en tu entorno.'),
(1, 18, 'Estrés', 14, 15, 4, 'Hemos detectado que la percepción que tienes sobre las demandas de tu medio ambiente (escuela, trabajo, familia, amigos) puede sobrepasar tus niveles de tolerancia y manejo emocional, por lo tanto te invitamos a informarte y buscar alternativas de manejo de estrés en los siguientes enlaces:\r\n', 'Atención psicológica en el Campus\r\nTeléfono del CAMPUS 8358 2000\r\n\r\nMejoramiento Académico  CETEC Torre norte 7mo piso, ext. 2198\r\nAsesoría y Consejería Aulas 3 305 ext. 3516 y 3517\r\n\r\nServicio Médico en el Campus Edificio Centrales Sur 1er piso ext. 3580/3581\r\nTeléfono de emergencias en campus: 15 51 15 51\r\n\r\n', 'Fuera de nuestra institución podrás encontrar las siguientes instituciones: CONARTE, Consejo para la Cultura y las Artes de Nuevo León.  www.conarte.org.mx  \r\nInstituto Estatal de Cultura física y Deporte \r\nindenl.gob.mx/\r\nAquí encontrarás actividades para relajarte y socializar.\r\n', 'http://www.umm.edu/health/medical/spanishency/articles/manejo-del-estres \r\n', 'Cuentas con un nivel óptimo de control de tus emociones y tu cuerpo ante situaciones de estrés, recuerda que existe el estrés positivo y negativo. Recuerda en todo momento generar estrategias que fortalecer tus habilidad al enfrentarte ante situaciones de estrés.');

-- --------------------------------------------------------

--
-- Table structure for table `mensajedetonadoras`
--

CREATE TABLE IF NOT EXISTS `mensajedetonadoras` (
  `encuesta` smallint(3) NOT NULL,
  `pregunta` smallint(4) NOT NULL,
  `mensaje` text collate latin1_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `mensajedetonadoras`
--

INSERT INTO `mensajedetonadoras` (`encuesta`, `pregunta`, `mensaje`) VALUES
(1, 1, 'Prueba. Entrada 3'),
(1, 28, 'Tus respuestas indican que podría estar en riesgo tu integridad.\r\nSi tienes o has tenido  pensamientos sobre dañarte a ti mismo o a otros es importante buscar ayuda. <br>\r\nEN EL TEC DE MONTERREY:\r\n<ul><li>Línea de apoyo 24 horas: 01 800 813 9500\r\no bien marca desde tu celular al \r\n442295 3004.</li>\r\n<li> Atención Psicológica de 8 a 17:30\r\n(Conmutador: 8358 2000)\r\n<ul>\r\n<li>Asesoría y Consejería\r\nAulas 3-305 ext. 3516 y 3517</li>\r\n<li>Mejoramiento Académico\r\nCETEC, Torre Norte, 7.º piso\r\next. 2108 y 2198</li>\r\n</ul></li>\r\n</ul>\r\nSI ES UNA EMERGENCIA:\r\nLlama a la Línea de vida de la Secretaría de Salud en el Noreste de México:\r\n01 800 822 3737 o ve inmediatamente a la sala de emergencia del hospital más cercano.');

-- --------------------------------------------------------

--
-- Table structure for table `orientadores`
--

CREATE TABLE IF NOT EXISTS `orientadores` (
  `nomina` varchar(20) collate latin1_spanish_ci NOT NULL,
  `orientador` varchar(60) collate latin1_spanish_ci NOT NULL,
  `correo` varchar(50) collate latin1_spanish_ci NOT NULL,
  `ubicacion` varchar(30) collate latin1_spanish_ci NOT NULL,
  `nivel` tinyint(4) NOT NULL,
  `extension` varchar(10) collate latin1_spanish_ci NOT NULL,
  `clave` varchar(40) collate latin1_spanish_ci NOT NULL,
  PRIMARY KEY  (`nomina`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `orientadores`
--

INSERT INTO `orientadores` (`nomina`, `orientador`, `correo`, `ubicacion`, `nivel`, `extension`, `clave`) VALUES
('L00253005', 'Eduardo Uresti', 'euresti@itesm.mx', '', 6, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `personales`
--

CREATE TABLE IF NOT EXISTS `personales` (
  `matricula` varchar(12) collate latin1_spanish_ci NOT NULL,
  `edad` smallint(2) NOT NULL default '18',
  `sexo` tinyint(1) NOT NULL default '0',
  `genero` tinyint(1) NOT NULL default '0',
  `estadocivil` tinyint(1) NOT NULL default '0',
  `estudios` tinyint(1) NOT NULL default '0',
  `procedencia` tinyint(1) NOT NULL default '1',
  `estado` tinyint(2) NOT NULL,
  `preparatoriaorigen` tinyint(1) NOT NULL,
  `carrera` smallint(2) NOT NULL,
  `vivesen` tinyint(1) NOT NULL,
  `tienesbeca` tinyint(1) NOT NULL default '0',
  `tipobeca` tinyint(1) NOT NULL default '0',
  `trabaja` tinyint(1) NOT NULL default '0',
  `tieneactividadextraacademica` tinyint(1) NOT NULL default '0',
  `cualextraacademica` varchar(200) collate latin1_spanish_ci NOT NULL,
  `religion` tinyint(1) NOT NULL default '0',
  `cualreligion` varchar(200) collate latin1_spanish_ci NOT NULL,
  `enquetrabaja` varchar(200) collate latin1_spanish_ci NOT NULL,
  `actividadespiritual` tinyint(1) NOT NULL default '0',
  `cualactividadespiritual` varchar(200) collate latin1_spanish_ci NOT NULL,
  `codigo` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`matricula`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `personales`
--

INSERT INTO `personales` (`matricula`, `edad`, `sexo`, `genero`, `estadocivil`, `estudios`, `procedencia`, `estado`, `preparatoriaorigen`, `carrera`, `vivesen`, `tienesbeca`, `tipobeca`, `trabaja`, `tieneactividadextraacademica`, `cualextraacademica`, `religion`, `cualreligion`, `enquetrabaja`, `actividadespiritual`, `cualactividadespiritual`, `codigo`) VALUES
('A00168100', 18, 0, 0, 0, 1, 1, 21, 0, 16, 4, 1, 1, 0, 1, 'baile', 1, 'católica', '', 1, 'meditación', 0);

-- --------------------------------------------------------

--
-- Table structure for table `preguntas`
--

CREATE TABLE IF NOT EXISTS `preguntas` (
  `idencuesta` smallint(3) NOT NULL,
  `indicador` smallint(3) NOT NULL default '1',
  `numero` smallint(3) NOT NULL,
  `enunciado` text collate latin1_spanish_ci NOT NULL,
  `tipo` tinyint(2) NOT NULL,
  `opcion1` varchar(60) collate latin1_spanish_ci NOT NULL default 'Totalmente desacuerdo',
  `opcion2` varchar(60) collate latin1_spanish_ci NOT NULL default 'En  desacuerdo',
  `opcion3` varchar(60) collate latin1_spanish_ci NOT NULL default 'Ni de acuerdo ni en desacuerdo',
  `opcion4` varchar(60) collate latin1_spanish_ci NOT NULL default 'De acuerdo',
  `opcion5` varchar(60) collate latin1_spanish_ci NOT NULL default 'Totalmente de acuerdo',
  `opcion6` varchar(60) collate latin1_spanish_ci NOT NULL default 'No aplica',
  `numopciones` tinyint(1) NOT NULL default '5',
  `orden` tinyint(1) NOT NULL default '1',
  `detonante` tinyint(1) NOT NULL default '0',
  `valordetonante` tinyint(1) NOT NULL default '2'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `preguntas`
--

INSERT INTO `preguntas` (`idencuesta`, `indicador`, `numero`, `enunciado`, `tipo`, `opcion1`, `opcion2`, `opcion3`, `opcion4`, `opcion5`, `opcion6`, `numopciones`, `orden`, `detonante`, `valordetonante`) VALUES
(1, 1, 1, 'Suelo entregar a tiempo mis tareas, trabajos, etc.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 2),
(1, 1, 2, 'Suelo estudiar en grupo.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 3),
(1, 1, 3, 'Tengo distractores (computadora, tel&eacute;fono, salidas, clases extra acad&eacute;micas) que me dificultan organizar mi tiempo.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 1, 4, 'Evito tomar apuntes en clases.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 2, 5, 'Elijo comer sanamente.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 3),
(1, 2, 6, 'Mi alimentaci&oacute;n diaria incluye frutas y verduras.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 3),
(1, 2, 7, 'Me ha preocupado engordar.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 2, 8, 'He consumido laxantes, diur&eacute;ticos, pastillas u otra sustancia para bajar de peso.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 3, 9, 'Mi familia aprueba mi elecci&oacute;n de carrera.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 3),
(1, 3, 10, 'En mi familia demostramos los afectos (abrazos,besos,etc).', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 2),
(1, 3, 11, 'Alguien de mi familia considera que no me graduar&eacute;.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 3, 12, 'En mi familia han tenido problemas de salud o emocionales.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 4, 13, 'Puedo hablar de todas mis emociones (tristeza, enojo, llanto, etc.).', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 2),
(1, 4, 14, 'Cuento con personas para hablar de c&oacute;mo me siento.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 3),
(1, 4, 15, 'Siento deseos de llorar constantemente.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 4, 16, 'Me frustro con facilidad.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 5, 17, 'Soy una persona que act&uacute;a de acuerdo a lo que piensa.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 3),
(1, 5, 18, 'En la escuela me han reconocido por portarme bien.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 3),
(1, 5, 19, 'Pierdo el control con facilidad.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 5, 20, 'Suelo ser impaciente con la gente.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 6, 21, 'Tengo amigos(as) a quien les puedo platicar mis problemas.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 3),
(1, 6, 22, 'He tenido relaciones de pareja estables.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 3),
(1, 6, 23, 'He tenido amigos que me han traicionado.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 6, 24, 'Evito tener amigos.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 7, 25, 'Me siento orgulloso por diferentes aspectos en mi vida', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 3),
(1, 7, 26, 'Siento que puedo expresar mis ideas y pensamientos', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 3),
(1, 7, 27, 'Siento que desconf&iacute;o de la gente.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 7, 28, 'He sentido que es mejor no vivir.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 1, 3),
(1, 8, 29, 'Me gusta practicar deportes.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 3),
(1, 8, 30, 'Realizo actividades art&iacute;sticas, musicales o baile.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 3),
(1, 8, 31, 'Paso mucho tiempo en la computadora o celular.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 8, 32, 'S&oacute;lo en los videojuegos encuentro diversi&oacute;n.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 9, 33, 'He recibido informaci&oacute;n sobre sexualidad por medios formales (escuela o m&eacute;dicos).', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 3),
(1, 9, 34, 'Alguna vez me he hecho una prueba para detecci&oacute;n de VIH o ITS.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 3),
(1, 9, 35, 'Me he involucrado sexualmente con una persona que acababa de conocer.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 9, 36, 'En los &uacute;ltimos 6 meses me han diagnosticado una infecci&oacute;n de transmisi&oacute;n sexual (ITS).', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 10, 37, 'Considero que utilizo los espacios virtuales de manera responsable y segura para m&iacute;.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 3),
(1, 10, 38, 'Las contrase&ntilde;as de los espacios virtuales que tengo (redes sociales, mails, juegos, etc.) son seguras y constantemente las cambio.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 3),
(1, 10, 39, 'Paso mucho tiempo en los espacios virtuales que olvido actividades de la escuela.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 10, 40, 'Disfruto tanto los juegos de realidad aumentada ya que es mejor vivir la vida de otra persona.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 11, 41, 'En el pasado obtuve buenos resultados en mis calificaciones de la escuela.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 3),
(1, 11, 42, 'Siempre disfrut&eacute; de dar clases y hablar en p&uacute;blico en la escuela.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 3),
(1, 11, 43, 'En el pasado tuve miedo de decirle a un maestro o directivo que estaba endesacuerdo con su opini&oacute;n.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 11, 44, 'En el pasado tuve problemas por agredir (golpear, acosar o bullying) a mis compa&ntilde;eros de escuela.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 12, 45, 'Me entusiasma conocer nuevos lugares y personas.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 3),
(1, 12, 46, 'Cuando llego a una nueva escuela espero que me den una bienvenida.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 3),
(1, 12, 47, 'Para conocer a las personas por 1era vez, me gusta que me hablen primero.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 12, 48, 'Me da miedo conocer nuevos lugares y personas.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 13, 49, 'Mis amistades son sanas y no consumen sustancias ilegales.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 3),
(1, 13, 50, 'Cuento con espacios para divertirme libre de sustancias legales o ilegales que da&ntilde;an mi cuerpo.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 3),
(1, 13, 51, 'He consumido en alguna ocasi&oacute;n drogas ilegales como coca&iacute;na.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 13, 52, 'Siento que como joven he tenido riesgos de caer en adicciones por alguna sustancia legal o ilegal.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 14, 53, 'Tengo una orientaci&oacute;n sexual definida (heterosexual, homosexual, bisexual u otro).', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 3),
(1, 14, 54, 'Creo que la escuela puede ser un lugar seguro para expresar mi orientaci&oacute;n sexual.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 3),
(1, 14, 55, 'He tenido conflictos con mi familia por mi orientaci&oacute;n sexual.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 14, 56, 'Me incomoda conocer a personas con una orientaci&oacute;n sexual distinta a la m&iacute;a.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 15, 57, 'Tengo claro cu&aacute;l es mi meta acad&eacute;mica en el Tec.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 3),
(1, 15, 58, 'Eleg&iacute; el Tec por que es la mejor instituci&oacute;n para m&iacute;.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 3),
(1, 15, 59, 'Suelo establecer metas y desanimarme cuando no las cumplo.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 15, 60, 'He tenido dudas de haber elegido el Tec como instituci&oacute;n.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 16, 61, 'Visito peri&oacute;dicamente a mi m&eacute;dico para checar mi salud.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 3),
(1, 16, 62, 'Puedo identificar mi cuerpo cuando est&aacute; sano y enfermo.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 2),
(1, 16, 63, 'Es frecuente que me hospitalicen por alguna enfermedad.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 16, 64, 'He tenido atenci&oacute;n psicol&oacute;gica o psiqui&aacute;trica por mi estado de &aacute;nimo o manera de aprender.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 17, 65, 'Si veo alguna agresi&oacute;n dirigida a otra persona la denuncio sin ponerme en riesgo.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 3),
(1, 17, 66, 'Si alguien comete alg&uacute;n delito es nuestro deber denunciarlo.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 3),
(1, 17, 67, 'Me gusta cuestionar lo impuesto.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 17, 68, 'He llegado a los golpes y amenazas por defender mi punto de vista (ideas).', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 18, 69, 'Me estreso por cosas sencillas', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 18, 70, 'Siento que me es dificil afrontar los problemas ( acad&eacute;micos o personales)', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, -1, 0, 3),
(1, 18, 71, 'Ante situaciones de estr&eacute;s (ej ex&aacute;menes) siento que puedo controlarlo.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 2),
(1, 18, 72, 'Siento que puedo tener las cosas bajo mi control.', 0, 'Totalmente desacuerdo', 'En  desacuerdo', 'Ni de acuerdo ni en desacuerdo', 'De acuerdo', 'Totalmente de acuerdo', 'No aplica', 6, 1, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `reportes`
--

CREATE TABLE IF NOT EXISTS `reportes` (
  `matricula` varchar(12) collate latin1_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `idencuesta` smallint(3) NOT NULL default '1',
  `indicadores` smallint(2) NOT NULL default '18',
  `ind1` tinyint(1) NOT NULL default '0',
  `ind2` tinyint(1) NOT NULL default '0',
  `ind3` tinyint(1) NOT NULL default '0',
  `ind4` tinyint(1) NOT NULL default '0',
  `ind5` tinyint(1) NOT NULL default '0',
  `ind6` varchar(1) collate latin1_spanish_ci NOT NULL default '0',
  `ind7` varchar(1) collate latin1_spanish_ci NOT NULL default '0',
  `ind8` varchar(1) collate latin1_spanish_ci NOT NULL default '0',
  `ind9` varchar(1) collate latin1_spanish_ci NOT NULL default '0',
  `ind10` varchar(1) collate latin1_spanish_ci NOT NULL default '0',
  `ind11` varchar(1) collate latin1_spanish_ci NOT NULL default '0',
  `ind12` varchar(1) collate latin1_spanish_ci NOT NULL default '0',
  `ind13` varchar(1) collate latin1_spanish_ci NOT NULL default '0',
  `ind14` varchar(1) collate latin1_spanish_ci NOT NULL default '0',
  `ind15` varchar(1) collate latin1_spanish_ci NOT NULL default '0',
  `ind16` varchar(1) collate latin1_spanish_ci NOT NULL default '0',
  `ind17` varchar(1) collate latin1_spanish_ci NOT NULL default '0',
  `ind18` varchar(1) collate latin1_spanish_ci NOT NULL default '0',
  `ind19` varchar(1) collate latin1_spanish_ci NOT NULL default '0',
  `ind20` varchar(1) collate latin1_spanish_ci NOT NULL default '0',
  PRIMARY KEY  (`matricula`,`idencuesta`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `reportes`
--


-- --------------------------------------------------------

--
-- Table structure for table `resultados`
--

CREATE TABLE IF NOT EXISTS `resultados` (
  `alumno` varchar(10) collate latin1_spanish_ci NOT NULL,
  `idencuesta` mediumint(5) NOT NULL,
  `pregunta` smallint(3) NOT NULL,
  `respuesta` tinyint(1) NOT NULL default '6'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `resultados`
--

INSERT INTO `resultados` (`alumno`, `idencuesta`, `pregunta`, `respuesta`) VALUES
('A00168100', 1, 1, 0),
('A00168100', 1, 2, 4),
('A00168100', 1, 3, 1),
('A00168100', 1, 4, 2),
('A00168100', 1, 5, 4),
('A00168100', 1, 6, 5),
('A00168100', 1, 7, 5),
('A00168100', 1, 8, 1),
('A00168100', 1, 9, 5),
('A00168100', 1, 10, 5),
('A00168100', 1, 11, 1),
('A00168100', 1, 12, 2),
('A00168100', 1, 13, 5),
('A00168100', 1, 14, 5),
('A00168100', 1, 15, 1),
('A00168100', 1, 16, 1),
('A00168100', 1, 17, 5),
('A00168100', 1, 18, 0),
('A00168100', 1, 19, 1),
('A00168100', 1, 20, 1),
('A00168100', 1, 21, 5),
('A00168100', 1, 22, 5),
('A00168100', 1, 23, 0),
('A00168100', 1, 24, 1),
('A00168100', 1, 25, 5),
('A00168100', 1, 26, 5),
('A00168100', 1, 27, 1),
('A00168100', 1, 28, 1),
('A00168100', 1, 29, 5),
('A00168100', 1, 30, 5),
('A00168100', 1, 31, 4),
('A00168100', 1, 32, 5),
('A00168100', 1, 33, 5),
('A00168100', 1, 34, 5),
('A00168100', 1, 35, 1),
('A00168100', 1, 36, 1),
('A00168100', 1, 37, 5),
('A00168100', 1, 38, 5),
('A00168100', 1, 39, 1),
('A00168100', 1, 40, 1),
('A00168100', 1, 41, 5),
('A00168100', 1, 42, 5),
('A00168100', 1, 43, 1),
('A00168100', 1, 44, 1),
('A00168100', 1, 45, 5),
('A00168100', 1, 46, 0),
('A00168100', 1, 47, 1),
('A00168100', 1, 48, 1),
('A00168100', 1, 49, 5),
('A00168100', 1, 50, 5),
('A00168100', 1, 51, 1),
('A00168100', 1, 52, 5),
('A00168100', 1, 53, 5),
('A00168100', 1, 54, 5),
('A00168100', 1, 55, 1),
('A00168100', 1, 56, 1),
('A00168100', 1, 57, 5),
('A00168100', 1, 58, 5),
('A00168100', 1, 59, 1),
('A00168100', 1, 60, 1),
('A00168100', 1, 61, 4),
('A00168100', 1, 62, 5),
('A00168100', 1, 63, 1),
('A00168100', 1, 64, 1),
('A00168100', 1, 65, 4),
('A00168100', 1, 66, 5),
('A00168100', 1, 67, 5),
('A00168100', 1, 68, 1),
('A00168100', 1, 69, 1),
('A00168100', 1, 70, 1),
('A00168100', 1, 71, 5),
('A00168100', 1, 72, 5);

