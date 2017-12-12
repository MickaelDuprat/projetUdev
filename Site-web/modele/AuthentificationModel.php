<?php
include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/Manager.php');

// Classe modèle des agences de locations

class AuthentificationModel extends Manager {
  
  /** 
    * Déclaration des variables
    * private $variables
    *
    **/
  
  // Constructeur hérité de la classe manager
  public function __construct() {
      parent::__construct();
  }

  // Fonction de lecture d'une information
  public function read($login) {

    $this->pdoStatement = $this->pdo->prepare("SELECT id_membre, login_membre, id_membre_statut_membre, password_membre FROM membre WHERE login_membre = :login");
    $this->pdoStatement->bindValue(':login', $login, PDO::PARAM_STR);
    $this->pdoStatement->execute();
    $membre = $this->pdoStatement->fetch(PDO::FETCH_ASSOC);
    
    return $membre;
  }

  // Fonction permettant de récupérer l'id d'une ville et d'un code postal donné !!!!
  public function selectIdVilleCp($cpVille) {
    $this->pdoStatement = $this->pdo->prepare("SELECT id_villecp FROM villecp WHERE cp_villecp = :cp_villecp");
    $this->pdoStatement->bindValue(':cp_villecp', $cpVille, PDO::PARAM_INT);
    $this->pdoStatement->execute();
    $idVille = $this->pdoStatement->fetch(PDO::FETCH_ASSOC);
    
    return $idVille;
  }


  // Fonction d'insert de plusieurs informations
  public function insert($typeClient, $codeCoupon, $civ, $nom, $prenom, $dateN, $adresse, $adresse2, $adresseFact, $codePostal, $ville, $pays, $password, $telephone, $email, $raisonSociale, $siret, $nomSociete, $login, $status_membre){
      $this->pdoStatement = $this->pdo->prepare("INSERT INTO client
(nom_client, prenom_client, dateN_client, email_client, tel_client, taux_remise, add_facturation, add1_client, add2_client, raisonS_societe, siret_societe, nomC_societe, id_client_civ, id_client_villecp)
VALUES (':nom', ':prenom', ':dateN', ':email', ':telephone', ':adresse1', ':adresse2', ':adresseFact', ':raisonSociale', ':siret', ':nomSociete', ':civ', ':idVille')"); 
 
      $this->pdoStatement->bindValue(':typeClient', $typeClient, PDO::PARAM_INT);
      $this->pdoStatement->bindValue(':codeCoupon', $codeCoupon, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':civ', $civ, PDO::PARAM_INT);
      $this->pdoStatement->bindValue(':nom', $nom, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':prenom', $prenom, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':dateN', $dateN, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':adresse1', $adresse, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':adresse2', $adresse2, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':adresseFact', $adresseFact, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':idVille', $idVille, PDO::PARAM_INT);
      $this->pdoStatement->bindValue(':telephone', $telephone, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':email', $email, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':raisonSociale', $raisonSociale, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':siret', $siret, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':nomSociete', $nomSociete, PDO::PARAM_STR);
      
    $this->pdoStatement = $this->pdo->prepare("INSERT INTO membre (login_membre, password_membre, id_membre_statut_membre)"); /*VALUES (:login, :password, :id_membre_statut_membre*/
    $this->pdoStatement->bindValue(':login_membre', $login, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':password_membre', $password, PDO::PARAM_STR);
     // $this->pdoStatement->bindValue(':id_membre_client', $siret, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':id_membre_statut_membre', $status_membre, PDO::PARAM_STR);
    $this->pdoStatement->execute();
    $inscription = $this->pdoStatement->rowCount();
    return $inscription;    
  }


  }





