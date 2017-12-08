<?php

include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/Manager.php');

// Classe modèle de la recherche

class FicheModel extends Manager {
  
  /** 
    * Déclaration des variables
    * private $variables
    *
    **/
  
  // Constructeur hérité de la classe manager
  public function __construct() {
      parent::__construct();
  }

  public function getVehiculebyId($id) {
      $this->pdoStatement = $this->pdo->prepare("SELECT DISTINCT  lib_modele, path_img, id_cat_veh, lib_marque, prix_journalier_veh, id_cat_veh_vehicule, nbre_bagage_veh, nbre_passager_veh, lib_boiteV, lib_clim_veh, nbre_portes_veh
    FROM vehicule
    LEFT JOIN cat_veh ON cat_veh.id_cat_veh = vehicule.id_cat_veh_vehicule
    LEFT JOIN clim_veh ON clim_veh.id_clim_veh = vehicule.id_clim_veh_vehicule
    LEFT JOIN boitev ON boitev.id_boiteV = vehicule.id_boiteV_vehicule
    LEFT JOIN modele ON modele.id_modele = vehicule.id_modele_vehicule
    LEFT JOIN marque ON marque.id_marque = modele.id_marque_modele
    LEFT JOIN contrat_loc ON contrat_loc.id_contrat_loc_vehicule = vehicule.id_veh
    WHERE id_veh = :id_veh");
    $this->pdoStatement->bindValue(':id_veh', $id, PDO::PARAM_STR);
    $this->pdoStatement->execute();
    $vehicule = $this->pdoStatement->fetchAll(PDO::FETCH_ASSOC);

    return $vehicule;
    }
    
}





