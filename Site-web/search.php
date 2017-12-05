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

		print($agence); ?> -> Période de location : <?php print($interval->format('%d')); ?> jours</h2>

		<div id="search-form">
			<form id="form-search">
			<a class="checkbox-type1">
				<div class="inclu">Type de véhicule <i class="fa fa-chevron-down fa-1x"></i>
			</a>
					<p class="checkbox-option1">
						<input type="checkbox" class="hidden-box" name="1" value="Citadine" id="Citadine"/>
					    <label for="Citadine" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">Citadine</span>
					    </label>

					    <input type="checkbox" class="hidden-box" name="2" value="Berline" id="Berline"/>
					    <label for="Berline" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">Berline</span>
					    </label>

					    <input type="checkbox" class="hidden-box" name="3" value="SUV" id="SUV"/>
					    <label for="SUV" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">SUV</span>
					    </label>

					    <input type="checkbox" class="hidden-box" name="4" value="Sport" id="Sport"/>
					    <label for="Sport" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">Sport</span>
					    </label>

					    <input type="checkbox" class="hidden-box" name="5" value="Luxe" id="Luxe"/>
					    <label for="Luxe" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">Luxe</span>
					    </label>

					    <input type="checkbox" class="hidden-box" name="6" value="Utilitaire" id="Utilitaire"/>
					    <label for="Utilitaire" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">Utilitaire</span>
					    </label>

					    <input type="checkbox" class="hidden-box" name="7" value="Moto" id="Moto"/>
					    <label for="Moto" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">Moto</span>
					    </label>

					    <input type="checkbox" class="hidden-box" name="8" value="Vélo" id="Vélo"/>
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
						<input type="checkbox" class="hidden-box" value="Peugeot" id="Peugeot"/>
					    <label for="Peugeot" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">Peugeot</span>
					    </label>

					    <input type="checkbox" class="hidden-box" value="Fiat" id="Fiat"/>
					    <label for="Fiat" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">Fiat</span>
					    </label>

					    <input type="checkbox" class="hidden-box" value="Renault" id="Renault"/>
					    <label for="Renault" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">Renault</span>
					    </label>

					    <input type="checkbox" class="hidden-box" value="Ford" id="Ford"/>
					    <label for="Ford" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">Ford</span>
					    </label>

					    <input type="checkbox" class="hidden-box" value="BMW" id="BMW"/>
					    <label for="BMW" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">BMW</span>
					    </label>

					    <input type="checkbox" class="hidden-box" value="Audi" id="Audi"/>
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
						<input type="checkbox" class="hidden-box" id="first" checked/>
					    <label for="first" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">Citadine</span>
					    </label>

					    <input type="checkbox" class="hidden-box" id="second"/>
					    <label for="second" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">Berline</span>
					    </label>

					    <input type="checkbox" class="hidden-box" id="third"/>
					    <label for="third" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">SUV</span>
					    </label>
					</p>

					<div id="boiteVitesse">
						<input type="checkbox" class="hidden-box" id="Automatique"/>
						    <label for="Automatique" class="check--label">
						      <span class="check--label-box"></span>
						      <span class="check--label-text">Automatique</span>
						    </label>

						<input type="checkbox" class="hidden-box" id="Manuelle"/>
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

			<?php print($list); ?>
			<!-- Les divs de classes "vehicule" représentent les blocs de la liste -->
			<!-- <div class="vehicule">
				<div class="title"><h3>BMW SÉRIE 3</h3></div>
				<div class="descriptif">
					<img src="https://www.sixt.fr/fileadmin/files/global/user_upload/fleet/png/350x200/bmw-3er-gt-4d-silber-2013.png" alt="BMW Série 3">
					<div class="infos">
						<p><img src="ico/personne.png" alt="Personne"> 5 personnes</p>
						<p><img src="ico/voiture.png" alt="Porte"> 5 portes</p>
						<p><img src="ico/bagage.png" alt="Bagage"> 3 bagages</p>
						<p><img src="ico/boiteVitesse.png" alt="BoiteVitesse"> Manuelle</p>
						<p><img src="ico/clim.png" alt="Climatisation"> Climatisation</p>
					</div>
				</div>
				<a class="slide-down1"><div class="inclu">OPTIONS <i class="fa fa-chevron-down fa-lg"></i><p class="option1">option 1...</p><p class="option1">option 2...</p><p class="option1">option 3...</p></div></a>
				<div class="footer">
					<a href="fiche.php">
						<div class="bouton">
							RÉSERVER
						</div>
						<div class="prix">
							<p>123€/j</p>
						</div>
					</a>
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

	tabJSON("#form-search", "#Citadine");

	tabJSON("#form-search", "#Berline");

	 $('#Citadine').click(function() {
        $.ajax({ 
        url:"search.php",
        type: "get",
        dateType: "json",
        success: function(message){
            $('#test1').append('<option value="'+ message.id +'">'+ message.id +'</option>');
            },
            error: function(message){
                alert(message.status + ' ' + message.statusText);
               }
            });
        });

	function tabJSON(tabJson, champs) {
		$(champs).click(function() {
		   
		    if($(this).prop('checked') == true) {
		     	var data = $(tabJson).serializeArray();
				
				obj = {};

				for(var i = 0; i < data.length; i++){
				   obj[data[i].name] = obj[data[i].name] || [];
				   obj[data[i].name].push(data[i].value);
				}    

		    	return alert(JSON.stringify(obj));	  
		    } else {
		    	obj.splice(-1,1);
		    	return alert(JSON.stringify(obj));	  
		    }

		});	
	}

</script>
</html>

<?php } ?>