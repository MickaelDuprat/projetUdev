<?php
include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/Manager.php');

// Classe modèle 

class ContratModel extends Manager {
  
  /** 
    * Déclaration des variables
    * private $variables
    *
    **/
  
  // Constructeur hérité de la classe manager
  public function __construct() {
      parent::__construct();
  }


  // Fonction de lecture des informations 
  public function tab($id) {
    $this->pdoStatement = $this->pdo->prepare("SELECT num_contrat_loc, date_contrat, nom_client, prenom_client, add_facturation, lib_marque, lib_modele, path_img, date_contrat, date_debut, date_fin, id_membre
    FROM membre
    LEFT JOIN client
    on client.id_client = membre.id_membre_client
    LEFT JOIN villecp
    on villecp.id_villecp = client.id_client_villecp 
    LEFT JOIN contrat_loc
    on contrat_loc.id_contrat_loc_client = client.id_client
    LEFT JOIN vehicule
    on vehicule.id_veh = contrat_loc.id_contrat_loc_vehicule
    LEFT JOIN modele
    on modele.id_modele = vehicule.id_modele_vehicule
    LEFT JOIN marque 
    on marque.id_marque = modele.id_marque_modele
    WHERE id_membre = :id");
    $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
    $this->pdoStatement->execute();
    $infos = $this->pdoStatement->fetchAll(PDO::FETCH_ASSOC);

    return $infos;
  }


  // Fonction de lecture des informations 
  public function insertContrat($dateNow, $dateDepart, $dateArrivee, $idClient, $idVehicule, $agence) {

    // Se rappeler de mettre le statut à 0

    $this->pdoStatement = $this->pdo->prepare("INSERT INTO contrat_loc (date_contrat, date_debut, date_fin, caution, statut_facturation, id_contrat_loc_client, id_contrat_loc_vehicule, id_contrat_loc_agence) VALUES (:dateNow, :dateDepart, :dateArrivee, :caution, :statutFact, :idClient, :idVehicule, :agence)");

    $this->pdoStatement->bindValue(':dateNow', $dateNow, PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':dateDepart', $dateDepart, PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':dateArrivee', $dateArrivee, PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':caution', 1500, PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':statutFact', 0, PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':idClient', $idClient, PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':idVehicule', $idVehicule, PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':agence', $agence, PDO::PARAM_INT);
    $this->pdoStatement->execute();

    $infos = $this->pdoStatement->rowCount();
    
    return $infos;
  }

  // Fonction d'ajout d'accessoires à un contrat de location
  public function insertAccessoires($sql) {

    $this->pdoStatement = $this->pdo->prepare($sql);
    $this->pdoStatement->execute();

    $infos = $this->pdoStatement->rowCount();

    return $infos;
  }

  // Fonction de lecture de l'id du client

  public function selectIdClient($id) {

    $this->pdoStatement = $this->pdo->prepare("SELECT id_membre_client FROM membre WHERE id_membre = :id");
    $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
    $this->pdoStatement->execute();

    $infos = $this->pdoStatement->fetch(PDO::FETCH_ASSOC);

    return $infos;
  }

  // Fonction de lecture du dernier contrat de location à partir de l'id du client

  public function selectLastContrat($id) {

    $this->pdoStatement = $this->pdo->prepare("SELECT max(num_contrat_loc) as dernier_contrat_loc from contrat_loc 
  left join client
  on client.id_client = contrat_loc.id_contrat_loc_client
  where id_client = :id");
    $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
    $this->pdoStatement->execute();

    $infos = $this->pdoStatement->fetch(PDO::FETCH_ASSOC);

    return $infos;
  }

// Fonction de suppression d'un contrat de location à partir du numéro de contrat de la table choissit (à faire en premier étant donné la clé étrangère)
  public function deleteAccessoireContrat($pk_num_contrat_loc) {

    $this->pdoStatement = $this->pdo->prepare("DELETE FROM choisit WHERE pk_num_contrat_loc = :pk_num_contrat_loc");

    $this->pdoStatement->bindValue(':pk_num_contrat_loc', $pk_num_contrat_loc, PDO::PARAM_INT);
    $this->pdoStatement->execute();

    $infos = $this->pdoStatement->rowCount();
    
    return $infos;
  }

  // Fonction de suppression d'un contrat de location à partir du numéro de contrat de la table contrat_loc 
  public function deleteContrat($num_contrat_loc) {

    $this->pdoStatement = $this->pdo->prepare("DELETE FROM contrat_loc WHERE num_contrat_loc = :num_contrat_loc");

    $this->pdoStatement->bindValue(':num_contrat_loc', $num_contrat_loc, PDO::PARAM_INT);
    $this->pdoStatement->execute();

    $infos = $this->pdoStatement->rowCount();
    
    return $infos;
  }

}