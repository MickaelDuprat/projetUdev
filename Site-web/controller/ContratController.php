<?php

include_once(dirname(__FILE__).'/../root.php');

include_once(ROOT .'/modele/ContratModel.php');

$ctrl = new ContratController();

if (isset($_POST['valideTarif'])) {
  $_SESSION['tab'] = $_POST['tab'];
}

if (isset($_POST['paye'])) {

    $dateNow = $_POST['dateNow'];
    $dateDepart = $_POST['dateDepart'];
    $dateArrivee = $_POST['dateArrivee'];
    $idClient = $_POST['idClient'];
    $idVehicule = $_POST['idVehicule'];
    $agence = $_POST['agence'];
    
    $jsonTab = json_decode($ctrl->setContrat($dateNow, $dateDepart, $dateArrivee, $idClient, $idVehicule, $agence), true);
    $jsonTab2 = json_decode($ctrl->getLastContrat($idClient), true);

    $num_contrat_loc = $jsonTab2['result']['dernier_contrat_loc'];

   
    $sql = "";
    
    foreach ($_SESSION['tab'] as $key => $value) {
        $sql = "INSERT INTO choisit (qtite, pk_num_contrat_loc, pk_id_accessoire, id_choisit_contrat_loc, id_choisit_accessoire) VALUES (".$value.", ".$num_contrat_loc.", ".$key.", ".$num_contrat_loc.", ".$key.");";
        $ctrl->setAccessoires($sql);
    }
    
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
  

  // Fonction de récupération du dernier numéro de contrat de location avec id du client

  public function getLastContrat($id){
     
      $infos = $this->manager->selectLastContrat($id);

      if($infos){
        $json = json_encode(['success' => true, 'result' => $infos]);
      } else {
        $json = json_encode(['success' => false]);
      }
      
      return $json;

  }

}

