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
        <!-- Importation de la librairie d'icônes "Font Awesome" -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<!-- Importation des polices de caractères "Dosis", Poppins" et "Quicksand" via Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Dosis|Poppins|Quicksand" rel="stylesheet">
		<!-- Importation de la police de caractère "Didact" via Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet"> 
		<!-- Importation de la librairie css concernant le datepicker -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datedropper/2.0/datedropper.css" />
		<!-- Importation de la librairie css concernant le formulaire de contact -->
		<link rel="stylesheet" href="css/contact.css" />
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
            <div id="partenaires-aeriens">
                <h1> Partenaires aérien</h1>
                    <ul class="liste-part-aerien">
                        <li>
                            <a href=//mareservation.corsair.fr>
                            <div id="liste-partenaires-aeriens">
                            <img id="corsair" src="img/corsair.png" alt="Corsair" width="110px" height="70px">
                            </div>
                            Corsair
                            </a>
                        </li>
                        <li>
                            <a href=////www.airfrance.fr>
                            <div id="liste-partenaires-aeriens">
                            <img id="airfrance" src="img/airfrance.png" alt="AirFrance" width="110px" height="135px">
                            </div>
                            AirFrance
                            </a>
                        </li>
                        <li>
                            <a href=//www.hop.com>
                            <div id="liste-partenaires-aeriens">
                            <img id="hop" src="img/hop.png" alt="Hop" width="100px" height="60px">
                            </div>
                            HOP
                            </a>
                        </li>
                        <li>
                            <a href=//www.klm.com/home/fr/fr>
                            <div id="liste-partenaires-aeriens">
                            <img id="klm" src="img/klm.png" alt="Klm" width="110px" height="70px">
                            </div>
                            KLM
                            </a>
                        </li>
                        <li>
                            <a href=//www.britishairways.com/travel/home/public/fr_fr>
                            <div id="liste-partenaires-aeriens">
                            <img id="britishairways" src="img/britishairways.png" alt="BritishAirways" width="110px" height="70px">
                            </div>
                            British Airways
                            </a>
                        </li>
                        
                        <li>
                            <a href=//www.ryanair.com/fr/fr/>
                            <div id="liste-partenaires-aeriens">
                            <img id="ryanair" src="img/ryanair.png" alt="Ryanair" width="120px" height="70px">
                            </div>
                            Ryanair
                            </a>
                        </li>
                        <li>
                            <a href=//www.easyjet.com/fr>
                            <div id="liste-partenaires-aeriens">
                            <img id="easyjet" src="img/easyjet.png" alt="Easyjet" width="110px" height="55px">
                            </div>
                            Easyjet
                            </a>
                        </li>
                         <li>
                            <a href=//www.americanairlines.fr/intl/fr/index.jsp?>
                            <div id="liste-partenaires-aeriens">
                            <img id="americanairlines" src="img/americanairlines.png" alt="AmericanAirlines" width="120px" height="50px">
                            </div>
                            American Airlines
                            </a>
                        </li>
                         <li>
                            <a href=//www.www.lufthansa.com/fr/fr/Homepage>
                            <div id="liste-partenaires-aeriens">
                            <img id="lufthansa" src="img/lufthansa.png" alt="Lufthansa" width="130px" height="50px">
                            </div>
                            Lufthansa
                            </a>
                        </li>   
                    </ul>
            </div>
            <div id="partenaires-hoteliers">
                <h1> Partenaires hôteliers</h1>
                    <ul class="liste-part-hoteliers">
                        <li>
                            <a href=//www.booking.com/index.fr.html>
                            <div id="liste-partenaires-hoteliers">
                            <img id="booking" src="img/booking.png" alt="Booking" width="100px" height="60px"> 
                            </div>
                            Booking
                            </a>
                        </li>
                        <li>
                            <a href=//fr.hotels.com/>
                            <div id="liste-partenaires-hoteliers">
                            <img id="hotels" src="img/hotels.png" alt="Hotels" width="120px" height="65px">
                            </div>
                            Hotels
                            </a>
                        </li>
                        <li>
                            <a href=//http://www.hotel-bb.com/fr/home.htm>
                            <div id="liste-partenaires-hoteliers">
                            <img id="hotelbandb" src="img/hotelbandb.png" alt="hotelbandb" width="80px" height="70px">
                            </div>
                            B&B
                            </a>
                        </li>
                        <li>
                            <a href=//www.accorhotels.com/fr/france/index.shtml>
                            <div id="liste-partenaires-hoteliers">
                            <img id="accorhotels" src="img/accorhotels.png" alt="AccorHotels" width="120px" height="70px">
                            </div>
                            Accor Hôtels
                            </a>
                        </li>
                        <li>
                            <a href=//www.bestwestern.fr>
                            <div id="liste-partenaires-hoteliers">
                            <img id="bestwestern" src="img/bestwestern.png" alt="Bestwestern" width="125px" height="70px">
                            </div>
                            Best Western
                            </a>
                        </li>
                        
                        <li>
                            <a href=//www.fourseasons.com/fr/paris/>
                            <div id="liste-partenaires-hoteliers">
                            <img id="fourseasons" src="img/fourseasons.png" alt="Fourseasons" width="110px" height="70px">
                            </div>
                            Four Seasons
                            </a>
                        </li>
                        <li>
                            <a href=//www.airbnb.fr>
                            <div id="liste-partenaires-hoteliers">
                            <img id="airbnb" src="img/airbnb.png" alt="Airbnb" width="110px" height="45px">
                            </div>
                            AirBnB
                            </a>
                        </li>
                         <li>
                            <a href=//http://www.ibis.com/france/index.fr.shtml>
                            <div id="liste-partenaires-hoteliers">
                            <img id="ibis-budget" src="img/ibis-budget.png" alt="IbisBudget" width="90px" height="70px">
                            </div>
                            Ibis Budget
                            </a>
                        </li>
                         <li>
                            <a href=//hotelf1.accorhotels.com/home/index.fr.shtml>
                            <div id="liste-partenaires-hoteliers">
                            <img id="hotelf1" src="img/formule1.png" alt="hotelf1" width="110px" height="70px">
                            </div>
                            Formule 1
                            </a>
                        </li>   
                    </ul>
            </div>     
            <div id="autres-partenaires">
                <h1> Autres partenaires</h1>
                    <ul class="liste-autres-partenaires">
                        <li>
                            <a href=//www.epsi.fr/campus/campus-de-bordeaux/>
                            <div id="liste-autres-partenaires">
                            <img id="epsi" src="img/epsi.png" alt="Epsi" width="110px" height="70px">
                            </div>
                            EPSI
                            </a>
                        </li>
                        <li>
                            <a href=//www.cgi.fr>
                            <div id="liste-autres-partenaires">
                            <img id="cgi" src="img/cgi.png" alt="Cgi" width="110px" height="70px">
                            </div>
                            CGI
                            </a>
                        </li> 
                        <li>
                            <a href=//www.oui.sncf>
                            <div id="liste-autres-partenaires">
                            <img id="sncf" src="img/oui-sncf.png" alt="Oui-SNCF" width="100px" height="50px">
                            </div>
                            Oui Sncf
                            </a>
                        </li>   
                        <li>
                            <a href=//www.hemoroidee.com/>
                            <div id="liste-autres-partenaires">
                            <img id="hemoroide" src="img/hemoroide.png" alt="hemoroide" width="150px" height="70px">
                            </div>
                            Hemroide
                            </a>
                        </li>   
                    </ul>
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

</html>
