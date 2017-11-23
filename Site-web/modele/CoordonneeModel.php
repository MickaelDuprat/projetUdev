<?php
include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/Manager.php');

// Classe modèle des agences de locations

class CoordonneeModel extends Manager {
  
  /** 
    * Déclaration des variables
    * private $variables
    *
    **/
  
  // Constructeur hérité de la classe manager
  public function __construct() {
      parent::__construct();
  }


  // Fonction de lecture des informations liées à l'utilisateur
  public function informations($id) {
    $this->pdoStatement = $this->pdo->prepare("SELECT raisonS_societe, siret_societe, nomC_societe, lib_civ, nom_client, prenom_client, add_facturation, dateN_client, add1_client, add2_client, cp_villecp, ville_villecp, nom_pays, password_membre, tel_client, email_client FROM client
      INNER JOIN villecp ON villecp.id_villecp = client.id_client_villecp
      INNER JOIN pays ON pays.id_pays = villecp.id_villecp_pays
      INNER JOIN civilite ON civilite.id_civ = client.id_client_civ
      INNER JOIN membre ON membre.id_membre_client = client.id_client
      WHERE id_membre = :id");
    $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
    $this->pdoStatement->execute();
    $infos = $this->pdoStatement->fetch(PDO::FETCH_ASSOC);

    return $infos;
  }

  // Fonction de lecture de l'ensemble des pays
  public function pays() {
    $this->pdoStatement = $this->pdo->prepare("SELECT nom_pays FROM pays ORDER BY nom_pays ASC");
    $this->pdoStatement->execute();
    $pays = $this->pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    
    return $pays;
  }

  // Fonction de modification des données clients

  public function updateInfo($id) {
    $this->pdoStatement = $this->pdo->prepare("UPDATE client, civilite, villecp, pays SET raisonS_societe = :raison AND siret_societe = :siret AND nomC_societe = :nomS AND lib_civ = :civilite AND nom_client = :nom AND prenom_client = :prenom AND add_facturation = :adresseFact AND dateN_client = :dateN AND add1_client = :adresse1 AND add2_client = :adresse2 AND cp_villecp =:cpVille AND ville_villecp := ville AND nom_pays := pays AND tel_client = :tel AND email_client = :email 
      WHERE id_membre = :id");)
      $this->pdoStatement->bindValue(':id', $id_membre, PDO::PARAM_INT);
      $this->pdoStatement->execute();
      $tab = $this->pdoStatement->fetchAll(PDO::FETCH_ASSOC);

      return $tab;
  }

}




