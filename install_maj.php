<?php

require_once("includes/config.php");
require_once("includes/fonctions.php");

echo "Table association joueurs / spectacle";

$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, true); 
$bdd->setAttribute(PDO::ERRMODE_WARNING, true); 

$date = new DateTime('now');
$test = 1;

$requete = $bdd->query("SELECT * FROM `impro_evenements`");
$donnees = $requete->fetchAll(PDO::FETCH_ASSOC);

echo $requete->rowCount()."\n";

foreach ($donnees as $row) {

	// conversion de la date ... au format date ...
	$date = DateTime::createFromFormat('YmdHis',$row['date']);
	// secondes à 0
	$date->setTime ( $date->format("H"), $date->format("i"), 0);

	if ($row['categorie'] == '1' || $row['categorie'] == '10' || $row['categorie'] == '240')
	{
		//entraînements
		$sql = "INSERT INTO impro_training (date, type, theme) VALUES ('".$date->format("Y-m-d H:i:s")."',".$row['categorie'].",".$bdd->quote($row['commentaire']).")";
		$requete = $bdd->query($sql);
	}
	else
	{
		$sql = "INSERT INTO impro_spectacle (date, categorie, description, lieu, tarif, places) VALUES ('".$date->format("Y-m-d H:i:s")."',".$bdd->quote($row['categorie']).",".$bdd->quote($row['commentaire']).",".$row['lieu'].",".$bdd->quote($row['tarif']).",".$row['places'].")";
		$requete = $bdd->query($sql);
//		$id = $bdd->lastInsertId();
		echo $sql."-- <br>";

		$sql2 = "SELECT id FROM impro_spectacle WHERE date = '".$date->format("Y-m-d H:i:s")."'";
		$requete2 = $bdd->query($sql2);
		$ligne = $requete2->fetch(PDO::FETCH_ASSOC);
		$id = $ligne[id];
		echo $id." - ".$sql2."<br>";

		// Attribution des rôles
		if ($row['joueurs'] <> ';;;;;;' && $row['joueurs'] <>'')
		{
			foreach(explode(';', $row['joueurs']) as $idJoueur)
			{
				$requete = $bdd->prepare("INSERT INTO impro_spectacle_role VALUES (?,?,?)");
				$requete->execute(array($id,ROLE_JOUEUR,$idJoueur));
			}
		}

		if (isset($row['coach']))
		{
			$requete = $bdd->prepare("INSERT INTO impro_spectacle_role VALUES (?,?,?)");
			$requete->execute(array($id,ROLE_COACH,$idJoueur));		
		}

		if (isset($row['mc']))
		{
			$requete = $bdd->prepare("INSERT INTO impro_spectacle_role VALUES (?,?,?)");
			$requete->execute(array($id,ROLE_MC,$idJoueur));		
		}

		if (isset($row['arbitre']))
		{
			$requete = $bdd->prepare("INSERT INTO impro_spectacle_role VALUES (?,?,?)");
			$requete->execute(array($id,ROLE_ARBITRE,$idJoueur));		
		}

		if (isset($row['regisseur']))
		{
			$requete = $bdd->prepare("INSERT INTO impro_spectacle_role VALUES (?,?,?)");
			$requete->execute(array($id,ROLE_REGISSEUR,$idJoueur));		
		}

		if (isset($row['caisse']))
		{
			$requete = $bdd->prepare("INSERT INTO impro_spectacle_role VALUES (?,?,?)");
			$requete->execute(array($id,ROLE_CAISSE,$idJoueur));		
		}

		if (isset($row['catering']))
		{
			$requete = $bdd->prepare("INSERT INTO impro_spectacle_role VALUES (?,?,?)");
			$requete->execute(array($id,ROLE_CATERING,$idJoueur));		
		}

		if (isset($row['regisseur']))
		{
			$requete = $bdd->prepare("INSERT INTO impro_spectacle_role VALUES (?,?,?)");
			$requete->execute(array($id,ROLE_OVS,$idJoueur));		
		}
	}
}

?>