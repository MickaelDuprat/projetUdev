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


 // fonction de modifications des coordonnées du client

  public function modifierInfos(){



    $tabform = [$nom = $_POST['nom_client'];
      $prenom = $_POST['prenom_client'];
      $dateN = $_POST['dateN_client'];
      $adresseFact = $_POST['add_facturation'];
      $adresse1 = $_POST['add1_client'];
      $adresse2 = $_POST['add2_client'];
      $cpVille = $_POST['cp_villecp'];
      $ville = $_POST['ville_villecp'];
      $tel = $_POST['tel_client'];
      $email = $_POST['email_client'];
      $raison = $_POST['raisonS_societe'];
      $siret = $_POST['siret_societe'];
      $nomS = $_POST['nomC_societe'];
      $civilite = $_POST['lib_civ'];
      $pays = $_POST['nom_pays'];]

    foreach ($tabform as $values) {
      $tab[$values] = new CoordonneeController();
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
