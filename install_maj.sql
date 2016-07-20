ALTER TABLE `impro_comediens` CHANGE `debutimprocite` `debutImprocite` MEDIUMTEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
CHANGE `affichernom` `afficherNom` INT(11) NULL DEFAULT '0', 
CHANGE `notif_email` `notifEmail` INT(1) NOT NULL DEFAULT '1',
CHANGE `password` `motDePasse` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '';

ALTER TABLE `impro_comediens` ADD `dateDeNaissance` DATE NOT NULL AFTER `nom`;
ALTER TABLE `impro_comediens` ADD `actif` BOOLEAN NOT NULL DEFAULT TRUE AFTER `notifEmail`;

UPDATE `impro_comediens` SET `dateDeNaissance` = CONCAT(CAST(`annee` AS CHAR), '-', CAST(`mois` AS CHAR), '-', CAST(`jour` AS CHAR));
UPDATE `impro_comediens` SET `actif` = false WHERE `saison` < 3000;

UPDATE `impro_comediens` SET `motDePasse` = MD5(CONCAT("blobi123", `motDePasse`));

ALTER TABLE `impro_comediens` ADD `phraseImpro` VARCHAR(144) NOT NULL AFTER `adresse`;

ALTER TABLE `impro_comediens`
  DROP `jour`,
  DROP `mois`,
  DROP `annee`,
  DROP `saison`;

CREATE TABLE `impro_params` (
  `nom` varchar(96) NOT NULL,
  `libelle` varchar(256) NOT NULL,
  `valeur` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `impro_params`
  ADD UNIQUE KEY `nom` (`nom`);

CREATE TABLE `improcite`.`impro_spectacle_role` ( `spectacle` INT NOT NULL ,  `role` varchar(30) NOT NULL , `comedien` INT NOT NULL ) ENGINE = InnoDB;
ALTER TABLE `impro_spectacle_role` ADD PRIMARY KEY( `spectacle`, `role`, `comedien`);

CREATE TABLE `improcite`.`impro_entrainement` ( `spectacle` INT NOT NULL ,  `role` varchar(30) NOT NULL , `joueur` INT NOT NULL ) ENGINE = InnoDB;

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

CREATE VIEW impro_v_stat_role
AS
SELECT impro_spectacle.id, impro_spectacle.date, impro_spectacle_role.role, impro_spectacle_role.comedien FROM impro_spectacle JOIN impro_spectacle_role ON impro_spectacle_role.spectacle = impro_spectacle.id;

/*
ajouter table param avec contenu

gérer liste intervenants : mail, tel, tarif, liste des interventions
`+ respo training

ajouter index sur spectacle role
 */

/* ?? A quoi servent afficherNom et notifEmail */