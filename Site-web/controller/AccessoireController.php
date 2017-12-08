<?php

include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/AccessoireModel.php');

$accessctrl = new AccessoireController();
$tabAccesoire = json_decode($accessctrl->getAccessoire(), true);

if ($tabAccesoire['success'] == true) {
  $libprix = '';
    foreach ($tabAccesoire['result'] as $value) {
      $lib_accessoire = $value['lib_accessoire'];
      $prix_accessoire = $value['prix_journaHT_accessoire'];

      $libprix .=  '<p>'.$lib_accessoire.' </p> <span> '.$prix_accessoire.' € </span>';
}

 $listaccessoire = '';

 if($id_cat != 8 && $id_cat != 7){

$listaccessoire = '<li> <img id="gps" src="img/GPS.png" alt="GPS">
                   '.var_dump($tabAccesoire[1]['lib_accessoire']).'
                      <select id="NbGPS" onchange="calcul_avec_accesoire()">
                          <option value="0" selected>0</option>                        
                          <option value="1">1</option>
                       </select>
                  </li>  

                  <li> <img id="siege-enfant" src="img/siege-enfant.png" alt="Siège enfant">
                   '.$libprix.'
                      <select id="NbSiegeEnfant" onchange="calcul_avec_accesoire()">
                          <option value="0" selected>0</option>  
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                      </select>
                  </li>  

                   <li> <img id="nacelle-bebe" src="img/nacelle-bebe.png" alt="Nacelle bébé">
                  '.$libprix.'
                      <select id="NbNacelleBebe" onchange="calcul_avec_accesoire()">
                          <option value="0" selected>0</option> 
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>   
                          </select>                  
                  </li>

                  <li> <img id="rehausseur-integral" src="img/rehausseur-integral.png" alt="Réhausseur intégral">
                   '.$libprix.'
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
