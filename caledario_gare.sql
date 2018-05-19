-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema calendario-gare
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema calendario-gare
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `calendario-gare` DEFAULT CHARACTER SET utf8mb4 ;
-- -----------------------------------------------------
-- Schema scraper
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema scraper
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `scraper` DEFAULT CHARACTER SET utf8 ;
USE `calendario-gare` ;

-- -----------------------------------------------------
-- Table `calendario-gare`.`calendario_gare`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `calendario-gare`.`calendario_gare` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `poblacion` VARCHAR(250) NOT NULL,
  `web` VARCHAR(250) NOT NULL,
  `referente` VARCHAR(250) NOT NULL,
  `telefono` VARCHAR(15) NOT NULL,
  `email` VARCHAR(250) NOT NULL,
  `Organizzatore` VARCHAR(250) NOT NULL,
  `telefono2` VARCHAR(15) NOT NULL,
  `email2` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

USE `scraper` ;

-- -----------------------------------------------------
-- Table `scraper`.`calendario_gare`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scraper`.`calendario_gare` (
  `id` INT(11) NOT NULL,
  `poblacion` VARCHAR(250) NOT NULL,
  `web` VARCHAR(250) NOT NULL,
  `referente` VARCHAR(250) NOT NULL,
  `telefono` VARCHAR(25) NOT NULL,
  `email` VARCHAR(250) NOT NULL,
  `Organizzatore` VARCHAR(250) NOT NULL,
  `telefono2` VARCHAR(25) NOT NULL,
  `email2` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `scraper`.`calendariopodismo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scraper`.`calendariopodismo` (
  `referencia` INT(6) NOT NULL,
  `lugar` VARCHAR(255) NULL DEFAULT NULL,
  `dia` VARCHAR(10) NULL DEFAULT NULL,
  `fecha` DATE NULL DEFAULT NULL,
  `nombre` VARCHAR(255) NULL DEFAULT NULL,
  `km` FLOAT NULL DEFAULT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `telefonos` VARCHAR(255) NULL DEFAULT NULL,
  `nota` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`referencia`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `scraper`.`calendariopodismo2`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scraper`.`calendariopodismo2` (
  `referencia` INT(6) NOT NULL,
  `lugar` VARCHAR(25) NULL DEFAULT NULL,
  `dia` VARCHAR(10) NULL DEFAULT NULL,
  `fecha` DATE NULL DEFAULT NULL,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  `km` FLOAT NULL DEFAULT NULL,
  `email` VARCHAR(50) NULL DEFAULT NULL,
  `telefonos` VARCHAR(50) NULL DEFAULT NULL,
  `nota` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`referencia`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `scraper`.`calendariopodismo3`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scraper`.`calendariopodismo3` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `referencia` VARCHAR(6) NULL DEFAULT NULL,
  `lugar` VARCHAR(25) NULL DEFAULT NULL,
  `dia` VARCHAR(10) NULL DEFAULT NULL,
  `fecha` DATE NULL DEFAULT NULL,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  `km` DECIMAL(5,0) NULL DEFAULT NULL,
  `email` VARCHAR(50) NULL DEFAULT NULL,
  `telefonos` VARCHAR(60) NULL DEFAULT NULL,
  `nota` VARCHAR(200) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 41392
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
