ALTER TABLE `impro_comediens` CHANGE `debutimprocite` `debutImprocite` MEDIUMTEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
CHANGE `affichernom` `afficherNom` INT(11) NULL DEFAULT '0', 
CHANGE `notif_email` `notifEmail` INT(1) NOT NULL DEFAULT '1',
CHANGE `password` `motDePasse` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '';

ALTER TABLE `impro_comediens` ADD `dateDeNaissance` DATE NOT NULL AFTER `nom`;
ALTER TABLE `impro_comediens` ADD `actif` BOOLEAN NOT NULL DEFAULT TRUE AFTER `notifEmail`;

UPDATE `impro_comediens` SET `dateDeNaissance` = CONCAT(CAST(`annee` AS CHAR), '-', CAST(`mois` AS CHAR), '-', CAST(`jour` AS CHAR))
UPDATE `impro_comediens` SET `actif` = false WHERE `saison` < 3000

UPDATE `impro_comediens` SET `motDePasse` = MD5(CONCAT("blobi123", `motDePasse`)) 

ALTER TABLE `impro_comediens`
  DROP `jour`,
  DROP `mois`,
  DROP `annee`,
  DROP `saison`;

/* ?? A quoi servent afficherNom et notifEmail */