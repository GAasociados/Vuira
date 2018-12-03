/*
SQLyog Community v12.4.3 (64 bit)
MySQL - 10.1.21-MariaDB : Database - citasbien
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`citasbien` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `citasbien`;

/*Table structure for table `citas` */

DROP TABLE IF EXISTS `citas`;

CREATE TABLE `citas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `citas_id` varchar(255) DEFAULT NULL,
  `ciudadano_id` varchar(255) DEFAULT NULL,
  `departamento_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `horarios_id` int(11) DEFAULT NULL,
  `serial_no` int(11) DEFAULT NULL,
  `dia` date DEFAULT NULL,
  `asunto` text,
  `creado_por` int(11) DEFAULT NULL,
  `fecha_captura` date DEFAULT NULL,
  `correo_electronico` varchar(255) DEFAULT NULL,
  `nombre_completo` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `hora_cita` varchar(100) DEFAULT NULL COMMENT 'hora en la que se agenda la cita',
  `tramite_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_citas_Departamento1_idx` (`departamento_id`),
  KEY `fk_citas_user1_idx` (`user_id`),
  KEY `fk_citas_horarios1_idx` (`horarios_id`),
  CONSTRAINT `fk_citas_Departamento1` FOREIGN KEY (`departamento_id`) REFERENCES `departamento` (`dprt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_citas_horarios1` FOREIGN KEY (`horarios_id`) REFERENCES `horarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_citas_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `citas` */

insert  into `citas`(`id`,`citas_id`,`ciudadano_id`,`departamento_id`,`user_id`,`horarios_id`,`serial_no`,`dia`,`asunto`,`creado_por`,`fecha_captura`,`correo_electronico`,`nombre_completo`,`telefono`,`status`,`hora_cita`,`tramite_id`) values 
(6,'A4T3RTDU','1',1,1,1,1,'2017-05-22','deo',NULL,'2017-05-20','tantracerberus@gmail.com','Jose Juan Granados Fuerte','4521199026',1,NULL,NULL),
(7,'AJ05YOBN','1',1,1,1,2,'2017-05-22','Pregunta',NULL,'2017-05-21','correo','Juan Manuel','462',1,NULL,NULL),
(8,'AI2G7CZ3','1',2,2,2,5,'2017-05-22','dadasd',NULL,'2017-05-21','correo','Nombre','telefono',1,NULL,NULL),
(9,'AWBLFGVX','1',2,2,2,1,'2017-05-22','qweqwe',NULL,'2017-05-21','aewe','3213','321',1,NULL,NULL),
(10,'ARJ82CIY','1',1,1,13,1,'2017-05-24','eqeq',NULL,'2017-05-21','eqwe','ertg','edfgh',1,NULL,NULL),
(11,'AFA0C8CM','1',1,1,12,2,'2017-05-23','Observación',NULL,'2017-05-22','correo@sample.com','Daniel','462 115 000 00',1,NULL,NULL),
(12,'ABUYVAO8','1',1,1,13,1,'2017-06-07','Cita',NULL,'2017-06-07','manuel@gmail.com','Juan Manuel Banda ','462 1151054',1,NULL,NULL),
(13,'AZ999PIK','1',2,2,9,7,'2017-08-30','visita tecnica',NULL,'2017-08-03','legodgoz@hotmail.com','Luis Eduardo Godinez Gonzalez','46514651',1,NULL,NULL),
(14,'AVGFQM0U','1',1,1,13,10,'2017-08-23','visita tecnica',NULL,'2017-08-03','legodgoz@hotmail.com','jose','212121212122',1,NULL,NULL),
(15,'AUW8J3UR','1',2,2,9,11,'2017-08-30','',NULL,'2017-08-03','','luis eduardo ','12368172368',1,NULL,149),
(16,'ARFN9GPK','1',2,2,9,10,'2017-08-30','dñasdkja',NULL,'2017-08-03','legodgoz@hotmail.com','sdadsa','asdasda',1,'149',149),
(17,'AFPGOK13','1',2,2,9,9,'2017-08-30','dñasdkja',NULL,'2017-08-03','legodgoz@hotmail.com','asdada','13123123123123',1,'13:00 - 13:30',150);

/*Table structure for table `ciudadano` */

DROP TABLE IF EXISTS `ciudadano`;

CREATE TABLE `ciudadano` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ciudadano_id` varchar(255) DEFAULT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `celular` varchar(255) DEFAULT NULL,
  `fecha_captura` date DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `fecha_cumple` date DEFAULT NULL,
  `sexo` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT '/assets/images/encargado/logo_general.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `ciudadano` */

insert  into `ciudadano`(`id`,`ciudadano_id`,`nombres`,`apellidos`,`telefono`,`celular`,`fecha_captura`,`status`,`fecha_cumple`,`sexo`,`foto`) values 
(1,'1','-','-','granados','4521199026',NULL,1,NULL,NULL,'/assets/images/encargado/logo_general.png');

/*Table structure for table `departamento` */

DROP TABLE IF EXISTS `departamento`;

CREATE TABLE `departamento` (
  `dprt_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `status` tinyint(4) DEFAULT NULL,
  `id_user` int(11) NOT NULL COMMENT 'id del usuario encargado  del departamento',
  PRIMARY KEY (`dprt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Data for the table `departamento` */

insert  into `departamento`(`dprt_id`,`nombre`,`descripcion`,`status`,`id_user`) values 
(1,'JAPAMI',NULL,1,1),
(2,'Catastro',NULL,1,2),
(3,'Administración Urbana',NULL,1,3),
(4,'Secretaría Particular del Presidente Municipal		',NULL,1,4),
(5,'Dirección General de Desarrollo Económico',NULL,1,6),
(6,'Instituto Municipal de Vivienda en Irapuato',NULL,1,7),
(7,'Instituto Municipal de Cultura, Arte y Recreaciòn',NULL,1,8),
(8,'Comisión del Deporte y Atención a la Juventud	',NULL,1,9),
(9,'Juzgado Administrativo Municipal de Irapuato Guanajuato	\r\n',NULL,1,10),
(10,'Direcciòn General de Educaciòn',NULL,1,11),
(11,'Secretaria del H. Ayuntamiento \r\n',NULL,1,12),
(12,'Dirección General de Desarrollo Social',NULL,1,13),
(13,'Secretaría de Seguridad Ciudadana(Direcciòn de Movilidad y Transporte) \r\n',NULL,1,14),
(14,'Secretaría de Seguridad Ciudadana \r\n(Dirección de Fiscalización)',NULL,1,15),
(15,'Junta de Agua Potable, Drenaje, Alcantarillado y Saneamiento del Municipio de Irapuato ',NULL,1,16),
(16,'Dirección General de  Desarrollo Territorial(Dirección de Administración Urbana)',NULL,1,17),
(17,'Dirección General de  Desarrollo Territorial (Dirección de Medio Ambiente )',NULL,1,18),
(18,'Dirección General de  Desarrollo Territorial (Dirección de Fraccionamientos)',NULL,1,19),
(19,'Tesoreria Municipal(Dirección de Impuestos Inmobiliarios)',NULL,1,20),
(20,'Tesoreria Municipal(Dirección de Ingresos)',NULL,1,21),
(21,'Direcciòn General de Servicios Pùblicos y Mantenimiento',NULL,1,23);

/*Table structure for table `horarios` */

DROP TABLE IF EXISTS `horarios`;

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `tiempo_inicio` time DEFAULT NULL,
  `tiempo_final` time DEFAULT NULL,
  `dias_disponibles` varchar(250) DEFAULT NULL,
  `tiempo_por_turno` time DEFAULT NULL,
  `serie_visible` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_horarios_user1_idx` (`user_id`),
  CONSTRAINT `fk_horarios_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `horarios` */

insert  into `horarios`(`id`,`user_id`,`tiempo_inicio`,`tiempo_final`,`dias_disponibles`,`tiempo_por_turno`,`serie_visible`,`status`) values 
(1,1,'09:00:00','15:00:00','Monday','00:30:00',2,1),
(2,2,'09:00:00','15:00:00','Monday','00:30:00',2,1),
(3,3,'09:00:00','15:00:00','Monday','00:30:00',2,1),
(4,3,'09:00:00','15:00:00','Tuesday','00:30:00',2,1),
(5,3,'09:00:00','15:00:00','Wednesday','00:30:00',2,1),
(6,3,'09:00:00','15:00:00','Thursday','00:30:00',2,1),
(7,3,'09:00:00','15:00:00','Friday','00:30:00',2,1),
(8,2,'09:00:00','15:00:00','Tuesday','00:30:00',2,1),
(9,2,'09:00:00','15:00:00','Wednesday','00:30:00',2,1),
(10,2,'09:00:00','15:00:00','Thursday','00:30:00',2,1),
(11,2,'09:00:00','15:00:00','Friday','00:30:00',2,1),
(12,1,'09:00:00','15:00:00','Tuesday','00:30:00',2,1),
(13,1,'09:00:00','15:00:00','Wednesday','00:30:00',2,1),
(14,1,'09:00:00','15:00:00','Thursday','00:30:00',2,1),
(15,1,'09:00:00','15:00:00','Friday','00:30:00',2,1);

/*Table structure for table `tramite` */

DROP TABLE IF EXISTS `tramite`;

CREATE TABLE `tramite` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de la tabla de tramites',
  `nombre` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL COMMENT 'nombre del tramite',
  `id_departamento` int(11) NOT NULL COMMENT 'id del departamento al que pertenece el tramite',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=233 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `tramite` */

insert  into `tramite`(`id`,`nombre`,`id_departamento`) values 
(1,'Cobro de servicios',1),
(2,'Suministrao de agua tratada en pipas',1),
(3,'Registro de asuntos y peticiones para canalizacion y seguimiento de tramites\r\n',4),
(4,'Solicitud de empleo',5),
(5,'Solicitud de Informacion para la instalacion de Empresas',5),
(6,'Solicitud de Regularización de Asentamientos Humanos ',6),
(7,'Solicitud para escrituración de Asentamientos Humanos Regularizados\r\n',6),
(8,'Solicitud para adquisición de una vivienda en recuperación\r\n',6),
(9,'Solicitud para adquisición de lotes con servicios\r\n',6),
(10,'Solicitud para gestión de creditos de Mejoramiento de Vivienda Urbana 2016 de la COVEG',6),
(11,'Servicio de Visita Guiada\r\n',7),
(12,'Inscripción a talleres culturales',7),
(13,'Renta de espacios\r\n',7),
(14,'Inscripciones a escuelas deportivas en las unidades norte, sur, el copal y modulo COMUDAJ\r\n',8),
(15,'Solicitud de apoyos\r\n',8),
(16,'Renta de areas deportivas\r\n',8),
(17,'Juicio Contensioso Administrativo\r\n',9),
(18,'Solicitud de Banda Municipal\r\n',10),
(19,'Apoyos economicos educativos  por una mejor educacion\r\n',10),
(20,'Solicitud para la construcción de espacios educativos\r\n',10),
(21,'Solicitud de asignación del servicio social\r\n',10),
(22,'Cartilla del Servicio Militar Nacional\r\n',11),
(23,'Carta de residencia con identificación',11),
(24,'Carta de residencia de menor de edad\r\n',11),
(25,'Carta de residencia para estados unidos',11),
(26,'Trámite de pasaporte (mayor de un año y menor de 18 años que trámita por primera vez)\r\n',11),
(27,'Trámite de pasaporte (mayor de un año y menor de 18 años que renueva su pasaporte)\r\n',11),
(28,'Trámite de pasaporte ( Mayor de 18 años que renueva su pasaporte)\r\n',11),
(29,'Trámite de pasaporte ( Mayor de 18 años que trámita su pasaporte por primera veza)\r\n',11),
(30,'Trámite de pasaporte ( Menor de 1 año que trámita por primera vez)',11),
(31,'Solicitud de datos personales',11),
(32,'Solicitud de acceso a la información',11),
(33,'Autorización de uso de plaza pública',11),
(34,'Programa estar mejor, activate',12),
(35,'Programa estar mejor capacitate \r\n',12),
(36,'Programa apoyo alimentario del Adulto Mayor',12),
(37,'Pinta tu entorno\r\n',12),
(38,'Formación , renovación  de comités de participación ciudadana',12),
(39,'Unidad médica movil- consulta medica dental\r\n',12),
(40,'Programa de vigilancia  sanitario de sexo servicio',12),
(41,'Vacunación antirrabica de perros y gatos\r\n',12),
(42,'Adopción de mascotas mayores de 4 meses',12),
(43,'Unidad médica movil- consulta medica dental\r\n',12),
(44,'Desparacitación de perros y gatos',12),
(45,'Esterilización de mascotas',12),
(46,'Asesoría psicologica , orientación y canalización',12),
(47,'Edificios 100%LHT',12),
(48,'Prevención de adicciones',12),
(49,'Servicio de personal para protección de eventos públicos y/o partriculares',13),
(50,'Indice delictivo para la factibilidad de giros comerciales',13),
(51,'Dictamen de seguridad (visto bueno)',13),
(52,'Por dictamen de seguridda para permisos de la Secretaria de la defensa nacional sobre a)cartuchos, b)fabricación de pirotécnicos y c) materiales explosivos.',13),
(53,'Para la supervisión y evaluación de simulacros\r\n',13),
(54,'Para brindar capacitación',13),
(55,'Factibilidad de Zonificacion',13),
(56,'Factibilidad de programa interno de protección civil',13),
(57,'Conformidad para uso y quema de juegos Pirotécnicos',13),
(58,'Por el traslado en ambulancia no emergentes, dentro de la zona urbana y suburbana',13),
(59,'Reporte de fuga de gas',13),
(60,'Servicio de ambulancia para proteccion de eventos públicos, por evento\r\n',13),
(61,'Dictamen Tecnico en Prevención de Incendios ',13),
(62,'Reporte de inciendo',13),
(63,'Solicitud de rescate',13),
(64,'Solicitud de capacitacion',13),
(65,'Solicitud de atención de emergencias ',13),
(66,'Servicio de ambulancia de emergencia',13),
(67,'Expedición y/o renovación de licencias de conducir',13),
(68,'Estudio de factibilidad de vialidad',13),
(69,'Estudio para colocación o retiro de reductores de velocidad',13),
(70,'Solicitud de señalización horizontal y vertical( señalamientos, láminas, pintura de calle y guarniciones)',13),
(71,'Permiso para eventos particulares en bardas y salones para fiestas ',14),
(72,'Registro de libros de Hoteles y Moteles',14),
(73,'Permiso para la colocación de sonido ambulante',14),
(74,'Permiso provisional para venta de bebidas alcohólicas',14),
(75,'Ampliación de horario con venta de bebidas alcohólicas',14),
(76,'Permiso para degustaciones de bebidas alcohólicas de bajo y alto contenido alcohólico por dia',14),
(77,'Conformidad sobre el funcionamiento de permisos considerados de alto impacto (centros nocturnos, discoteques, bares y cantinas ya sea apertura, cambio de domicilio y /o cambio de giro)',14),
(78,'Certificaciones para establecimientos con venta de bebidas de alto y bajo contenido alcohólico',14),
(79,'Permiso para la realización de eventos públicos con y sin fines de lucro',14),
(80,'Permiso para la colocación de sonido fijo',14),
(81,'Permiso para la realización de tardeadas\r\n',14),
(82,'Atencion de reportes y quejas',14),
(83,'Levantamiento por sellos de clausura',14),
(84,'certficaciones para el funcionamiento de bardas y/o salones para fiestas',14),
(85,'Conexión de descarga en concreto hidáulico de 6 pulgadas',15),
(86,'Conexión de descarga en asfalto de 6 pulgadas\r\n',15),
(87,'Limpieza de descarga sanitaria con camion hidroneumatico, todos los giros',15),
(88,'Conexión de toma de agua en tierra de 1/2 pulgada\r\n',15),
(89,'Conexión de descarga en tierra de 6 pulgadas',15),
(90,'Conexión de toma de agua en pavimento de 1/2pulgada hasta 10mts de largo',15),
(91,'Cambio de titular o razón social',15),
(92,'Canceelación de contrato',15),
(93,'Suspension voluntaria Temporal en servicios de agua potable',15),
(94,'Contrato domestico en servicios de agua y drenaje',15),
(95,'Contratacion de servicios de agua y drenaje (comercial o industrial)',15),
(96,'Reconexión de servicios de agua',15),
(97,'Constancia de no adeudo',15),
(98,'Conevio pago de derechos',15),
(99,'Carta de factibilidad para un nuevo desarrollo habitacional',15),
(100,'Aforo\r\n',15),
(101,'Agua para construcción',15),
(102,'Riego por hectárea\r\n',15),
(103,'Revision de proyectos\r\n',15),
(104,'Suministro de agua potable en pipas',15),
(105,'Suministrao de agua tratada en pipas\r\n',15),
(106,'Cobro de servicios',15),
(107,'Constancia de factibilidad de servicios',15),
(108,'Carta de factibilidad para desarrollos no habitacionales SARE',15),
(109,'Análisis de agua potable/ residual',15),
(110,'Descarga de baños portatiles y tratamiento del produco',15),
(111,'Actualización de pereito',16),
(112,'Ampliación y/o remodelación',16),
(113,' Demolición',16),
(114,'Constancia de factibilidad',16),
(115,' Cambio de proyecto\r\n',16),
(116,'Bardeo',16),
(117,'Cambio Retiro Perito ',16),
(118,'Terminación \r\n',16),
(119,'Permiso de construcción (obra nueva)',16),
(120,'Intervención y ocupación temporal en via publica',16),
(121,'Incorporación Urbanistica',16),
(122,'Instalación de Estructuras',16),
(123,' Permiso de anuncios\r\n',16),
(124,' Permiso de uso de suelo',16),
(125,' Permiso de uso de suelo SARE',16),
(126,' Suspensión de obra',16),
(127,'Reinicio de obra',16),
(128,'Regularizacón de estructura (anuncio)\r\n',16),
(129,'Refrendo permiso de construcción',16),
(130,'Registro de perito (nuevo ingreso)',16),
(131,'Refrendo de permiso de anuncios ',16),
(132,' Refrendo del permiso para la colocación de estructura (anuncio)\r\n',16),
(133,' Publicidad Temporal',16),
(134,' Permiso para la colocaón de estructura (anuncio)',16),
(135,'Autorización de impacto ambiental\r\n',17),
(136,'Autorización Municipal de impacto ambiental\r\n',17),
(137,'Educación ambiental',17),
(138,'Dictamen de intervención de la flora',17),
(139,'Dictamen de Alineamiento y número oficial\r\n',18),
(140,'Dictamen de Alineamiento',18),
(141,'Aprobación de traza\r\n',18),
(142,'Constancia de régimen en condominio',18),
(143,'Constancia para contitur régimen de propiedad en condominio',18),
(144,'Entrega recepción de fraccionamiento',18),
(145,'Permiso de división',18),
(146,'Permiso de urbanización de los fraccionamientos de edificación en los desarrollos en condominio',18),
(147,'Dictamen de Número oficial',18),
(148,'Permiso de venta',18),
(149,'Asignación de clave catastral Individual',2),
(150,'Asignación de clave catastral de fraccionamientos\r\n',2),
(151,'Atencion de aclaraciones\r\n',2),
(152,'Autorizacion de avalúos fiscales urbanos y rusticos',2),
(153,'Inscripción de peritos valuadores fiscales',2),
(154,'Refrendo de peritos valuadores y fiscales',2),
(155,'Autorización del proyecto de regimen de propiedad en condominio ',2),
(156,'Solicitud de regularización fiscal de predios',2),
(157,'Constancia de no adeudo ',19),
(158,'Certificación de recibo de impuesto predial',19),
(159,'Convenio de pago de impuesto predial',19),
(160,'Certificación de otros documentos (copia aviso de traslado de dominio, avaluo)',19),
(161,'Constancia de no propiedad',19),
(162,'Constancia de propiedad\r\n',19),
(163,'Solicitud de devoluciones',19),
(164,'Declaración para el pago del impuesto por adquisición de bienes muebles',19),
(165,'Declaración para el pago del impuesto por adquisición de bienes inmuebles (express)',19),
(166,'Declaración para el pago del impuesto por división de inmuebles',19),
(167,'Declaracion para el pago del impuesto sobre adqusición de bienes inmuebles\r\n',19),
(168,'Solicitud para el pago del impiuesro de fraccionamientos',19),
(169,'Solicitud para el pago de derechos de supervisión de obra',19),
(170,'Regularización fiscal de predios',19),
(171,'Alta de cuenta predial',19),
(172,'Constancia de obras de cooperación\r\n',20),
(173,'Constancia de no adeudo por impuesto derechos y aprovechamiento',20),
(174,'Autorización para el funcionamiento de juegos y apuesta ',20),
(175,'Reposición de folio en caso de perdida del original',20),
(176,'Constancia de no infracción',20),
(177,'Cedula de empadronamiento',20),
(178,'Expedición de constancia por la revisión o aprobación de proyectos de alumbrado público',21),
(179,'Reporte de fallas de alumbrado pùblico ',21),
(180,'cremación',21),
(181,'Permiso de colocación de lapida/monumentos\r\n',21),
(182,'Traslado',21),
(183,'Refrendo de Gaveta',21),
(184,'Exhumación panteon Municipal\r\n',21),
(185,'Inhumación en segundos, terceros y cuartos derechos de fosa-gaveta a perpetuidad',21),
(186,'Inhumación de Cádaveres',21),
(187,'Solicitud de donaciòn de plantas y àrboles ',21),
(188,'Aprobación de proyecto de areas verdes y sembrado de arboles en aceras de fraccionamientos y vialidades de nueva creacion',21),
(189,'Solicitud de Valoración de daños a areas verdes\r\n',21),
(190,'Apoyo para poda y/o Tala de árboles en vía pública',21),
(191,'Servicio de recolección Domiciliaria de Basura',21),
(192,'Servicio de limpieza de lote baldìo\r\n',21),
(193,'Servicio para Uso de Relleno Sanitario',21),
(194,'Cambio de giro en los espacios mercados públicos de Irapuato, Gto',21),
(195,'Instalación de juegos mecánicos',21),
(196,'Solicitud para trabajar en temporada de comercio',21),
(197,'Traspaso de locales , mesas y puestos',21),
(198,'Solicitud de proveído por aseguramiento de mercancía',21),
(199,'Concesión de locales de los  mercados Públicos\r\n',21),
(200,'Cambio de giro para ejercer el comercio en forma ambulante y semifijo',21),
(201,'Traspaso para ejercer el comercio en perifería en forma ambulante y semifijo',21),
(202,'Sacrificio y faenado de ganado bovino',21),
(203,'Sacrificio y faenado de porcionos (hasta 175 kg)',21),
(204,'Sacrificio y faenado de porcinos (mas de 175kg)',21),
(205,'Sacrificio y faenado de ovicaprinos \r\n',21),
(206,'Derecho de piso y agua en lavado vìsceras de porcino',21),
(207,'Resello ganado bovino en canal \r\n',21),
(208,'Resello de ganado porcino en canal\r\n',21),
(209,'Resello de ganado caprino y ovino en canal',21),
(210,'Resello de aves en dìa hàbil',21),
(211,'Resello de aves en dia inhábil',21),
(212,'Refrigeracion de ganado bovino por kilo',21),
(213,'Refrigeracion de ganado porcino por kilo',21),
(214,'Servicio de reparto de canales bovino',21),
(215,'Servicio de reparto canales porcino',21),
(216,'Sacrificio y faenado de bovinos servicio extraordinario ',21),
(217,'Resello de ganado bovino por kilo',21),
(218,'Resello de ganado porcino por kilo',21),
(219,'Sacrificio y faenado de porcinos de linea hasta 175 kg (extraordinario)',21),
(220,'Sacrificio y faenado de porcinos grandes (extraordinario)',21),
(221,'Resello de ganado caprino y ovino por kg',21),
(222,'Lavado de vehìculos de una tonelada hasta tres toneladas. ',21),
(223,'Derecho de piso de porcinos detenidos',21),
(224,'Derecho de piso de bovinos detenidos',21),
(225,'Derecho de piso de pieles',21),
(226,'Limpieza de viceras de cerdo',21),
(227,'Limpieza de viceras de caprino y ovino',21),
(228,'Limpieza de viceras bovino',21),
(229,'Sacrificio y faenado de aves',21),
(230,'Sacrificio de ganado caprino, ovino por servicios extraordinarios',21),
(231,'lavado de vehiculos hasta una tonelada\r\n',21),
(232,'Servicio por incineración\r\n',21);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_role` tinyint(4) DEFAULT NULL,
  `designacion` varchar(255) DEFAULT NULL,
  `rango` varchar(255) DEFAULT NULL,
  `departamento_id` int(11) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `celular` varchar(255) DEFAULT NULL,
  `biografia_corta` text,
  `foto` varchar(255) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `sexo` varchar(255) DEFAULT NULL,
  `creado_por` varchar(255) DEFAULT NULL,
  `fecha_captura` date DEFAULT NULL,
  `fecha_update` date DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_Departamento_idx` (`departamento_id`),
  CONSTRAINT `fk_user_Departamento` FOREIGN KEY (`departamento_id`) REFERENCES `departamento` (`dprt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id`,`nombres`,`apellido`,`email`,`user_role`,`designacion`,`rango`,`departamento_id`,`direccion`,`telefono`,`celular`,`biografia_corta`,`foto`,`fecha_nacimiento`,`sexo`,`creado_por`,`fecha_captura`,`fecha_update`,`status`) values 
(0,'ANA LUISA ','ACEVEDO SÁNCHEZ',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(1,'Ing. Patricia Hisaraith','Hernández','phernandez@japami.gob.mx',2,'Ing','Administrador',1,'Av. Juan José Torres Landa 1720, Independencia, 36559','462 606 9100','462 606 9100','<p>Biografia</p>',NULL,'0000-00-00','Femenino',NULL,'2017-03-01',NULL,1),
(2,'Arq.Carlos Alberto','Juarez','carlos.juarez@irapuato.gob.mx',2,'Arq','Administrador',2,'Álvaro Obregón #100 Zona Centro, 1er Piso, Irapuato, Gto.','01 462 6069999 ext. 1565 y 1566',NULL,NULL,NULL,'0000-00-00','Masculino',NULL,'2017-03-01',NULL,1),
(3,'Arq. Mariela Elizabeth','Lugo','mariela.lugo@irapuato.gob.mx',2,'Arq','Administrador',3,'Alvaro Obregon 100 Zona Centro, 1 er piso, Irapuato, Gto.','01(462) 6069999 ext. 1565 y 1566',NULL,NULL,NULL,'0000-00-00','Femenino',NULL,'2017-04-05',NULL,1),
(4,'LUIS MARTÍNEZ','SIERRA',NULL,2,NULL,'Administrador',NULL,'Alvaro Obregon 100 Zona Centro, 1 er piso, Irapuato, Gto.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),
(6,'ANA LUISA ','ACEVEDO SÁNCHEZ',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),
(7,'Gabriel Ma. ','Alcántara Soria\r\n',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),
(8,'Federico','Vargas',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),
(9,'Luis Manuel ','Aguilar Valencia',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),
(10,'Sandra ','Baeza','',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),
(11,'Edgardo','Marmolejo Limas',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),
(12,'Fabiola','Romero',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),
(13,'José Martín','López Ramírez',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),
(14,'Isabel','Galeana',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),
(15,'Pascual',NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),
(16,'Miguel ','Alanis',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),
(17,'Mariela','Lugo',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),
(18,'Gonzalo','Guerrero',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),
(19,'Gregorio','Trejo',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),
(20,'Martina','Aldaco',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),
(21,'Pedro','Barroso',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),
(23,'Daphne','Malanche',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
