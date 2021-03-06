<?php 
session_start();

include_once('root.php');
include_once(ROOT.'/controller/AuthentificationController.php');
include_once(ROOT.'/controller/ContratController.php');

if (isset($_GET['action']) && $_GET['action'] == 'deconnexion') {
	session_destroy();
	header('Location: index.php');    
}

if (isset($_SESSION['id'])) {

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
        <!-- Importation de la feuille de style paiement -->
        <link rel="stylesheet" href="css/paiement.css">
        <!-- Importation de la feuille de style  contact -->
        <link rel="stylesheet" href="css/contact.css" />
        <!-- Importation de la feuille de style  contact -->
        <link rel="stylesheet" href="css/remerciement.css" />
        <!-- Importation de la librairie d'icônes "Font Awesome" -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<!-- Importation des polices de caractères "Dosis", Poppins" et "Quicksand" via Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Dosis|Poppins|Quicksand" rel="stylesheet">
		<!-- Importation de la police de caractère "Didact" via Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet"> 
		<!-- Importation de la librairie css concernant le datepicker -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datedropper/2.0/datedropper.css" />

		<!--Import de la library css jquery datepicker -->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css"/>
        <!-- Importation de la librairie css concernant la page des partenaires -->
        <link rel="stylesheet" href="css/partenaire.css" />
    </head>

    <!-- Corps général de la page -->
    <body>

	<!-- Barre de naviguation du site -->
	<?php include_once('include/nav.php'); ?>

		<div id="section-white">
            <form id="formulaireRemerciement" method="POST" action="pdf.php">
            <div id="remerciement">
            <h1> Merci pour votre réservation </h1>
            <p> Votre demande de réservation a bien été enregistrée et nous vous remercions de votre confiance.</p>
            <p> Votre contrat de location vous a été automatiquement transmis à votre adresse e-mail mais vous pouvez consulter sa version pdf en cliquant sur le lien suivant :</p>
            <input type="hidden" name="derniercontrat" value="<?php print($num_contrat_loc); ?>">
            <input type="submit" class="btnPdf" value="">
            <p> Vous pouvez à tout moment modifier votre réservation dans votre espace client. </p> </br>
            <b> Toute l'équipe d'Error404 Location vous souhaite une agréable journée et HAVE FUN ! </b>
            </div>
            </form>
        </div>
            
    </body>

	<!-- Footer section du bas de page -->
	<?php include_once('include/footer.php'); ?>

    <!-- importations des librairies Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/leaflet/1/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.2.0/zxcvbn.js"></script>
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="http://cdn.jsdelivr.net/jquery.validation/1.14.0/jquery.validate.min.js"></script>
    <script src="js/backToTop.js"></script>

</html>

<?php

    } else {
        header('Location: index.php');
    }

?>