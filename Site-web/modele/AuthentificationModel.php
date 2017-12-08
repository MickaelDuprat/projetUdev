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

  // Fonction d'insert de plusieurs informations
  public function insert($typeClient, $codeCoupon, $civ, $nom, $prenom, $dateN, $adresse, $adresse2, $adresseFact, $codePostal, $ville, $pays, $password, $telephone, $email, $raisonSociale, $siret, $nomSociete){
    $this->pdoStatement = $this->pdo->prepare("INSERT INTO client (login_membre, password_membre, id_membre_client, id_membre_statut_membre) VALUES (:login, :password, 250, 1)");
    $this->pdoStatement->bindValue(':login', $login, PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':password', $password, PDO::PARAM_STR);
    $this->pdoStatement->execute();
    $inscription = $this->pdoStatement->rowCount();

    $this->pdoStatement = $this->pdo->prepare("INSERT INTO membre (login_membre, password_membre, id_membre_client, id_membre_statut_membre) VALUES (:login, :password, 250, 1)");
    $this->pdoStatement->bindValue(':login', $login, PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':password', $password, PDO::PARAM_STR);
    $this->pdoStatement->execute();
    $inscription = $this->pdoStatement->rowCount();

    return $inscription;    
  }


  public function updateInfo($login, $password) {
    $this->pdoStatement = $this->pdo->prepare("UPDATE membre SET password_membre = :password WHERE login_membre = :login");
    $this->pdoStatement->bindValue(':login', $login, PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':password', $password, PDO::PARAM_STR);
    $this->pdoStatement->execute();  
  }

}




