<?php

require_once ("tete.php");

?>

<div class="row">
<?php

	for ($i;$i<10;$i++)
{

?>
	<div class="memberlist">
	    <div class="col-lg-4 col-md-6 col-sm-6">
	    	<div class="cartouche">
	    		<div class="row">
		    		<div class="col-xs-4">
			    		<div class="cartouche-avatar">
			    		<img src="..\img\profil\josselin.jpg">
			    		</div>
	    			</div>
	        		<div class="col-xs-8">
		        		<div class="cartouche-titre">Josselin</div>
			    		<div class="cartouche-info">
							
							telephone<br>
							mail<br>
							adresse
							<hr>
							icônes
			    		</div>
	    			</div> 		
	    		</div>
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