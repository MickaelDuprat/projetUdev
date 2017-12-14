<?php
include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/Manager.php');




class InscriptionModel extends Manager {

// Fonction permettant de récupérer l'id d'une ville et d'un code postal donné !!!!
  public function selectIdVilleCp($cpVille) {
    $this->pdoStatement = $this->pdo->prepare("SELECT id_villecp FROM villecp WHERE cp_villecp = :cp_villecp");
    $this->pdoStatement->bindValue(':cp_villecp', $cpVille, PDO::PARAM_INT);
    $this->pdoStatement->execute();
    $idville = $this->pdoStatement->fetch(PDO::FETCH_ASSOC);
    
    return $idville;
  }


  // Fonction d'insert de plusieurs informations

  public function insertClient($nom, $prenom, $dateN, $email, $telephone, $codeCoupon, $adresseFact, $adresse, $adresse2, $raisonSociale, $siret, $nomSociete, $civ, $idville){
    $this->pdoStatement = $this->pdo->prepare("INSERT INTO client
      (nom_client, prenom_client, dateN_client, email_client, tel_client, taux_remise, add_facturation, add1_client, add2_client, raisonS_societe, siret_societe, nomC_societe, id_client_civ, id_client_villecp) VALUES (:nom, :prenom, :dateN, :email, :telephone, :codeCoupon, :adresseFact, :adresse, :adresse2, :raisonSociale, :siret, :nomSociete, :civ, :idville)");

    $this->pdoStatement->bindValue(':nom', $nom, PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':dateN', $dateN, PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':email', $email, PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':telephone', $telephone, PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':codeCoupon', $codeCoupon, PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':adresseFact', $adresseFact, PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':adresse', $adresse, PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':adresse2', $adresse2, PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':raisonSociale', $raisonSociale, PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':siret', $siret, PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':nomSociete', $nomSociete, PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':civ', $civ, PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':idville', $idville, PDO::PARAM_INT);
    $this->pdoStatement->execute();

    $inscription = $this->pdoStatement->rowCount();
    return $inscription;    
  }

  public function insertMembre($login, $password, $id_client, $status_membre) {
    $this->pdoStatement = $this->pdo->prepare("INSERT INTO membre (login_membre, password_membre, id_membre_client, id_membre_statut_membre) VALUES (:login, :password, :id_client, :status_membre)");
    $this->pdoStatement->bindValue(':login', $login, PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':password', $password, PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':id_client', $id_client, PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':status_membre', $status_membre, PDO::PARAM_INT);
    $this->pdoStatement->execute();

    $membre = $this->pdoStatement->rowCount();
    return $membre;    
  }

  // requête SQL pour récupérer l'id client à partir du nom, prénom et date de naissance d'un client
  public function recupererIdClient($nom, $prenom, $dateN) {
  $this->pdoStatement = $this->pdo->prepare("SELECT max(id_client) as id_dernier_client from client 
  where nom_client like :nom and prenom_client like :prenom and dateN_client = :dateN");

  $this->pdoStatement->bindValue(':nom', $nom, PDO::PARAM_STR);
  $this->pdoStatement->bindValue(':prenom', $prenom, PDO::PARAM_STR);
  $this->pdoStatement->bindValue(':dateN', $dateN, PDO::PARAM_STR);
  $this->pdoStatement->execute();
  
  $id_client = $this->pdoStatement->fetch(PDO::FETCH_ASSOC);
  return $id_client;   

  }
}