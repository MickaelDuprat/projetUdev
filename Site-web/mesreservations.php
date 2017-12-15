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

$reservations = "";

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

      $date = implode("-", array_reverse(explode("-", $date), FALSE));   
      $dateD = implode("-", array_reverse(explode("-", $dateD), FALSE));
      $dateA = implode("-", array_reverse(explode("-", $dateA), FALSE));

      if($id == $_SESSION['id']){
        $reservations .= '<div id="reservation">
				<div class="title">
					'.$marque.' '.$modele.'
				</div>
				
				<img src="'.$img.'" alt="'.$marque.' '.$modele.'"/>
				
				<div class="infos">
					<ul>
						<li><label>Date de location : </label>Du '.$dateD.' au '.$dateA.'</li>
						<li><label>Nom : </label> '.$nom.'</li>
						<li><label>Prénom : </label> '.$prenom.'</li>
						<li><label>Adresse de facturation : </label> '.$adresse.'</li>
						<li><label>Contrat de location : </label> n°'.$numero.'</li>
						<li class="dateContrat"><label>Date du contrat : </label>'.$date.'</li>
					</ul>
				</div>

				<div class="actions">
					<ul>
						<li><a href="?modifier='.$numero.'"><img src="ico/modifier.png" title="Modifier"/></a></li>

						<li><a href="?supprimer='.$numero.'"><img src="ico/annuler.png" title="Annuler"/></a></li>

						<li><a href="pdf.php?reservation='.$numero.'" target="_blanck"><img src="ico/pdf.png" title="Voir le pdf"/></a></li>
					</ul>
				</div>
			</div>';
      } else {
        $reservations = '<td> Vous ne posséder aucun contrat </td>';
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
        <link rel="stylesheet" href="css/reservation.css"> 
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
			
			<!-- The Modal -->
		<div id="myModal" class="modal">

		  <!-- Modal content -->
		  <div class="modal-content">
		    <div class="modal-header">
		      <span class="close">&times;</span>
		      <h2>Modification de la réservation</h2>
		    </div>
			    <div class="modal-body">
			  	<div id="search">
			      <form method="GET" action="fiche.php" class="form" id="form1">
				  <br/>
				  <input type="hidden" name="dateDepart" value="<?php echo implode('-', array_reverse(explode('/',$_GET['dateDebut']), FALSE)); ?>"/>
				  <input type="hidden" name="dateArrivee" value="<?php echo implode('-', array_reverse(explode('/',$_GET['dateArrivee']), FALSE)); ?>"/>
			      <input type="hidden" name="idClient" value="<?php print($idClient); ?>"/>
				  <input type="hidden" name="idVehicule" value="<?php print($_GET['id']); ?>"/>
			      <input type="hidden" name="dateNow" value="<?php print(date("Y-m-d")); ?>"/>
				  <input type="hidden" name="agence" value="<?php print($_GET['agence']); ?>"/>
				  <i class="fa fa-map-marker" style="font-size: 45px;" aria-hidden="true" "></i>
					
				  <div class="select" id="choixAgence" tabindex="1">

				  <input class="selectopt" name="agence" value="1" type="radio" id="opt1">
				  <label for="opt1" class="option">Agence de Bordeaux</label>
				  <input class="selectopt" name="agence" value="2" type="radio" id="opt2">
				  <label for="opt2" class="option">Agence de Niort</label>
				  <input class="selectopt" name="agence" value="3" type="radio" id="opt3">
				  <label for="opt3" class="option">Agence de Courçon</label>
				  <input class="selectopt" name="agence" value="4" type="radio" id="opt4">
				  <label for="opt4" class="option">Agence de Châtellerault</label>
				  <input class="selectopt" name="agence" value="5" type="radio" id="opt5">
				  <label for="opt5" class="option">Agence de Poey d'Oloron</label>
				  <input class="selectopt" name="agence" type="radio" value="" id="opt6">
				  <label for="opt6" class="option">Choisissez une agence</label>
			  	</div>
			  	<p id="erreurAgence"> Veuillez choisir une agence </p>
				<div id="date">
				  <i class="fa fa-calendar fa-2x" aria-hidden="true"></i><br/><br/>
			      <input class="date feedback-input" id="dateDepart" name="dateDepart" type="text" placeholder="Date de départ" />
				  <input class="date feedback-input" name="dateArrivee" id="dateArrivee" type="text" placeholder="Date d'arrivée" />
			      <p id="erreurDate"> Veuillez renseignez des dates correctes </p>
			  	</div>

			  <br/>
			  
		      <div class="submit">
		      	<input type="submit" value="Etape suivante" id="button-blue"/>
		      </div>

			</form>
			</div>
		    </div>
		    <!-- <div class="modal-footer">
		      <h3>...</h3>
		    </div> -->
		  </div>


		</div>

			<?php print($reservations) ?>
	
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
	
	<script>

	var modal = document.getElementById('myModal');

		// Get the button that opens the modal
		var btn = document.getElementById("myBtn");

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		// When the user clicks the button, open the modal 
		function modalUpdate() {
		    modal.style.display = "block";
		}

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
		    modal.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";
		    }
		}

	</script>

	<?php 
		if(isset($_GET['modifier'])) {
			print("<script>modalUpdate();</script>");
		}
	?>

</html>