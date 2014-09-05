# Host: 127.0.0.1  (Version: 5.6.17)
# Date: 2014-09-04 21:35:36
# Generator: MySQL-Front 5.3  (Build 4.156)

/*!40101 SET NAMES utf8 */;

#
# Data for table "cruge_authitem"
#

-- INSERT INTO `cruge_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES ('action_actividad_admin',0,'',NULL,'N;'),('action_actividad_ajaxGetActividadByRama',0,'',NULL,'N;'),('action_actividad_create',0,'',NULL,'N;'),('action_dashboard_index',0,'',NULL,'N;'),('action_participante_admin',0,'',NULL,'N;'),('action_participante_create',0,'',NULL,'N;'),('action_ramaActividad_admin',0,'',NULL,'N;'),('action_ramaActividad_ajaxGetRamaActiBySubsector',0,'',NULL,'N;'),('action_ramaActividad_create',0,'',NULL,'N;'),('action_sector_admin',0,'',NULL,'N;'),('action_sector_create',0,'',NULL,'N;'),('action_sector_update',0,'',NULL,'N;'),('action_subsector_admin',0,'',NULL,'N;'),('action_subsector_ajaxGetSubsectorBySector',0,'',NULL,'N;'),('action_subsector_create',0,'',NULL,'N;'),('action_subsector_update',0,'',NULL,'N;'),('action_ui_usermanagementadmin',0,'',NULL,'N;'),('admin',0,'',NULL,'N;');

#
# Data for table "cruge_authitemchild"
#


#
# Data for table "cruge_field"
#


#
# Data for table "cruge_session"
#


#
# Data for table "cruge_system"
#

INSERT INTO `cruge_system` (`idsystem`,`name`,`largename`,`sessionmaxdurationmins`,`sessionmaxsameipconnections`,`sessionreusesessions`,`sessionmaxsessionsperday`,`sessionmaxsessionsperuser`,`systemnonewsessions`,`systemdown`,`registerusingcaptcha`,`registerusingterms`,`terms`,`registerusingactivation`,`defaultroleforregistration`,`registerusingtermslabel`,`registrationonlogin`) VALUES (1,'default',NULL,800,10,1,-1,-1,0,0,0,0,NULL,0,'','',1);

#
# Data for table "cruge_user"
#

INSERT INTO `cruge_user` (`iduser`,`regdate`,`actdate`,`logondate`,`username`,`email`,`password`,`authkey`,`state`,`totalsessioncounter`,`currentsessioncounter`) VALUES (1,NULL,NULL,1409881790,'admin','armand1live@gmail.com','admin','admin',1,0,0);

#
# Data for table "cruge_fieldvalue"
#


#
# Data for table "cruge_authassignment"
#


#
# Data for table "provincia"
#


#
# Data for table "canton"
#


#
# Data for table "parroquia"
#


#
# Data for table "barrio"
#


#
# Data for table "direccion"
#


#
# Data for table "sector"
#

INSERT INTO `sector` (`id`,`nombre`,`estado`) VALUES (1,'Primario','ACTIVO'),(2,'Secundario','ACTIVO'),(3,'Terciario','ACTIVO'),(4,'Cuaternario','ACTIVO');

#
# Data for table "subsector"
#

INSERT INTO `subsector` (`id`,`nombre`,`estado`,`sector_id`) VALUES (1,'Agropecuario','ACTIVO',1),(2,'Pesquero','ACTIVO',1),(3,'Minero','ACTIVO',1),(4,'Forestal','ACTIVO',1),(5,'Industrial','ACTIVO',2),(6,'Energético','ACTIVO',2),(7,'Artesanal','ACTIVO',2),(8,'Transportes','ACTIVO',3),(9,'Comunicaciones','ACTIVO',3),(10,'Comercial','ACTIVO',3),(11,'Turístico','ACTIVO',3),(12,'Educativo','ACTIVO',3),(13,'Financiero','ACTIVO',3),(14,'Investigación','ACTIVO',4),(15,'Desarrollo','ACTIVO',4),(16,'Innovación','ACTIVO',4);

#
# Data for table "rama_actividad"
#


#
# Data for table "actividad"
#


#
# Data for table "participante"
#

