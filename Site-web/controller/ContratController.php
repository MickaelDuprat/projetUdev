<?php

include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/ContratModel.php');

$ctrl = new ContratController();

$jsonTab = json_decode($ctrl->getIdClient($_SESSION['id']), true);

if($jsonTab['success'] == true) {
   $idClient = $jsonTab['result']['id_membre_client'];
}

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

  public function setContrat($agence, $dateDebut, $dateFin, $prixLocTotal, $dateNow){
     
      $infos = $this->manager->insertContrat($id);

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

