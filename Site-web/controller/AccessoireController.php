<?php

include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/AccessoireModel.php');

$accessctrl = new AccessoireController();
  $listaccessoire = '';
   $jsonTab = json_decode($accessctrl->getAccessoire(), true);

   if($jsonTab['success'] == true) {
    $script = '';
    foreach ($jsonTab['result'] as $value) {
      $id_accessoire = $value['id_accessoire'];
      $lib_accessoire = $value['lib_accessoire'];
      $prix_accessoire = $value['prix_journaHT_accessoire'];
      $img_path = $value['img_path'];

      
      $script .= '<li>';
      $script .= '<img id="'.$lib_accessoire.'" src="'.$img_path.' " alt="'.$lib_accessoire.'">';
      $script .= '<p>'.$lib_accessoire.' </p> <span> '.$prix_accessoire.' € </span>';

      $script .= '<select id="'.$id_accessoire.'">';
      $script .= '<option value="0" selected tag="0">0</option>';                       
      $script .= '<option value="1" tag="'.($prix_accessoire).'">1</option>';
      $script .= '<option value="2" tag="'.(2*$prix_accessoire).'">2</option>';
      $script .= '<option value="3" tag="'.(3*$prix_accessoire).'">3</option>';
      $script .= '<option value="4" tag="'.(4*$prix_accessoire).'">4</option>';
      $script .= '<option value="5" tag="'.(5*$prix_accessoire).'">5</option>';
      $script .= '</select>';
      $script .= '</li>';
      //$script .= '<input id="conducteurprix" type="hidden" value='.$prix_accessoire.' />';
    }
    $listaccessoire = $script;
    //var_dump($script);

  }

$dateDepart = $_GET['dateDebut'];
$dateArrivee = $_GET['dateArrivee'];
$dateDepart = str_replace("/","-",$dateDepart);
$dateArrivee = str_replace("/","-",$dateArrivee);
$dateD = strtotime($dateDepart);
$dateA = strtotime($dateArrivee);
$interval = $dateA - $dateD;
$interval = $interval/86400;
if($interval < 1){
  $prixLoc = $prixJ * 1;
} else {
                  
$prixLoc = $prixJ * $interval;
  
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
