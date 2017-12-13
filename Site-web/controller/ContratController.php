<?php

include_once(dirname(__FILE__).'/../root.php');

include_once(ROOT .'/modele/ContratModel.php');

$srch = new ContratController();

if (isset($_GET['typeVeh'])) {
    $catV .= "AND (";
    foreach ($_GET['typeVeh'] as $value) {
        $compteur++;
        if ($compteur > 1) {
          $catV .= " or ";
        }
        $catV .= "id_cat_veh_vehicule = ". $value;
    }
    $catV .= ")";
}

  $sql = "INSERT INTO choisit (qtite, pk_num_contrat_loc, pk_id_accessoire, id_choisit_contrat_loc, id_choisit_accessoire) VALUES (:dateNow, :dateDepart, :dateArrivee, :caution, :statutFact, :idClient, :idVehicule, :agence)";

  // $srch->setAccessoires($sql);

  // var_dump($srch->setAccessoires($sql));

// Classe controller 
class ContratController{

  /** 
    * Déclaration des variables
    * private $variables
    *
    **/

  private $manager;

  // Constructeur qui initalise un objet manager
  public function __construct(){
    $this->manager = new ContratModel();
  }


  // Fonction de génération du tableau de  contrat

  public function tabContrat($id){
     
      $infos = $this->manager->tab($id);

      if($infos){
        $json = json_encode(['success' => true, 'result' => $infos]);
      } else {
        $json = json_encode(['success' => false]);
      }
      
      return $json;

  }

  // Fonction de génération d'un nouveau contrat de location (nouvelle réservation de véhicule)

  public function setContrat($dateNow, $dateDepart, $dateArrivee, $idClient, $idVehicule, $agence){
     
      $infos = $this->manager->insertContrat($dateNow, $dateDepart, $dateArrivee, $idClient, $idVehicule, $agence);

      if($infos){
        $json = json_encode(['success' => true, 'result' => $infos]);
      } else {
        $json = json_encode(['success' => false]);
      }
      
      return $json;

  }


   // Fonction de liaison d'accessoires à un contrat

  public function setAccessoires($sql){
     
      $infos = $this->manager->insertAccessoires($sql);

      if($infos){
        $json = json_encode(['success' => true, 'result' => $infos]);
      } else {
        $json = json_encode(['success' => false]);
      }
      
      return $json;

  }

  // Fonction de récupération de l'id d'un client

  public function getIdClient($id){
     
      $infos = $this->manager->selectIdClient($id);

      if($infos){
        $json = json_encode(['success' => true, 'result' => $infos]);
      } else {
        $json = json_encode(['success' => false]);
      }
      
      return $json;

  }
  

}

