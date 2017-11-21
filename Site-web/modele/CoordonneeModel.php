<?php
include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/Manager.php');

// Classe modèle des agences de locations

class CoordonneeModel extends Manager {
  
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

  // Fonction de lecture des informations liées à l'utilisateur
  public function informations($id) {
    $this->pdoStatement = $this->pdo->prepare("SELECT raisonS_societe, siret_societe, nomC_societe, lib_civ, nom_client, prenom_client, add_facturation, dateN_client, add1_client, add2_client, cp_villecp, ville_villecp, nom_pays, password_membre, tel_client, email_client FROM client
      INNER JOIN villecp ON villecp.id_villecp = client.id_client_villecp
      INNER JOIN pays ON pays.id_pays = villecp.id_villecp_pays
      INNER JOIN civilite ON civilite.id_civ = client.id_client_civ
      INNER JOIN membre ON membre.id_membre_client = client.id_client
      WHERE id_membre = :id");
    $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
    $this->pdoStatement->execute();
    $infos = $this->pdoStatement->fetch(PDO::FETCH_ASSOC);

    return $infos;
  }

}




