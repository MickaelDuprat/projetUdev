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
  
  }



