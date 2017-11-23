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


 // Fonction de modifications des coordonnées du client

  public function modifierInfos(){



    $tabform = [$_POST['nom_client'],
      $_POST['prenom_client'],
      $_POST['dateN_client'],
      $_POST['add_facturation'],
      $_POST['add1_client'],
      $_POST['add2_client'],
      $_POST['cp_villecp'],
      $_POST['ville_villecp'],
      $_POST['tel_client'],
      $_POST['email_client'],
      $_POST['raisonS_societe'],
      $_POST['siret_societe'],
      $_POST['nomC_societe'],
      $_POST['lib_civ'],
      $_POST['nom_pays']];

    foreach ($tabform as $values) {
      $tab[] = new CoordonneeController();
      $tab[] .= $values;
    }

    if($tabform){
        $tab = json_encode(['success' => true, 'result' => $tabform]);
      } else {
        $tab = json_encode(['success' => false]);
      }

    return $tab;

      $tabform = $this->manager->updateInfo($id);
  }

}
