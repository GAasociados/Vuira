CREATE TABLE `claves_catastrales_fraccionamientos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Status` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Sin Asignar',
  `Fecha_Creacion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Propietario` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `Correo_Electronico` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Tipo_Tramite` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Doc_Identificacion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Doc_Plano_Digital` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Doc_Acta` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Doc_Oficio_Traza` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Doc_Plano_Fisico` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Doc_Escritura_Publica` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Doc_Resibo_Predial` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
