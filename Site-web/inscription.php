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
        <!-- Importation de la librairie d'icônes "Font Awesome" -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<!-- Importation des polices de caractères "Dosis", Poppins" et "Quicksand" via Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Dosis|Poppins|Quicksand" rel="stylesheet">
		<!-- Importation de la police de caractère "Didact" via Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet"> 
		<!-- Importation de la librairie css concernant le datepicker -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datedropper/2.0/datedropper.css" />
		<!-- Importation de la librairie css concernant le formulaire du profil -->
		<link rel="stylesheet" href="css/formInscription.css" />
		<!-- Importation de la librairie css concernant la police d'écriture FontAwesonne -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<!--Import de la library css datepicker -->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css"/>
    </head>

    <!-- Corps général de la page -->
    <body>

	<!-- Barre de naviguation du site -->
	<?php include_once('include/nav.php'); ?>

	<!-- Première section de page -->
	<div id="section-black">
		<h2> Création de votre profil</h2>
	</div>

	<div id="section-white">
		<div id="formulaire">			
	<form method="" action="">
		<div id="erreur">
    		<p>Vous n'avez pas rempli correctement les champs du formulaire !</p>
		</div>
		<div id="hautform">
		<label for="civ"> Civilité </label>
				<select name="civ" id="civ">
					<option value="off"> </option>
					<option value="0"> Mademoiselle </option>
					<option value="1"> Madame </option>
					<option value="2"> Monsieur </option>
				</select><br />
    	<label for="nom">Nom</label> <input type="text" id="nom" class="champ" />
		<label for="prenom">Prénom</label> <input type="text" id="prenom" class="champ"/><br />
		<label for="ddn"> Date de naissance </label>
			<input type="text" id="datepicker" value=""/>
		</div>	
		<div id="mid1form">
			<label for="add1">Adresse</label>
				<input type="text" id="add1" class="champ"/><br />
			<label for="add2">Complément adresse</label>
					<input type="text" id="add2" class="champ"/><br />
			<label for="cp">Code postal</label>
					<input type="text" id="villecp" class="champ"/><br />
			<label for="ville">Ville</label>
					<input type="text" id="ville" class="champ"/><br />			
			<label for='pays'>Pays</label>
					<select name="pays" id="pays" class="champ">
						<option value="">Pays</option>
					</select><br />
		</div>

		<div id="mid2form">
    	<label for="mdp">Mot de passe</label> <input type="password" id="mdp" class="champ" /><br />
    	<label for="confirmation">Confirmation</label>  <input type="password" id="confirmation" class="champ" /><br />
   		 </div>
   		 <div id="basform">
    	<label for="tel">Téléphone</label> <input type="tel" id="tel" class="champ"/>
    	<label for="mail">E-mail</label> <input type="text" id="mail" class="champ" /><br />
   		</div>
    	<input class='btn' type="submit" id="envoi" value="Envoyer" /> <input class='btn' type="reset" id="reset" value="Reset" />
		</form>
		</div>
			</div>
    </body>

	<!-- Footer section du bas de page -->
	<?php include_once('include/footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/leaflet/1/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.2.0/zxcvbn.js"></script>

    <!-- Importation de la librairie js concernant le formulaire du profil -->
    <script src="js/inscription.js"></script>
   	<script src="js/formLogin.js"></script>
   	<script src="js/datepicker.js"></script>

</html>