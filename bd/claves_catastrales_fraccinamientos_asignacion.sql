
CREATE TABLE `claves_catastrales_fraccionamientos_asignacion` (
  `Id_Fraccionamiento` int(11) NOT NULL,
  `Cuenta_Predial` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Id_Auxiliar` int(11) NOT NULL,
  `Fecha` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id_Fraccionamiento`,`Cuenta_Predial`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

