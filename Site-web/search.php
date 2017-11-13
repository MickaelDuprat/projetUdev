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
    </head>

    <!-- Corps général de la page -->
    <body>

	<!-- Barre de naviguation du site -->
	<?php include_once('include/nav.php'); ?>

	<!-- Première section de page -->
	<div id="section-black">
		<h2>Recherche de véhicule pour la période du 11/11/17 au 20/11/17 ...</h2>
	</div>

	<div id="section-white">
		<div id="search-form">
			<!-- <form action="POST">
				<label for="marque">
					<select name="marque" id="marque">
						<option value="Renault">Renault</option>
						<option value="Peugeot">Peugeot</option>
						<option value="Audi">Audi</option>
						<option value="Mercedes">Mercedes</option>
					</select>
				</label>
			</form> -->
		</div>

		<!-- La search list représente la liste des résultats de recherche de véhicule -->
		<div id="search-list">
			<!-- Les divs de classes "vehicule" représentent les blocs de la liste -->
			<div class="vehicule">
				<div class="title"><h3>Audi A3</h3></div>
				<div class="descriptif">
					<img src="" alt="">
					<div class="infos"><span>3 sièges</span></div>
				</div>
				<div class="footer"><h3>Audi A3</h3> <span>30€/j</span></div>
			</div>

			<div class="vehicule">
				<div class="title"></div>
				<img src="" alt="">
				<div class="infos"></div>
				<div class="footer"></div>
			</div>

			<div class="vehicule">
				<div class="title"></div>
				<img src="" alt="">
				<div class="infos"></div>
				<div class="footer"></div>
			</div>

			<div class="vehicule">
				<div class="title"></div>
				<img src="" alt="">
				<div class="infos"></div>
				<div class="footer"></div>
			</div>

			<div class="vehicule">
				<div class="title"></div>
				<img src="" alt="">
				<div class="infos"></div>
				<div class="footer"></div>
			</div>
		</div>
	</div>

    </body>

	<!-- Footer section du bas de page -->
	<?php include_once('include/footer.php'); ?>

	<script src="js/formLogin.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/leaflet/1/leaflet.js"></script>
   
</html>