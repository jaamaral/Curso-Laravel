-- MySQL Script generated by MySQL Workbench
-- Fri Feb  1 23:18:26 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Myapp
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Myapp
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Myapp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci ;
USE `Myapp` ;

-- -----------------------------------------------------
-- Table `Myapp`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Myapp`.`usuario` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(50) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `nombre` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `usuario_UNIQUE` (`usuario` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Myapp`.`rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Myapp`.`rol` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Myapp`.`usuario_rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Myapp`.`usuario_rol` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `rol_id` INT UNSIGNED NOT NULL,
  `usuario_id` INT UNSIGNED NOT NULL,
  `estado` TINYINT(1) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_usuario_rol_rol_idx` (`rol_id` ASC) VISIBLE,
  INDEX `fk_usuario_rol_usuario1_idx` (`usuario_id` ASC) VISIBLE,
  CONSTRAINT `fk_usuario_rol_rol`
    FOREIGN KEY (`rol_id`)
    REFERENCES `Myapp`.`rol` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_rol_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `Myapp`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Myapp`.`permiso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Myapp`.`permiso` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `slug` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `slug_UNIQUE` (`slug` ASC) VISIBLE,
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Myapp`.`permiso_rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Myapp`.`permiso_rol` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `rol_id` INT UNSIGNED NOT NULL,
  `permiso_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_permiso_rol_rol1_idx` (`rol_id` ASC) VISIBLE,
  INDEX `fk_permiso_rol_permiso1_idx` (`permiso_id` ASC) VISIBLE,
  CONSTRAINT `fk_permiso_rol_rol1`
    FOREIGN KEY (`rol_id`)
    REFERENCES `Myapp`.`rol` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_permiso_rol_permiso1`
    FOREIGN KEY (`permiso_id`)
    REFERENCES `Myapp`.`permiso` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Myapp`.`libro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Myapp`.`libro` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(100) NOT NULL,
  `isbn` VARCHAR(30) NOT NULL,
  `autor` VARCHAR(100) NOT NULL,
  `cantidad` TINYINT(2) UNSIGNED NOT NULL,
  `editorial` VARCHAR(50) NULL,
  `foto` VARCHAR(100) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `isbn_UNIQUE` (`isbn` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Myapp`.`libro_prestamo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Myapp`.`libro_prestamo` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `usuario_id` INT UNSIGNED NOT NULL,
  `libro_id` INT UNSIGNED NOT NULL,
  `fecha_prestamo` DATE NOT NULL,
  `prestado_a` VARCHAR(100) NOT NULL,
  `estado` TINYINT(1) NOT NULL DEFAULT 1,
  `fecha_devolucion` DATE NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_libro_prestamo_usuario1_idx` (`usuario_id` ASC) VISIBLE,
  INDEX `fk_libro_prestamo_libro1_idx` (`libro_id` ASC) VISIBLE,
  CONSTRAINT `fk_libro_prestamo_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `Myapp`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_libro_prestamo_libro1`
    FOREIGN KEY (`libro_id`)
    REFERENCES `Myapp`.`libro` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
