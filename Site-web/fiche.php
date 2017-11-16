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
		<link rel="stylesheet" href="css/fiche.css" />
        <!-- Importation de la librairie d'icônes "Font Awesome" -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<!-- Importation des polices de caractères "Dosis", Poppins" et "Quicksand" via Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Dosis|Poppins|Quicksand" rel="stylesheet">
		<!-- Importation de la police de caractère "Didact" via Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet"> 
		<!-- Importation de la librairie css concernant le datepicker -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datedropper/2.0/datedropper.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    </head>

    <!-- Corps général de la page -->
    <body>

	<!-- Barre de naviguation du site -->
	<?php include_once('include/nav.php'); ?>

	<!-- Première section de page -->
	<div id="head-black">
		<h2>Sélection du véhicule &nbsp;&nbsp;&nbsp;  -  &nbsp;&nbsp;&nbsp;<span>Choix des options</span> &nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp; Paiement</h2>
	</div>


	<div id="section-white">
		<div id="cadre">
			<div id="bandeau">
				<img src="" alt="">
				<h1></h1>
				<h3></h3>
				<div class="info">
					<div class="title"></div>
					<div class="description"></div>
				</div>
				<div class="info">
					<div class="title"></div>
					<div class="description"></div>
				</div>
				<div class="info">
					<div class="title"></div>
					<div class="description"></div>
				</div>
			</div>

			<div id="contenu">
				<div class="title"></div>
				<div class="form"></div>
			</div>
		</div>
	</div>

    </body>

	<!-- Footer section du bas de page -->
	<?php include_once('include/footer.php'); ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script src="js/formSearch.js"></script>
	
    <script src="https://cdn.jsdelivr.net/leaflet/1/leaflet.js"> </script>
   
</html>