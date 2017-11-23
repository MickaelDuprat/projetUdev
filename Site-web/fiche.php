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
      <h2><a href="search.php">Sélection du véhicule</a>  - <span><a href="fiche.php">Choix des options</a></span> - <a href="paiement.php">Paiement</a></h2>
    </div>

	<div id="section-white">
	    <aside id="resume-voiture">
	        <img id="vehselect" src="img/bmw-1.png" alt="bmw-1">
	        <h3> Départ </h3>
	        <p> Agence de départ </p>
	        <h3> Retour </h3>
	        <p> Agence de retour </p>
	        <h3> Période de location </h3>
	        <p> 1 jour </p>
	        <h3> Equipement du véhicule </h3>
	            <p><img id="iconeporte" src="ico/voiture.png" alt="Porte"> 5 portes</p>
	            <p><img id="iconeboitev" src="ico/boiteVitesse.png" alt="BoiteVitesse"> Manuelle</p>
	            <p><img id="iconeclim" src="ico/clim.png" alt="Climatisation"> Climatisation</p>
	        <h3> Capacité </h3>
	            <p><img id="iconenbpers" src="ico/personne.png" alt="Personne"> 5 personnes
	            <p><img id="iconebagage" src="ico/bagage.png" alt="Bagage"> 3 bagages</p>
	        <h3> Conditions générales </h3>
	        <p> informations relatives à la location chez Error 404 </p>     
	    </aside>

	    <div id="liste-option">
	                <p> Tarif de base de la location* : </p> <b> 115 € </b>
	            <ul>
	                <li> <img id="conducteur-supp" src="img/conducteur-supp.png" alt="Conducteur Supplémentaire">
	                <p>  Conducteur supplémentaire </p> <span> 11,00 € </span>
	                    <select name="NbcondcteurSupp">
	                        <option value='0' selected>0</option>                       
	                        <option value='1'>1</option>
	                        <option value='2'>2</option>
	                        <option value='3'>3</option>
	                        <option value='4'>4</option>
	                        <option value='5'>5</option>                       
	                     </select>


	                </li>

	                <li> <img id="gps" src="img/GPS.png" alt="GPS">
	                 <p> Système de navigation GPS </p> <span> 13,00 € </span>
	                    <select name="NbGPS">
	                        <option value='0' selected>0</option>                        
	                        <option value='1'>1</option>
	                     </select>

	                </li>  

	                <li> <img id="siege-enfant" src="img/siege-enfant.png" alt="Siège enfant">
	                 <p> Siège enfant </p> <span> 10,99 € </span>
	                    <select name="NbSiegeEnfant">
	                        <option value='0' selected>0</option>  
	                        <option value='1'>1</option>
	                        <option value='2'>2</option>
	                        <option value='3'>3</option>
	                        <option value='4'>4</option>
	                    </select>
	                </li>  

	                 <li> <img id="nacelle-bebe" src="img/nacelle-bebe.png" alt="Nacelle bébé">
	                <p> Nacelle bébé </p> <span> 10,00 € </span>
	                    <select name="NbNacelleBebe">
	                        <option value='0' selected>0</option> 
	                        <option value='1'>1</option>
	                        <option value='2'>2</option>
	                        <option value='3'>3</option>
	                        <option value='4'>4</option>   
	                        </select>
	                 
	                </li>

	                <li> <img id="rehausseur-integral" src="img/rehausseur-integral.png" alt="Réhausseur intégral">
	                 <p> Réhausseur intégral </p> <span> 7,99 € </span>
	                    <select name="NbRehausseurIntegral">
	                        <option value='0' selected>0</option> 
	                        <option value='1'>1</option>
	                        <option value='2'>2</option>
	                        <option value='3'>3</option>
	                        <option value='4'>4</option>
	                        </select>
	                </li>

	                <li> <img id="fact-courrier" src="img/fact-courrier.png" alt="Facturation par courrier">
	                <p> Facturation par courrier </p> <span> 2,99 € </span>
	                        <input type="checkbox" id="subscribefactcourrier" name="factcourrier">
	                </li>
	            </ul>
	    </div>
	    <form method="POST" action="paiement.php">
	    <div id="section-paiement">
	        <p>  Prix Total* : </p> <b> 115 € </b>
	        <input type="submit" id="validepaiement" value = "J'accepte le tarif et les options"/>
	    </form>
	        <small> *Prix total TTC incluant la TVA </small>
	        <small> Veuillez noter que l'affichage de l'image et les spécifications du véhicule n'est qu'un exemple illustratif des actes de classe de véhicule (sauf erreur). Une réservation est possible uniquement pour une catégorie de véhicule, mais pas pour un véhicule particulier. </small>
	        <small> Toutes les informations sur les dimensions, le poids, etc. sont basés sur les plus petits modèles disponibles de la catégorie. </small>
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
   
</html>