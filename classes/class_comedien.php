<?php

class comedien
{
	private $_id;
	private $_login;
	private $_motDePasse;
	private $_surnom;
	private $_prenom;
	private $_nom;
	private $_dateDeNaissance;
	private $_email;
	private $_portable;
	private $_adresse;
	private $_phraseImpro;
	private $_qualite;
	private $_defaut;
	private $_debut;
	private $_debutImprocite;
	private $_envie;
	private $_apport;
	private $_improcite;
	private $_saison;
	private $_afficherNom;
	private $_droits;
	private $_notifEmail;
	private $_profileImage;
	private $_profileImageAlt;

	public function __construct($donnees)
	{
		$this->hydrate($donnees);
	}

	// hydrateur
	public function hydrate(array $donnees)
	{
	  foreach ($donnees as $key => $value)
	  {
	    // On récupère le nom du setter correspondant à l'attribut.
	    $method = 'set'.ucfirst($key);
	        
	    // Si le setter correspondant existe.
	    if (method_exists($this, $method))
	    {
	      // On appelle le setter.
	      $this->$method($value);
	    }
	  }

	  $this->setProfileImage("..\img\profil\\".$this->getLogin().".jpg");
	}



	// getters
	public function getId () { return $this->_id; }
	public function getLogin () { return $this->_login; }
	public function getMotDePasse () { return $this->_motdepasse; }
	public function getSurnom () { return $this->_surnom; }
	public function getPrenom () { return $this->_prenom; }
	public function getNom () { return $this->_nom; }
	public function getDateDeNaissance () { return $this->_date_naissance; }
	public function getEmail () { return $this->_email; }
	public function getPortable () { return $this->_portable; }
	public function getAdresse () { return $this->_adresse; }
	public function getPhraseImpro () { return $this->_phraseImpro; }
	public function getQualite () { return $this->_qualite; }
	public function getDefaut () { return $this->_defaut; }
	public function getDebut () { return $this->_debut; }
	public function getDebutImprocite () { return $this->_debutimprocite; }
	public function getEnvie () { return $this->_envie; }
	public function getApport () { return $this->_apport; }
	public function getImprocite () { return $this->_improcite; }
	public function getSaison () { return $this->_saison; }
	public function getAfficherNom () { return $this->_affichernom; }
	public function getDroits () { return $this->_droits; }
	public function getNotifEmail () { return $this->_notif_email; }
	public function getProfileImage () { return $this->_profileImage; }
	public function getProfileImageAlt () { return $this->_profileImageAlt; }

	// setters

	public function setId ($id) { $this->_id = $id; }
	public function setLogin ($login) { $this->_login = $login; }
	public function setMotDePasse ($motdepasse) { $this->_motdepasse = $motdepasse; }
	public function setSurnom ($surnom) { $this->_surnom = $surnom; }
	public function setPrenom ($prenom) { $this->_prenom = $prenom; }
	public function setNom ($nom) { $this->_nom = $nom; }
	public function setDateDeNaissance ($date_naissance) { $this->_date_naissance = $date_naissance; }
	public function setEmail ($email) { $this->_email = $email; }
	public function setPortable ($portable) { $this->_portable = $portable; }
	public function setAdresse ($adresse) { $this->_adresse = $adresse; }
	public function setPhraseImpro ($phraseImpro) { $this->_phraseImpro = $phraseImpro; }
	public function setQualite ($qualite) { $this->_qualite = $qualite; }
	public function setDefaut ($defaut) { $this->_defaut = $defaut; }
	public function setDebut ($debut) { $this->_debut = $debut; }
	public function setDebutImprocite ($debutimprocite) { $this->_debutimprocite = $debutimprocite; }
	public function setEnvie ($envie) { $this->_envie = $envie; }
	public function setApport ($apport) { $this->_apport = $apport; }
	public function setImprocite ($improcite) { $this->_improcite = $improcite; }
	public function setSaison ($saison) { $this->_saison = $saison; }
	public function setAfficherNom ($affichernom) { $this->_affichernom = $affichernom; }
	public function setDroits ($droits) { $this->_droits = $droits; }
	public function setNotifEmail ($notif_email) { $this->_notif_email = $notif_email; }
	public function setProfileImage ($profileImage) { $this->_profileImage = $profileImage; }
	public function setProfileImageAlt ($profileImageAlt) { $this->_profileImageAlt = $profileImageAlt; }
}
?>