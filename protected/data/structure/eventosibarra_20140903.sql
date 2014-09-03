# Host: 127.0.0.1  (Version: 5.6.17)
# Date: 2014-09-03 17:08:31
# Generator: MySQL-Front 5.3  (Build 4.156)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "cruge_authitem"
#

DROP TABLE IF EXISTS `cruge_authitem`;
CREATE TABLE `cruge_authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "cruge_authitemchild"
#

DROP TABLE IF EXISTS `cruge_authitemchild`;
CREATE TABLE `cruge_authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `crugeauthitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `cruge_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `crugeauthitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `cruge_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "cruge_field"
#

DROP TABLE IF EXISTS `cruge_field`;
CREATE TABLE `cruge_field` (
  `idfield` int(11) NOT NULL AUTO_INCREMENT,
  `fieldname` varchar(20) NOT NULL,
  `longname` varchar(50) DEFAULT NULL,
  `position` int(11) DEFAULT '0',
  `required` int(11) DEFAULT '0',
  `fieldtype` int(11) DEFAULT '0',
  `fieldsize` int(11) DEFAULT '20',
  `maxlength` int(11) DEFAULT '45',
  `showinreports` int(11) DEFAULT '0',
  `useregexp` varchar(512) DEFAULT NULL,
  `useregexpmsg` varchar(512) DEFAULT NULL,
  `predetvalue` mediumblob,
  PRIMARY KEY (`idfield`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "cruge_session"
#

DROP TABLE IF EXISTS `cruge_session`;
CREATE TABLE `cruge_session` (
  `idsession` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `created` bigint(30) DEFAULT NULL,
  `expire` bigint(30) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `ipaddress` varchar(45) DEFAULT NULL,
  `usagecount` int(11) DEFAULT '0',
  `lastusage` bigint(30) DEFAULT NULL,
  `logoutdate` bigint(30) DEFAULT NULL,
  `ipaddressout` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idsession`),
  KEY `crugesession_iduser` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for table "cruge_system"
#

DROP TABLE IF EXISTS `cruge_system`;
CREATE TABLE `cruge_system` (
  `idsystem` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `largename` varchar(45) DEFAULT NULL,
  `sessionmaxdurationmins` int(11) DEFAULT '30',
  `sessionmaxsameipconnections` int(11) DEFAULT '10',
  `sessionreusesessions` int(11) DEFAULT '1' COMMENT '1yes 0no',
  `sessionmaxsessionsperday` int(11) DEFAULT '-1',
  `sessionmaxsessionsperuser` int(11) DEFAULT '-1',
  `systemnonewsessions` int(11) DEFAULT '0' COMMENT '1yes 0no',
  `systemdown` int(11) DEFAULT '0',
  `registerusingcaptcha` int(11) DEFAULT '0',
  `registerusingterms` int(11) DEFAULT '0',
  `terms` blob,
  `registerusingactivation` int(11) DEFAULT '1',
  `defaultroleforregistration` varchar(64) DEFAULT NULL,
  `registerusingtermslabel` varchar(100) DEFAULT NULL,
  `registrationonlogin` int(11) DEFAULT '1',
  PRIMARY KEY (`idsystem`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for table "cruge_user"
#

DROP TABLE IF EXISTS `cruge_user`;
CREATE TABLE `cruge_user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `regdate` bigint(30) DEFAULT NULL,
  `actdate` bigint(30) DEFAULT NULL,
  `logondate` bigint(30) DEFAULT NULL,
  `username` varchar(64) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL COMMENT 'Hashed password',
  `authkey` varchar(100) DEFAULT NULL COMMENT 'llave de autentificacion',
  `state` int(11) DEFAULT '0',
  `totalsessioncounter` int(11) DEFAULT '0',
  `currentsessioncounter` int(11) DEFAULT '0',
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for table "cruge_fieldvalue"
#

DROP TABLE IF EXISTS `cruge_fieldvalue`;
CREATE TABLE `cruge_fieldvalue` (
  `idfieldvalue` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `idfield` int(11) NOT NULL,
  `value` blob,
  PRIMARY KEY (`idfieldvalue`),
  KEY `fk_cruge_fieldvalue_cruge_user1` (`iduser`),
  KEY `fk_cruge_fieldvalue_cruge_field1` (`idfield`),
  CONSTRAINT `fk_cruge_fieldvalue_cruge_user1` FOREIGN KEY (`iduser`) REFERENCES `cruge_user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_cruge_fieldvalue_cruge_field1` FOREIGN KEY (`idfield`) REFERENCES `cruge_field` (`idfield`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "cruge_authassignment"
#

DROP TABLE IF EXISTS `cruge_authassignment`;
CREATE TABLE `cruge_authassignment` (
  `userid` int(11) NOT NULL,
  `bizrule` text,
  `data` text,
  `itemname` varchar(64) NOT NULL,
  PRIMARY KEY (`userid`,`itemname`),
  KEY `fk_cruge_authassignment_cruge_authitem1` (`itemname`),
  KEY `fk_cruge_authassignment_user` (`userid`),
  CONSTRAINT `fk_cruge_authassignment_cruge_authitem1` FOREIGN KEY (`itemname`) REFERENCES `cruge_authitem` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cruge_authassignment_user` FOREIGN KEY (`userid`) REFERENCES `cruge_user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "provincia"
#

DROP TABLE IF EXISTS `provincia`;
CREATE TABLE `provincia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(21) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "canton"
#

DROP TABLE IF EXISTS `canton`;
CREATE TABLE `canton` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `provincia_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_canton_provincia1_idx` (`provincia_id`),
  CONSTRAINT `fk_canton_provincia1` FOREIGN KEY (`provincia_id`) REFERENCES `provincia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "parroquia"
#

DROP TABLE IF EXISTS `parroquia`;
CREATE TABLE `parroquia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(32) NOT NULL,
  `canton_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_parroquia_canton1_idx` (`canton_id`),
  CONSTRAINT `fk_parroquia_canton1` FOREIGN KEY (`canton_id`) REFERENCES `canton` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "barrio"
#

DROP TABLE IF EXISTS `barrio`;
CREATE TABLE `barrio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `parroquia_id` int(11) NOT NULL,
  `tipo` enum('B','C') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_barrio_parroquia1_idx` (`parroquia_id`),
  CONSTRAINT `fk_barrio_parroquia1` FOREIGN KEY (`parroquia_id`) REFERENCES `parroquia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "direccion"
#

DROP TABLE IF EXISTS `direccion`;
CREATE TABLE `direccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `calle_1` varchar(128) DEFAULT NULL,
  `calle_2` varchar(128) DEFAULT NULL,
  `numero` varchar(8) DEFAULT NULL,
  `referencia` text,
  `tipo` enum('C','S','E') NOT NULL,
  `barrio_id` int(11) DEFAULT NULL,
  `parroquia_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_direccion_barrio1_idx` (`barrio_id`),
  KEY `fk_direccion_parroquia1_idx` (`parroquia_id`),
  CONSTRAINT `fk_direccion_barrio1` FOREIGN KEY (`barrio_id`) REFERENCES `barrio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_direccion_parroquia1` FOREIGN KEY (`parroquia_id`) REFERENCES `parroquia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "sector"
#

DROP TABLE IF EXISTS `sector`;
CREATE TABLE `sector` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `estado` enum('ACTIVO','INACTIVO') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for table "subsector"
#

DROP TABLE IF EXISTS `subsector`;
CREATE TABLE `subsector` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `estado` enum('ACTIVO','INACTIVO') NOT NULL,
  `sector_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_subsector_sector1_idx` (`sector_id`),
  CONSTRAINT `fk_subsector_sector1` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for table "rama_actividad"
#

DROP TABLE IF EXISTS `rama_actividad`;
CREATE TABLE `rama_actividad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `estado` enum('ACTIVO','INACTIVO') NOT NULL,
  `subsector_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rama_actividad_subsector1_idx` (`subsector_id`),
  CONSTRAINT `fk_rama_actividad_subsector1` FOREIGN KEY (`subsector_id`) REFERENCES `subsector` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for table "actividad"
#

DROP TABLE IF EXISTS `actividad`;
CREATE TABLE `actividad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `estado` enum('ACTIVO','INACTIVO') NOT NULL,
  `rama_actividad_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_actividad_rama_actividad1_idx` (`rama_actividad_id`),
  CONSTRAINT `fk_actividad_rama_actividad1` FOREIGN KEY (`rama_actividad_id`) REFERENCES `rama_actividad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for table "participante"
#

DROP TABLE IF EXISTS `participante`;
CREATE TABLE `participante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(128) NOT NULL,
  `apellidos` varchar(128) NOT NULL,
  `tipo` enum('N','E','CIA','COO','ASO') NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `direccion` text,
  `sector_id` int(11) NOT NULL,
  `subsector_id` int(11) NOT NULL,
  `rama_actividad_id` int(11) DEFAULT NULL,
  `actividad_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_persona_sector1_idx` (`sector_id`),
  KEY `fk_persona_subsector1_idx` (`subsector_id`),
  KEY `fk_persona_rama_actividad1_idx` (`rama_actividad_id`),
  KEY `fk_persona_actividad1_idx` (`actividad_id`),
  CONSTRAINT `fk_persona_sector1` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_persona_subsector1` FOREIGN KEY (`subsector_id`) REFERENCES `subsector` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_persona_rama_actividad1` FOREIGN KEY (`rama_actividad_id`) REFERENCES `rama_actividad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_persona_actividad1` FOREIGN KEY (`actividad_id`) REFERENCES `actividad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
