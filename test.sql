DROP TABLE IF EXISTS `impro_spectacle_role`;
CREATE TABLE `improcite`.`impro_spectacle_role` ( `spectacle` INT NOT NULL ,  `role` varchar(30) NOT NULL , `comedien` INT NOT NULL ) ENGINE = InnoDB;
ALTER TABLE `impro_spectacle_role` ADD PRIMARY KEY( `spectacle`, `role`, `comedien`);

DROP TABLE IF EXISTS `impro_spectacle`;
CREATE TABLE `impro_spectacle` (
  `id` int(11) NOT NULL AUTO_INCREMENT UNIQUE PRIMARY KEY,
  `categorie` tinyint(4) NOT NULL,
  `date` datetime DEFAULT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `lieu` tinyint(4) NOT NULL DEFAULT '0',
  `tarif` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `places` int(11) NOT NULL DEFAULT '0',
  `facebook` varchar(512) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ovs` varchar(512) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `impro_training`;
CREATE TABLE `impro_training` (
  `id` int(11) NOT NULL AUTO_INCREMENT UNIQUE PRIMARY KEY,
  `date` datetime DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `theme` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `intervenant` tinyint(4) NOT NULL DEFAULT '0',
  `cr` mediumtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP VIEW IF EXISTS impro_v_stat_role;
CREATE VIEW impro_v_stat_role
AS
SELECT impro_spectacle.id, impro_spectacle.date, impro_spectacle_role.role, impro_spectacle_role.comedien FROM impro_spectacle JOIN impro_spectacle_role ON impro_spectacle_role.spectacle = impro_spectacle.id;