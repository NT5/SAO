CREATE TABLE IF NOT EXISTS `Carreras` (
 `Id_Carrera` INT NOT NULL AUTO_INCREMENT,
 `Nombre` VARCHAR(350) NOT NULL,
 `CreateAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 PRIMARY KEY (`Id_Carrera`)
);
INSERT INTO `Carreras` (`Nombre`) VALUES
('Admon Empresas'),
('Admon Empresas (Aduanas)'),
('Ciencias de la Educ.: Español'),
('Ciencias de la Educ.: Matemáticas'),
('Ciencias de la Educ.: Sociales'),
('Ciencias de la Educ.: CCNN'),
('Contaduría Pública'),
('Derecho'),
('Educación Física'),
('Enfermería'),
('IGA'),
('Ingeniería de Sist.'),
('Inglés'),
('Pedagogía'),
('Teología');
