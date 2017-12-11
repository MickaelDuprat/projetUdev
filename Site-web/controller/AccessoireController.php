<?php

include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/AccessoireModel.php');

$accessctrl = new AccessoireController();

  $listaccessoire = '';
   $jsonTab = json_decode($accessctrl->getAccessoire(), true);
   if($jsonTab['success'] == true) {
    foreach ($jsonTab['result'] as $value) {
      $id_accessoire = $value['id_accessoire'];
      $lib_accessoire = $value['lib_accessoire'];
      $prix_accessoire = $value['prix_journaHT_accessoire'];
      $img_path = $value['img_path'];
      
 if($id_cat != 8 && $id_cat != 7){

  if($id_accessoire = 2) {
     $select = '<select id="'.$lib_accessoire.'" onchange="calcul_avec_accesoire()">
                          <option value="0" selected>0</option>                       
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                       </select>';
  } else if($id_accessoire = 3){
    $select = '<select id="'.$lib_accessoire.'" onchange="calcul_avec_accesoire()">
    <option value="0" selected>0</option>                        
                          <option value="1">1</option>
                       </select>';
      } else if($id_accessoire = 4){
        $select = '<select id="'.$lib_accessoire.'" onchange="calcul_avec_accesoire()">
                              <option value="0" selected>0</option> 
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>   
                              </select> ';
          } else if($id_accessoire = 5){
            $select = '<select id="'.$lib_accessoire.'" onchange="calcul_avec_accesoire()">
                                    <option value="0" selected>0</option>                       
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>                     
                                 </select>';
                } else if($id_accessoire = 6) {
                  $select = '<select id="'.$lib_accessoire.'" onchange="calcul_avec_accesoire()">
                                      <option value="0" selected>0</option>                       
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                   </select>';
                    } else if($id_accessoire = 7) {
                  $select = '<select id="'.$lib_accessoire.'" onchange="calcul_avec_accesoire()">
                                      <option value="0" selected>0</option>                        
                                      <option value="1">1</option>
                                   </select>';
                            
}
            $listaccessoire .= 
                  '<img id="'.$lib_accessoire.'" src="'.$img_path.' " alt="'.$lib_accessoire.'">
                  <p>'.$lib_accessoire.' </p> <span> '.$prix_accessoire.' € </span>
                  <li>
                  '.$select.'
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
if($interval <= 1){
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
