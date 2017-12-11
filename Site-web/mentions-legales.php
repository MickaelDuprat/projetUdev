<?php 
session_start();

include_once('root.php');
include_once(ROOT.'/controller/AuthentificationController.php');
include_once(ROOT.'/controller/CoordonneeController.php');

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
		<!--Import de la library css jquery datepicker -->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css"/>
    </head>

    <!-- Corps général de la page -->
    <body>

	<!-- Barre de naviguation du site -->
	<?php include_once('include/nav.php'); ?>

	<!-- Première section de page -->
	<div id="section-black">
		<h2>Mentions légales</h2>
	</div>

	<!-- Première section de page -->
	<div style="text-align: justify; width: 50%; margin-left: 25%; margin-right: 25%; font-size: 17px;" id="section-white">
		<h2>INFORMATION DE L’ÉDITEUR</h2>
		<p>Responsable de la maintenance : Rodolphe DE SOUSA, Bruce LOSTIS et Mickaël DUPRAT
		Responsable de la publication : Rodolphe DE SOUSA, Bruce LOSTIS et Mickaël DUPRAT
		N° siret: 44001866100023</p>
		<h2>DONNÉES PERSONNELLES</h2>
		<p>En poursuivant votre navigation sur ce site, vous acceptez l’utilisation de traceurs (cookies) afin de faire des études statistiques anonymes concernant les visites sur le site, cela dans le but de vous proposer des contenus et services adaptés à vos centres d’intérêts et vous permettre de partager des informations sur les réseaux sociaux.
		Les informations que vous aurez saisies sur le site 404location.mickaelduprat.fr pourront être enregistrées pour leur traitement exclusif par Rodolphe DE SOUSA, Bruce LOSTIS et Mickaël DUPRAT.
		Vous disposez d’un droit d’accès, de modification, de rectification et de suppression concernant les données collectées sur ce site, dans les conditions prévues par la loi n°78-17 du 6 janvier 1978 relative à l’informatique, aux fichiers et aux libertés. Pour l’exercer, adressez-vous au gestionnaire du site par courrier à l’adresse figurant en haut de cette page.</p>
		<h2>DROITS D’AUTEURS</h2>
		<p>La reproduction ou représentation, intégrale ou partielle, des pages, des données et de tout autre élément constitutif au site, par quelque procédé ou support que ce soit, est interdite et constitue sans autorisation de l’éditeur une contrefaçon.
		<h2>HÉBERGEUR</h2>
		OVH</br>
		SAS au capital de 10 069 020 €</br>
		RCS Lille Métropole 424 761 419 00045</br>
		Code APE 2620Z</br>
		N° TVA : FR 22 424 761 419</br>
		Siège social : 2 rue Kellermann - 59100 Roubaix - France<p>
	</div>

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
   	<!-- <script src="js/inscription.js"></script> -->
    <script src="js/datepicker.js"></script>
	<script>
		var pro = false;
		<?php
			if (isset($siret) AND trim($siret) != ''){
				print('pro = true;');
			}
		?>
		$(document).ready(function(){
			if (pro){
				$('#proform').show();
			}
		});

	
	</script>
</html>