# Host: localhost  (Version: 5.5.24-log)
# Date: 2014-10-06 11:28:09
# Generator: MySQL-Front 5.3  (Build 4.136)

/*!40101 SET NAMES utf8 */;

#
# Data for table "cruge_authitem"
#

INSERT INTO `cruge_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES ('action_actividad_admin',0,'',NULL,'N;'),('action_actividad_ajaxGetActividadByRama',0,'',NULL,'N;'),('action_actividad_create',0,'',NULL,'N;'),('action_actividad_delete',0,'',NULL,'N;'),('action_actividad_update',0,'',NULL,'N;'),('action_dashboard_index',0,'',NULL,'N;'),('action_evento_admin',0,'',NULL,'N;'),('action_evento_create',0,'',NULL,'N;'),('action_evento_delete',0,'',NULL,'N;'),('action_evento_generateUrl',0,'',NULL,'N;'),('action_evento_update',0,'',NULL,'N;'),('action_evento_view',0,'',NULL,'N;'),('action_participante_admin',0,'',NULL,'N;'),('action_participante_create',0,'',NULL,'N;'),('action_participante_delete',0,'',NULL,'N;'),('action_participante_update',0,'',NULL,'N;'),('action_participante_view',0,'',NULL,'N;'),('action_ramaActividad_admin',0,'',NULL,'N;'),('action_ramaActividad_ajaxGetRamaActiBySubSector',0,'',NULL,'N;'),('action_ramaActividad_create',0,'',NULL,'N;'),('action_ramaActividad_delete',0,'',NULL,'N;'),('action_ramaActividad_update',0,'',NULL,'N;'),('action_reporte_exportExcel',0,'',NULL,'N;'),('action_reporte_index',0,'',NULL,'N;'),('action_sector_admin',0,'',NULL,'N;'),('action_sector_create',0,'',NULL,'N;'),('action_sector_delete',0,'',NULL,'N;'),('action_sector_update',0,'',NULL,'N;'),('action_subsector_admin',0,'',NULL,'N;'),('action_subsector_ajaxGetSubsectorBySector',0,'',NULL,'N;'),('action_subsector_create',0,'',NULL,'N;'),('action_subsector_delete',0,'',NULL,'N;'),('action_subsector_update',0,'',NULL,'N;'),('action_ui_editprofile',0,'',NULL,'N;'),('action_ui_rbacajaxsetchilditem',0,'',NULL,'N;'),('action_ui_rbacauthitemchilditems',0,'',NULL,'N;'),('action_ui_rbacauthitemcreate',0,'',NULL,'N;'),('action_ui_rbaclistroles',0,'',NULL,'N;'),('action_ui_rbacusersassignments',0,'',NULL,'N;'),('action_ui_usermanagementadmin',0,'',NULL,'N;'),('action_ui_usermanagementcreate',0,'',NULL,'N;'),('admin',0,'',NULL,'N;'),('Registrador',0,'',NULL,'N;'),('Resgistradores',2,'','','N;');

#
# Data for table "cruge_authitemchild"
#

INSERT INTO `cruge_authitemchild` (`parent`,`child`) VALUES ('Resgistradores','action_actividad_admin'),('Resgistradores','action_actividad_ajaxGetActividadByRama'),('Resgistradores','action_actividad_create'),('Resgistradores','action_actividad_delete'),('Resgistradores','action_actividad_update'),('Resgistradores','action_dashboard_index'),('Resgistradores','action_evento_admin'),('Resgistradores','action_evento_create'),('Resgistradores','action_evento_delete'),('Resgistradores','action_evento_generateUrl'),('Resgistradores','action_evento_update'),('Resgistradores','action_evento_view'),('Resgistradores','action_participante_admin'),('Resgistradores','action_participante_create'),('Resgistradores','action_participante_delete'),('Resgistradores','action_participante_update'),('Resgistradores','action_participante_view'),('Resgistradores','action_ramaActividad_admin'),('Resgistradores','action_ramaActividad_ajaxGetRamaActiBySubSector'),('Resgistradores','action_ramaActividad_create'),('Resgistradores','action_ramaActividad_delete'),('Resgistradores','action_ramaActividad_update'),('Resgistradores','action_reporte_exportExcel'),('Resgistradores','action_reporte_index'),('Resgistradores','action_sector_admin'),('Resgistradores','action_sector_create'),('Resgistradores','action_sector_delete'),('Resgistradores','action_sector_update'),('Resgistradores','action_subsector_admin'),('Resgistradores','action_subsector_ajaxGetSubsectorBySector'),('Resgistradores','action_subsector_create'),('Resgistradores','action_subsector_delete'),('Resgistradores','action_subsector_update'),('Resgistradores','Registrador');

#
# Data for table "cruge_field"
#


#
# Data for table "cruge_session"
#

-- INSERT INTO `cruge_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES (25,1,1412612468,1412660468,1,'::1',1,1412612468,NULL,NULL);

#
# Data for table "cruge_system"
#

