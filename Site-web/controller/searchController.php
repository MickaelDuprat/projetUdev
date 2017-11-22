<?php

include_once(ROOT .'/root.php');

include_once(ROOT . '/modele/SearchModel.php');

$srch = new SearchController();

function searchResult($json){

  // On va boucler sur un tableau
  $jsonTab = json_decode($json, true);

  if ($jsonTab['success'] == true) {
    foreach ($jsonTab as $value) {
      $marque = $value['lib_marque'];
      $modele = $value['lib_modele'];
      $personne = $value['nbre_passager_veh'];
      $porte = $value['nbre_portes_veh'];
      $bagage = $value['nbre_bagage_veh'];
      $boiteV = $value['lib_boiteV'];
      $clim = $value['lib_clim_veh'];
    }
  }

}

if (isset($_POST['search'])) {
  searchResult($srch->getVehiculeByAgence());
}


// Classe controller de recherche Index.php

class SearchController{

  /** 
    * Déclaration des variables
    * private $variables
    *
    **/
  private $manager;

  // Constructeur qui initalise un objet manager instance de la classe SearchModel

  public function __construct(){
    $this->manager = new SearchModel();
  }

  // Fonction de lecture d'une seule agence
  public function getVehiculeByAgence(){

      $idAgence = $_POST['agence'];
      $dateDepart = $_POST['dateDepart'];
      $dateArrivee = $_POST['dateArrivee'];

      var_dump($idAgence);
      var_dump($dateDepart);
      var_dump($dateArrivee);

      $agences = $this->manager->read($idAgence);

      if($agences){
        $json = json_encode(['success' => true, 'result' => $agences]);
      } else {
        $json = json_encode(['success' => false]);
      }

      return $json;

  }

}
