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

   /** 
    * Exemple
    * de CRUD (Afficher, Créer, Modifier, Supprimer)
    *
    **/

  // Fonction de lecture d'une information
  public function read($agence, $dateDepart, $dateArrive) {
    $this->pdoStatement = $this->pdo->prepare("SELECT lib_modele, lib_marque, lib_agence FROM vehicule
      left join agence on agence.id_agence = vehicule.id_agence_vehicule
      left join modele on modele.id_modele = vehicule.id_modele_vehicule
      left join marque on marque.id_marque = modele.id_marque_modele
      left join contrat_loc on contrat_loc.id_contrat_loc_vehicule = vehicule.id_veh
      where contrat_loc.date_fin < now()"); 
    $this->pdoStatement->bindValue(':lib_agence', $agence, PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':dateDepart', $dateDepart, PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':dateArrive', $dateArrive, PDO::PARAM_STR);
    $this->pdoStatement->execute();
    $recherche = $this->pdoStatement->fetch(PDO::FETCH_ASSOC);

    return $recherche;
  }

}





