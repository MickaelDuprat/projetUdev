<?php

include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/AccessoireModel.php');

$accessctrl = new AccessoireController();
$tabAccesoire = json_decode($accessctrl->getAccessoire(), true);

if ($tabAccesoire['success'] == true) {
    foreach ($tabAccesoire['result'] as $value) {
      $lib_accessoire = $value['lib_accessoire'];
      $prix_accessoire = $value['prix_journaHT_accessoire'];
    }
}

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
