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

   /** 
    * Exemple
    * de CRUD (Afficher, Créer, Modifier, Supprimer)
    *
    **/

  // Fonction de lecture d'une information
  public function read($login, $password) {
      $this->pdoStatement = $this->pdo->prepare("SELECT id, login FROM membre WHERE login = :login AND password = :password");
      $this->pdoStatement->bindValue(':login', $login, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':password', $password, PDO::PARAM_STR);
      $this->pdoStatement->execute();
      $membre = $this->pdoStatement->fetch(PDO::FETCH_ASSOC);

      return $membre;
  }

}




