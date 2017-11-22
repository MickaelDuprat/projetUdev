<?php

include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/CoordonneeModel.php');

$ctrl = new CoordonneeController();

// Classe controller des agences de locations

class CoordonneeController{

  /** 
    * Déclaration des variables
    * private $variables
    *
    **/

  private $manager;

  // Constructeur qui initalise un objet manager instance de la classe AgenceModel 
  public function __construct(){
    $this->manager = new CoordonneeModel();
  }


  // Fonction d'authentification d'une utilisateur

  public function informationsUser($id){
     
      $infos = $this->manager->informations($id);

      if($infos){
        $json = json_encode(['success' => true, 'result' => $infos]);
      } else {
        $json = json_encode(['success' => false]);
      }
      
      return $json;

  }


  // Fonction de lecture de l'ensemble des pays

  public function getPays(){
     
      $pays = $this->manager->pays();

      if($pays){
        $json = json_encode(['success' => true, 'result' => $pays]);
      } else {
        $json = json_encode(['success' => false]);
      }
      
      return $json;

  }

}
