<?php

date_default_timezone_set('Europe/Paris');

include_once(ROOT .'/root.php');

include_once(ROOT . '/modele/SearchModel.php');

$srch = new SearchController();

if (isset($_POST['search'])) {
  // On va boucler sur un tableau
  $jsonTab = json_decode($srch->getVehiculeByAgence(), true);

  $list = '';
  $marque = '';
  
  if ($jsonTab['success'] == true) {
    foreach ($jsonTab['result'] as $value) {
      $id = $value['id_veh'];
      $marque = $value['lib_marque'];
      $modele = $value['lib_modele'];
      $personne = $value['nbre_passager_veh'];
      $porte = $value['nbre_portes_veh'];
      $bagage = $value['nbre_bagage_veh'];
      $boiteV = $value['lib_boiteV'];
      $clim = $value['lib_clim_veh'];
      $prixJ = $value['prix_journalier_veh'];
      $path = $value['path_img'];

      $pers = '';

      if($marque != "VELO"){
        $info1 = '<p><img src="ico/personne.png" alt="Personne"> '.$personne.' personnes</p>';
        $info2 = '<p><img src="ico/voiture.png" alt="Porte"> '.$porte.' portes</p>';
        $info3 = '<p><img src="ico/bagage.png" alt="Bagage"> '.$bagage.' bagages</p>';
        $info4 = '<p><img src="ico/boiteVitesse.png" alt="BoiteVitesse"> '.$boiteV.'</p>';
        $info5 = '<p><img src="ico/clim.png" alt="Climatisation"> '.$clim.'</p>';
      } else {
        $info1 = "";
        $info2 = "";
        $info3 = "";
        $info4 = "";
        $info5 = "";
      }

       $list .= 
      '<div class="vehicule">
        <div class="title"><h3>'.$marque.' '.$modele.'</h3></div>
        <div class="descriptif">

          <img src="'.$path.'" alt="'.$marque.' '.$modele.'">
          <div class="infos">
            '.$info1.'
            '.$info2.'
            '.$info3.'
            '.$info4.'
            '.$info5.'
          </div>
        </div>
        <div class="footer">
          <a href="fiche.php?='.$id.'">
            <div class="bouton">
              RÉSERVER
            </div>
            <div class="prix">
              <p>'.$prixJ.'€/j</p>
            </div>
          </a>
        </div>
      </div>';
    }
  }

      $dateDepart = implode('-', array_reverse(explode('/',$_POST['dateDepart']), FALSE));
      $dateArrivee = implode('-', array_reverse(explode('/',$_POST['dateArrivee']), FALSE));

      $agence = $_POST['agence'];
      $dateD = new DateTime($dateDepart);
      $datreA = new DateTime($dateArrivee);
      $interval = $dateD->diff($datreA);

      
}


// Classe controller de recherche Index.php

class SearchController{

  /** 
    * Déclaration des variables
    * private $variables
    *
    **/
  private $manager;
  private $agence;
  private $dateDepart;
  private $dateArrive;

  // Constructeur qui initalise un objet manager instance de la classe SearchModel

  public function __construct(){
    $this->manager = new SearchModel();
  }

  // Fonction de lecture d'une seule agence
  public function getVehiculeByAgence(){

      $idAgence = $_POST['agence'];
      $dateDepart = implode('-', array_reverse(explode('/',$_POST['dateDepart']), FALSE));
      $dateArrivee = implode('-', array_reverse(explode('/',$_POST['dateArrivee']), FALSE));

      // var_dump($idAgence);
      // var_dump($dateDepart);
      // var_dump($dateArrivee);

    $recherche = $this->manager->read($idAgence, $dateDepart, $dateArrivee);

    if($recherche){
      $json = json_encode(['success' => true, 'result' => $recherche]);
    } else {
      $json = json_encode(['success' => false ]);
    }

    return $json;
  } 

}

