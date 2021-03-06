<?php
include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/Manager.php');

// Classe modèle de la recherche

class AccessoireModel extends Manager {
  
  /** 
    * Déclaration des variables
    * private $variables
    *
    **/
  
  // Constructeur hérité de la classe manager
  public function __construct() {
      parent::__construct();
  }

    
  public function accessoire() {
    $this->pdoStatement = $this->pdo->prepare("SELECT id_accessoire, lib_accessoire, prix_journaHT_accessoire, img_path
    FROM accessoire WHERE id_accessoire <> 1");
    $this->pdoStatement->execute();
    $accessoire = $this->pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    return $accessoire;
  }
}




