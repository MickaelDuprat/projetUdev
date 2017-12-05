<?php
include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/Manager.php');

$paiement = new PaiementController();

if (isset($_POST['search'])) {

}

class SearchController{

  /** 
    * Déclaration des variables
    * private $variables
    *
    **/
  private $manager;


  // Constructeur qui initalise un objet manager instance de la classe PaiementModel

  public function __construct(){
    $this->manager = new SearchModel();
  }

  // Fonction de lecture du paiement
  public function getPaiement(){


      }
  }
  
