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
		<link rel="stylesheet" href="css/formSearch.css" />
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
	<div id="section-black">
		<h2>Nom de l'agence et date départ -> Nom de l'agence et date d'arrivée -> Période de location (en jour)</h2>
	</div>

	<div id="section-white">

		<div id="search-form">
			<a class="slide-down1">
				<div class="inclu">Type de véhicule <i class="fa fa-chevron-down fa-lg"></i>
					<p class="option1">
						<input type="checkbox" class="hidden-box" id="first" checked/>
					    <label for="first" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">Citadine</span>
					    </label>

					    <input type="checkbox" class="hidden-box" id="second"/>
					    <label for="second" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">Berline</span>
					    </label>

					    <input type="checkbox" class="hidden-box" id="third"/>
					    <label for="third" class="check--label">
					      <span class="check--label-box"></span>
					      <span class="check--label-text">SUV</span>
					    </label>
					</p>
				</div>
			</a>
		</div>

		<!-- La search list représente la liste des résultats de recherche de véhicule -->
		<div id="search-list">
			<!-- Les divs de classes "vehicule" représentent les blocs de la liste -->
			<div class="vehicule">
				<div class="title"><h3>BMW SÉRIE 3</h3></div>
				<div class="descriptif">
					<img src="https://www.sixt.fr/fileadmin/files/global/user_upload/fleet/png/350x200/bmw-3er-gt-4d-silber-2013.png" alt="BMW Série 3">
					<div class="infos">
						<p><img src="ico/personne.png" alt="Personne"> 5 personnes</p>
						<p><img src="ico/voiture.png" alt="Porte"> 5 portes</p>
						<p><img src="ico/bagage.png" alt="Bagage"> 3 bagages</p>
						<p><img src="ico/boiteVitesse.png" alt="BoiteVitesse"> Manuelle</p>
						<p><img src="ico/clim.png" alt="Climatisation"> Climatisation</p>
					</div>
				</div>
				<a class="slide-down1"><div class="inclu">OPTIONS <i class="fa fa-chevron-down fa-lg"></i><p class="option1">option 1...</p><p class="option1">option 2...</p><p class="option1">option 3...</p></div></a>
				<div class="footer">
					<a href="#">
						<div class="bouton">
							RÉSERVER
						</div>
						<div class="prix">
							<p>123€/j</p>
						</div>
					</a>
				</div>
			</div>

			<div class="vehicule">
				<div class="title"><h3>FIAT 500</h3></div>
				<div class="descriptif">
					<img src="https://www.sixt.fr/fileadmin/files/global/user_upload/fleet/png/350x200/fiat-500-2d-silber-2013.png" alt="BMW Série 3">
					<div class="infos">
						<p><img src="ico/personne.png" alt="Personne"> 5 personnes</p>
						<p><img src="ico/voiture.png" alt="Porte"> 5 portes</p>
						<p><img src="ico/bagage.png" alt="Bagage"> 3 bagages</p>
						<p><img src="ico/boiteVitesse.png" alt="BoiteVitesse"> Manuelle</p>
						<p><img src="ico/clim.png" alt="Climatisation"> Climatisation</p>
					</div>
				</div>
				<a class="slide-down2"><div class="inclu">OPTIONS <i class="fa fa-chevron-down fa-lg"></i><p class="option2">option 1...</p><p class="option2">option 2...</p><p class="option2">option 3...</p></div></a>
				<div class="footer">
					<a href="#">
						<div class="bouton">
							RÉSERVER
						</div>
						<div class="prix">
							<p>105€/j</p>
						</div>
					</a>
				</div>
			</div>

			<div class="vehicule">
				<div class="title"><h3>PEUGEOT 308</h3></div>
				<div class="descriptif">
					<img src="https://www.sixt.fr/fileadmin/files/global/user_upload/fleet/png/350x200/peugeot-308-5d-weiss-2014.png" alt="BMW Série 3">
					<div class="infos">
						<p><img src="ico/personne.png" alt="Personne"> 5 personnes</p>
						<p><img src="ico/voiture.png" alt="Porte"> 5 portes</p>
						<p><img src="ico/bagage.png" alt="Bagage"> 3 bagages</p>
						<p><img src="ico/boiteVitesse.png" alt="BoiteVitesse"> Manuelle</p>
						<p><img src="ico/clim.png" alt="Climatisation"> Climatisation</p>
					</div>
				</div>
				<a class="slide-down3"><div class="inclu">OPTIONS <i class="fa fa-chevron-down fa-lg"></i><p class="option3">option 1...</p><p class="option3">option 2...</p><p class="option3">option 3...</p></div></a>
				<div class="footer">
					<a href="#">
						<div class="bouton">
							RÉSERVER
						</div>
						<div class="prix">
							<p>140€/j</p>
						</div>
					</a>
				</div>
			</div>

			<div class="vehicule">
				<div class="title"><h3>MINI</h3></div>
				<div class="descriptif">
					<img src="https://www.sixt.fr/fileadmin/files/global/user_upload/fleet/png/350x200/mini-cooper-3d-schwarz-2014.png" alt="BMW Série 3">
					<div class="infos">
						<p><img src="ico/personne.png" alt="Personne"> 5 personnes</p>
						<p><img src="ico/voiture.png" alt="Porte"> 5 portes</p>
						<p><img src="ico/bagage.png" alt="Bagage"> 3 bagages</p>
						<p><img src="ico/boiteVitesse.png" alt="BoiteVitesse"> Manuelle</p>
						<p><img src="ico/clim.png" alt="Climatisation"> Climatisation</p>
					</div>
				</div>
				<a class="slide-down4"><div class="inclu">OPTIONS <i class="fa fa-chevron-down fa-lg"></i><p class="option4">option 1...</p><p class="option4">option 2...</p><p class="option4">option 3...</p></div></a>
				<div class="footer">
					<a href="#">
						<div class="bouton">
							RÉSERVER
						</div>
						<div class="prix">
							<p>135€/j</p>
						</div>
					</a>
				</div>
			</div>

			<div class="vehicule">
				<div class="title"><h3>BMW SERIE 1</h3></div>
				<div class="descriptif">
					<img src="https://www.sixt.fr/fileadmin/files/global/user_upload/fleet/png/350x200/bmw-1er-5d-weiss-2017.png" alt="BMW Série 3">
					<div class="infos">
						<p><img src="ico/personne.png" alt="Personne"> 5 personnes</p>
						<p><img src="ico/voiture.png" alt="Porte"> 5 portes</p>
						<p><img src="ico/bagage.png" alt="Bagage"> 3 bagages</p>
						<p><img src="ico/boiteVitesse.png" alt="BoiteVitesse"> Manuelle</p>
						<p><img src="ico/clim.png" alt="Climatisation"> Climatisation</p>
					</div>
				</div>
				<a class="slide-down5"><div class="inclu">OPTIONS <i class="fa fa-chevron-down fa-lg"></i><p class="option5">option 1...</p><p class="option5">option 2...</p><p class="option5">option 3...</p></div></a>
				<div class="footer">
					<a href="#">
						<div class="bouton">
							RÉSERVER
						</div>
						<div class="prix">
							<p>145€/j</p>
						</div>
					</a>
				</div>
			</div>

			<div class="vehicule">
				<div class="title"><h3>RENAULT TRAFIC</h3></div>
				<div class="descriptif">
					<img src="https://www.sixt.fr/fileadmin/files/global/user_upload/fleet/png/350x200/renault-trafic-van-brown-2015.png" alt="BMW Série 3">
					<div class="infos">
						<p><img src="ico/personne.png" alt="Personne"> 5 personnes</p>
						<p><img src="ico/voiture.png" alt="Porte"> 5 portes</p>
						<p><img src="ico/bagage.png" alt="Bagage"> 3 bagages</p>
						<p><img src="ico/boiteVitesse.png" alt="BoiteVitesse"> Manuelle</p>
						<p><img src="ico/clim.png" alt="Climatisation"> Climatisation</p>
					</div>
				</div>
				<a class="slide-down6"><div class="inclu">OPTIONS <i class="fa fa-chevron-down fa-lg"></i><p class="option6">option 1...</p><p class="option6">option 2...</p><p class="option6">option 3...</p></div></a>
				<div class="footer">
					<a href="#">
						<div class="bouton">
							RÉSERVER
						</div>
						<div class="prix">
							<p>152€/j</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>

    </body>

	<!-- Footer section du bas de page -->
	<?php include_once('include/footer.php'); ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/formSearch.js"></script>
	
    <script src="https://cdn.jsdelivr.net/leaflet/1/leaflet.js"> </script>
   
</html>