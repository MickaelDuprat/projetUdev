<?php

include_once(ROOT .'/root.php');

include_once(ROOT .'/modele/FicheModel.php');

$ctrl = new FicheController();

	
if (isset($_GET['id'])) {
  $jsonTab = json_decode($ctrl->getVehiculeById($_GET['id']), true);
   if($jsonTab['success'] == true) {
    foreach ($jsonTab['result'] as $value) {
     $modele = $value['lib_modele'];
     $id_cat = $value['id_cat_veh'];
     $path = $value['path_img'];
     $marque = $value['lib_marque'];
     $prixJ = $value['prix_journalier_veh'];
     $cat_veh = $value['id_cat_veh_vehicule'];
     $nbrebagage = $value['nbre_bagage_veh'];
     $nbrepersonnes = $value['nbre_passager_veh'];
     $boiteV = $value['lib_boiteV'];
     $nbrebagages = $value['nbre_portes_veh'];
     $clim = $value['lib_clim_veh'];
     $nbreportes = $value['nbre_portes_veh'];

     $infos = '';

     if($id_cat != 8 && $id_cat != 7){

        if ($nbrepersonnes > 1) {
          $nbpersonnes = " personnes";
        } else {
          $nbpersonnes = " personne";
        }

        if ($nbreportes > 1) {
          $nbportes = " portes";
        } else {
          $nbportes = " porte";
        }

        if ($nbrebagage > 1) {
          $nbbagages = " bagages";
        } else {
          $nbbagages = " bagage";
        }

  $infos = '
          <h3> Equipement du véhicule </h3>
              <p><img id="iconeporte" src="ico/voiture.png" alt="Porte"> '.$nbreportes.' '.$nbportes.'</p>
              <p><img id="iconeboitev" src="ico/boiteVitesse.png" alt="BoiteVitesse"> '.$boiteV.'</p>
              <p><img id="iconeclim" src="ico/clim.png" alt="Climatisation"> '.$clim.'</p>
          <h3> Capacité </h3>
              <p><img id="iconenbpers" src="ico/personne.png" alt="Personne"> '.$nbrepersonnes.' '.$nbpersonnes.'</p>
              <p><img id="iconebagage" src="ico/bagage.png" alt="Bagage"> '.$nbrebagages.' '.$nbbagages.'</p>
          <h3> Conditions générales </h3>
          <p> informations relatives à la location chez Error 404 </p>     
      </aside>';
    } else { 
      $infos = ' 
          <h3> Conditions générales </h3>
          <p> informations relatives à la location chez Error 404 </p>     
      </aside>';
      }
    }
  }
}

// Classe controller 
class FicheController{


  /** 
    * Déclaration des variables
    * private $variables
    *
    **/

  private $manager;

  // Constructeur qui initalise un objet manager 
  public function __construct(){
    $this->manager = new FicheModel();
  }

  public function getVehiculeById($id){
     
      $vehicule = $this->manager->getVehiculeById($id);

      if($vehicule){
        $json = json_encode(['success' => true, 'result' => $vehicule]);
      } else {
        $json = json_encode(['success' => false]);
      }
      
      return $json;
  } 
}
