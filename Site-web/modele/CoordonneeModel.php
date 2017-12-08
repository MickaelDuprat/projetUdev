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
    $this->pdoStatement = $this->pdo->prepare("SELECT id_client, raisonS_societe, id_membre_statut_membre, siret_societe, nomC_societe, lib_civ, nom_client, prenom_client, add_facturation, dateN_client, add1_client, add2_client, cp_villecp, ville_villecp, nom_pays, password_membre, tel_client, email_client FROM client
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

  // Fonction permettant de récupérer l'id d'une ville et d'un code postal donné !!!!
  public function selectIdVilleCp($cpVille) {
    $this->pdoStatement = $this->pdo->prepare("SELECT id_villecp FROM villecp WHERE cp_villecp = :cp_villecp");
    $this->pdoStatement->bindValue(':cp_villecp', $cpVille, PDO::PARAM_STR);
    $this->pdoStatement->execute();
    $idVille = $this->pdoStatement->fetch(PDO::FETCH_ASSOC);
    
    return $idVille;
  }

  // Fonction de modification des données clients

  public function updateInfo($id_client, $civ, $nom, $prenom, $dateN, $adresse1, $adresse2, $adresseFact, $cpVille, $ville, $pays, $telephone, $email, $raisonSociale, $siret, $nomSociete) {
    $this->pdoStatement = $this->pdo->prepare("UPDATE client SET lib_civ = :civ AND nom_client = :nom AND prenom_client = :prenom AND dateN_client = :dateN AND add1_client = :adresse1 AND add2_client = :adresse2 AND add_facturation = :adresseFact AND cp_villecp = :cpVille AND ville_villecp := ville AND nom_pays := pays AND tel_client = :telephone AND email_client = :email AND raisonS_societe = :raisonSociale AND siret_societe = :siret AND nomC_societe = :nomSociete
      WHERE id_client = :id_client");
      $this->pdoStatement->bindValue(':id_client', $id_client, PDO::PARAM_INT);
      $this->pdoStatement->bindValue(':civ', $civ, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':nom', $nom, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':prenom', $prenom, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':dateN', $dateN, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':adresse1', $adresse1, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':adresse2', $adresse2, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':adresseFact', $adresseFact, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':cpVille', $cpVille, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':ville', $ville, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':pays', $pays, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':telephone', $telephone, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':email', $email, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':raisonSociale', $raisonSociale, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':siret', $siret, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':nomSociete', $nomSociete, PDO::PARAM_STR);
      $this->pdoStatement->execute();
      $tab = $this->pdoStatement->rowCount();

      return $tab;
  }

  // Fonction de modification des données clients

  public function updateInfoMembre($id_membre, $mdp) {
    $this->pdoStatement = $this->pdo->prepare("UPDATE membre SET password_membre = :mdp WHERE id_membre = :id_membre");
      $this->pdoStatement->bindValue(':id_membre', $id_membre, PDO::PARAM_INT);
      $this->pdoStatement->bindValue(':mdp', $mdp, PDO::PARAM_STR);
      $this->pdoStatement->execute();
      $tab = $this->pdoStatement->rowCount();

      return $tab;
  }

}




