<?php

include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/CoordonneeModel.php');

$ctrl = new CoordonneeController();

if (isset($_POST['submit'])) {

  $jsonTab = json_decode($ctrl->getIdVilleCp($_POST['cpVille']), true);

  $idVille = "";

  foreach ($jsonTab as $value) {
    $idVille = $value["id_villecp"];
  }

  $ctrl->modifierInfosClient( $_POST['id_client'],
                              $_POST['civ'],
                              $_POST['nom'],
                              $_POST['prenom'],
                              $_POST['dateN'], 
                              $_POST['adresse1'],
                              $_POST['adresse2'],
                              $_POST['adresseFact'],
                              $idVille,
                              $_POST['telephone'],
                              $_POST['email'],
                              $_POST['raisonSociale'],
                              $_POST['siret'],
                              $_POST['nomSociete']
                            );

  $ctrl->modifierInfosMembre( $_POST['id'], sha1($_POST['mdp']) );

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

  // Fonction permettant de récupérer l'id d'une ville et d'un code postal donné !!!!
  public function getIdVilleCp($cpVille){
     
      $id = $this->manager->selectIdVilleCp($cpVille);

      if($id){
        $json = json_encode(['success' => true, 'result' => $id]);
      } else {
        $json = json_encode(['success' => false]);
      }
      
      return $json;

  }

 // Fonction de modifications des coordonnées du client

  public function modifierInfosClient($id_client, $civ, $nom, $prenom, $dateN, $adresse1, $adresse2, $adresseFact, $cpVille, $telephone, $email, $raisonSociale, $siret, $nomSociete){

    $result = $this->manager->updateInfoClient($id_client, $civ, $nom, $prenom, $dateN, $adresse1, $adresse2, $adresseFact, $cpVille, $telephone, $email, $raisonSociale, $siret, $nomSociete);

    var_dump($result);

    if($result){
        $tab = json_encode(['success' => true, 'result' => $result]);
      
    } else {
        $tab = json_encode(['success' => false]);
    }


    return $tab;

  }

  public function modifierInfosMembre($id_membre, $mdp){

    $result = $this->manager->updateInfoMembre($id_membre, $mdp);

    if($result){
        $tab = json_encode(['success' => true, 'result' => $result]);
      
    } else {
        $tab = json_encode(['success' => false]);
    }

    return $tab;

  }

}
