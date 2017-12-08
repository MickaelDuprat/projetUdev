<?php

include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/AuthentificationModel.php');

$ctrl = new AuthentificationController();

function cnx($json){

  // On va boucler sur un tableau
  $jsonTab = json_decode($json, true);

  if ($jsonTab['success'] == true) {
    foreach ($jsonTab as $value) {
      $_SESSION['id'] = $value['id_membre'];
      $_SESSION['id_client'] = $value['id_membre_client'];
      $_SESSION['login'] = $value['login_membre'];
      $_SESSION['statut'] = $value['id_membre_statut_membre'];
    }
  }
}

if (isset($_POST['connexion'])) {
   $login = $_POST['login'];
   $password = $_POST['password'];
   cnx($ctrl->connexion($login));
}

if (isset($_POST['inscription'])) {
   $ctrl->inscription();
}

// Classe controller des agences de locations

class AuthentificationController{

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
    $this->manager = new AuthentificationModel();
  }

  /** 
    * Exemple
    * de CRUD (Afficher, Afficher tous, Créer, Modifier, Supprimer)
    *
    **/

  // Fonction d'authentification d'un utilisateur

  public function connexion($login){
    
      $membre = $this->manager->read($login);

      $password = sha1($_POST['password']);

      if ($membre["password_membre"] == $password) {
       $json = json_encode(['success' => true, 'result' => $membre]);
      } else {
          $json = json_encode(['success' => false]);
          
      }

      return $json;
  }

  // Fonction d'inscription d'un utilisateur

    public function inscription(){
      
      $typeClient = $_POST['typeClient'];
      $codeCoupon = $_POST['codeCoupon'];
      $civ = $_POST['civ'];
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $dateN = $_POST['dateN'];
      $adresse = $_POST['adresse'];
      $adresse2 = $_POST['adresse2'];
      $adresseFact = $_POST['adresseFact'];
      $codePostal = $_POST['codePostal'];
      $ville = $_POST['ville'];
      $pays = $_POST['pays'];
      $password = sha1($_POST['password']);
      $telephone = $_POST['telephone'];
      $email = $_POST['email'];
      $raisonSociale = $_POST['raisonSociale'];
      $siret = $_POST['siret'];
      $nomSociete = $_POST['nomSociete'];

      $inscription = $this->manager->insert($typeClient, $codeCoupon, $civ, $nom, $prenom, $dateN, $adresse, $adresse2, $adresseFact, $codePostal, $ville, $pays, $password, $telephone, $email, $raisonSociale, $siret, $nomSociete);

      if($inscription){
        $json = json_encode(['success' => true, 'result' => $inscription]);
      } else {
        $json = json_encode(['success' => false]);
      }
      
      return $json;

  }

}
