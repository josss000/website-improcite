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

	<!-- Custom css -->
   	<link rel="stylesheet" href="../css/improcite.css">
    <!--  Fonts and icons     -->
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="../css/themify-icons.css" rel="stylesheet">

</head>
<body>


    <div class="main-panel">
	    <div class="content">
    	    <div class="container-fluid">
				<div class="row">
<?php

	for ($i;$i<7;$i++)
{

?>

	<div class="memberlist">
	    <div class="col-sm-4">
	    	<div class="blue">
	    		<div class="row">
		    		<div class="col-xs-4">
			    		<div class="orange">ezr
			    		</div>
	    			</div>
	        		<div class="col-xs-8">
			    		<div class="yellow">
							llkj
			    		</div>
	    			</div> 		
	    		</div>
	    	</div>
		</div>
	</div>

<?php } ?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>