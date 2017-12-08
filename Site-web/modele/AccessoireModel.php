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

  /* Fonction de lecture d'une information
  public function pays() {
    $this->pdoStatement = $this->pdo->prepare("SELECT nom_pays FROM pays ORDER BY nom_pays ASC");
    $this->pdoStatement->execute();
    $pays = $this->pdoStatement->fetchAll(PDO::FETCH_ASSOC);
  
    return $pays; */
    
  public function accessoire() {
    $this->pdoStatement = $this->pdo->prepare("SELECT lib_accessoire, prix_journaHT_accessoire
    FROM accessoire where id_accessoire <> 1");
    $this->pdoStatement->execute();
    $accessoire = $this->pdoStatement->fetchAll(PDO::FETCH_ASSOC);

    return $accessoire;
  }
}





