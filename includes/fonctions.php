<?php
const ALERTE_OK = 'alert-success';
const ALERTE_INFO = 'alert-info';
const ALERTE_WARNING = 'alert-warning';
const ALERTE_ERREUR = 'alert-danger';

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