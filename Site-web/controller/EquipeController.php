<?php

include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/EquipeModel.php');

$ctrl = new EquipeController();

$form = "";

if (isset($_GET)){

	if (isset($_GET['add'])) {
		$form = '
		<center>
		<form class="form-equipe" method="POST" action="equipe.php">
		<label>Login:</label> <input type="text" name="login"/>
		<br/>
		<label>Password:</label> <input type="password" name="password"/>
		<br/>
		<input type="submit" name="add_form" value="Ajouter"/>
		</form>
		</center>';

	}

  

	if (isset($_GET['edit'])) {
		$form = '
		<center>
		<form class="form-equipe" method="POST" action="equipe.php">
		<label>Login:</label> <input type="text" name="login" value="'.$_GET['login'].'"/>
		<br/>
		<label>Password:</label> <input type="password" name="password"/>
		<br/>
		<input type="hidden" name="id" value="'.$_GET['edit'].'"/>
		<input type="submit" name="edit_form" value="Modifier"/>
		</form>
		</center>';
	}

	if (isset($_GET['delete'])) {
		$ctrl->delete($_GET['delete']);
	}

	if (isset($_POST['add_form'])) {
		$ctrl->add($_POST['login'], sha1($_POST['password']));
	}

	if (isset($_POST['edit_form'])) {
		$ctrl->edit($_POST['id'], $_POST['login'], sha1($_POST['password']));
	}
}



// Classe controller des agences de locations

class EquipeController{

  /** 
    * Déclaration des variables
    * private $variables
    *
    **/

  private $manager;

  // Constructeur qui initalise un objet manager instance de la classe AgenceModel 
  public function __construct(){
    $this->manager = new EquipeModel();
  }


  // Fonction de génération du tableau de l'équipe

  public function tabEquipe($id){
     
      $infos = $this->manager->tab($id);

      if($infos){
        $json = json_encode(['success' => true, 'result' => $infos]);
      } else {
        $json = json_encode(['success' => false]);
      }
      
      return $json;

  }

  // Fonction d'ajout d'un membre à l'équipe

  public function add($login, $password){

      $infos = $this->manager->addEquipe($login, $password);

      if($infos == 1){
        $json = json_encode(['success' => true]);
      } else {
        $json = json_encode(['success' => false]);
      }
      
      return $json;

  }

  // Fonction de suppression d'un membre de l'équipe

  public function edit($id, $login, $password){
     
      $infos = $this->manager->editEquipe($id, $login, $password);

      if($infos == 1){
        $json = json_encode(['success' => true]);
      } else {
        $json = json_encode(['success' => false]);
      }

      return $json;

  }

  // Fonction de modification d'un membre de l'équipe

  public function delete($id){
     
      $infos = $this->manager->deleteEquipe($id);

      if($infos == 1){
        $json = json_encode(['success' => true]);
      } else {
        $json = json_encode(['success' => false]);
      }
      
      return $json;

  }

}
