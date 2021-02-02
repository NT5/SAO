CREATE TABLE IF NOT EXISTS `Peds` (
 `Id_Ped` INT NOT NULL AUTO_INCREMENT,
 `Nombre` VARCHAR(350) NOT NULL,
 `Createat` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 PRIMARY KEY (`Id_Ped`)
);
INSERT INTO `Peds` (`Nombre`) VALUES
('Quilalí'),
('Ext. Wiwilí'),
('Pantasma'),
('Jalapa'),
('Ocotal'),
('Jinotega'),
('Ext. Bocay'),
('Condega'),
('Estelí'),
('San Miguelito'),
('San Carlos'),
('Santo tomás'),
('Nueva Guinea'),
('El Rama'),
('Ext. Muelle de los Buelles'),
('Siuna'),
('Ext. Rosita'),
('Matiguás'),
('Mulukukú'),
('Waslala'),
('Ometepe'),
('Masaya'),
('León'),
('Chinandega'),
('Managua');
