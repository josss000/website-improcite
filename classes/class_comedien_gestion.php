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

  public function getStatJoueur($comedien, $role)
  {
    $requete = $this->_db->query("SELECT valeur FROM `impro_params` WHERE nom='debut_saison'");
    $param = $requete->fetch(PDO::FETCH_ASSOC);

    $debut_saison = new Datetime($param['valeur']);

    $stat_sql = $this->_db->prepare("SELECT COUNT(*) AS 'valeur' FROM impro_v_stat_role WHERE role = ? AND comedien = ? AND date > ?");
    $stat_sql->execute(array($role, $comedien->getId(), $debut_saison->format("Y-m-d H:i:s")));

    return $stat_sql->fetchColumn();
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