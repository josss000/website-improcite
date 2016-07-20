<?php

class comedien_gestion
{
  private $_db;

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