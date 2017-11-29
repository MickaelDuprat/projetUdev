<?php
include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/Manager.php');

// Classe modèle des agences de locations

class EquipeModel extends Manager {
  
  /** 
    * Déclaration des variables
    * private $variables
    *
    **/
  
  // Constructeur hérité de la classe manager
  public function __construct() {
      parent::__construct();
  }


  // Fonction de lecture des informations liées à l'aquipe de l'utilisateur
  public function tab($id) {
    $this->pdoStatement = $this->pdo->prepare("SELECT id_membre, id_membre_statut_membre, login_membre, password_membre FROM client
      INNER JOIN civilite ON civilite.id_civ = client.id_client_civ
      INNER JOIN membre ON membre.id_membre_client = client.id_client
      WHERE id_membre_statut_membre = :id");
    $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
    $this->pdoStatement->execute();
    $infos = $this->pdoStatement->fetchAll(PDO::FETCH_ASSOC);

    return $infos;
  }

  // Fonction de lecture des informations liées à l'aquipe de l'utilisateur
  public function addEquipe($login, $password) {
    $this->pdoStatement = $this->pdo->prepare("INSERT INTO membre (login_membre, password_membre, id_membre_client, id_membre_statut_membre) VALUES (:login, :password, 250, 1)");
    $this->pdoStatement->bindValue(':login', $login, PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':password', $password, PDO::PARAM_STR);
    $this->pdoStatement->execute();
    $infos = $this->pdoStatement->rowCount();

    return $infos;
  }


  // Fonction de lecture des informations liées à l'aquipe de l'utilisateur
  public function editEquipe($id, $login, $password) {
    $this->pdoStatement = $this->pdo->prepare("UPDATE membre SET login_membre = :login, password_membre = :password WHERE id_membre = :id");
    $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':login', $login, PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':password', $password, PDO::PARAM_STR);
    $this->pdoStatement->execute();
    $infos = $this->pdoStatement->rowCount();

    return $infos;
  }


  // Fonction de lecture des informations liées à l'aquipe de l'utilisateur
  public function deleteEquipe($id) {
    $this->pdoStatement = $this->pdo->prepare("DELETE FROM membre WHERE id_membre = :id");
    $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
    $this->pdoStatement->execute();
    $infos = $this->pdoStatement->rowCount();

    return $infos;
  }
}




