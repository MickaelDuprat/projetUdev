<?php

include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/AccessoireModel.php');

$accessctrl = new AccessoireController();
$tabAccesoire = json_decode($accessctrl->getAccessoire(), true);


if ($tabAccesoire['success'] == true) {
  $libprix = '';
  $lib_accessoire = [];
  $prix_accessoire = [];

  foreach ($tabAccesoire['result'] as $value) {

    foreach ($tabAccesoire['result'] as $value) {
      $lib_accessoire[] .= $value['lib_accessoire'];
      $prix_accessoire[] .= $value['prix_journaHT_accessoire'];

    }
   }
    var_dump($tabAccesoire['result']);
 $listaccessoire = '';

 if($id_cat != 8 && $id_cat != 7){

$listaccessoire = '<li> <img id="gps" src="img/GPS.png" alt="GPS">
                   <p>'..' </p> <span> '..' € </span>

                      <select id="NbGPS" onchange="calcul_avec_accesoire()">
                          <option value="0" selected>0</option>                        
                          <option value="1">1</option>
                       </select>
                  </li>  

                  <li> <img id="siege-enfant" src="img/siege-enfant.png" alt="Siège enfant">

                   <p>'.$lib_accessoire.' </p> <span> '.$prix_accessoire.' € </span>

                      <select id="NbSiegeEnfant" onchange="calcul_avec_accesoire()">
                          <option value="0" selected>0</option>  
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                      </select>
                  </li>  

                   <li> <img id="nacelle-bebe" src="img/nacelle-bebe.png" alt="Nacelle bébé">

                  <p>'.$lib_accessoire.' </p> <span> '.$prix_accessoire.' € </span>

                      <select id="NbNacelleBebe" onchange="calcul_avec_accesoire()">
                          <option value="0" selected>0</option> 
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>   
                          </select>                  
                  </li>

                  <li> <img id="rehausseur-integral" src="img/rehausseur-integral.png" alt="Réhausseur intégral">

                   <p>'.$lib_accessoire.' </p> <span> '.$prix_accessoire.' € </span>

                      <select id="NbRehausseurIntegral" onchange="calcul_avec_accesoire()">
                          <option value="0" selected>0</option> 
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          </select>
                  </li>';
                  } else {  
      $listaccessoire = '';
}
}


 


  $dateDepart = $_GET['dateDebut'];
  $dateArrivee = $_GET['dateArrivee'];
  $dateD = new DateTime($dateDepart);
  $dateA = new DateTime($dateArrivee);
  $interval = $dateD->diff($dateA);
  $prixLoc = ($prixJ * $interval->day);
  var_dump($dateD);
  var_dump($dateA);
  var_dump($interval);
  var_dump($proxLoc);
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
