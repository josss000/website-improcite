<?php

#====================================================================
# Configuration du site Improcite
# 2016 (c) Josselin GRANGER
#====================================================================

/* Debug */
$debug = 1;

# Serveur ou se situe MySQL
$host = "localhost" ;
# Utilisateur de connexion a MySQL
$user = "root" ;
# Mot de passe de connexion a MySQL
$password = "root";

# Nom de la base MySQL
$base = "improcite" ;

# salt pour le cryptage du mot de passe
$salt = "blobi123";

try
{
	$bdd = new PDO('mysql:host='.$host.';dbname='.$base.';charset=utf8', $user, $password);
	array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
    die('Echec lors de la connexion à MySQL : ' . $e->getMessage());
}


/*
Syntaxe objet mysqli

$mysqli = new mysqli("example.com", "user", "password", "database");
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : " . $mysqli->connect_error;
}

$res = $mysqli->query("SELECT 'choices to please everybody.' AS _msg FROM DUAL");
$row = $res->fetch_assoc();
echo $row['_msg'];
*/


if ($debug)
{
	error_reporting(E_ALL);
}
else
{
	error_reporting(0);
}

?>
