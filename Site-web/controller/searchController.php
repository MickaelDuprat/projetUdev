<?php

include_once(ROOT .'/root.php');

include_once(ROOT . '/modele/SearchModel.php');

$srch = new SearchController();


  function search($json) {

 // itération sur un tableau
    $jsonTab = json_decode($json, true);

    if($jsonTab['sucess'] == true) {
      foreach ($jsonTab as $value) {
        $_SESSION['agence'] = $value['lib_agence'];
        $_SESSION['dateDepart'] = $value['dateDepart'];
        $_SESSION['dateArrive'] = $value['dateArrive'];
      }
    }
  }


function searchResult($json){

  // On va boucler sur un tableau
  $jsonTab = json_decode($json, true);

  $list = "";

  if ($jsonTab['success'] == true) {
    foreach ($jsonTab as $value) {
      $marque = $value['lib_marque'];
      $modele = $value['lib_modele'];
      $personne = $value['nbre_passager_veh'];
      $porte = $value['nbre_portes_veh'];
      $bagage = $value['nbre_bagage_veh'];
      $boiteV = $value['lib_boiteV'];
      $clim = $value['lib_clim_veh'];
      $prixJ = $value['prix_journalier_veh'];

      $list = 
      '<div class="vehicule">
        <div class="title"><h3>BMW SÉRIE 3</h3></div>
        <div class="descriptif">
          <img src="https://www.sixt.fr/fileadmin/files/global/user_upload/fleet/png/350x200/bmw-3er-gt-4d-silber-2013.png" alt="'.$marque.' '.$modele.'">
          <div class="infos">
            <p><img src="ico/personne.png" alt="Personne"> '.$personne.' personnes</p>
            <p><img src="ico/voiture.png" alt="Porte"> '.$porte.' portes</p>
            <p><img src="ico/bagage.png" alt="Bagage"> '.$bagage.' bagages</p>
            <p><img src="ico/boiteVitesse.png" alt="BoiteVitesse"> '.$boiteV.'</p>
            <p><img src="ico/clim.png" alt="Climatisation"> '.$clim.'</p>
          </div>
        </div>
        <div class="footer">
          <a href="fiche.php">
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

}

if (isset($_POST['search'])) {
  searchResult($srch->getVehiculeByAgence());
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

   /** 
    * Exemple
    * de CRUD (Afficher, Afficher tous, Créer, Modifier, Supprimer)
    *
    **/


                     
  public function searchVehicle(){



    $agence = $_POST['id_agence'];
    $dateDepart = $_POST['dateDepart'];
    $dateArrive = $_POST['dateArrive'];


    $recherche = $this->manager->read($agence, $dateDepart, $dateArrive);

    if($recherche){
      $json = json_encode(['success' => true, 'result' => $recherche]);
    } else {
      $json = json_encode(['success' => false ]);
    }

    return $json;
  } 
}

