-- Tabla 'libro'
-- CRUD Estudiantes 2026-2
-- A esta tabla se le iran aniadiendo campos conforme se necesiten.
-- 
CREATE TABLE `CRUD2026_2` (
	`id` INT NOT NULL AUTO_INCREMENT , 
	`semestre` INT(1) NOT NULL , 
	`grupo` TEXT(1) NOT NULL , 
	`anio` INT(4) NOT NULL , 
	`materia` TEXT(8) NOT NULL,
	`apaterno` TEXT(15) NOT NULL , 
	`amaterno` TEXT(15) NULL , 
	`nombre` TEXT(30) NOT NULL , 
	PRIMARY KEY (`id`), 
	INDEX `ndxPorSemestre` (`semestre`), 
	INDEX `ndxPorGrupo` (`grupo`), 
	INDEX `ndxPorAnio` (`anio`),
	INDEX `ndxPorMateria` (`materia`),
	INDEX `ndxPorAPaterno` (`apaterno`), 
	INDEX `ndxPorAMaterno` (`amaterno`), 
	INDEX `ndxPorNombre` (`nombre`)
) ENGINE = InnoDB;