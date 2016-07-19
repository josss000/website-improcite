<?php

include_once ("tete.php");

// Données reçues du formulaire
$login = getp("login");
$password = getp("password");
$backURL = getp("backURL");
$rememberme = getp("rememberme");
$md5password = '';

$requete_membre = false;
if (isset($_COOKIE['login']) && isset($_COOKIE['md5password']))
{
	$login = $_COOKIE['login'];
	$md5password = $_COOKIE['md5password'];
}
else if($login && $password)
{
	$md5password = md5($salt.$password);
}

// Formulaire (ou cookie) soumis

if($md5password)
{
	$manager = new comedien_gestion($bdd);
	$comedien = $manager->getComedienByLoginPassword($login,$md5password);

	if ($comedien)
	{
		$_SESSION[ "comedien_id" ] = $comedien->getId();
		$_SESSION[ "comedien_prenom" ] = $comedien->getPrenom();

		alert(ALERTE_OK,'Bienvenue '.$comedien->getPrenom());

		echo "<div class=\"text-center\">\n";
		echo "<a href=\"index.php\" class=\"btn btn-primary\" role=\"button\" title=\"Espace membres\">Clique ici si tu n'entres pas automatiquement dans 1s</a>\n" ;
		echo "</div>\n";
		
		if (!$backURL)
		{
			$backURL = "index.php";
		}
		else
		{
			$backURL = base64_decode($backURL);
		}
		
		if ($rememberme && isset($login) && isset($password))
		{
		
			// Set cookie to last 1 year 
			setcookie('login', $login, time()+60*60*24*365);
			setcookie('md5password', $md5password, time()+60*60*24*365);
		}  			
		
		echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=$backURL\">";
	}
	else
	{
		setcookie('login', '', time()+60*60*24*365);
		setcookie('md5password', '', time()+60*60*24*365);
	
		alert(ALERTE_ERREUR,'<b>Erreur</b> : Identifiant ou mot de passe incorrect');
	}
}

?>

<script type="text/javascript">
     $(document).ready(function () {
    $('.forgot-pass').click(function(event) {
      $(".pr-wrap").toggleClass("show-pass-reset");
    }); 
    
    $('.pass-reset-submit').click(function(event) {
      $(".pr-wrap").removeClass("show-pass-reset");
    }); 
});
</script>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pr-wrap">
                <div class="pass-reset">
                    <label>Oubli de mot de passe</label>
                    <input type="text" class="login" name="login" placeholder="Login" />
                    <input type="password" name="submit" value="Submit" class="pass-reset-submit btn btn-success btn-sm" />
                </div> <!-- pass-reset -->
            </div> <!-- pr-wrap -->
            <div class="wrap">
                <p class="form-title">Membres</p>
                <form class="login" method="post" action="identification.php">
	                <input type="text" name="login" placeholder="Login" />
	                <input type="password" name="password" placeholder="Mot de passe" />
	                <input type="hidden" name="backURL" value=
	                <?php echo $backURL; ?> 
	                />
	                <input type="submit" value="Entrer" class="btn btn-success btn-sm" />
	                <div class="remember-forgot">
	                    <div class="row">
	                        <div class="col-md-12">
	                            <div class="checkbox">
	                                <label><input type="checkbox" name="rememberme" />Se rappeler de moi</label>
	                            </div> <!-- checkbox -->
	                        </div> <!-- cold-md-12 -->
	                        <!--div class="col-md-6 forgot-pass-content">
	                            <a href="javascription:void(0)" class="forgot-pass">Mot de passe oublié</a>
	                        </div-->
	                    </div> <!-- row -->
	                </div> <!-- remember-forgot -->
                </form>
            </div> <!-- wrap -->
        </div> <!-- col-md-12 -->
    </div> <!-- row -->
</div> <!-- container -->

<?php


include_once ("pied.php");

?>