-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema tenis
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema tenis
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tenis` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema tenis
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema tenis
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tenis` DEFAULT CHARACTER SET utf8 ;
USE `tenis` ;

-- -----------------------------------------------------
-- Table `tenis`.`ajp_jugador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tenis`.`ajp_jugador` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `apellido` VARCHAR(50) NULL DEFAULT NULL,
  `genero` ENUM('masculino', 'femenino') NOT NULL,
  `fecha_nac` DATE NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tenis`.`ajp_entrenador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tenis`.`ajp_entrenador` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `apellido` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tenis`.`ajp_torneo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tenis`.`ajp_torneo` (
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `pais` ENUM('Gran Bretaña', 'Estados Unidos', 'Francia', 'Australia') NOT NULL,
  `gestion` INT(11) NOT NULL,
  PRIMARY KEY (`pais`, `gestion`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tenis`.`ajp_nacionalidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tenis`.`ajp_nacionalidad` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tenis`.`ajp_equipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tenis`.`ajp_equipo` (
  `entrenador_id` INT(11) NOT NULL,
  `modalidad` ENUM('Individual masculino', 'Individual femenino', 'Dobles masculino', 'Dobles femenino', 'Dobles mixtos') NOT NULL,
  `torneo_pais` ENUM('Gran Bretaña', 'Estados Unidos', 'Francia', 'Australia') NOT NULL,
  `torneo_gestion` INT(11) NOT NULL,
  `nacionalidad_id` INT(11) NOT NULL,
  INDEX `fk_ajp_equipo_entrenador1_idx` (`entrenador_id` ASC),
  INDEX `fk_ajp_equipo_torneo1_idx` (`torneo_pais` ASC, `torneo_gestion` ASC),
  PRIMARY KEY (`modalidad`, `torneo_pais`, `torneo_gestion`),
  INDEX `fk_equipo_nacionalidad1_idx` (`nacionalidad_id` ASC),
  CONSTRAINT `fk_ajp_equipo_entrenador1`
    FOREIGN KEY (`entrenador_id`)
    REFERENCES `tenis`.`ajp_entrenador` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ajp_equipo_torneo1`
    FOREIGN KEY (`torneo_pais` , `torneo_gestion`)
    REFERENCES `tenis`.`ajp_torneo` (`pais` , `gestion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipo_nacionalidad1`
    FOREIGN KEY (`nacionalidad_id`)
    REFERENCES `tenis`.`ajp_nacionalidad` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tenis`.`ajp_inscripcion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tenis`.`ajp_inscripcion` (
  `jugador_id` INT(11) NOT NULL,
  `equipo_modalidad` ENUM('Individual masculino', 'Individual femenino', 'Dobles masculino', 'Dobles femenino', 'Dobles mixtos') NOT NULL,
  `torneo_pais` ENUM('Gran Bretaña', 'Estados Unidos', 'Francia', 'Australia') NOT NULL,
  `torneo_gestion` INT(11) NOT NULL,
  `ganancia_torneo` DOUBLE NULL,
  INDEX `fk_Inscripcion_jugador1_idx` (`jugador_id` ASC),
  INDEX `fk_Inscripcion_equipo1_idx` (`equipo_modalidad` ASC, `torneo_pais` ASC, `torneo_gestion` ASC),
  PRIMARY KEY (`jugador_id`, `equipo_modalidad`, `torneo_pais`, `torneo_gestion`),
  CONSTRAINT `fk_Inscripcion_jugador1`
    FOREIGN KEY (`jugador_id`)
    REFERENCES `tenis`.`ajp_jugador` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Inscripcion_equipo1`
    FOREIGN KEY (`equipo_modalidad` , `torneo_pais` , `torneo_gestion`)
    REFERENCES `tenis`.`ajp_equipo` (`modalidad` , `torneo_pais` , `torneo_gestion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tenis`.`ajp_fases`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tenis`.`ajp_fases` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `premioconsuelo` DOUBLE NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tenis`.`ajp_arbitro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tenis`.`ajp_arbitro` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tenis`.`ajp_partido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tenis`.`ajp_partido` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `resultado` VARCHAR(100) NULL DEFAULT NULL,
  `arbitro_id` INT(11) NOT NULL,
  `fases_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_partido_arbitro1_idx` (`arbitro_id` ASC),
  INDEX `fk_partido_fases1_idx` (`fases_id` ASC),
  CONSTRAINT `fk_partido_arbitro1`
    FOREIGN KEY (`arbitro_id`)
    REFERENCES `tenis`.`ajp_arbitro` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_partido_fases1`
    FOREIGN KEY (`fases_id`)
    REFERENCES `tenis`.`ajp_fases` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tenis`.`ajp_equipo_partido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tenis`.`ajp_equipo_partido` (
  `equipo_modalidad` ENUM('Individual masculino', 'Individual femenino', 'Dobles masculino', 'Dobles femenino', 'Dobles mixtos') NOT NULL,
  `torneo_pais` ENUM('Gran Bretaña', 'Estados Unidos', 'Francia', 'Australia') NOT NULL,
  `torneo_gestion` INT(11) NOT NULL,
  `partido_id` INT(11) NOT NULL,
  `ganador` INT NULL,
  PRIMARY KEY (`equipo_modalidad`, `torneo_pais`, `torneo_gestion`, `partido_id`),
  INDEX `fk_equipo_has_partido_partido1_idx` (`partido_id` ASC),
  INDEX `fk_equipo_has_partido_equipo1_idx` (`equipo_modalidad` ASC, `torneo_pais` ASC, `torneo_gestion` ASC),
  CONSTRAINT `fk_equipo_has_partido_equipo1`
    FOREIGN KEY (`equipo_modalidad` , `torneo_pais` , `torneo_gestion`)
    REFERENCES `tenis`.`ajp_equipo` (`modalidad` , `torneo_pais` , `torneo_gestion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipo_has_partido_partido1`
    FOREIGN KEY (`partido_id`)
    REFERENCES `tenis`.`ajp_partido` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tenis`.`ajp_consuelo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tenis`.`ajp_consuelo` (
  `jugador_id` INT(11) NOT NULL,
  `equipo_modalidad` ENUM('Individual masculino', 'Individual femenino', 'Dobles masculino', 'Dobles femenino', 'Dobles mixtos') NOT NULL,
  `torneo_pais` ENUM('Gran Bretaña', 'Estados Unidos', 'Francia', 'Australia') NOT NULL,
  `torneo_gestion` INT(11) NOT NULL,
  `partido_id` INT(11) NOT NULL,
  `monto` DOUBLE NULL,
  PRIMARY KEY (`jugador_id`, `equipo_modalidad`, `torneo_pais`, `torneo_gestion`, `partido_id`),
  INDEX `fk_Inscripcion_has_partido_partido1_idx` (`partido_id` ASC),
  INDEX `fk_Inscripcion_has_partido_Inscripcion1_idx` (`jugador_id` ASC, `equipo_modalidad` ASC, `torneo_pais` ASC, `torneo_gestion` ASC),
  CONSTRAINT `fk_Inscripcion_has_partido_Inscripcion1`
    FOREIGN KEY (`jugador_id` , `equipo_modalidad` , `torneo_pais` , `torneo_gestion`)
    REFERENCES `tenis`.`ajp_inscripcion` (`jugador_id` , `equipo_modalidad` , `torneo_pais` , `torneo_gestion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Inscripcion_has_partido_partido1`
    FOREIGN KEY (`partido_id`)
    REFERENCES `tenis`.`ajp_partido` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `tenis` ;

-- -----------------------------------------------------
-- Table `tenis`.`ajp_users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tenis`.`ajp_users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `password` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
