-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema gpsocial
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `gpsocial` ;

-- -----------------------------------------------------
-- Schema gpsocial
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `gpsocial` DEFAULT CHARACTER SET utf8 ;
USE `gpsocial` ;

-- -----------------------------------------------------
-- Table `gpsocial`.`administradores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gpsocial`.`administradores` ;

CREATE TABLE IF NOT EXISTS `gpsocial`.`administradores` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(150) NOT NULL,
  `login` VARCHAR(20) NOT NULL,
  `senha` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `login_UNIQUE` (`login` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpsocial`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gpsocial`.`usuarios` ;

CREATE TABLE IF NOT EXISTS `gpsocial`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(150) NOT NULL,
  `sobrenome` VARCHAR(150) NOT NULL,
  `email` VARCHAR(150) NOT NULL,
  `telefone` BIGINT(13) UNSIGNED NULL,
  `senha` VARCHAR(60) NOT NULL,
  `created_at` TIMESTAMP NOT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpsocial`.`cidade`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gpsocial`.`cidade` ;

CREATE TABLE IF NOT EXISTS `gpsocial`.`cidade` (
  `id` INT NOT NULL,
  `nome` VARCHAR(150) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpsocial`.`bairros`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gpsocial`.`bairros` ;

CREATE TABLE IF NOT EXISTS `gpsocial`.`bairros` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(150) NOT NULL,
  `cidade_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_bairros_cidade_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_bairros_cidade`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `gpsocial`.`cidade` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpsocial`.`ruas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gpsocial`.`ruas` ;

CREATE TABLE IF NOT EXISTS `gpsocial`.`ruas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(150) NOT NULL,
  `cep` BIGINT UNSIGNED NOT NULL,
  `bairros_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `cep_UNIQUE` (`cep` ASC),
  INDEX `fk_ruas_bairros1_idx` (`bairros_id` ASC),
  CONSTRAINT `fk_ruas_bairros1`
    FOREIGN KEY (`bairros_id`)
    REFERENCES `gpsocial`.`bairros` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpsocial`.`endereco`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gpsocial`.`endereco` ;

CREATE TABLE IF NOT EXISTS `gpsocial`.`endereco` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `numero` BIGINT UNSIGNED NOT NULL,
  `complemento` VARCHAR(200) NULL,
  `ponto_referencia` VARCHAR(200) NULL,
  `ruas_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_endereco_ruas1_idx` (`ruas_id` ASC),
  CONSTRAINT `fk_endereco_ruas1`
    FOREIGN KEY (`ruas_id`)
    REFERENCES `gpsocial`.`ruas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpsocial`.`acessibilidade`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gpsocial`.`acessibilidade` ;

CREATE TABLE IF NOT EXISTS `gpsocial`.`acessibilidade` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpsocial`.`status`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gpsocial`.`status` ;

CREATE TABLE IF NOT EXISTS `gpsocial`.`status` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(180) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpsocial`.`locais`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gpsocial`.`locais` ;

CREATE TABLE IF NOT EXISTS `gpsocial`.`locais` (
  `id` INT NOT NULL,
  `nome` VARCHAR(150) NOT NULL,
  `foto` VARCHAR(180) NOT NULL,
  `usuarios_id` INT NOT NULL,
  `endereco_id` INT NOT NULL,
  `acessibilidade_id` INT NOT NULL,
  `status_id` INT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_locais_usuarios1_idx` (`usuarios_id` ASC),
  INDEX `fk_locais_endereco1_idx` (`endereco_id` ASC),
  INDEX `fk_locais_acessibilidade1_idx` (`acessibilidade_id` ASC),
  INDEX `fk_locais_status1_idx` (`status_id` ASC),
  CONSTRAINT `fk_locais_usuarios1`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `gpsocial`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_locais_endereco1`
    FOREIGN KEY (`endereco_id`)
    REFERENCES `gpsocial`.`endereco` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_locais_acessibilidade1`
    FOREIGN KEY (`acessibilidade_id`)
    REFERENCES `gpsocial`.`acessibilidade` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_locais_status1`
    FOREIGN KEY (`status_id`)
    REFERENCES `gpsocial`.`status` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
