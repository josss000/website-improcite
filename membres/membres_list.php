<?php

require_once ("tete.php");

?>

<div class="row">
<?php

	$manager = new comedien_gestion($bdd);
	$comediens = $manager->getListComediens();

	foreach ($comediens as $comedien)
	{
?>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">

<?php
//			$manager->afficheCartouche($comedien,true)

?>
        <div class="card card-userlist">
            <div class="image">
                <img src="../img/profil_background_widget.jpg" alt="..."/>
            </div>
            <div class="content">
                <div class="author">
<?php
                  echo "<img class='avatar border-white' src='../img/profil/".$comedien->getLogin().".jpg' alt='".$comedien->getPrenom()."'/>\n";
                  echo "<h4 class='title'>".$comedien->getPrenom()."<br />\n";
                  echo "<a href='mailto:".$comedien->getEmail()."'><small>".$comedien->getEmail()."</small></a><br>\n";
                  echo "<small>".$comedien->getPortable()."</small></h4></div>\n";
                  echo "<hr>";
                  echo "<div class='adresse'><small>".$comedien->getAdresse()."</small>\n";
                  echo "\n</div>\n";

?>        
            </div>
        </div>
    </div>

<?php } ?>

</div>

<?php

/*

    <div class="col-xs-12 col-md-6 col-lg-4">
		<div class="cartouche">
		  <img src="../img/profil/josselin.jpg" alt="">
		  <article>
		    <b>Josselin</b>
		    <br>
				<i class="fa fa-mobile "></i> 06.35.40.01.48<br>
				<i class="fa fa-envelope-o"></i> jossssss@gmail.com<br>
				<i class="fa fa-home "></i> 64 Rue Boileau, 69 006 Lyon<br>
		  </article>
		  <nav>
		    <ul>
		      <li><i class="fa fa-envelope">7</i></li>
		      <li><i class="fa fa-envelope">2</i></li>
		      <li><i class="fa fa-envelope">9</i></li>
		    </ul>
		  </nav>
		</div>
	</div>

*/
/*
<div class="row">
    <div class="col-md-4">
		 <div class="card widget">
		 	<div class="row">
			 	<div class="col-md-4">
			       	<div class="image">
	                <img src="../img/profil_background_widget.jpg" alt="..."/>
	            	</div>
				</div>
			 	<div class="col-md-8">
			 		 <div class="content">
					 	 <div class="row">
					    	Contenu, blablabla<br>
					    	blablbla<br>
					    	blbla
						</div>
					</div>
					<div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-user"></i> 7
                                        <i class="ti-panel"></i> 8
                                        <i class="ti-reload"></i> 9
                                        modifier
                                    </div>
     	           </div>
		 		</div>
            </div>
		</div>
	</div>
    <div class="col-md-4">
		 <div class="card">
			<div class="row">
		 		<div class="col-md-4">
			 		<div class="content header">
			             <img class="avatar border-white" src="../img/profil/josselin.jpg" alt="..."/>
			         </div>
			    </div>		
		    	<div class="col-md-8">	
				    <div class="content">
					<div class="row">
				    	Contenu, blablabla<br>
				    	blablbla<br>
				    	blbla
					    </div>
					</div>
					<div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-user"></i> 7
                                        <i class="ti-panel"></i> 8
                                        <i class="ti-reload"></i> 9
                                        modifier
                                    </div>
     	           </div>
     	       </div>
		    </div>
		</div>	
	</div>		
    <div class="col-md-4">
		 <div class="card">
		    <div class="content">
            <img class="avatar border-white" src="../img/profil/arnaud.jpg" alt="..."/>
                                  		    	Contenu, blablabla
		    </div>
		</div>
	</div>
</div>

    <div class="col-md-4">
		 <div class="card widget">
		 	<div class="row">
			 	<div class="col-md-4">
			 		 <div class="content">
			       	a
			       </div>
				</div>
			 	<div class="col-md-8">
			 		 <div class="content">
					 	 <div class="row">
					    	Contenu, blablabla<br>
					    	blablbla<br>
					    	blbla
						</div>
					</div>
					<div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-user"></i> 7
                                        <i class="ti-panel"></i> 8
                                        <i class="ti-reload"></i> 9
                                        modifier
                                    </div>
     	           </div>
		 		</div>
            </div>
		</div>
	</div>
    <div class="col-md-4">
		 <div class="card widget">
		    <div class="content">
				<div class="row">
				    <div class="col-md-5">
			 		<div class="header">
			             <img class="avatar border-white" src="../img/profil/josselin.jpg" alt="..."/>
			         </div>
			    	</div>
					<div class="col-md-7">
					Contenu, blablabla
				    </div>
				</div>
			</div>
		</div>	
	</div>		
    <div class="col-md-4">
		 <div class="card">
		    <div class="content">
            <img class="avatar border-white" src="../img/profil/arnaud.jpg" alt="..."/>
                                  		    	Contenu, blablabla
		    </div>
		</div>
	</div>
</div>
*/

include_once ("pied.php");

?>