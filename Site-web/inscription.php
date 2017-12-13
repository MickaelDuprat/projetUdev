<?php 
session_start();

include_once('root.php');
include_once(ROOT.'/controller/AuthentificationController.php');
include_once(ROOT.'/controller/InscriptionController.php');
include_once(ROOT.'/controller/CoordonneeController.php');

$message = '';

if (isset($_GET['action']) && $_GET['action'] == 'deconnexion') {
	session_destroy();
	header('Location: index.php');    
}

$ctrl = new InscriptionController();

if (isset($_POST['inscription'])) {

 	  $codeCoupon = $_POST['codeCoupon'];
      $civ = $_POST['civ'];
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $dateN = $_POST['dateN'];
      $adresse = $_POST['adresse'];
      $adresse2 = $_POST['adresse2'];
      $adresseFact = $_POST['adresseFact'];
      $codePostal = $_POST['codePostal'];
      $telephone = $_POST['telephone'];
      $email = $_POST['email'];
      $raisonSociale = $_POST['raisonSociale'];
      $siret = $_POST['siret'];
      $nomSociete = $_POST['nomSociete'];

      $jsonTab = json_decode($ctrl->getIdVille($_POST['codePostal']), true);
	  $idVille = $jsonTab['result']['id_villecp'];

	  $jsonTab = json_decode($ctrl->inscription($nom, $prenom, $dateN, $email, $telephone, $codeCoupon, $adresseFact, $adresse, $adresse2, $raisonSociale, $siret, $nomSociete, $civ, $idVille), true);

	
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
		<h2>Création du profil</h2>
	</div>

	<!-- Première section de page -->
	<div id="section-white">
			<!-- Formulaire -->	
	<div id="formulaire">		
		<form method="POST" action="inscription.php">
			<!-- Div message erreur -->
			<div id="erreur">
    			<p>Vous n'avez pas rempli correctement les champs du formulaire !</p>
			</div>
			<!-- choix client pro ou part -->	
			<div id="typeClient">
				<div id="choixClient">
					<label type="text"> Êtes vous un </label><br /><br />
					<label for="oui"> Professionnel ? </label>
						<input type="radio" name="typeClient" value="pro">
					<label for="oui"> Particulier ? </label>
  						<input type="radio" name="typeClient" value="part"> 
  				</div>
  			</div>	

  			<!-- demande si présence d'un code promo -->
  			<div id="codePromo">
  				<div id="choixPromo">
  						<label type="text"> Avez vous un code promotionnel </label><br /><br />
  						<label for="oui"> oui </label>
					<input type="radio" name="choixPromo" value="oui">
						<label for="non"> non</label>
  					<input type="radio" name="choixPromo" value="non"> 
  				</div>
  			</div>
  			<!-- partie coupon -->
  				<div id="coupon">
  					<label for="codeCoupon">Code coupon</label>
					<input type="text" name="codeCoupon" id="codeCoupon" class="champ"/><br />
  				</div>
			<!-- haut du formulaire -->	
				<div id="hautform">
					<label for="civ"> Civilité </label>
						<select name="civ" id="civ">
							<option value=""></option>
							<option value="0"> Mademoiselle </option>
							<option value="1"> Madame </option>
							<option value="2"> Monsieur </option>
						</select><br />
	    			<label for="nom">Nom</label>
	    				<input type="text" name="nom" id="nom" class="champ" />
					<label for="prenom">Prénom</label>
						<input type="text" name="prenom" id="prenom" class="champ"/><br />
					<!-- datepicker pour la date de naissance -->
					<label for="ddn"> Date de naissance </label>
						<input type="text" name="dateN" id="datepicker" class="champ" value=""/>
							<div id="erreurddn">
    							<p>date de naissance invalide
    							</p>
							</div>
				</div>
			<!-- partie information adresse -->	
				<div id="mid1form">
						<label for="add1">Adresse</label>
							<input type="text" name="adresse" id="add1" class="champ"/><br />
						<label for="add2">Complément adresse</label>
							<input type="text" name="adresse2" id="add2"/><br />
						<label for="addfact">Adresse de facturation</label>
							<input type="text" name="adresseFact" id="addfact" class="champ"/><br />
						<label for="cp">Code postal</label>
							<input type="text" name="codePostal" id="villecp" class="champ"/><br />
							<div id="erreurvillecp">
    							<p>code postale invalide
    							</p>
							</div>
						<label for="ville">Ville</label>
							<input type="text" name="ville" id="ville" class="champ"/><br />			
						<label for='pays'>Pays</label>
							<select name="pays" id="pays" class="champ">
								<option value="France"> France </option>
							</select>
				</div>
				
			<!-- partie information mdp -->
				<div id="mid2form">
					<label for="login">Login </label>
						<input type="text" id="login" name="login" class="champ"/><br />
						<div id="erreurlogin">
    					<p> le login doit contenir au moins 5 caractères
   						</p>
					</div>
	    			<label for="mdp">Mot de passe</label>
	    				<input type="password" name="password" id="mdp" class="champ" /><br />
	    			<label for="confirmation">Confirmation</label>
	    				<input type="password" name="passwordConfirm" id="confirmation" class="champ" /><br />
	    				<div id="erreurpwd">
    					<p> Les mots de passes doivent être identiques !
   						</p>
					</div>
	   		 	</div>

	   		 <!-- partie information contact -->
	   		 	<div id="basform">
	    			<label for="tel">Téléphone</label>
	    				<input type="tel" name="telephone" id="tel" class="champ"/>
	    				<div id="erreurtel">
    						<p>numéro de télépone invalide
    						</p>
						</div>
	    			<label for="mail">E-mail</label>
	    				<input type="text" name="email" id="mail" class="champ" /><br />
    					<div id="erreurmail">
    						<p>adresse e-mail invalide
    						</p>
						</div>
	   			</div>

	   		 <!-- partie client pro -->
	   		 	<div id="proform">
	   		 		<label for="raisonSociale">Raison sociale</label>
	    				<input type="text" name="raisonSociale" id="raisonSociale" class="champ"/>
	    			<label for="siret">Numéro SIRET</label>
	    				<input type="text" name="siret" id="siret" class="champ" /><br />
	    			<label for="nomCSociete">Nom contact société</label>
	    				<input type="text" name="nomSociete" id="nomCSociete" class="champ" /><br />
	    		</div>
	   			<!-- boutons -->
	    			<input class="btn" type="submit" name="inscription" id="envoi" value="Envoyer" /> <input class="btn" type="reset" id="reset" value="Reset" />
			</form>
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
  	<!-- <script src="js/inscription.js"></script> -->
    <script src="js/datepicker.js"></script>
    <script src="js/backToTop.js"></script>
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


    	$('#envoi').click(function(){
	if($('input[name=typeClient]:checked').val() == "pro"){
		 $('#typeClient').show();
	} else {
		$('#typeClient').hide();
		}

		if($('input[name=choixPromo]:checked').val() == "non"){
		$('#codePromo').hide();
		} else {
		$('#codePromo').show();
		}
	});
    </script>
</html>