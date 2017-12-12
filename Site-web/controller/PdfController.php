<?php

include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/PdfModel.php');

$agencectrl = new PdfController();

$num_contrat_loc = 497;
$jsonTabAgence = json_decode($agencectrl->tabAgence($num_contrat_loc), true);

if ($jsonTabAgence['success'] == true) {

  foreach ($jsonTabAgence['result'] as $value) {
  $lib_agence = $value['lib_agence'];
  $cpagence = $value['cpagence'];
  $villeagence = $value['villeagence'];
  $tel_agence = $value['tel_agence'];
  $fax_agence = $value['fax_agence'];
  $lib_modele = $value['lib_modele'];
  $lib_marque = $value['lib_marque'];
  $immat_veh = $value['immat_veh'];
  }
}

$clientctrl = new PdfController();
$jsonTabClient = json_decode($clientctrl->tabClient($num_contrat_loc), true);

if ($jsonTabClient['success'] == true) {

  foreach ($jsonTabClient['result'] as $value) {
  $nom_client = $value['nom_client'];
  $prenom_client = $value['prenom_client'];
  $add_facturation = $value['add_facturation'];
  $email_client = $value['email_client'];
  $raisonS_societe = $value['raisonS_societe'];
  $villeclient = $value['villeclient'];
  $cpclient = $value['cpclient'];
  }
}

$accessoirectrl = new PdfController();
$jsonTabAccessoire = json_decode($accessoirectrl->tabAccessoire($num_contrat_loc), true);

if ($jsonTabAccessoire['success'] == true) {

  foreach ($jsonTabAccessoire['result'] as $value) {
  $lib_accessoire = $value['lib_accessoire'];
  $prix_journaHT_accessoire = $value['prix_journaHT_accessoire'];
  $qtite = $value['qtite'];
  $prix_journalier_veh = $value['prix_journalier_veh'];
  $date_debut = $value['date_debut'];
  $date_fin = $value['date_fin']; 
  }
}

// Classe controller 
class PdfController{

  /** 
    * Déclaration des variables
    * private $variables
    *
    **/

  private $manager;

  // Constructeur qui initalise un objet manager
  public function __construct(){
    $this->manager = new PdfModel();
  }


  // Fonction de génération du tableau des informations concernant l'agence du contrat de location en question

  public function tabAgence($num_contrat_loc){
     
      $infosAgence = $this->manager->tabAgence($num_contrat_loc);

      if($infosAgence){
        $json = json_encode(['success' => true, 'result' => $infosAgence]);
      } else {
        $json = json_encode(['success' => false]);
      }
      
      return $json;
  }

  // Fonction de génération du tableau des informations concernant le client du contrat de location en question
  public function tabClient($num_contrat_loc){
     
      $infosClient = $this->manager->tabClient($num_contrat_loc);

      if($infosClient){
        $json = json_encode(['success' => true, 'result' => $infosClient]);
      } else {
        $json = json_encode(['success' => false]);
      }
      
      return $json;
  }

  // Fonction de génération du tableau des informations concernant le client du contrat de location en question
  public function tabAccessoire($num_contrat_loc){
     
      $infosAccessoire = $this->manager->tabAccessoire($num_contrat_loc);

      if($infosAccessoire){
        $json = json_encode(['success' => true, 'result' => $infosAccessoire]);
      } else {
        $json = json_encode(['success' => false]);
      }
      
      return $json;
  }

  }

