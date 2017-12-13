<?php
include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/Manager.php');




class InscriptionModel extends Manager {

// Fonction permettant de récupérer l'id d'une ville et d'un code postal donné !!!!
  public function selectIdVilleCp($cpVille) {
    $this->pdoStatement = $this->pdo->prepare("SELECT id_villecp FROM villecp WHERE cp_villecp = :cp_villecp");
    $this->pdoStatement->bindValue(':cp_villecp', $cpVille, PDO::PARAM_INT);
    $this->pdoStatement->execute();
    $idVille = $this->pdoStatement->fetch(PDO::FETCH_ASSOC);
    
    return $idVille;
  }



  // Fonction d'insert de plusieurs informations
  public function insertClient($nom, $prenom, $dateN, $email, $telephone, $codeCoupon, $adresseFact, $adresse, $adresse2, $raisonSociale, $siret, $nomSociete, $civ, $idVille){
      $this->pdoStatement = $this->pdo->prepare("INSERT INTO client
(nom_client, prenom_client, dateN_client, email_client, tel_client, taux_remise, add_facturation, add1_client, add2_client, raisonS_societe, siret_societe, nomC_societe, id_client_civ, id_client_villecp) VALUES (:nom, :prenom, :dateN, :email, :telephone, :codeCoupon, :adresseFact, :adresse, :adresse2, :raisonSociale, :siret, :nomSociete, :civ, :idVille)");

      $this->pdoStatement->bindValue(':nom', $nom, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':prenom', $prenom, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':dateN', $dateN, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':email', $email, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':telephone', $telephone, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':codeCoupon', $codeCoupon, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':adresseFact', $adresseFact, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':adresse', $adresse, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':adresse2', $adresse2, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':raisonSociale', $raisonSociale, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':siret', $siret, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':nomSociete', $nomSociete, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':civ', $civ, PDO::PARAM_INT);
      $this->pdoStatement->bindValue(':idVille', $idVille, PDO::PARAM_INT); 
      
      $inscription = $this->pdoStatement->rowCount();

      return $inscription;    
 
    }

      public function insertMembre($login, $password) {
      $this->pdoStatement = $this->pdo->prepare("INSERT INTO membre (login_membre, password_membre, id_membre_statut_membre ) VALUES (:login, :password, 1)");
      $this->pdoStatement->bindValue(':login', $login, PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':password', $password, PDO::PARAM_STR);
      //$this->pdoStatement->bindValue(':status_membre', $status_membre, PDO::PARAM_INT);
      
      $membre = $this->pdoStatement->rowCount();
      return $membre;    
  }
}