CREATE TABLE `claves_catastrales_fraccionamientos_detalles` (
  `Id_Fraccionamientos` int(11) NOT NULL,
  `Cuenta_Predial` varchar(100) NOT NULL,
  `Calle` varchar(100) NOT NULL,
  `Manzana` varchar(100) DEFAULT NULL,
  `Lote` varchar(100) DEFAULT NULL,
  `Numero_Ext` varchar(100) NOT NULL,
  `Numero_Int` varchar(100) NOT NULL,
  `Colonia` varchar(100) NOT NULL,
  `Id_Clave` int(11) DEFAULT '0',
  `Folio` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id_Fraccionamientos`,`Cuenta_Predial`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
