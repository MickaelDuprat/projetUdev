<?php

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



}
