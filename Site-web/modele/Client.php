<?php

// Classe d'initialisation des variables pour les clients

class Client {

	/** 
    * Déclaration des variables
    * private $variables
    *
    **/

    private $IdClient;
    private $NomClient;
    private $PrenomClient;
    private $DateNClient;
    private $EmailClient;
    private $TelClient;
    private $TauxRemise;
    private $AddFacturation;
    private $Add1Client;
    private $Add2Client;
    private $RaisonSSociete;
    private $SiretSociete;
    private $NomC_Societe;
    private $IdClientCiv;
    private $IdClientVilleCp;

    public function __construct() {

    }

    /** 
    * Setters
    * ajout des informations dans les variables
    *
    **/

    public function setIdClient($id) {
        $this->IdClient = $id;
    }

    public function setNomClient($nom) {
        $this->NomClient = $nom;
    }

    public function setPrenomClient($prenom) {
        $this->PrenomClient = $prenom;

    public function setDateNClient($ddn) {
    	$this->DateNClient = $ddn;
    }

    public function setEmailClient($mail) {
        $this->EmailClient = $mail;
    }

    public function setTelClient($tel) {
        $this->TelClient = $tel;
    }

    public function setAdresseFacturation($addFact) {
        $this->AdresseFacturation = $addFact;
    }

    public function setAdd1Client($add1) {
        $this->Add1Client = $add1;
    }

    public function setAdd2Client($add2) {
        $this->Add2Client = $add1;
    }

    public function setRaisonSSociete($RaisonSociale) {
     	$this->RaisonSSociete = $RaisonSociale;
  	}

  	public function setSiretSociete($siret) {
     	$this->SiretSociete = $siret;
  	}

  	public function setNomCSociete($contactSociete) {
        $this->NomCSociete = $contactSociete;
    }

    public function setIdClientCiv($civ) {
        $this->IdClientCiv = $civ;
    }

    public function setClientVilleCp($villeCp) {
        $this->ClientVilleCp = $villeCp;
    }

  	/** 
    * Getters
    * affichage retournés des informations via les variables
    *
    **/

  	public function getIdClient($id) {
       return $this->IdClient;
    }

    public function getNomClient($nom) {
       return $this->NomClient;
    }

    public function getPrenomClient($prenom) {
       return $this->PrenomClient;

    public function getDateNClient($ddn) {
    	return $this->DateNClient;
    }

    public function getEmailClient($mail) {
       return $this->EmailClient;
    }

    public function getTelClient($tel) {
       return $this->TelClient;
    }

    public function getAdresseFacturation($addFact) {
       return $this->AdresseFacturation;
    }

    public function getAdd1Client($add1) {
       return $this->Add1Client;
    }

    public function getAdd2Client($add2) {
       return $this->Add2Client;
    }

    public function getRaisonSSociete($RaisonSociale) {
    	return $this->RaisonSSociete;
  	}

  	public function getSiretSociete($siret) {
     	return $this->SiretSociete;
  	}

  	public function getNomCSociete($contactSociete) {
        return $this->NomCSociete;
    }

    public function getIdClientCiv($civ) {
        return $this->IdClientCiv;
    }

    public function getClientVilleCp($villeCp) {
       return $this->ClientVilleCp;
    }

}