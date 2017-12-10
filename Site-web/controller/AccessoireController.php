<?php

include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/AccessoireModel.php');

$accessctrl = new AccessoireController();

   $jsonTab = json_decode($accessctrl->getAccessoire(), true);
   if($jsonTab['success'] == true) {
    foreach ($jsonTab['result'] as $value) {
      $id_accessoire = $value['id_accessoire'];
      $lib_accessoire = $value['lib_accessoire'];
      $prix_accessoire = $value['prix_journaHT_accessoire'];
      $img_path = $value['img_path'];
      $listaccessoire .= '';
 if($id_cat != 8 && $id_cat != 7){
$listaccessoire .= 
                  '<img id="'.$lib_accessoire.'" src="'.$img_path.' " alt="'.$lib_accessoire.'">
                  <p>'.$lib_accessoire.' </p> <span> '.$prix_accessoire.' € </span>
                  <li>
                  </li>';
            } else { 
                   $listaccessoire .= '';
            }
    }
  }

$dateDepart = $_GET['dateDebut'];
$dateArrivee = $_GET['dateArrivee'];
$dateDepart = str_replace("/","-",$dateDepart);
$dateArrivee = str_replace("/","-",$dateArrivee);
$dateD = strtotime($dateDepart);
$dateA = strtotime($dateArrivee);
$interval = $dateA - $dateD;
$interval = $interval/86400;
                  
$prixLoc = $prixJ * $interval;
  


// Classe controller des agences de locations

class AccessoireController{

  /** 
    * Déclaration des variables
    * private $variables
    *
    **/


  private $manager;

  // Constructeur qui initalise un objet manager instance de la classe AccessoireModel 
  public function __construct(){
    $this->manager = new AccessoireModel();
  }


  // Fonction de lecture de l'ensemble des accessoires

  public function getAccessoire(){
     
      $accessoire = $this->manager->accessoire();

      if($accessoire){
        $json = json_encode(['success' => true, 'result' => $accessoire]);
      } else {
        $json = json_encode(['success' => false]);
      }
      
      return $json;

  } 


}
