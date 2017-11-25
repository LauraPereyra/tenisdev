-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema tenis
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `tenis` ;

-- -----------------------------------------------------
-- Schema tenis
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tenis` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `tenis` ;

-- -----------------------------------------------------
-- Table `tenis`.`Jugador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tenis`.`Jugador` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(45) NOT NULL COMMENT '',
  `apellido` VARCHAR(45) NOT NULL COMMENT '',
  `fecha_nac` DATE NOT NULL COMMENT '',
  `genero` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tenis`.`Nacionalidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tenis`.`Nacionalidad` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tenis`.`Torneo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tenis`.`Torneo` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `lugar` VARCHAR(50) NOT NULL COMMENT '',
  `modalidad` ENUM('individual masculino', 'individual femenino', 'dobles masculino', 'dobles femenino', 'dobles mixtos') NOT NULL COMMENT '',
  `pais` ENUM('Gran Bretaña', 'Estados Unidos', 'Francia', 'Australia') NOT NULL COMMENT '',
  `premio` DOUBLE NOT NULL COMMENT '',
  `gestion` VARCHAR(4) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tenis`.`Equipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tenis`.`Equipo` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `Jugador_id_1` INT NOT NULL COMMENT '',
  `Jugador_id_2` INT NULL COMMENT '',
  `Nacionalidad_id` INT NOT NULL COMMENT '',
  `Torneo_id` INT NOT NULL COMMENT '',
  INDEX `fk_Jugador_has_Jugador_Jugador2_idx` (`Jugador_id_2` ASC)  COMMENT '',
  INDEX `fk_Jugador_has_Jugador_Jugador1_idx` (`Jugador_id_1` ASC)  COMMENT '',
  PRIMARY KEY (`id`, `Nacionalidad_id`, `Torneo_id`)  COMMENT '',
  INDEX `fk_Equipo_Nacionalidad1_idx` (`Nacionalidad_id` ASC)  COMMENT '',
  INDEX `fk_Equipo_Torneo1_idx` (`Torneo_id` ASC)  COMMENT '',
  CONSTRAINT `fk_Jugador_has_Jugador_Jugador1`
    FOREIGN KEY (`Jugador_id_1`)
    REFERENCES `tenis`.`Jugador` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Jugador_has_Jugador_Jugador2`
    FOREIGN KEY (`Jugador_id_2`)
    REFERENCES `tenis`.`Jugador` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Equipo_Nacionalidad1`
    FOREIGN KEY (`Nacionalidad_id`)
    REFERENCES `tenis`.`Nacionalidad` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Equipo_Torneo1`
    FOREIGN KEY (`Torneo_id`)
    REFERENCES `tenis`.`Torneo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tenis`.`Fases`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tenis`.`Fases` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(45) NOT NULL COMMENT '',
  `premioconsuelo` DOUBLE NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tenis`.`Arbitro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tenis`.`Arbitro` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(45) NOT NULL COMMENT '',
  `apellido` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tenis`.`Partido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tenis`.`Partido` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `fecha` VARCHAR(45) NULL COMMENT '',
  `equip_1` INT NULL COMMENT '',
  `equip_2` INT NULL COMMENT '',
  `Torneo_id` INT NOT NULL COMMENT '',
  `Fases_id` INT NOT NULL COMMENT '',
  `resultado` INT NULL COMMENT '',
  `Arbitros_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_Partido_Torneo1_idx` (`Torneo_id` ASC)  COMMENT '',
  INDEX `fk_Partido_Fases1_idx` (`Fases_id` ASC)  COMMENT '',
  INDEX `fk_Partido_Equipo1_idx` (`equip_1` ASC)  COMMENT '',
  INDEX `fk_Partido_Equipo2_idx` (`equip_2` ASC)  COMMENT '',
  INDEX `fk_Partido_Arbitros1_idx` (`Arbitros_id` ASC)  COMMENT '',
  CONSTRAINT `fk_Partido_Torneo1`
    FOREIGN KEY (`Torneo_id`)
    REFERENCES `tenis`.`Torneo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Partido_Fases1`
    FOREIGN KEY (`Fases_id`)
    REFERENCES `tenis`.`Fases` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Partido_Equipo1`
    FOREIGN KEY (`equip_1`)
    REFERENCES `tenis`.`Equipo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Partido_Equipo2`
    FOREIGN KEY (`equip_2`)
    REFERENCES `tenis`.`Equipo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Partido_Arbitros1`
    FOREIGN KEY (`Arbitros_id`)
    REFERENCES `tenis`.`Arbitro` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tenis`.`Gestion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tenis`.`Gestion` (
  `id_gestion` INT NOT NULL COMMENT '',
  `nombre` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`id_gestion`)  COMMENT '')
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;



CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;