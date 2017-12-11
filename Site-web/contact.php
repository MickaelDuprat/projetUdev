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
		<h2> Contact </h2>
	</div>

	<!-- Première section de page -->
	<div id="service"> 
	<p> Pour toutes questions relatives aux services suivants, veuillez vous rediriger vers les sections correspondantes : </p>
<!-- Redirection vers les différentes sections -->	
	<a href="mesreservations.php" rel="stylesheet"> Mes réservations </a> <br/>
	<a href="mesfactures.php" rel="stylesheet"> Mes factures </a> <br/>
	<a href="mesdonneespers.php" rel="stylesheet"> Mes données personnelles </a> <br/>
	<p> Avez-vous d’autres questions ? Veuillez utiliser le formulaire de contact ci-dessous : </p>
 	<span> <a id="formcontact" href="contact-email.php" rel="stylesheet"> Contactez-nous !</a> </span>
	</div>
	
	<div id="coordonnees"> 
		<h1> Nos coordonnées </h1>
		<span> Nous nous ferons un plaisir de répondre à toutes vos questions, n'hésitez pas à contacter une de nos agences : </span>
		<img src="img/hotesse.png" id="hotesse" alt="contact">

		<div class="horaire" id="horaireBordeaux"> 
			<b> Horaire d'ouverture : </b>
			<p> Lundi : 08h30 - 12 h ; 13h30 - 18h30 </p>
			<p> Mardi : 08h30 - 12 h ; 13h30 - 18h30 </p>
			<p> Mercredi : 08h30 - 12 h ; 13h30 - 18h30 </p>
			<p> Jeudi : 08h30 - 12 h ; 13h30 - 18h30 </p>
			<p> Vendredi : 08h30 - 12 h ; 13h30 - 18h30 </p>
		</div>

		<div class="essai" pseudo class="target" id="Bordeaux"> 
			<h3> Agence de Bordeaux </h3>
			<b> Adresse postale : </b>
			<p> 10, place de la bourse 33000 Bordeaux </p> </br>
			<b> N° téléphone : </b>
			<p> +33 (0)5-56-00-00-00 </p> </br>
			<b> Fax : </b>
			<p> 05-56-00-00-01 </p> </br>
			<b> Email : </b>
			<a href="mailto:agence-Bordeaux@error404.fr" class="mail"> agence-Bordeaux@error404.fr </a>
		</div>

		<div class="horaire" id="horaireChatellerault"> 
			<b> Horaire d'ouverture : </b>
			<p> Lundi : 08h30 - 12 h ; 13h30 - 18h30 </p>
			<p> Mardi : 08h30 - 12 h ; 13h30 - 18h30 </p>
			<p> Mercredi : 08h30 - 12 h ; 13h30 - 18h30 </p>
			<p> Jeudi : 08h30 - 12 h ; 13h30 - 18h30 </p>
			<p> Vendredi : 08h30 - 12 h ; 13h30 - 18h30 </p>
		</div>

		<div class="essai" id="Chatellerault"> 
			<h3> Agence de Châtellerault </h3>
			<b> Adresse postale : </b>
			<p> 222, boulevard de blossac 86100 Châtellerault </p> </br>
			<b> N° téléphone : </b>
			<p> +33 (0)5-49-00-00-00 </p> </br>
			<b> Fax : </b>
			<p> 05-49-00-00-01 </p> </br>
			<b> Email : </b>
			<a href="mailto:agence-Chatellerault@error404.fr" class="mail"> agence-Chatellerault@error404.fr </a>
		</div>

		<div class="horaire" id="horaireCourcon"> 
			<b> Horaire d'ouverture : </b>
			<p> Lundi : 08h30 - 12 h ; 13h30 - 18h30 </p>
			<p> Mardi : 08h30 - 12 h ; 13h30 - 18h30 </p>
			<p> Mercredi : 08h30 - 12 h ; 13h30 - 18h30 </p>
			<p> Jeudi : 08h30 - 12 h ; 13h30 - 18h30 </p>
			<p> Vendredi : 08h30 - 12 h ; 13h30 - 18h30 </p>
		</div>

		<div class="essai" id="Courcon"> 
			<h3> Agence de Courçon </h3>
			<b> Adresse postale : </b>
			<p> 66, rue de Marans 17170 Courçon </p> </br>
			<b> N° téléphone : </b>
			<p> +33 (0)5-46-00-00-00 </p> </br>
			<b> Fax : </b>
			<p> 05-46-00-00-01 </p> </br>
			<b> Email : </b>
			<a href="mailto:agence-Courcon@error404.fr" class="mail"> agence-Courcon@error404.fr </a>
		</div>

		<div class="horaire" id="horaireNiort"> 
			<b> Horaire d'ouverture : </b>
			<p> Lundi : 08h30 - 12 h ; 13h30 - 18h30 </p>
			<p> Mardi : 08h30 - 12 h ; 13h30 - 18h30 </p>
			<p> Mercredi : 08h30 - 12 h ; 13h30 - 18h30 </p>
			<p> Jeudi : 08h30 - 12 h ; 13h30 - 18h30 </p>
			<p> Vendredi : 08h30 - 12 h ; 13h30 - 18h30 </p>
		</div>

		<div class="essai" id="Niort"> 
			<h3> Agence de Niort </h3>
			<b> Adresse postale : </b>
			<p> 1, rue de la gare 79000 Niort </p> </br>
			<b> N° téléphone : </b>
			<p> +33 (0)5-49-00-00-00 </p> </br>
			<b> Fax : </b>
			<p> 05-49-00-00-01 </p> </br>
			<b> Email : </b>
			<a href="mailto:agence-Niort@error404.fr" class="mail"> agence-Niort@error404.fr </a>
		</div>

		<div class="horaire" id="horairePoey"> 
			<b> Horaire d'ouverture : </b>
			<p> Lundi : 08h30 - 12 h ; 13h30 - 18h30 </p>
			<p> Mardi : 08h30 - 12 h ; 13h30 - 18h30 </p>
			<p> Mercredi : 08h30 - 12 h ; 13h30 - 18h30 </p>
			<p> Jeudi : 08h30 - 12 h ; 13h30 - 18h30 </p>
			<p> Vendredi : 08h30 - 12 h ; 13h30 - 18h30 </p>
		</div>

		<div class="essai" id="Poey"> 
			<h3> Agence de Poey d'Oloron </h3>
			<b> Adresse postale : </b>
			<p> 7, rue de la mairie 64400 Poey d'Oloron </p> </br>
			<b> N° téléphone : </b>
			<p> +33 (0)5-59-00-00-00 </p> </br>
			<b> Fax : </b>
			<p> 05-59-00-00-01 </p> </br>
			<b> Email : </b>
			<a href="mailto:agence-Poey-Oloron@error404.fr" class="mail"> agence-Poey-Oloron@error404.fr </a> </br>
		</div>
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
    <script src="js/inscription.js"></script>
    <script src="js/datepicker.js"></script>
    <script src="js/backToTop.js"></script>

</html>