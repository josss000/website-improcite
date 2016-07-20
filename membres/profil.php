<?php

include_once ("tete.php");

//TODO : edit avec id en paramètre

$user_id = $_SESSION[ "comedien_id"];

$manager = new comedien_gestion($bdd);
$comedien = $manager->getComedienById($user_id);

?>

<div class="row">
    <div class="col-lg-4 col-md-5">
        <div class="card card-user">
            <div class="image">
                <img src="../img/profil_background.jpg" alt="..."/>
            </div>
            <div class="content">
                <div class="author">
<?php
                  echo "<img class='avatar border-white' src='../img/profil/".$comedien->getLogin().".jpg' alt='".$comedien->getPrenom()."'/>\n";
                  echo "<h4 class='title'>".$comedien->getSurnom()."<br />\n";
                  echo "<a href='mailto:".$comedien->getEmail()."'><small>".$comedien->getEmail()."</small></a>\n";
                  echo "</h4>\n</div>\n";
                  echo "<p class='description text-center'>";
                  echo $comedien->getPhraseImpro();
                  $manager->getStatJoueur($comedien,ROLE_JOUEUR)

?>        


                </p>
            </div>
            <hr>
            <div class="text-center">
                <div class="row">
                    <div class="col-md-3 col-md-offset-1">
<?php               echo "<h5><small>Joueur</small><br />".$manager->getStatJoueur($comedien,ROLE_JOUEUR)."</h5>\n";  ?>
                    </div>
                    <div class="col-md-4">
<?php               echo "<h5><small>MC</small><br />".$manager->getStatJoueur($comedien,ROLE_MC)."</h5>\n";  ?>
                    </div>
                    <div class="col-md-3">
<?php               echo "<h5><small>Régie</small><br />".$manager->getStatJoueur($comedien,ROLE_REGISSEUR)."</h5>\n";  ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h4 class="title">Droits</h4>
            </div>
            <div class="content">
                <ul class="list-unstyled team-members">
                            <li>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="avatar">
                                            <img src="assets/img/faces/face-0.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        DJ Khaled
                                        <br />
                                        <span class="text-muted"><small>Offline</small></span>
                                    </div>

                                    <div class="col-xs-3 text-right">
                                        <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></btn>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="avatar">
                                            <img src="assets/img/faces/face-1.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        Creative Tim
                                        <br />
                                        <span class="text-success"><small>Available</small></span>
                                    </div>

                                    <div class="col-xs-3 text-right">
                                        <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></btn>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="avatar">
                                            <img src="assets/img/faces/face-3.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        Flume
                                        <br />
                                        <span class="text-danger"><small>Busy</small></span>
                                    </div>

                                    <div class="col-xs-3 text-right">
                                        <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></btn>
                                    </div>
                                </div>
                            </li>
                        </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-7">
        <div class="card">
            <div class="header">
                <h4 class="title">Edit Profile</h4>
            </div>

            <div class="content">
                <form>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Prénom</label>
                                <input type="text" class="form-control border-input" placeholder="Prénom" value=
								<?php echo $comedien->getPrenom(); ?>
                                >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" class="form-control border-input" placeholder="Nom" value=
								<?php echo $comedien->getNom(); ?>
                                >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Date de naissance</label>
                                <input type="email" class="form-control border-input" placeholder="Date de naissance"
								<?php echo $comedien->getDateDeNaissance(); ?>
                                >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control border-input" placeholder="E-mail" value=
								<?php echo $comedien->getEmail(); ?>
                                >
                            </div>
                        </div>
                         <div class="col-md-3">
                            <div class="form-group">
                                <label>Téléphone portable</label>
                                <input type="text" class="form-control border-input" placeholder="Téléphone portable" value=
								<?php echo $comedien->getNom(); ?>
                                >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Adresse</label>
                                <input type="text" class="form-control border-input" placeholder="Adresse" value=
								<?php echo $comedien->getAdresse(); ?>
                                >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control border-input" placeholder="City" value="Melbourne">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Country</label>
                                <input type="text" class="form-control border-input" placeholder="Country" value="Australia">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Postal Code</label>
                                <input type="number" class="form-control border-input" placeholder="ZIP Code">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>About Me</label>
                                <textarea rows="5" class="form-control border-input" placeholder="Here can be your description" value="Mike">Oh so, your weak rhyme
You doubt I'll bother, reading into it
I'll probably won't, left to my own devices
But that's the difference in our opinions.</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>


</div>


<?php
include_once ("pied.php");

?>