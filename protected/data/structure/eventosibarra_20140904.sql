SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `eventosibarra` ;
CREATE SCHEMA IF NOT EXISTS `eventosibarra` DEFAULT CHARACTER SET latin1 ;
USE `eventosibarra` ;

-- -----------------------------------------------------
-- Table `eventosibarra`.`provincia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventosibarra`.`provincia` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(21) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `eventosibarra`.`canton`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventosibarra`.`canton` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `provincia_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_canton_provincia1_idx` (`provincia_id` ASC),
  CONSTRAINT `fk_canton_provincia1`
    FOREIGN KEY (`provincia_id`)
    REFERENCES `eventosibarra`.`provincia` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eventosibarra`.`parroquia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventosibarra`.`parroquia` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(32) NOT NULL,
  `canton_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_parroquia_canton1_idx` (`canton_id` ASC),
  CONSTRAINT `fk_parroquia_canton1`
    FOREIGN KEY (`canton_id`)
    REFERENCES `eventosibarra`.`canton` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eventosibarra`.`sector`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventosibarra`.`sector` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `estado` ENUM('ACTIVO','INACTIVO') NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eventosibarra`.`subsector`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventosibarra`.`subsector` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `estado` ENUM('ACTIVO','INACTIVO') NOT NULL,
  `sector_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_subsector_sector1_idx` (`sector_id` ASC),
  CONSTRAINT `fk_subsector_sector1`
    FOREIGN KEY (`sector_id`)
    REFERENCES `eventosibarra`.`sector` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eventosibarra`.`rama_actividad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventosibarra`.`rama_actividad` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `estado` ENUM('ACTIVO','INACTIVO') NOT NULL,
  `subsector_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_rama_actividad_subsector1_idx` (`subsector_id` ASC),
  CONSTRAINT `fk_rama_actividad_subsector1`
    FOREIGN KEY (`subsector_id`)
    REFERENCES `eventosibarra`.`subsector` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eventosibarra`.`actividad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventosibarra`.`actividad` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `estado` ENUM('ACTIVO','INACTIVO') NOT NULL,
  `rama_actividad_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_actividad_rama_actividad1_idx` (`rama_actividad_id` ASC),
  CONSTRAINT `fk_actividad_rama_actividad1`
    FOREIGN KEY (`rama_actividad_id`)
    REFERENCES `eventosibarra`.`rama_actividad` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eventosibarra`.`participante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventosibarra`.`participante` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(128) NOT NULL,
  `apellidos` VARCHAR(128) NOT NULL,
  `tipo` ENUM('N','E','CIA','COO','ASO') NOT NULL,
  `telefono` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `direccion` TEXT NULL,
  `estado` ENUM('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO',
  `sector_id` INT NOT NULL,
  `subsector_id` INT NOT NULL,
  `rama_actividad_id` INT NULL,
  `actividad_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_persona_sector1_idx` (`sector_id` ASC),
  INDEX `fk_persona_subsector1_idx` (`subsector_id` ASC),
  INDEX `fk_persona_rama_actividad1_idx` (`rama_actividad_id` ASC),
  INDEX `fk_persona_actividad1_idx` (`actividad_id` ASC),
  CONSTRAINT `fk_persona_sector1`
    FOREIGN KEY (`sector_id`)
    REFERENCES `eventosibarra`.`sector` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_persona_subsector1`
    FOREIGN KEY (`subsector_id`)
    REFERENCES `eventosibarra`.`subsector` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_persona_rama_actividad1`
    FOREIGN KEY (`rama_actividad_id`)
    REFERENCES `eventosibarra`.`rama_actividad` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_persona_actividad1`
    FOREIGN KEY (`actividad_id`)
    REFERENCES `eventosibarra`.`actividad` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eventosibarra`.`cruge_authitem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventosibarra`.`cruge_authitem` (
  `name` VARCHAR(64) NOT NULL,
  `type` INT(11) NOT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `bizrule` TEXT NULL DEFAULT NULL,
  `data` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`name`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `eventosibarra`.`cruge_user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventosibarra`.`cruge_user` (
  `iduser` INT(11) NOT NULL AUTO_INCREMENT,
  `regdate` BIGINT(30) NULL DEFAULT NULL,
  `actdate` BIGINT(30) NULL DEFAULT NULL,
  `logondate` BIGINT(30) NULL DEFAULT NULL,
  `username` VARCHAR(64) NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `password` VARCHAR(64) NULL DEFAULT NULL COMMENT 'Hashed password',
  `authkey` VARCHAR(100) NULL DEFAULT NULL COMMENT 'llave de autentificacion',
  `state` INT(11) NULL DEFAULT '0',
  `totalsessioncounter` INT(11) NULL DEFAULT '0',
  `currentsessioncounter` INT(11) NULL DEFAULT '0',
  PRIMARY KEY (`iduser`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `eventosibarra`.`cruge_authassignment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventosibarra`.`cruge_authassignment` (
  `userid` INT(11) NOT NULL,
  `bizrule` TEXT NULL DEFAULT NULL,
  `data` TEXT NULL DEFAULT NULL,
  `itemname` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`userid`, `itemname`),
  INDEX `fk_cruge_authassignment_cruge_authitem1` (`itemname` ASC),
  INDEX `fk_cruge_authassignment_user` (`userid` ASC),
  CONSTRAINT `fk_cruge_authassignment_cruge_authitem1`
    FOREIGN KEY (`itemname`)
    REFERENCES `eventosibarra`.`cruge_authitem` (`name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cruge_authassignment_user`
    FOREIGN KEY (`userid`)
    REFERENCES `eventosibarra`.`cruge_user` (`iduser`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `eventosibarra`.`cruge_authitemchild`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventosibarra`.`cruge_authitemchild` (
  `parent` VARCHAR(64) NOT NULL,
  `child` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`parent`, `child`),
  INDEX `child` (`child` ASC),
  CONSTRAINT `crugeauthitemchild_ibfk_1`
    FOREIGN KEY (`parent`)
    REFERENCES `eventosibarra`.`cruge_authitem` (`name`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `crugeauthitemchild_ibfk_2`
    FOREIGN KEY (`child`)
    REFERENCES `eventosibarra`.`cruge_authitem` (`name`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `eventosibarra`.`cruge_field`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventosibarra`.`cruge_field` (
  `idfield` INT(11) NOT NULL AUTO_INCREMENT,
  `fieldname` VARCHAR(20) NOT NULL,
  `longname` VARCHAR(50) NULL DEFAULT NULL,
  `position` INT(11) NULL DEFAULT '0',
  `required` INT(11) NULL DEFAULT '0',
  `fieldtype` INT(11) NULL DEFAULT '0',
  `fieldsize` INT(11) NULL DEFAULT '20',
  `maxlength` INT(11) NULL DEFAULT '45',
  `showinreports` INT(11) NULL DEFAULT '0',
  `useregexp` VARCHAR(512) NULL DEFAULT NULL,
  `useregexpmsg` VARCHAR(512) NULL DEFAULT NULL,
  `predetvalue` MEDIUMBLOB NULL DEFAULT NULL,
  PRIMARY KEY (`idfield`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `eventosibarra`.`cruge_fieldvalue`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventosibarra`.`cruge_fieldvalue` (
  `idfieldvalue` INT(11) NOT NULL AUTO_INCREMENT,
  `iduser` INT(11) NOT NULL,
  `idfield` INT(11) NOT NULL,
  `value` BLOB NULL DEFAULT NULL,
  PRIMARY KEY (`idfieldvalue`),
  INDEX `fk_cruge_fieldvalue_cruge_user1` (`iduser` ASC),
  INDEX `fk_cruge_fieldvalue_cruge_field1` (`idfield` ASC),
  CONSTRAINT `fk_cruge_fieldvalue_cruge_user1`
    FOREIGN KEY (`iduser`)
    REFERENCES `eventosibarra`.`cruge_user` (`iduser`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cruge_fieldvalue_cruge_field1`
    FOREIGN KEY (`idfield`)
    REFERENCES `eventosibarra`.`cruge_field` (`idfield`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `eventosibarra`.`cruge_session`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventosibarra`.`cruge_session` (
  `idsession` INT(11) NOT NULL AUTO_INCREMENT,
  `iduser` INT(11) NOT NULL,
  `created` BIGINT(30) NULL DEFAULT NULL,
  `expire` BIGINT(30) NULL DEFAULT NULL,
  `status` INT(11) NULL DEFAULT '0',
  `ipaddress` VARCHAR(45) NULL DEFAULT NULL,
  `usagecount` INT(11) NULL DEFAULT '0',
  `lastusage` BIGINT(30) NULL DEFAULT NULL,
  `logoutdate` BIGINT(30) NULL DEFAULT NULL,
  `ipaddressout` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idsession`),
  INDEX `crugesession_iduser` (`iduser` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `eventosibarra`.`cruge_system`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventosibarra`.`cruge_system` (
  `idsystem` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `largename` VARCHAR(45) NULL DEFAULT NULL,
  `sessionmaxdurationmins` INT(11) NULL DEFAULT '30',
  `sessionmaxsameipconnections` INT(11) NULL DEFAULT '10',
  `sessionreusesessions` INT(11) NULL DEFAULT '1' COMMENT '1yes 0no',
  `sessionmaxsessionsperday` INT(11) NULL DEFAULT '-1',
  `sessionmaxsessionsperuser` INT(11) NULL DEFAULT '-1',
  `systemnonewsessions` INT(11) NULL DEFAULT '0' COMMENT '1yes 0no',
  `systemdown` INT(11) NULL DEFAULT '0',
  `registerusingcaptcha` INT(11) NULL DEFAULT '0',
  `registerusingterms` INT(11) NULL DEFAULT '0',
  `terms` BLOB NULL DEFAULT NULL,
  `registerusingactivation` INT(11) NULL DEFAULT '1',
  `defaultroleforregistration` VARCHAR(64) NULL DEFAULT NULL,
  `registerusingtermslabel` VARCHAR(100) NULL DEFAULT NULL,
  `registrationonlogin` INT(11) NULL DEFAULT '1',
  PRIMARY KEY (`idsystem`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `eventosibarra`.`barrio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventosibarra`.`barrio` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `parroquia_id` INT(11) NOT NULL,
  `tipo` ENUM('B','C') NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_barrio_parroquia1_idx` (`parroquia_id` ASC),
  CONSTRAINT `fk_barrio_parroquia1`
    FOREIGN KEY (`parroquia_id`)
    REFERENCES `eventosibarra`.`parroquia` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eventosibarra`.`direccion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventosibarra`.`direccion` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `calle_1` VARCHAR(128) NULL DEFAULT NULL,
  `calle_2` VARCHAR(128) NULL DEFAULT NULL,
  `numero` VARCHAR(8) NULL DEFAULT NULL,
  `referencia` TEXT NULL DEFAULT NULL,
  `tipo` ENUM('C','S','E') NOT NULL,
  `barrio_id` INT NULL,
  `parroquia_id` INT(11) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_direccion_barrio1_idx` (`barrio_id` ASC),
  INDEX `fk_direccion_parroquia1_idx` (`parroquia_id` ASC),
  CONSTRAINT `fk_direccion_barrio1`
    FOREIGN KEY (`barrio_id`)
    REFERENCES `eventosibarra`.`barrio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_direccion_parroquia1`
    FOREIGN KEY (`parroquia_id`)
    REFERENCES `eventosibarra`.`parroquia` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
