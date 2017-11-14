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
        <!-- Importation de la librairie d'icônes "Font Awesome" -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<!-- Importation des polices de caractères "Dosis", Poppins" et "Quicksand" via Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Dosis|Poppins|Quicksand" rel="stylesheet">
		<!-- Importation de la police de caractère "Didact" via Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet"> 
		<!-- Importation de la librairie css concernant le datepicker -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datedropper/2.0/datedropper.css" />
		<!-- Importation de la librairie css concernant le formulaire du profil -->
		<link rel="stylesheet" href="css/formProfil.css" />
		<!-- Importation de la librairie css concernant la police d'écriture FontAwesonne -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    </head>

    <!-- Corps général de la page -->
    <body>

	<!-- Barre de naviguation du site -->
	<?php include_once('include/nav.php'); ?>

	<!-- Première section de page -->
	<div id="section-black">
		<h2>Compléter votre profil ...</h2>
	</div>

	<div id="section-white">
		<div id="profil-form">
			<div class='sign-up'>
				<div class='step-list'>
					<div class='step current'><i class="fa fa-user" aria-hidden="true"></i></div>
					<div class='step'><i class="fa fa-key" aria-hidden="true"></i></div>
					<div class='step'><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
					<div class='step fin'><i class="fa fa-check" aria-hidden="true"></i></div>		
				</div>
				<div class='steps'>
					<form>
						<div class='step active'>
							<h1 class='title'>Informations personnelles</h1>
							<div class='field'>
								<label for='fname'>Nom</label>
								<input type='text' name='fname' id='fname' data-minCharLength='1'/>
							</div>
							<div class='field'>
								<label for='uname'>Prénom</label>
								<input type='text' name='uname' id='uname' data-minCharLength='1' data-maxCharLength='35'/>
							</div>
							<div class='field'>
								<label for='email'>Adresse mail</label>
								<input type='email' name='email' id='email' />
							</div>
							<div class='field next'>
								<button disabled>Suivant</button>
							</div>
						</div>
						<div class='step'>
							<h1 class='title'>Informations conernant votre compte</h1>
							<div class='field'>
								<label for='pass1'>Mot de passe</label>
								<input type='Password' name='pass1' id='pass1' data-minCharLength='8'/>
							</div>
							<div class='field'>
								<label for='pass2'>Confirmation</label>
								<input type='Password' name='pass2' id='pass2' data-minCharLength='8'/>
							</div>
							<div class='field next'>
								<button disabled>Suivant</button>
							</div>
						</div>
						<div class='step'>
							<h1 class='title' style='margin: 0'>Confirm email address</h1>
							<p style='color: #999; font-size: 15px; margin: 0'>Enter the 8 digit pin sent to:<br /> sa********es@i****d.com</p>
							<div class='field'>
								<label for='checkemail'>Confirmation Pin</label>
								<input type='text' name='checkemail' id='checkemail' data-minCharLength='8' data-maxCharLength='8'/>
							</div>	
							<div class='field next'>
								<button disabled>Continue</button>
							</div>
						</div>
						<div class='step fi'>
							<h1 class='title'>Finaliser</h1>
							<a href='#' class='btn'>Retour sur la page d'accueil</a>
						</div>
					</form>	
				</div>	
			</div>	
		</div>
	</div>

    </body>

	<!-- Footer section du bas de page -->
	<?php include_once('include/footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/leaflet/1/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.2.0/zxcvbn.js"></script>

    <!-- Importation de la librairie js concernant le formulaire du profil -->
    <script src="js/profil.js"></script>
   	<script src="js/formLogin.js"></script>

</html>