CREATE TABLE `Silabo_Entradas` (
 `Id_Silabo` INT NOT NULL AUTO_INCREMENT,
 `Id_Ped` INT NOT NULL,
 `Id_Carrera` INT NOT NULL,
 `Id_Asignatura` INT NOT NULL,
 `Id_Grupo` INT NOT NULL,
 `Modalidad` INT NOT NULL,
 `Createat` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `Editedat` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 `Createby` INT NOT NULL,
 PRIMARY KEY (`Id_Silabo`),
 CONSTRAINT FOREIGN KEY (`Id_Asignatura`) REFERENCES `Asignaturas` (`Id_Asignatura`) ON UPDATE CASCADE ON DELETE CASCADE,
 CONSTRAINT FOREIGN KEY (`Id_Carrera`) REFERENCES `Carreras` (`Id_Carrera`) ON UPDATE CASCADE ON DELETE CASCADE,
 CONSTRAINT FOREIGN KEY (`Id_Grupo`) REFERENCES `Grupos` (`Id_Grupo`) ON UPDATE CASCADE ON DELETE CASCADE,
 CONSTRAINT FOREIGN KEY (`Id_Ped`) REFERENCES `Peds` (`Id_Ped`) ON UPDATE CASCADE ON DELETE CASCADE,
 CONSTRAINT FOREIGN KEY (`Createby`) REFERENCES `User_Entries` (`User_Id`) ON UPDATE CASCADE ON DELETE CASCADE
);


-- Tabla de entradas alternativa
CREATE TABLE `silabo_entradas` (
	`Id_Silabo` INT(11) NOT NULL AUTO_INCREMENT,
	`Id_Ped` INT(11) NOT NULL,
	`Id_Carrera` INT(11) NOT NULL,
	`Id_Asignatura` INT(11) NOT NULL,
	`CodigoGrupo` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`CodAsignatura` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`AnioCarrera` INT(11) NULL DEFAULT NULL,
	`HorasClase` INT(11) NOT NULL,
	`HorasPrecenciales` INT(11) NOT NULL,
	`HorasIndependientes` INT(11) NOT NULL,
	`Modalidad` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`Trimestre` INT(11) NOT NULL,
	`TipoEvaluacion` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`AnioLectivo` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`Facilitador` VARCHAR(250) NOT NULL COLLATE 'latin1_swedish_ci',
	`Editedat` TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
	`Createat` TIMESTAMP NOT NULL DEFAULT current_timestamp(),
	PRIMARY KEY (`Id_Silabo`) USING BTREE,
	INDEX `Id_Asignatura` (`Id_Asignatura`) USING BTREE,
	INDEX `Id_Carrera` (`Id_Carrera`) USING BTREE,
	INDEX `Id_Ped` (`Id_Ped`) USING BTREE,
	CONSTRAINT `silabo_entradas_ibfk_1` FOREIGN KEY (`Id_Asignatura`) REFERENCES `uml_sao`.`asignaturas` (`Id_Asignatura`) ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT `silabo_entradas_ibfk_2` FOREIGN KEY (`Id_Carrera`) REFERENCES `uml_sao`.`carreras` (`Id_Carrera`) ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT `silabo_entradas_ibfk_4` FOREIGN KEY (`Id_Ped`) REFERENCES `uml_sao`.`peds` (`Id_Ped`) ON UPDATE CASCADE ON DELETE CASCADE
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
;