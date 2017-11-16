<?php

// Classe d'initialisation des variables pour les agences de locations

class Agence {

	/** 
    * Déclaration des variables
    * private $variables
    *
    **/

    private $IdAgence;
    private $LibelleAgence;
    private $AdresseAgence;
    private $IdAgenceVehicule;
    private $IdAgenceVilleCp;

    public function __construct() {

    }

    /** 
    * Setters
    * ajout des informations dans les variables
    *
    **/

    public function setIdAgence($id) {
        $this->IdAgence = $id;
    }

    public function setLibelleAgence($libelle) {
        $this->LibelleAgence = $libelle;
    }

    public function setAdresseAgence($adresse) {
        $this->AdresseAgence = $adresse;
    }

    public function setIdAgenceVehicule($agenceVeh) {
     	$this->IdAgenceVehicule = $agenceVeh;
  	}

  	public function setIdAgenceVilleCp($agenceVille) {
     	$this->IdAgenceVilleCp = $agenceVille;
  	}

  	/** 
    * Getters
    * affichage retournés des informations via les variables
    *
    **/

    public function getIdAgence() {
        return $this->IdAgence;
    }

    public function getLibelleAgence() {
        return $this->LibelleAgence;
    }

    public function getAdresseAgence() {
        return $this->AdresseAgence;
    }

    public function getIdAgenceVehicule() {
        return $this->IdAgenceVehicule;
    }

    public function getIdAgenceIdAgenceVilleCp() {
        return $this->IdAgenceVilleCp;
    }

}


