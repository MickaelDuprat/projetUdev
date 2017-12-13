<?php
include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/Manager.php');

// Classe modèle des agences de locations

class AuthentificationModel extends Manager {
  
  /** 
    * Déclaration des variables
    * private $variables
    *
    **/
  
  // Constructeur hérité de la classe manager
  public function __construct() {
      parent::__construct();
  }

  // Fonction de lecture d'une information
  public function read($login) {

    $this->pdoStatement = $this->pdo->prepare("SELECT id_membre, login_membre, id_membre_statut_membre, password_membre FROM membre WHERE login_membre = :login");
    $this->pdoStatement->bindValue(':login', $login, PDO::PARAM_STR);
    $this->pdoStatement->execute();
    $membre = $this->pdoStatement->fetch(PDO::FETCH_ASSOC);
    
    return $membre;
  }

  }





