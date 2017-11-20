<?php

// Classe d'initialisation des variables pour les agences de locations

class Authentification {

	/** 
    * Déclaration des variables
    * private $variables
    *
    **/

    private $IdAuthentification;
    private $LoginAuthentification;
    private $PasswordAuthentification;
    private $EmailAuthentification;

    public function __construct() {

    }

    /** 
    * Setters
    * ajout des informations dans les variables
    *
    **/

    public function setIdAuthentification($id) {
        $this->IdAuthentification = $id;
    }

    public function setLoginAuthentification($login) {
        $this->LoginAuthentification = $login;
    }

    public function setPasswordAuthentification($password) {
        $this->PasswordAuthentification = $password;
    }

    public function setEmailAuthentification($email) {
     	$this->EmailAuthentification = $email;
  	}

  	/** 
    * Getters
    * affichage retournés des informations via les variables
    *
    **/

    public function getIdAuthentification() {
        return $this->IdAuthentification;
    }

    public function getLoginAuthentification() {
        return $this->LoginAuthentification;
    }

    public function getPasswordAuthentification() {
        return $this->PasswordAuthentification;
    }

    public function getEmailAuthentification() {
        return $this->EmailAuthentification;
    }

}


