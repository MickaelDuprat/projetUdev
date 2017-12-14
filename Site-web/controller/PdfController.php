<?php

include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/PdfModel.php');

$ctrl = new PdfController();

// on récupère le dernier contrat de l'input hidden de la page remerciement mais en String
if (isset($_GET['reservation'])) {
  $strg_num_contrat_loc = $_GET['reservation'];
}

if (isset($_POST['derniercontrat'])) {
  $strg_num_contrat_loc = $_POST['derniercontrat'];
}

// on la convertit en entier pour pouvoir la donner en paramètre aux différentes fonctions qui vont créer les tableaux dans le pdf
$num_contrat_loc = intval($strg_num_contrat_loc);

$jsonTabAgence = json_decode($ctrl->tabAgence($num_contrat_loc), true);

if ($jsonTabAgence['success'] == true) {

  foreach ($jsonTabAgence['result'] as $value) {
  $lib_agence = $value['lib_agence'];
  $cpagence = $value['cpagence'];
  $villeagence = $value['villeagence'];
  $add_agence = $value['add_agence'];
  $tel_agence = $value['tel_agence'];
  $fax_agence = $value['fax_agence'];
  $lib_modele = $value['lib_modele'];
  $lib_marque = $value['lib_marque'];
  $immat_veh = $value['immat_veh'];
  $lib_marque = $value['lib_marque'];
  $lib_modele = $value['lib_modele'];
  $prix_journalier_veh = $value['prix_journalier_veh'];
  $date_debut = $value['date_debut'];
  $date_fin = $value['date_fin'];
  
  $dateDepart = implode('-', array_reverse(explode('/',$date_debut), FALSE));
  $dateArrivee = implode('-', array_reverse(explode('/',$date_fin), FALSE));
  $dateD = new DateTime($dateDepart);
  $dateD->modify("-1 day");
  $dateA = new DateTime($dateArrivee);
  $interval = $dateD->diff($dateA);
  $interval = $interval->format('%d');
  }
}

$jsonTabAccessoire = json_decode($ctrl->tabAccessoire($num_contrat_loc), true);

$jsonTabClient = json_decode($ctrl->tabClient($num_contrat_loc), true);

if ($jsonTabClient['success'] == true) {

  foreach ($jsonTabClient['result'] as $value) {
  $nom_client = $value['nom_client'];
  $prenom_client = $value['prenom_client'];
  $add_facturation = $value['add_facturation'];
  $email_client = $value['email_client'];
  $raisonS_societe = $value['raisonS_societe'];
  $villeclient = $value['villeclient'];
  $cpclient = $value['cpclient'];
  $tel_client = $value['tel_client'];
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

