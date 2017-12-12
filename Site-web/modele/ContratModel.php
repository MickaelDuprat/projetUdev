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

    $this->pdoStatement = $this->pdo->prepare("INSERT INTO contrat_loc (date_contrat, date_debut, date_fin, caution, statut_facturation, id_contrat_loc_client, caution) VALUES (:dateNow, :dateDepart, :dateArrivee, :caution, :statutFact, :idClient, :idVehicule, :agence)");

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


  // Fonction de lecture de l'id du client

  public function selectIdClient($id) {

    $this->pdoStatement = $this->pdo->prepare("SELECT id_membre_client FROM membre WHERE id_membre = :id");
    $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
    $this->pdoStatement->execute();
    $infos = $this->pdoStatement->fetch(PDO::FETCH_ASSOC);
    return $infos;
  }

}