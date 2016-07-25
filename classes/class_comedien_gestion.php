<?php

class comedien_gestion
{
  private $_db;

  const ROLE_JOUEUR = 0;
  const ROLE_MC = 1;
  const ROLE_ARBITRE = 2;
  const ROLE_CATERING = 3;
  const ROLE_OVS = 4;
  const ROLE_CAISSE = 5;
  const ROLE_REGISSEUR = 6;
  const ROLE_COACH = 7;

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function add(Comedien $comedien)
  {
    // Préparation de la requête d'insertion.
    // Exécution de la requête.

    //TODO
  }

  public function delete(Comedien $comedien)
  {
    // Exécute une requête de type DELETE.

    $requete = $this->_db->prepare('DELETE FROM impro_comediens WHERE id = '.$comedien->id()); 

	return $requete->execute();
  }

  public function getComedienById($id)
  {
	  $id = (int) $id;

    // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Comedien.
    $requete = $this->_db->prepare("SELECT * FROM impro_comediens WHERE id = ?");
	  $requete->execute(array($id));
    $donnees = $requete->fetch(PDO::FETCH_ASSOC);

    return new Comedien($donnees);

  }

  public function getComedienByNom($nom)
  {
    // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Comedien.


    $requete = $this->_db->prepare('SELECT * FROM impro_comediens WHERE nom = ?');
	  $requete->execute(array($nom));
    $donnees = $requete->fetch(PDO::FETCH_ASSOC);

    return new Comedien($donnees);
  }

  public function getComedienByLoginPassword($login, $md5password)
  {
    // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Comedien.
    $requete = $this->_db->prepare("SELECT * FROM impro_comediens WHERE login=? AND motDePasse=? AND actif=true");
	  $requete->execute(array($login,$md5password));
    $donnees = $requete->fetch(PDO::FETCH_ASSOC);

  	if ($requete->rowCount() == 1)
  	{
  	   return new Comedien($donnees);
  	}
  	else
  		return false;
   }

  public function getListComediens()
  {
    // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Comedien.
    $requete = $this->_db->query("SELECT * FROM impro_comediens WHERE actif=true");
    $donnees = $requete->fetchAll(PDO::FETCH_ASSOC);

    $comediens = [];

    foreach($donnees as $ligne)
    {
      array_push($comediens, new Comedien($ligne));
    }

    return $comediens;
  }

  public function getStatJoueur($comedien, $role)
  {
    $requete = $this->_db->query("SELECT valeur FROM `impro_params` WHERE nom='debut_saison'");
    $param = $requete->fetch(PDO::FETCH_ASSOC);

    $debut_saison = new Datetime($param['valeur']);

    $stat_sql = $this->_db->prepare("SELECT COUNT(*) AS 'valeur' FROM impro_v_stat_role WHERE role = ? AND comedien = ? AND date > ?");
    $stat_sql->execute(array($role, $comedien->getId(), $debut_saison->format("Y-m-d H:i:s")));

    return $stat_sql->fetchColumn();
  }

  public function afficheCartouche($comedien, $droits)
  {

    ?>
          <div class="row">
            <div class="col-xs-4">
              <div class="cartouche-avatar">
              <?php  echo "<img src='".$comedien->getProfileImage()."'>" ?>
              </div>
            </div>
              <div class="col-xs-8">
              <?php  echo "<div class='cartouche-titre'>".$comedien->getPrenom()."</div>"; ?>
              <div class="cartouche-info">
                  <div class="row">
                    <div class="col-xs-2"><i class="fa fa-mobile"></i>
                    </div>
                    <div class="col-xs-10"><div class="cartouche-text"><?php  echo $comedien->getPortable(); ?></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-2"><i class="fa fa-envelope-o"></i>
                    </div>
                    <div class="col-xs-10"><div class="cartouche-text"><?php  echo $comedien->getEmail(); ?></div>
                    </div>
                  </div>              
                  <div class="row">
                    <div class="col-xs-2">
                      <i class="fa fa-home"></i>
                    </div>
                    <div class="col-xs-10 adresse"><div class="cartouche-text"><?php  echo $comedien->getAdresse(); ?></div>
                    </div>
                  </div>
            </div>
            </div>    
          </div>
            <hr>
          <div class="row">
            <div class="col-xs-4">
              <?php echo "<div class='cartouche-edit'><a href='membre.php?edit=1&id=".$comedien->getId()."'><i class='fa fa-pencil-square-o'></i></a></div>"; ?>
            </div>
              <div class="col-xs-8">
                <div class="cartouche-icones">
                  <ul>
                <li><i class="fa fa-user"></i> <?php echo $this->getStatJoueur($comedien,ROLE_JOUEUR) ?> </li>
                <li><i class="fa fa-black-tie"></i> <?php echo $this->getStatJoueur($comedien,ROLE_MC) ?> </li>
                <li><i class="fa fa-sliders"></i> <?php echo $this->getStatJoueur($comedien,ROLE_REGISSEUR) ?> </li>
              </ul>
            </div>
              </div>
          </div>
  <?php
  }

  public function getList()
  {
    // Retourne la liste de tous les personnages.
  }

  public function update(Comedien $comedien)
  {
    // Prépare une requête de type UPDATE.
    // Assignation des valeurs à la requête.
    // Exécution de la requête.
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}

?>