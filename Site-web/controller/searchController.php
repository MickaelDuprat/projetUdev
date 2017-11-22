<?php

include_once(ROOT .'/root.php');

include_once(ROOT . '/modele/SearchModel.php');

$srch = new SearchController();

  function search($json) {

 // itération sur un tableau
    $jsonTab = json_decode($json, true);

    if($jsonTab['sucess'] == true) {
      foreach ($jsonTab as $value) {
        $_SESSION['agence'] = $value['lib_agence'];
        $_SESSION['dateDepart'] = $value['dateDepart'];
        $_SESSION['dateArrive'] = $value['dateArrive'];
      }
    }
  }

// Classe controller de recherche Index.php

class SearchController{

  /** 
    * Déclaration des variables
    * private $variables
    *
    **/
  private $manager;
  private $agence;
  private $dateDepart;
  private $dateArrive;

  // Constructeur qui initalise un objet manager instance de la classe SearchModel

  public function __construct(){
    $this->manager = new SearchModel();
  }

   /** 
    * Exemple
    * de CRUD (Afficher, Afficher tous, Créer, Modifier, Supprimer)
    *
    **/


                      /* a Modifier */

  // fonction recherche authentification d'un utilisateur

  public function searchVehicle(){

    $agence = $_POST['id_agence'];
    $dateDepart = $_POST['dateDepart'];
    $dateArrive = $_POST['dateArrive'];

    $recherche = $this->manager->read($agence, $dateDepart, $dateArrive);

    if($recherche){
      $json = json_encode(['success' => true, 'result' => $recherche]);
    } else {
      $json = json_encode(['success' => false ]);
    }

    return $json;
  } 
}

