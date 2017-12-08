<?php
include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/Manager.php');

// Classe modèle de la recherche

class SearchModel extends Manager {
  
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
  public function read($agence, $dateDepart, $dateArrivee) {
    $this->pdoStatement = $this->pdo->prepare("SELECT DISTINCT id_veh, id_cat_veh, lib_modele, path_img, lib_marque, prix_journalier_veh, id_cat_veh_vehicule, nbre_bagage_veh, nbre_passager_veh, lib_boiteV, lib_clim_veh, nbre_portes_veh, lib_agence, id_agence
    FROM vehicule
    LEFT JOIN cat_veh ON cat_veh.id_cat_veh = vehicule.id_cat_veh_vehicule
    LEFT JOIN clim_veh ON clim_veh.id_clim_veh = vehicule.id_clim_veh_vehicule
    LEFT JOIN boitev ON boitev.id_boiteV = vehicule.id_boiteV_vehicule
    LEFT JOIN agence ON agence.id_agence = vehicule.id_agence_vehicule
    LEFT JOIN modele ON modele.id_modele = vehicule.id_modele_vehicule
    LEFT JOIN marque ON marque.id_marque = modele.id_marque_modele
    LEFT JOIN contrat_loc ON contrat_loc.id_contrat_loc_vehicule = vehicule.id_veh
    WHERE id_agence = :agence AND id_veh NOT IN (SELECT id_veh FROM vehicule INNER JOIN contrat_loc
    ON contrat_loc.id_contrat_loc_vehicule = vehicule.id_veh 
    WHERE statut_facturation = 0
    AND contrat_loc.date_debut < :dateArrivee AND contrat_loc.date_fin > :dateDepart)");
    $this->pdoStatement->bindValue(':agence', $agence, PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':dateDepart', $dateDepart, PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':dateArrivee', $dateArrivee, PDO::PARAM_STR);
    $this->pdoStatement->execute();
    $recherche = $this->pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($recherche);
    return $recherche;
  }
}





