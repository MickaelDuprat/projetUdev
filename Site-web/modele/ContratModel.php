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


  // Fonction de lecture des informations liées à l'aquipe de l'utilisateur
  public function tab($id) {
    $this->pdoStatement = $this->pdo->prepare("SELECT num_contrat_loc, date_contrat, nom_client, prenom_client, add_facturation, num_contrat_loc, date_contrat, date_debut, date_fin
		FROM contrat_loc 
		INNER JOIN vehicule
		on id_contrat_loc_vehicule = id_veh
		INNER JOIN marque 
		on id_contrat_loc_vehicule = id_marque
		INNER JOIN modele
		on id_contrat_loc_client = lib_modele
		INNER JOIN client 
		on id_contrat_loc_client = id_client
		INNER JOIN villecp
		on id_client_villecp = id_villecp
		WHERE id_client = :id");
    $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
    $this->pdoStatement->execute();
    $infos = $this->pdoStatement->fetchAll(PDO::FETCH_ASSOC);

    return $infos;
  }

}