<?php

include_once(dirname(__FILE__).'/../root.php');

include_once(ROOT .'/modele/ContratModel.php');

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

