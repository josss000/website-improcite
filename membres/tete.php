<?php

#====================================================================
# Tete des pages Improcite - Membres
# 2016 (c) Josselin GRANGER
#====================================================================
//dbg
//session_destroy();

session_start() ;
session_save_path ('sessions'); 

# Chargement de la configuration
require_once ( "../includes/config.php" ) ;
include_once ( "../includes/fonctions.php" ) ;

# Chargement automatique des classes
spl_autoload_register('chargerClasse'); 

// En-tête html
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Improcite - Espace membres</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootsrap -->
	<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/npm.js"></script>

	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>

<?php

# Page en cours
$url = $_SERVER['PHP_SELF']; 
$reg = '#^(.+[\\\/])*([^\\\/]+)$#';
$page_en_cours = preg_replace($reg, '$2', $url);

if ($page_en_cours == "identification.php")
{	
	echo "<!-- Login -->";
	echo "<link rel='stylesheet' href='../css/login.css'>";
}
else
{
?>
	<!-- Paper dashboard template   -->
	<!-- Animation library for notifications   -->
    <link href="../css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="../css/paper-dashboard.css" rel="stylesheet"/>

    <!--  Fonts and icons     -->
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="../css/themify-icons.css" rel="stylesheet">

<?php
}
?>
	<!-- Custom css -->
   	<link rel="stylesheet" href="../css/improcite.css">
</head>
<body>

<?php

# Verification de la session
if (!(isset($_SESSION['comedien_id']) && $_SESSION['comedien_prenom'] != '') && $page_en_cours <> 'identification.php')
{
	# La session n'existe pas
/*	$data_array = array ('backURL' => base64_encode($_SERVER["REQUEST_URI"]));
	$data = http_build_query($data_array);

	$context_options = array (
	        	'http' => array (
	            'method' => 'POST',
	            'header'=> "Content-type: application/x-www-form-urlencoded\r\n"."Content-Length: ".strlen($data)."\r\n",
	            'content' => $data
	            )
	        );

	$context = stream_context_create($context_options);
	$result = file_get_contents('identification.php', false, $context);
	echo $result;

	exit;*/

	// Détermine l'adresse de base du site, pour renvoyer sur la page d'identification
	// Pompé sur : http://blog.lavoie.sl/2013/02/php-document-root-path-and-url-detection.html
	$base_dir  = __DIR__; // Absolute path to your installation, ex: /var/www/mywebsite
	$doc_root  = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']); # ex: /var/www
	$base_url  = preg_replace("!^${doc_root}!", '', $base_dir); # ex: '' or '/mywebsite'
	$protocol  = empty($_SERVER['HTTPS']) ? 'http' : 'https';
	$port      = $_SERVER['SERVER_PORT'];
	$disp_port = ($protocol == 'http' && $port == 80 || $protocol == 'https' && $port == 443) ? '' : ":$port";
	$domain    = $_SERVER['SERVER_NAME'];
	$full_url  = "${protocol}://${domain}${disp_port}${base_url}/"; 

	$full_url = str_replace(' ', '%20', $full_url);

	$url = $full_url.'identification.php';
	$fields = array('backURL' => urlencode(base64_encode($_SERVER["REQUEST_URI"])));

	exit;
}

if ($page_en_cours <> 'identification.php')
{
// Menu
?>


<div class="wrapper">
	<div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Creative Tim
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="dashboard.html">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="active">
                    <a href="user.html">
                        <i class="ti-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li>
                    <a href="table.html">
                        <i class="ti-view-list-alt"></i>
                        <p>Table List</p>
                    </a>
                </li>
                <li>
                    <a href="typography.html">
                        <i class="ti-text"></i>
                        <p>Typography</p>
                    </a>
                </li>
                <li>
                    <a href="icons.html">
                        <i class="ti-pencil-alt2"></i>
                        <p>Icons</p>
                    </a>
                </li>
                <li>
                    <a href="maps.html">
                        <i class="ti-map"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.html">
                        <i class="ti-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
<?php
}
?>