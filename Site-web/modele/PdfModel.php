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


 // Fonction de lecture des informations 
  public function tabPdf($num_contrat_loc) {
    $this->pdoStatement = $this->pdo->prepare("SELECT lib_agence, add_agence, agence.id_agence_villecp, tel_agence, fax_agence, lib_modele, lib_marque, immat_veh, nom_client, prenom_client, email_client, tel_client, add_facturation, raisonS_societe,
ville_villecp as villeclient, cp_villecp as cpclient, lib_accessoire, prix_journaHT_accessoire, prix_journalier_veh, qtite, date_debut, date_fin
FROM villecp
  LEFT JOIN client on client.id_client_villecp = villecp.id_villecp
  LEFT JOIN contrat_loc on contrat_loc.id_contrat_loc_client = client.id_client
  LEFT JOIN vehicule on vehicule.id_veh = contrat_loc.id_contrat_loc_vehicule
  LEFT JOIN modele on modele.id_modele = vehicule.id_modele_vehicule
  LEFT JOIN marque on marque.id_marque = modele.id_marque_modele
  LEFT JOIN agence on agence.id_agence = contrat_loc.id_contrat_loc_agence
  LEFT JOIN choisit on choisit.id_choisit_contrat_loc = contrat_loc.num_contrat_loc
  LEFT JOIN accessoire on accessoire.id_accessoire = choisit.id_choisit_accessoire
  where num_contrat_loc = :num_contrat_loc");
    $this->pdoStatement->bindValue(':num_contrat_loc', $num_contrat_loc, PDO::PARAM_INT);
    $this->pdoStatement->execute();
    $infosPdf = $this->pdoStatement->fetchAll(PDO::FETCH_ASSOC);

    return $infosPdf;
  }

}