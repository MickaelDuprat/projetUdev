<?php 
session_start();

include_once('root.php');
include_once(ROOT.'/controller/AuthentificationController.php');

$message = '';

if (isset($_GET['action']) && $_GET['action'] == 'deconnexion') {
	session_destroy();
	header('Location: index.php');    
}

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
		<!-- Importation de la librairie css concernant le formulaire du profil -->
		<link rel="stylesheet" href="css/formInscription.css" />
		<!-- Importation de la librairie css concernant le formulaire de contact -->
		<link rel="stylesheet" href="css/contact.css" />
		<!--Import de la library css jquery datepicker -->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css"/>
    </head>

    <!-- Corps général de la page -->
    <body>

	<!-- Barre de naviguation du site -->
	<?php include_once('include/nav.php'); ?>

	<!-- Première section de page -->
	<div id="section-black">
		<h2>Formulaire de contact</h2>
	</div>

	<!-- Première section de page -->
	<div id="service"> 
		<p> Pour toutes questions relatives aux services suivants, veuillez vous rediriger vers les sections correspondantes : </p>
	<!-- Redirection vers les différentes sections -->	
		<a href="mesreservations.php" rel="stylesheet"> Mes réservations </a> <br/>
		<a href="mesfactures.php" rel="stylesheet"> Mes factures </a> <br/>
		<a href="mesdonneespers.php" rel="stylesheet"> Mes données personnelles </a> <br/>
	</div>		
		<div id="formulairecontact">
		<form>	
			<label for="civ"> Civilité* </label>
				<select name="civ" id="civ">
					<option value=""> </option>
					<option value="0"> Mademoiselle </option>
					<option value="1"> Madame </option>
					<option value="2"> Monsieur </option>
				</select>
				<br/>
			<label for="nom">Nom*</label>
				<input type="text" name="nom" id="nom" class="champ" />
				<br/>
			<label for="prenom">Prénom*</label> 
				<input type="text" name="prenom" id="prenom" class="champ"/>
				<br/>
			<label for="societe">Société</label>
				<input type="text" name="societe" id="societe" class="champ"/>
				<br/>
			<label for="email">E-mail*</label>
				<input type="text" name="email" id="email" class="champ"/>
				<br/>
			<label for="email">Téléphone*</label>
				<input type="text" name="telephone" id="telephone" class="champ"/>
				<br/>
		<!-- partie message -->	
			<label for="email">Message</label>
				<textarea type="text" name="message" id="message" class="champ" rows="10" cols="50"/> </textarea>
				<br/>
		</form>	
	<!-- boutons -->
	    	<input type="submit" id="formContact" value="Envoyer"/>
	    	<p style="margin-left: 20px"> *Champs obligatoires </p>
	    </div>

	    <a href="#" id="back-to-top" title="Back to top"><img src="ico/back-to-top.png" alt="backToTop" /></a>
	    
    </body>

	<!-- Footer section du bas de page -->
	<?php include_once('include/footer.php'); ?>

    <!-- importations des librairies Js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/leaflet/1/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.2.0/zxcvbn.js"></script>

    <!-- Importation de la librairie js concernant le formulaire du profil -->
    <script src="js/datedropper.js"></script>
    <script src="js/formLogin.js"></script>
    <script src="js/inscription.js"></script>
    <script src="js/datepicker.js"></script>
    <script src="js/backToTop.js"></script>

</html>