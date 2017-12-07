<?php 
session_start();

$message = '';

include_once('root.php');
include_once(ROOT.'/controller/AuthentificationController.php');
include_once(ROOT.'/controller/SearchController.php');

if (isset($_GET['action']) && $_GET['action'] == 'deconnexion') {
	session_destroy();
	header('Location: index.php');    
}
 
if ($_POST['agence'] == "" || $_POST['dateDepart'] == "" || $_POST['dateArrivee'] == "") {
	header('Location: index.php');   
} else {

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
        <!-- Importation de la librairie css concernant le formulaire du profil -->
		<link rel="stylesheet" href="css/formSearch.css" />
        <!-- Importation de la librairie d'icônes "Font Awesome" -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<!-- Importation des polices de caractères "Dosis", Poppins" et "Quicksand" via Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Dosis|Poppins|Quicksand" rel="stylesheet">
		<!-- Importation de la police de caractère "Didact" via Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet"> 
		<!-- Importation de la librairie css concernant le datepicker -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datedropper/2.0/datedropper.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="css/jquery-ui.css" />

    </head>

    <!-- Corps général de la page -->
    <body>

	<!-- Barre de naviguation du site -->
	<?php include_once('include/nav.php'); ?>

	<!-- Première section de page -->
	<div id="head-black">
		<a class="checked" href="search.php">Sélection du véhicule</a> - <a href="fiche.php">Choix des options</a> - <a href="paiement.php">Paiement</a>
	</div>

	<div id="section-white">
 
		<h2><?php 

		$idAgence = $agence;

		switch ($agence) {
			case 1:
				$agence = "Agence de Bordeaux";
				break;
			case 2:
				$agence = "Agence de Niort";
				break;
			case 3:
				$agence = "Agence de Courçon";
				break;
			case 4:
				$agence = "Agence de Châtellerault";
				break;
			case 5:
				$agence = "Agence de Poey D'oloron";
				break;
			default:
				$agence = "";
				break;
		}

		print("<span id='agence' name='".$idAgence."'>".$agence."</span>") ?> -> Période de location : <?php print($interval->format('%d')." jours<span id='dateDepart' name='".$_POST['dateDepart']."' /><span id='dateArrivee' name='".$_POST['dateArrivee']."' />"); ?></h2>

		<div id="search-form">
			<form id="form-search">
			<a class="checkbox-type1">
				<div class="inclu">Type de véhicule <i class="fa fa-chevron-down fa-1x"></i>
			</a>
					<p class="checkbox-option1">
						<input type="checkbox" class="hidden-box get_value" name="1" value="4" id="Citadine"/>
					    <label for="Citadine" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">Citadine</span>
					    </label>

					    <input type="checkbox" class="hidden-box get_value" name="2" value="1" id="Berline"/>
					    <label for="Berline" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">Berline</span>
					    </label>

					    <input type="checkbox" class="hidden-box get_value" name="3" value="5" id="SUV"/>
					    <label for="SUV" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">SUV</span>
					    </label>

					    <input type="checkbox" class="hidden-box get_value" name="4" value="6" id="Sport"/>
					    <label for="Sport" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">Sport</span>
					    </label>

					    <input type="checkbox" class="hidden-box get_value" name="5" value="3" id="Luxe"/>
					    <label for="Luxe" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">Luxe</span>
					    </label>

					    <input type="checkbox" class="hidden-box get_value" name="6" value="2" id="Utilitaire"/>
					    <label for="Utilitaire" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">Utilitaire</span>
					    </label>

					    <input type="checkbox" class="hidden-box get_value" name="7" value="7" id="Moto"/>
					    <label for="Moto" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">Moto</span>
					    </label>

					    <input type="checkbox" class="hidden-box get_value" name="8" value="8" id="Vélo"/>
					    <label for="Vélo" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">Vélo</span>
					    </label>
					</p>
					<p id="type-veh"></p>
				</div>

			<a class="checkbox-type2">
				<div class="inclu">Marque <i class="fa fa-chevron-down fa-1x"></i>
			</a>
					<p class="checkbox-option2">
						<input type="checkbox" class="hidden-box get_value" value="Peugeot" id="Peugeot"/>
					    <label for="Peugeot" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">Peugeot</span>
					    </label>

					    <input type="checkbox" class="hidden-box get_value" value="Fiat" id="Fiat"/>
					    <label for="Fiat" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">Fiat</span>
					    </label>

					    <input type="checkbox" class="hidden-box get_value" value="Renault" id="Renault"/>
					    <label for="Renault" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">Renault</span>
					    </label>

					    <input type="checkbox" class="hidden-box get_value" value="Ford" id="Ford"/>
					    <label for="Ford" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">Ford</span>
					    </label>

					    <input type="checkbox" class="hidden-box get_value" value="BMW" id="BMW"/>
					    <label for="BMW" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">BMW</span>
					    </label>

					    <input type="checkbox" class="hidden-box get_value" value="Audi" id="Audi"/>
					    <label for="Audi" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">Audi</span>
					    </label>
					</p>
				</div>

			<a class="checkbox-type3">
				<div class="inclu">Modèle <i class="fa fa-chevron-down fa-1x"></i>
			</a>
					<p class="checkbox-option3">
						<input type="checkbox" class="hidden-box get_value" value="206" id="first"/>
					    <label for="first" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">206</span>
					    </label>

					    <input type="checkbox" class="hidden-box get_value" value="207" id="second"/>
					    <label for="second" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">207</span>
					    </label>

					    <input type="checkbox" class="hidden-box get_value" value="208" id="third"/>
					    <label for="third" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">208</span>
					    </label>
					</p>

					<div id="boiteVitesse">
						<input type="checkbox" class="hidden-box get_value" id="Automatique"/>
						    <label for="Automatique" class="check--label">
						      <span class="check--label-box"></span>
						      <span class="check--label-text">Automatique</span>
						    </label>

						<input type="checkbox" class="hidden-box get_value" id="Manuelle"/>
						    <label for="Manuelle" class="check--label">
						      <span class="check--label-box"></span>
						      <span class="check--label-text">Manuelle</span>
						    </label>
					</div>
				</div>

			<div id="range-prix">
				<span>Prix journalier</span>
				<div id="slider"></div>
			</div>
		</div>
		</form>
			<!-- La search list représente la liste des résultats de recherche de véhicule -->
			<div id="search-list">

				<div id="result">
					<p></p>
				</div>

				<?php 

					print($list);
					
				?>

			</div>

		</div>
	</div>

    </body>

	<!-- Footer section du bas de page -->
	<?php include_once('include/footer.php'); ?>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
	<script src="https://cdn.jsdelivr.net/leaflet/1/leaflet.js"></script>
	<script src="js/formSearch.js"></script>
	<script src="js/datedropper.js"></script>
	<script src="js/formLogin.js"></script>
	
	<script>

	$(document).ready(function(){

		tabJSON("#Citadine");
		tabJSON("#Berline");
		tabJSON("#SUV");
		tabJSON("#Sport");
		tabJSON("#Luxe");
		tabJSON("#Utilitaire");
		tabJSON("#Moto");
		tabJSON("#Vélo");

		function tabJSON(champs) {
			 $(champs).click(function(){

			 var insert = [];
			 $('.get_value').each(function(){
				 if($(this).is(":checked")){
				 	insert.push($(this).val());
				 }
			 });

			 $.ajax({
				 url: "controller/searchController.php?action=refresh",
				 method: "GET",
				 // dataType: "json",
				 data:{
				 	tab:insert,
					agence: $("#agence").attr("name"),
					dateDepart: $("#dateDepart").attr("name"),
					dateArrivee: $("#dateArrivee").attr("name"),
				 },
				 success:function(data){
				 	$('#search-list').html(data);
				 }
			 });
		 });

		}
	});

 
	/* function tabJSON(tabJson, champs) {
		$(champs).click(function() {
		   
		    if($(this).prop('checked') == true) {

		       $("input[type='checkbox']:checked").each(
	       	  
				$.ajax({ 
			        url:"searchController.php?action=test",
			        type: "get",
			        dateType: "json",
			        data: {
			        	checked: "ta mère !",
			        },
			        success: function(message){
			            $('#test').append('Test !');
			        },
			        error: function(message){
			            alert(message.status + ' ' + message.statusText);
			        }
			  	}));

			    	return alert(tab);	  
		  		} else {
		    	obj.splice($.inArray($(this).value,obj) ,1);
		    	return tab;	  
			} 
		});	
	}
	*/

	</script>

</html>

<?php } ?>