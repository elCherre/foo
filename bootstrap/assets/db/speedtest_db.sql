-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema speedtest
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema speedtest
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `speedtest` DEFAULT CHARACTER SET utf8 ;
USE `speedtest` ;

-- -----------------------------------------------------
-- Table `speedtest`.`report`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `speedtest`.`report` ;

CREATE TABLE IF NOT EXISTS `speedtest`.`report` (
  `idReport` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(35) NOT NULL,
  `type` TINYINT(1) NOT NULL,
  `time` DATETIME NOT NULL,
  `shift` CHAR(2) NOT NULL,
  `url` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idReport`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
