<?php

include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/CoordonneeModel.php');

$ctrl = new CoordonneeController();

if (isset($_POST['submit'])) {

  $requete = $ctrl->modifierInfos( $_POST['id'],
                                   $_POST['id_client'],
                                   $_POST['civ'],
                                   $_POST['nom'],
                                   $_POST['prenom'],
                                   $_POST['dateN'], 
                                   $_POST['adresse1'],
                                   $_POST['adresse2'],
                                   $_POST['adresseFact'],
                                   $_POST['cpVille'],
                                   $_POST['ville'],
                                   $_POST['pays'],
                                   $_POST['telephone'],
                                   $_POST['email'],
                                   $_POST['raisonSociale'],
                                   $_POST['siret'],
                                   $_POST['nomSociete'],
                                   $_POST['mdp']
                                 );

  if ($requete) {
    print("Youhouuu !!");
  } else {
    print("Rooooooohhhh merde !!");
  }

}

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

  public function modifierInfos($id_client, $id_membre, $civ, $nom, $prenom, $dateN, $adresse1, $adresse2, $adresseFact, $cpVille, $ville, $pays, $telephone, $email, $raisonSociale, $siret, $nomSociete, $mdp){

    $res = $this->manager->updateInfo($id_client, $civ, $nom, $prenom, $dateN, $adresse1, $adresse2, $adresseFact, $cpVille, $ville, $pays, $telephone, $email, $raisonSociale, $siret, $nomSociete);

    $resMembre = $this->manager->updateInfoMembre($id_membre, $mdp);

    if($res){
        $tab = json_encode(['success' => true, 'result' => $res]);
      
    } else {
        $tab = json_encode(['success' => false]);
    }

    if($resMembre){
        $tab2 = json_encode(['success' => true, 'result' => $resMembre]);
      
    } else {
        $tab2 = json_encode(['success' => false]);
    }

    return $tab + $tab2;

  }

}
