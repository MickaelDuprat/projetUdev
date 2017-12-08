<?php

date_default_timezone_set('Europe/Paris');

include_once(dirname(__FILE__).'/../root.php');

include_once(ROOT . '/modele/SearchModel.php');

$srch = new SearchController();

if (isset($_GET['action']) && $_GET['action'] == "refresh") {

  $catV = "";
  $boiteV = "";
  $prixV = "";

  $_GET['dateDepart'] = implode('-', array_reverse(explode('/',$_GET['dateDepart']), FALSE));
  $_GET['dateArrivee'] = implode('-', array_reverse(explode('/',$_GET['dateArrivee']), FALSE));

  $compteur = 0;

  if (isset($_GET['typeVeh'])) {
    $catV .= "AND (";
    foreach ($_GET['typeVeh'] as $value) {
        $compteur++;
        if ($compteur > 1) {
          $catV .= " or ";
        }
        $catV .= "id_cat_veh_vehicule = ". $value;
    }
    $catV .= ")";
  }

  if (isset($_GET['prix'])) {
    $prixV .= " AND prix_journalier_veh BETWEEN ".$_GET['prix']['range-prix_min']." AND ".$_GET['prix']['range-prix_max']." ";

  }

  if (isset($_GET['boiteV'])) {
    $boiteV .= " AND id_boiteV = ". $_GET['boiteV']['boiteVitesse'];
  }

  $sql = "SELECT DISTINCT id_veh, lib_modele, lib_marque, id_cat_veh_vehicule, prix_journalier_veh,  id_boiteV_vehicule, nbre_bagage_veh, nbre_passager_veh, nbre_portes_veh, lib_agence, id_agence, id_boiteV_vehicule, lib_boiteV, lib_clim_veh, path_img, id_cat_veh
FROM vehicule
LEFT JOIN cat_veh ON cat_veh.id_cat_veh = vehicule.id_cat_veh_vehicule
LEFT JOIN clim_veh ON clim_veh.id_clim_veh = vehicule.id_clim_veh_vehicule
LEFT JOIN boitev on boitev.id_boiteV = vehicule.id_boiteV_vehicule
LEFT JOIN agence on agence.id_agence = vehicule.id_agence_vehicule
LEFT JOIN modele on modele.id_modele = vehicule.id_modele_vehicule
LEFT JOIN marque on marque.id_marque = modele.id_marque_modele
LEFT JOIN contrat_loc on contrat_loc.id_contrat_loc_vehicule = vehicule.id_veh
WHERE id_agence = ".$_GET['agence']." ".$catV." ".$boiteV." ".$prixV." AND id_veh NOT IN (SELECT id_veh FROM vehicule INNER JOIN contrat_loc
    ON contrat_loc.id_contrat_loc_vehicule = vehicule.id_veh 
    WHERE statut_facturation = 0 
    AND contrat_loc.date_debut < '".$_GET['dateDepart']."' AND contrat_loc.date_fin > '".$_GET['dateArrivee']."')";

// On va boucler sur un tableau
  $jsonTab = json_decode($srch->getVehiculeByFiltre($sql), true);

  $list = '';
  $marque = '';
  
  if ($jsonTab['success'] == true) {
    foreach ($jsonTab['result'] as $value) {
      $id = $value['id_veh'];
      $marque = $value['lib_marque'];
      $modele = $value['lib_modele'];
      $nbPersonne = $value['nbre_passager_veh'];
      $nbPorte = $value['nbre_portes_veh'];
      $nbBagage = $value['nbre_bagage_veh'];
      $boiteV = $value['lib_boiteV'];
      $clim = $value['lib_clim_veh'];
      $prixJ = $value['prix_journalier_veh'];
      $path = $value['path_img'];
      $id_cat = $value['id_cat_veh'];

      $pers = '';

      if($id_cat != 8 && $id_cat != 7){

        if ($nbPersonne > 1) {
          $personnes = " personnes";
        } else {
          $personnes = " personne";
        }

        if ($nbPorte > 1) {
          $portes = " portes";
        } else {
          $portes = " porte";
        }

        if ($nbBagage > 1) {
          $bagages = " bagages";
        } else {
          $bagages = " bagage";
        }

        $infos = '
        <div class="descriptif">
          <img src="'.$path.'" alt="'.$marque.' '.$modele.'">
          <div class="infos" style="padding-bottom: 50px; height: 182px;">
            <p><img src="ico/personne.png" alt="Personne"> '.$nbPersonne.' '.$personnes.'</p>
            <p><img src="ico/voiture.png" alt="Porte"> '.$nbPorte.' '.$portes.'</p>
            <p><img src="ico/bagage.png" alt="Bagage"> '.$nbBagage.' '.$bagages.'</p>
            <p><img src="ico/boiteVitesse.png" alt="BoiteVitesse"> '.$boiteV.'</p>
            <p><img src="ico/clim.png" alt="Climatisation"> '.$clim.'</p>
          </div>
        </div>';
      } else {
        $infos = '
        <div class="descriptif" style="width:100% !important;">
          <img src="'.$path.'" alt="'.$marque.' '.$modele.'" style="width:80%; padding-left: 8%; padding-right: 6%; padding-bottom: 7.3%; height: 182px;">
          <div class="infos" style="display: none;"></div>
        </div>';
      }

      $list .= 
      '<div class="vehicule">
        <div class="title"><h3>'.$marque.' '.$modele.'</h3></div>
        '.$infos.'
        <div class="footer">
          <a href="fiche.php?id='.$id.'&agence='.$_GET['agence']. '&dateDebut='.implode('/', array_reverse(explode('-',$_GET['dateDepart']), FALSE)).'&dateArrivee='.implode('/', array_reverse(explode('-',$_GET['dateArrivee']), FALSE)).'">
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

      print($list);

  }
}

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
      $nbPersonne = $value['nbre_passager_veh'];
      $nbPorte = $value['nbre_portes_veh'];
      $nbBagage = $value['nbre_bagage_veh'];
      $boiteV = $value['lib_boiteV'];
      $clim = $value['lib_clim_veh'];
      $prixJ = $value['prix_journalier_veh'];
      $path = $value['path_img'];
      $id_cat = $value['id_cat_veh'];

      $pers = '';

      if($id_cat != 8 && $id_cat != 7){

        if ($nbPersonne > 1) {
          $personnes = " personnes";
        } else {
          $personnes = " personne";
        }

        if ($nbPorte > 1) {
          $portes = " portes";
        } else {
          $portes = " porte";
        }

        if ($nbBagage > 1) {
          $bagages = " bagages";
        } else {
          $bagages = " bagage";
        }

        $infos = '
        <div class="descriptif">
          <img src="'.$path.'" alt="'.$marque.' '.$modele.'">
          <div class="infos" style="padding-bottom: 50px; height: 182px;">
            <p><img src="ico/personne.png" alt="Personne"> '.$nbPersonne.' '.$personnes.'</p>
            <p><img src="ico/voiture.png" alt="Porte"> '.$nbPorte.' '.$portes.'</p>
            <p><img src="ico/bagage.png" alt="Bagage"> '.$nbBagage.' '.$bagages.'</p>
            <p><img src="ico/boiteVitesse.png" alt="BoiteVitesse"> '.$boiteV.'</p>
            <p><img src="ico/clim.png" alt="Climatisation"> '.$clim.'</p>
          </div>
        </div>';
      } else {
        $infos = '
        <div class="descriptif" style="width:100% !important;">
          <img src="'.$path.'" alt="'.$marque.' '.$modele.'" style="width:80%; padding-left: 8%; padding-right: 6%; padding-bottom: 7.3%; height: 182px;">
          <div class="infos" style="display: none;"></div>
        </div>';
      }

      $list .= 
      '<div class="vehicule">
        <div class="title"><h3>'.$marque.' '.$modele.'</h3></div>
        '.$infos.'
        <div class="footer">
          <a href="fiche.php?id='.$id.'&agence='.$_POST['agence']. '&dateDebut='.$_POST['dateDepart'].'&dateArrivee='.$_POST['dateArrivee'].'">
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
    $dateA = new DateTime($dateArrivee);
    $interval = $dateD->diff($dateA);

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

  public function getVehiculeByFiltre($requete){

    $recherche = $this->manager->readFiltre($requete);

    if($recherche){
      $json = json_encode(['success' => true, 'result' => $recherche]);
    } else {
      $json = json_encode(['success' => false ]);
    }

    return $json;
  } 

  // Fonction de lecture d'une seule agence
  public function getVehiculeByAgence(){

    $idAgence = $_POST['agence'];
    $dateDepart = implode('-', array_reverse(explode('/',$_POST['dateDepart']), FALSE));
    $dateArrivee = implode('-', array_reverse(explode('/',$_POST['dateArrivee']), FALSE));

    $recherche = $this->manager->read($idAgence, $dateDepart, $dateArrivee);

    if($recherche){
      $json = json_encode(['success' => true, 'result' => $recherche]);
    } else {
      $json = json_encode(['success' => false ]);
    }

    return $json;
  } 

}

