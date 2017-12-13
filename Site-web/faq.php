<?php 
session_start();

include_once('root.php');
include_once(ROOT.'/controller/AuthentificationController.php');

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
        <link rel="stylesheet" href="css/faq.css" />
    </head>

    <!-- Corps général de la page -->
    <body>

	<!-- Barre de naviguation du site -->
	<?php include_once('include/nav.php'); ?>

		<div id="section-white">
            <div id="faq">
                <div class=question >
                    <h3> Quels avantages offre la réservation par internet ? </h3>
                </div>
                <div class=reponse>
                    <p> Grâce à Internet, vous réservez en temps réel et profitez de prix intéressants soumis à nos conditions générales de location. Aussitôt après votre réservation, vous obtenez une confirmation de réservation.  </p>
                </div>
                <div class=question>
                    <h3> Quel délai dois-je respecter pour réserver ma voiture de location sur Internet ? </h3>
                </div>
                <div class=reponse>
                    <p> La réservation doit être faite au moins deux heures avant l’enlèvement du véhicule. Veuillez noter que pour la location de nos jeeps et cabriolets, un délai de 48 heures à l’avance est nécessaire. </p>
                </div>
                <div class=question>
                    <h3> Le passage des frontières est-il possible pendant la durée du contrat de location ? </h3>
                </div>
                <div class=reponse>
                    <p> Il est généralement autorisé, dans l’espace de la communauté européenne. Cependant pour des raisons de sécurité, des groupes de véhicules particuliers sont soumis à des restrictions dans certains pays. Avant votre réservation, veuillez nous faire part de votre projet de voyage et vous renseigner sur ces réglementations.   </p>
                </div>
                <div class=question>
                    <h3> Dois-je restituer le véhicule avec le réservoir de carburant plein ? </h3>
                </div>
                <div class=reponse>
                    <p> La restituion du véhicule se fait en effet avec le plein de carburant car cette prestation n'est pas inclus dans le prix de location du véhicule. Si le véhicule est rendu sans le plein de carburant lors de l'état des lieux, une pénalité au taux fixé selon les Conditions Générales de vente s'appliquera sur le montant total dû. </p>
                </div>
                <div class=question>
                    <h3> Quel type d’assurance est inclus dans ma location ? </h3>
                </div>
                <div class=reponse>
                    <p> La plupart de nos prix de location de base incluent les garanties suivantes : - assistance médicale
                    - assistance technique pour le véhicule - responsabilité civile - protection contre les dommages au véhicule - protection contre le vol. Ces garanties peuvent varier en fonction des pays. </p>
                </div>
                <div class=fin>
                    <p> Vous n'avez pas trouvé la réponse à votre question ? </p> </br>
                    <p> N'hésitez pas à nous poser des questions sur le lien <a href="contact-email.php" style="text-decoration: none"> suivant </a> ou à nous contacter aux coordonnées <a href="contact.php" style="text-decoration: none"> suivantes </a> </p>
            </div>
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
