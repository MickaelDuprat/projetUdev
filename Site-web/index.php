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
		<link rel=""
    </head>

    <!-- Corps général de la page -->
    <body>

	<!-- Barre de naviguation du site -->
	<?php include_once('include/nav.php'); ?>

    <!-- Header du site -->  
	<?php include_once('include/header.php'); ?>

	<!-- Première section de page -->
		<div id="section-white">
			<article>
				<h3>Détendez-vous, nous nous occupons de tout !</h3>
				<p><i>Vous n'avez qu'à chosir votre véhicule ...</i></p>
			</article>

			<aside>
				<h3><i>Choisissez le véhicule qui vous correspond ...</i></h3>
				<img src="img/horizon.jpg" alt="Horizon">
			</aside>
		</div>
	

	<!-- Deuxième section de page -->
	<div id="section-black">
		<div id="categories">
			  <div class="box box1">
			    
			    <h3>Citadine</h3>
			    
			    <ul class="hidden">
			      <li>
			      	Adaptée aux déplacements en milieu urbain
			  	  </li>
			    </ul>
			        
			    <a class="expand"><span class="plus">+</span><span class="minus">-</span></a>
			  </div>
			  
			  <div class="box box2">
			    
			    <h3>Berline</h3>
			    
			    <ul class="hidden">
			      <li>
			      	Pratique, polyvalente et confortable
			      </li>
			    </ul>
			        
			    <a class="expand"><span class="plus">+</span><span class="minus">-</span></a>
			  </div>
			  
			  <div class="box box3">
			   
			    <h3>SUV</h3>
			    
			    <ul class="hidden">
			      <li>Spacieux, Pratique,  Adapté à tous les milieux
			      </li>
			    </ul>
			        
			    <a class="expand"><span class="plus">+</span><span class="minus">-</span></a>
			  </div>
			  
			  <div class="box box4">
			    
			    <h3>Sport</h3>
			    
			    <ul class="hidden">
			      <li>
			      	La performance avant tout
			      </li>
			    </ul>
			      
			    <a class="expand"><span class="plus">+</span><span class="minus">-</span></a>
			  </div>

			  <div class="box box5">
			    
			    <h3>Luxe</h3>
			    
			    <ul class="hidden">
			      <li>
			      Allie confort intérieur avec sensations de conduites</li>
			    </ul>
			        
			    <a class="expand"><span class="plus">+</span><span class="minus">-</span></a>
			  </div>

			  <div class="box box6">
			    
			    <h3>Utilitaire</h3>
			    
			    <ul class="hidden">
			      <li> Idéal pour vos déménagements et transports de marchandises</li>
			    </ul>
			        
			    <a class="expand"><span class="plus">+</span><span class="minus">-</span></a>
			  </div>
			  
			  <div class="box box7">
			    
			    <h3>Moto</h3>
			    
			    <ul class="hidden">
			      <li>
			      	Parfait pour s'évader 
			      </li>
			    </ul>
			        
			    <a class="expand"><span class="plus">+</span><span class="minus">-</span></a>
			  </div>
			  
			  <div class="box box8">
			    
			    <h3>Vélo</h3>
			    
			    <ul class="hidden">
			      <li>
			      	Déplacez-vous où vous le souhaitez sans contraintes des embouteillages ou du stationnement
			      </li>
			    </ul>
			        
			    <a class="expand"><span class="plus">+</span><span class="minus">-</span></a>
			  </div>
		</div>
	</div>

	<div id="section-white">
		<iframe id="carte" src="https://www.google.com/maps/d/u/0/embed?mid=1LbHksYOSFHPVv_lcOKlCRGAlzerjbiE7" width="640" height="480"></iframe>

		<div id="agences">
					<h2> Nos agences en France </h2>
					<br /> 
					Retrouvez nous sur nos 5 sites localisés sur
					<br />
						<ul>
							<li>Châtellerault</li>
							<li>Niort</li>
							<li>Bordeaux</li>
							<li>Courçon</li>
							<li>Poey-d'Oloron</li>
						</ul>
					

				 	Une équipe de professionnelle à votre disposition et à votre écoute 
					pour vous accompagnez tout au long de
					votre location.
		</div>
	</div>

    </body>

	<!-- Footer section du bas de page -->
	<?php include_once('include/footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/voiture.js" type="text/javascript"></script>
	<script src="js/datedropper.js"></script>

    <script src="https://cdn.jsdelivr.net/leaflet/1/leaflet.js"></script>
	<script src="js/datedropper.js"></script>
	<script src="js/formLogin.js"></script>
	
</html>