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
			      <li>Lorem ipsum dolor</li>
			      <li>Set amet consecuter</li>
			      <li>Lorem ipsum dolor</li>
			      <li>Set amet consecuter</li>
			    </ul>
			        
			    <a class="expand"><span class="plus">+</span><span class="minus">-</span></a>
			  </div>
			  
			  <div class="box box2">
			    
			    <h3>Berline</h3>
			    
			    <ul class="hidden">
			      <li>Lorem ipsum dolor</li>
			      <li>Set amet consecuter</li>
			      <li>Lorem ipsum dolor</li>
			      <li>Set amet consecuter</li>
			    </ul>
			        
			    <a class="expand"><span class="plus">+</span><span class="minus">-</span></a>
			  </div>
			  
			  <div class="box box3">
			   
			    <h3>SUV</h3>
			    
			    <ul class="hidden">
			      <li>Lorem ipsum dolor</li>
			      <li>Set amet consecuter</li>
			      <li>Lorem ipsum dolor</li>
			      <li>Set amet consecuter</li>
			    </ul>
			        
			    <a class="expand"><span class="plus">+</span><span class="minus">-</span></a>
			  </div>
			  
			  <div class="box box4">
			    
			    <h3>Sport</h3>
			    
			    <ul class="hidden">
			      <li>Lorem ipsum dolor</li>
			      <li>Set amet consecuter</li>
			      <li>Lorem ipsum dolor</li>
			      <li>Set amet consecuter</li>
			    </ul>
			      
			    <a class="expand"><span class="plus">+</span><span class="minus">-</span></a>
			  </div>

			  <div class="box box5">
			    
			    <h3>Luxe</h3>
			    
			    <ul class="hidden">
			      <li>Lorem ipsum dolor</li>
			      <li>Set amet consecuter</li>
			      <li>Lorem ipsum dolor</li>
			      <li>Set amet consecuter</li>
			    </ul>
			        
			    <a class="expand"><span class="plus">+</span><span class="minus">-</span></a>
			  </div>

			  <div class="box box6">
			    
			    <h3>Utilitaire</h3>
			    
			    <ul class="hidden">
			      <li>Lorem ipsum dolor</li>
			      <li>Set amet consecuter</li>
			      <li>Lorem ipsum dolor</li>
			      <li>Set amet consecuter</li>
			    </ul>
			        
			    <a class="expand"><span class="plus">+</span><span class="minus">-</span></a>
			  </div>
			  
			  <div class="box box7">
			    
			    <h3>Moto</h3>
			    
			    <ul class="hidden">
			      <li>Lorem ipsum dolor</li>
			      <li>Set amet consecuter</li>
			      <li>Lorem ipsum dolor</li>
			      <li>Set amet consecuter</li>
			    </ul>
			        
			    <a class="expand"><span class="plus">+</span><span class="minus">-</span></a>
			  </div>
			  
			  <div class="box box8">
			    
			    <h3>Vélo</h3>
			    
			    <ul class="hidden">
			      <li>Lorem ipsum dolor</li>
			      <li>Set amet consecuter</li>
			      <li>Lorem ipsum dolor</li>
			      <li>Set amet consecuter</li>
			    </ul>
			        
			    <a class="expand"><span class="plus">+</span><span class="minus">-</span></a>
			  </div>
		</div>
	</div>

	<div id="section-white">
		<p style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aspernatur, ducimus laborum, molestias voluptas recusandae hic obcaecati suscipit doloribus illum dolores fugiat quos sapiente. Corrupti itaque vero ratione beatae necessitatibus!</p>
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
   
    <script type="text/javascript">
		function affiche(element)
		{
		    var targetElement;
		    targetElement = document.getElementById(element) ;
		    if (targetElement.style.display == "none")
		    {
		        targetElement.style.display = "" ;
		    }
		        else
		        {
		        targetElement.style.display = "none" ;
		    }
		}
	</script>

	<script src="https://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>

</html>