<?php
include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/Manager.php');

// Classe modèle de la recherche

class SearchModel extends Manager {
  
  /** 
    * Déclaration des variables
    * private $variables
    *
    **/
  
  // Constructeur hérité de la classe manager
  public function __construct() {
      parent::__construct();
  }

   /** 
    * Exemple
    * de CRUD (Afficher, Créer, Modifier, Supprimer)
    *
    **/

        /* revoir la requete : */

       /* 
  // Fonction de lecture d'une information
  public function read($agence, $dateDepart, $dateArrive) {
    $this->pdoStatement = $this->pdo->prepare("")
    $this->pdoStatement->bindValue(':lib_agence', $agence, PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':dateDepart', $dateDepart, PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':dateArrive', $dateArrive, PDO::PARAM_STR);
    $this->pdoStatement->execute();
    $recherche = $this->pdoStatement->fetch(PDO::FETCH_ASSOC);

    return $recherche;
  }
      */

}





