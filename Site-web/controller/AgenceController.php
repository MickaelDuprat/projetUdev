<?php

// Classe controller des agences de locations

class AgenceController{

  /** 
    * Déclaration des variables
    * private $variables
    *
    **/

  // Constructeur qui initalise un objet manager instance de la classe AgenceModel 
  public function __construct(){
    $this->manager = new AgenceModel();
  }

  /** 
    * Exemple
    * de CRUD (Afficher, Afficher tous, Créer, Modifier, Supprimer)
    *
    **/

    // Fonction de lecture d'une seule agence
  public function getOneAgence($IdAgence){

      $selectedAgence = $this->manager->read($IdAgence);

      $tabSelectedAgence = [
      'IdAgence' => $selectedAgence->getIdAgence(),
      'LibelleAgence' => $selectedAgence->getLibelleAgence(),
      'AdresseAgence' => $selectedAgence->getAdresseAgence(),
      'IdAgenceVehicule' => $selectedAgence->getIdAgenceVehicule(),
      'IdAgenceVilleCp' => $selectedAgence->getIdAgenceVilleCp()
      ];

      $json = json_encode($tabSelectedAgence);
      return ['agence' => $json];

  }

  // Fonction de lecture de plusieurs agences
  public function getAllAgence(){

      $listeAgence = $this->manager->readAll();

      $tabAllAgence = [];

      foreach ($listeAgence as $key => $agence) {

          $data = [
          'IdAgence' => $agence->getIdAgence(),
          'LibelleAgence' => $agence->getLibelleAgence(),
          'AdresseAgence' => $agence->getAdresseAgence(),
          'IdAgenceVehicule' => $agence->getIdAgenceVehicule(),
          'IdAgenceVilleCp' => $agence->getIdAgenceVilleCp()
          ];

      $tabAllAgence[] = $data;

      }

    if ($tabAllAgence){
        $json = json_encode($tabAllAgence);
        return ['agence' => $json];
    }

  }

  // Fonction de création d'une agence

  public function createAgence(){

    $data = [
    'IdAgence' => $_POST["IdAgence"],
    'LibelleAgence' => $_POST["LibelleAgence"],
    'AdresseAgence' => $_POST["AdresseAgence"],
    'IdAgenceVehicule' => $_POST["IdAgenceVehicule"],
    'IdAgenceVilleCp' => $_POST["IdAgenceVilleCp"]
    ];

    $object = new Agence($data);
    $libelle = "agence";

    return "Je sais pas encore quoi";

  }

  // Fonction de modification d'une agence

  public function updateAgence($IdAgence){

    $data = [
    'IdAgence' => $IdAgence,
    'LibelleAgence' => $_POST["LibelleAgence"],
    'AdresseAgence' => $_POST["AdresseAgence"],
    'IdAgenceVehicule' => $_POST["IdAgenceVehicule"],
    'IdAgenceVilleCp' => $_POST["IdAgenceVilleCp"]
    ];


    $object = new Agence($data);
    $libelle = "agence";

    return "Je sais pas encore quoi";

  }

  // Fonction de suppression d'une agence

  public function deleteAgence($IdAgence){

    $result = $this->manager->delete($IdAgence);
    $json = json_encode($result);
    return ['agence' => $json];

  }

}
