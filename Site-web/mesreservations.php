<?php 

session_start();

include_once('root.php');
include_once(ROOT.'/controller/AuthentificationController.php');
include_once(ROOT.'/controller/ContratController.php');

if (isset($_GET['action']) && $_GET['action'] == 'deconnexion') {
	session_destroy();
	header('Location: index.php');    
}

$ctrl = new ContratController();

$jsonTab = json_decode($ctrl->tabContrat($_SESSION['id']), true);

$ligne = "";

if ($jsonTab['success'] == true) {

    foreach ($jsonTab['result'] as $value) {

      $id = $value['id_membre'];
      $numero = $value['num_contrat_loc'];
      $date = $value['date_contrat'];
      $nom = $value['nom_client'];
      $prenom = $value['prenom_client'];
      $adresse = $value['add_facturation'];
      $img = $value['path_img'];
      $marque = $value['lib_marque'];
      $modele = $value['lib_modele'];
      $dateD = $value['date_debut'];
      $dateA = $value['date_fin'];

      if($id == $_SESSION['id']){
        $ligne .= '
        <tr>
			<td>'.$numero.'</td>
			<td>'.$date.'</td>
			<td>'.$prenom.'</td>
			<td>'.$nom.'</td>
			<td>'.$adresse.'</td>
			<td><img class="imgveh"  src="'.$img.'" width="110px" height="70px"/></td>
			<td>'.$marque.'</td>
			<td>'.$modele.'</td>
			<td>'.$dateD.'</td>
			<td>'.$dateA.'</td>
			<td> <input type="submit" class="btnModifier" value="'.$numero.'"></td> //<img class="imgtab" src="ico/modifier.png" title="Modifier" width="25px" height="25px"/>'.'</td>
     		<td> <input type="submit" class="btnAnnuler" value="'.$numero.'"></td> //<img class="imgtab" src="ico/annuler.png" title="Annuler" width="25px" height="25px"/>'.'</td>
  			<td> <input type="submit" class="btn!voirPdf" value="'.$numero.'"></td> //<img class="imgtab" src="ico/pdf.png" title="Voir le pdf" width="30px" height="30px"/>'.'</td>
		</tr>';
      } else {
        $ligne = '<td> pas de contrats </td>';
      }
  	}

}


if (isset($_SESSION['statut']) && $_SESSION['statut'] == 1) {

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <!-- Description du site -->
        <meta name="description" content="Maquette web du projet">
        <!-- Ajustement du viewport pour les terminaux mobiles -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Titre de la page -->
        <title>Maquette Web - Projet</title>
        <!-- Importation de la feuille de style générale -->
        <link rel="stylesheet" href="css/style.css"> 
        <!-- Importation de la feuille de style de la page -->
        <link rel="stylesheet" href="css/equipe.css"> 
        <!-- Importation de la feuille de style formIndex (formulaire de recherche de l'index) -->
        <link rel="stylesheet" href="css/formIndex.css"> 
        <!-- Importation de la librairie d'icônes "Font Awesome" -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<!-- Importation des polices de caractères "Dosis", Poppins" et "Quicksand" via Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Dosis|Poppins|Quicksand" rel="stylesheet">
		<!-- Importation de la police de caractère "Didact" via Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet"> 
		<!-- Importation de la librairie css concernant le datepicker -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datedropper/2.0/datedropper.css" />
    </head>

    <!-- Corps général de la page -->
    <body>

		<!-- Barre de naviguation du site -->
		<?php include_once('include/nav.php'); ?>
		
		<div id="section-black">
			<h2>Vos réservations</h2>
		</div>

		<!-- Première section de page -->
		<div id="section-white">

			<table border="1">
				<tr id="tableHead">
					<td> n° contrat </td>
					<td> date contrat</td>
					<td> prenom</td>
					<td> nom</td>
					<td> adresse de facturation</td>
					<td> aperçu vehicule </td>
					<td> marque </td>
					<td> modele </td>
					<td> date départ</td>
					<td> date arrivée </td>
					<td colspan="3">Actions</td>
					<?php print($ligne) ?>
				</tr>
			</table>

		</div>

    </body>

	<!-- Footer section du bas de page -->
	<?php include_once('include/footer.php'); 

	} else {
		header("Location: index.php");
	}?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/leaflet/1/leaflet.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.2.0/zxcvbn.js"></script>
    <script src="js/voiture.js" type="text/javascript"></script>
    <script src="js/datedropper.js"></script>
	<script src="js/formLogin.js"></script>
	<script src="js/backToTop.js"></script>
	
</html>