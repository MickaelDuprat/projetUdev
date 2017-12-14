<?php

include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/InscriptionModel.php');

$ctrl = new InscriptionController();

class InscriptionController{

  /** 
    * Déclaration des variables
    * private $variables
    *
    **/

  private $manager;
  private $login;
  private $password;

  // Constructeur qui initalise un objet manager instance de la classe AgenceModel 
  public function __construct(){
    $this->manager = new InscriptionModel();
  }

// Fonction d'inscription d'un utilisateur



  function inscription($nom, $prenom, $dateN, $email, $telephone, $codeCoupon, $adresseFact, $adresse, $adresse2, $raisonSociale, $siret, $nomSociete, $civ, $idville){

   $inscription = $this->manager->insertClient($nom, $prenom, $dateN, $email, $telephone, $codeCoupon, $adresseFact, $adresse, $adresse2, $raisonSociale, $siret, $nomSociete, $civ, $idville);

   if($inscription){
    $json = json_encode(['success' => true, 'result' => $inscription]);
  } else {
    $json = json_encode(['success' => false]);

  }
  return $json;
}


function inscriptionMembre($login, $password, $id_client, $status_membre){

  $membre = $this->manager->insertMembre($login, $password, $id_client, $status_membre);

  if($membre){
    $json = json_encode(['success' => true, 'result' => $membre]);
  } else {
    $json = json_encode(['success' => false]);
  }
  return $json;
}


function getIdVille($cpVille){
  $ville = $this->manager->selectIdVilleCp($cpVille);

  if($ville){
    $json2 = json_encode(['success' => true, 'result' => $ville]);
  } else {
    $json2 = json_encode(['success' => false]);
  }
  return $json2;
} 

function getIdClient($nom, $prenom, $dateN){
  $id_client = $this->manager->recupererIdClient($nom, $prenom, $dateN);

  if($id_client){
    $json = json_encode(['success' => true, 'result' => $id_client]);
  } else {
    $json = json_encode(['success' => false]);
  }
  return $json;
} 

}