INSERT INTO `cruge_system` (`idsystem`,`name`,`largename`,`sessionmaxdurationmins`,`sessionmaxsameipconnections`,`sessionreusesessions`,`sessionmaxsessionsperday`,`sessionmaxsessionsperuser`,`systemnonewsessions`,`systemdown`,`registerusingcaptcha`,`registerusingterms`,`terms`,`registerusingactivation`,`defaultroleforregistration`,`registerusingtermslabel`,`registrationonlogin`) VALUES (1,'default',NULL,800,10,1,-1,-1,0,0,0,0,NULL,0,'','',1);

#
# Data for table "cruge_user"
#

INSERT INTO `cruge_user` (`iduser`,`regdate`,`actdate`,`logondate`,`username`,`email`,`password`,`authkey`,`state`,`totalsessioncounter`,`currentsessioncounter`) VALUES (1,NULL,NULL,1412612468,'admin','armand1live@gmail.com','admin2k2014','admin2k2014',1,0,0),(2,1410482857,NULL,1410483529,'usuario0','usuario0@gmail.com','usuario0k2014','fb703204a0db9bf93dffbcb011ac7cb1',1,0,0),(3,1410482883,NULL,1410486673,'usuario2','usuario2@gmail.com','usuario2k2014','8ace9211ee4abc75887c4ea070862748',1,0,0),(4,1410482917,NULL,NULL,'usuario3','usuario3@gmail.com','usuario3k2014','7dcc46b68c51970d4c60a7eda3f29409',1,0,0),(5,1410482949,NULL,NULL,'usuario4','usuario4@gmail.com','usuario4k2014','a1ce83ba373294620995a16b01d1fd6b',1,0,0),(6,1410482973,NULL,NULL,'usuario5','usuario5@gmail.com','usuario5k2014','2026ec2622ea7a671f2ec80d459647a8',1,0,0),(7,1410482997,NULL,NULL,'usuario6','usuario6@gmail.com','usuario6k2014','34068e8bd93e4351579723f5635112b2',1,0,0),(8,1410483015,NULL,NULL,'usuario7','usuario7@gmail.com','usuario7k2014','7d713a7c452a92d6029ed15bd46238b2',1,0,0),(9,1410483038,NULL,NULL,'usuario8','usuario8@gmail.com','usuario8k2014','cfc9b5f04fb9936e676d4b7583350538',1,0,0),(10,1410483358,NULL,NULL,'usuario9','usuario9@gmail.com','usuario9k2014','d0a038e7be440c654dca543bd2c32598',1,0,0),(11,1410483376,NULL,NULL,'usuario10','usuario10@gmail.com','usuario10k2014','01fe1e279b5772f36d48da9e7d37bf14',1,0,0),(12,1410486755,NULL,1412022515,'usuario1','usuario1@gmail.com','usuario1k2014','3cadb9eb29cc2b0d05f20a8d3c54ce9e',1,0,0);

#
# Data for table "cruge_fieldvalue"
#


#
# Data for table "cruge_authassignment"
#

INSERT INTO `cruge_authassignment` (`userid`,`bizrule`,`data`,`itemname`) VALUES (1,NULL,'N;','Resgistradores'),(3,NULL,'N;','Resgistradores'),(4,NULL,'N;','Resgistradores'),(5,NULL,'N;','Resgistradores'),(6,NULL,'N;','Resgistradores'),(7,NULL,'N;','Resgistradores'),(8,NULL,'N;','Resgistradores'),(9,NULL,'N;','Resgistradores'),(10,NULL,'N;','Resgistradores'),(11,NULL,'N;','Resgistradores'),(12,NULL,'N;','Resgistradores');

#
# Data for table "evento"
#


#
# Data for table "sector"
#

INSERT INTO `sector` (`id`,`nombre`,`estado`) VALUES (1,'Primario','ACTIVO'),(2,'Secundario','ACTIVO'),(3,'Terciario','ACTIVO'),(4,'Cuaternario','ACTIVO');

#
# Data for table "subsector"
#

INSERT INTO `subsector` (`id`,`nombre`,`estado`,`sector_id`) VALUES (1,'Agricultura','ACTIVO',1),(2,'Pesquero','ACTIVO',1),(3,'Minero','ACTIVO',1),(4,'Forestal','ACTIVO',1),(5,'Industrial','ACTIVO',2),(6,'Artesanal','ACTIVO',2),(7,'Manufacturera','ACTIVO',2),(8,'Transportes','ACTIVO',3),(9,'Comunicaciones','ACTIVO',3),(10,'Comercial','ACTIVO',3),(11,'Turístico','ACTIVO',3),(12,'Educativo','ACTIVO',3),(13,'Financiero','ACTIVO',3),(14,'Investigación','ACTIVO',4),(15,'Desarrollo','ACTIVO',4),(16,'Innovación','ACTIVO',4),(17,'Ganadero','ACTIVO',1),(18,'Silvicultura','ACTIVO',1),(19,'Apicultura','ACTIVO',1),(20,'Acuicultura','ACTIVO',1),(21,'Caza','ACTIVO',1),(22,'Piscicultura','ACTIVO',1),(23,'Bienes de Producción','ACTIVO',2),(24,'Servicios en General','ACTIVO',3);

#
# Data for table "rama_actividad"
#


#
# Data for table "actividad"
#


#
# Data for table "participante"
#


#
# Data for table "participante_has_evento"
#

