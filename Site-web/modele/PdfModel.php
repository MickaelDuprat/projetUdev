<?php
include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/Manager.php');

// Classe modèle 

class PdfModel extends Manager {
  
  /** 
    * Déclaration des variables
    * private $variables
    *
    **/
  
  // Constructeur hérité de la classe manager
  public function __construct() {
      parent::__construct();
  }


 // Fonction de lecture des informations concernant l'agence qui a géré un contrat de location rentré en paramètre
  public function tabAgence($num_contrat_loc) {
    $this->pdoStatement = $this->pdo->prepare("SELECT lib_agence, add_agence, cp_villecp as cpagence, ville_villecp as villeagence, tel_agence, fax_agence, lib_modele, lib_marque, immat_veh
  FROM agence
  LEFT JOIN contrat_loc on contrat_loc.id_contrat_loc_agence = agence.id_agence
  LEFT JOIN vehicule on vehicule.id_veh = contrat_loc.id_contrat_loc_vehicule
  LEFT JOIN modele on modele.id_modele = vehicule.id_modele_vehicule
  LEFT JOIN marque on marque.id_marque = modele.id_marque_modele
  LEFT JOIN client on client.id_client = contrat_loc.id_contrat_loc_client
  LEFT JOIN villecp on villecp.id_villecp = agence.id_agence_villecp
  where num_contrat_loc = :num_contrat_loc");
    $this->pdoStatement->bindValue(':num_contrat_loc', $num_contrat_loc, PDO::PARAM_INT);
    $this->pdoStatement->execute();
    $infosAgence = $this->pdoStatement->fetchAll(PDO::FETCH_ASSOC);

    return $infosAgence;
  }


// Fonction de lecture des informations concernant le client concerné par un contrat de location rentré en paramètre 
  public function tabClient($num_contrat_loc) {
    $this->pdoStatement = $this->pdo->prepare("SELECT nom_client, prenom_client, add_facturation, email_client, tel_client, raisonS_societe,
  ville_villecp as villeclient, cp_villecp as cpclient
  FROM client
  LEFT JOIN contrat_loc on contrat_loc.id_contrat_loc_client = client.id_client
  LEFT JOIN villecp on villecp.id_villecp = client.id_client_villecp
  where num_contrat_loc = :num_contrat_loc");
    $this->pdoStatement->bindValue(':num_contrat_loc', $num_contrat_loc, PDO::PARAM_INT);
    $this->pdoStatement->execute();
    $infosClient = $this->pdoStatement->fetchAll(PDO::FETCH_ASSOC);

    return $infosClient;
  }

  // Fonction de lecture des informations concernant les accessoires concernés par un contrat de location rentré en paramètre 
  public function tabAccessoire($num_contrat_loc) {
    $this->pdoStatement = $this->pdo->prepare("SELECT lib_accessoire, prix_journaHT_accessoire, qtite, prix_journalier_veh, date_debut, date_fin
  FROM accessoire
  LEFT JOIN choisit on choisit.id_choisit_accessoire = accessoire.id_accessoire
  LEFT JOIN contrat_loc on contrat_loc.num_contrat_loc = choisit.id_choisit_contrat_loc
  LEFT JOIN vehicule on vehicule.id_veh = contrat_loc.id_contrat_loc_vehicule
  where num_contrat_loc = :num_contrat_loc");
    $this->pdoStatement->bindValue(':num_contrat_loc', $num_contrat_loc, PDO::PARAM_INT);
    $this->pdoStatement->execute();
    $infosAccessoire = $this->pdoStatement->fetchAll(PDO::FETCH_ASSOC);

    return $infosAccessoire;
  }

}