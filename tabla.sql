CREATE TABLE `calendariopodismo` (
  `referencia` int(6) NOT NULL,
  `lugar` varchar(255) DEFAULT NULL,
  `dia` varchar(10) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `km` float DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefonos` varchar(255) DEFAULT NULL,
  `nota` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `calendariopodismo`
  ADD PRIMARY KEY (`referencia`);
COMMIT;