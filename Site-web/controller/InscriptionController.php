<?php

include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/InscriptionModel.php');

$ctrl = new InscriptionController();



if (isset($_POST['inscription'])) {
   $ctrl->inscription();
}

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
  function inscription(){
      
      $strcodeCoupon = $_POST['codeCoupon'];
      $codeCoupon = doubleval($strcodeCoupon); 
      $strciv = $_POST['civ'];
      $civ = intval($strciv);
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $dateN = $_POST['dateN'];
      $adresse = $_POST['adresse'];
      $adresse2 = $_POST['adresse2'];
      $adresseFact = $_POST['adresseFact'];
      $idVille;
      $codePostal = $_POST['codePostal'];
      $telephone = $_POST['telephone'];
      $email = $_POST['email'];
      $raisonSociale = $_POST['raisonSociale'];
      $siret = $_POST['siret'];
      $nomSociete = $_POST['nomSociete'];

      var_dump($codeCoupon);
      var_dump($civ);
      var_dump($nom);
      var_dump($prenom);
      var_dump($dateN);
      var_dump($adresse);
      var_dump($adresse2);
      var_dump($adresseFact);
      var_dump($idVille);
      var_dump($telephone);
      var_dump($email);
      var_dump($raisonSociale);
      var_dump($siret);
      var_dump($nomSociete);
 

       $inscription = $this->manager->insertClient($codeCoupon, $civ, $nom, $prenom, $dateN, $adresse, $adresse2, $adresseFact, $codePostal, $telephone, $email, $raisonSociale, $siret, $nomSociete);

       if($inscription){
        $json = json_encode(['success' => true, 'result' => $inscription]);
      } else {
        $json = json_encode(['success' => false]);
      }
      
      return $json;
  }

       

       function membre(){
        $login = $_POST['login'];
        $password = sha1($_POST['password']);
     // $status_membre = $_POST['status_membre'];
        $membre = $this->manager->insertMembre($login, $password /*$status_membre */);

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
}
