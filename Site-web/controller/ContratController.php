<?php

include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/ContratModel.php');

$ctrl = new ContratController();

	if (isset($_GET['id'])) {
		
	}




// Classe controller 
class ContratController{

  /** 
    * Déclaration des variables
    * private $variables
    *
    **/

  private $manager;

  // Constructeur qui initalise un objet manager
  public function __construct(){
    $this->manager = new ContratModel();
  }


  // Fonction de génération du tableau de  contrat

  public function tabContrat($id){
     
      $infos = $this->manager->tab($id);

      if($infos){
        $json = json_encode(['success' => true, 'result' => $infos]);
      } else {
        $json = json_encode(['success' => false]);
      }
      
      return $json;

  }

  }

