<?php

include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/PdfModel.php');

$pdfctrl = new PdfController();

	if (isset($_GET['id'])) {
		
	}




// Classe controller 
class PdfController{

  /** 
    * Déclaration des variables
    * private $variables
    *
    **/

  private $manager;

  // Constructeur qui initalise un objet manager
  public function __construct(){
    $this->manager = new PdfModel();
  }


  // Fonction de génération du tableau de  contrat

  public function tabPdf($num_contrat_loc){
     
      $infosPdf = $this->manager->tabPdf($num_contrat_loc);

      if($infosPdf){
        $json = json_encode(['success' => true, 'result' => $infosPdf]);
      } else {
        $json = json_encode(['success' => false]);
      }
      
      return $json;

  }

  }

