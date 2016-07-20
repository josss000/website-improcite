<?php
include_once ( "../includes/config.php" ) ;

const ALERTE_OK = 'alert-success';
const ALERTE_INFO = 'alert-info';
const ALERTE_WARNING = 'alert-warning';
const ALERTE_ERREUR = 'alert-danger';

const ROLE_JOUEUR = 0;
const ROLE_MC = 1;
const ROLE_ARBITRE = 2;
const ROLE_CATERING = 3;
const ROLE_OVS = 4;
const ROLE_CAISSE = 5;
const ROLE_REGISSEUR = 6;
const ROLE_COACH = 7;

// Permet d'auto-charger la définition des classes
// https://openclassrooms.com/courses/programmez-en-oriente-objet-en-php/utiliser-la-classe
function chargerClasse($classe)
{
  require '../classes/class_'.$classe . '.php'; // On inclut la classe correspondante au paramètre passé.
}

function getp($sName, $sDefault = "")
{
	// Post en 1er
	if (isset($_POST[$sName])) return $_POST[$sName];
	if (isset($_GET[$sName])) return $_GET[$sName];
	return $sDefault;
}

function getParam($base, $nom_param)
{
	$requete = $base->prepare("SELECT * FROM `impro_params` WHERE nom=?");
	$requete->execute(array($nom_param));
    $donnees = $requete->fetch(PDO::FETCH_ASSOC);

    return $donnees['valeur'];
}

// pour le deboggage
function printp($varname)
{
	echo "Valeur de ".$varname." : <b>".getp($varname)."</b><br><br>";
}

function alert($type, $message)
{
	echo "<div class='container'>";
	echo "<div class='alert ".$type." fade in'>";
	echo "<a href='#' class='close' data-dismiss=".$type." aria-label='close'>&times;</a>";
	echo $message;
	echo "</div>";
	echo "</div>";
}

?>