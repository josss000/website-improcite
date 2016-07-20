DROP TABLE IF EXISTS `impro_spectacle_role`;
CREATE TABLE `improcite`.`impro_spectacle_role` ( `spectacle` INT NOT NULL ,  `role` varchar(30) NOT NULL , `joueur` INT NOT NULL ) ENGINE = InnoDB;
ALTER TABLE `impro_spectacle_role` ADD PRIMARY KEY( `spectacle`, `role`, `joueur`);

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
