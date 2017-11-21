<?php 
session_start();

include_once('root.php');
include_once(ROOT.'/controller/CoordonneeController.php');

$message = '';

if (isset($_GET['action']) && $_GET['action'] == 'deconnexion') {
	session_destroy();
	header('Location: index.php');    
}

$ctrl = new CoordonneeController();

$tabInfos = json_decode($ctrl->informationsUser($_SESSION['id']), true);


foreach ($tabInfos as $value) {
	$nom = $value['nom_client'];
	$prenom = $value['prenom_client'];
	$dateN = $value['dateN_client'];
	$adresseFact = $value['add_facturation'];
	$adresse1 = $value['add1_client'];
	$adresse2 = $value['add2_client'];
	$cpVille = $value['cp_villecp'];
	$ville = $value['ville_villecp'];
	$tel = $value['tel_client'];
	$email = $value['email_client'];
	$raison = $value['raisonS_societe'];
	$siret = $value['siret_societe'];
	$nomS = $value['nomC_societe'];
	$civilite = $value['lib_civ'];
}

if (isset($siret)) {
	$checked = "checked";
} else {
	$checked = "";
}

// var_dump($tabInfos);

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
		<h2>Mes informations</h2>
	</div>

	<!-- Première section de page -->
	<div id="section-white">
			<!-- Formulaire -->	
	<div id="formulaire">		
		<form method="" action="">
			<!-- Div message erreur -->
			<div id="erreur">
    			<p>Vous n'avez pas rempli correctement les champs du formulaire !</p>
			</div>
			<!-- choix client pro ou part -->	
			<div id="typeClient">
				<form id="choixClient">
					<label type="text"> Êtes vous un </label><br /><br />
					<label for="oui"> Professionnel ? </label>
						<input type="radio" name="typeClient" value="pro" <?php print($checked); ?>>
					<label for="oui"> Particulier ? </label>
  						<input type="radio" name="typeClient" value="part" <?php print($checked); ?>> 
  				</form>
  			</div>	

  			<!-- demande si présence d'un code promo -->
  			<div id="codePromo">
  				<form id="choixPromo">
  						<label type="text"> Avez vous un code promotionnel </label><br /><br />
  						<label for="oui"> oui </label>
					<input type="radio" name="choixPromo" value="oui">
						<label for="non"> non</label>
  					<input type="radio" name="choixPromo" value="non"> 
  				</form>
  			</div>
  			<!-- partie coupon -->
  				<div id="coupon">
  					<label for="codeCoupon">Code coupon</label>
					<input type="text" id="codeCoupon" class="champ"/><br />
  				</div>
			<!-- haut du formulaire -->	
				<div id="hautform">
					<label for="civ"> Civilité </label>
						<select name="civ" id="civ">
							<option value="<?php print($civilite); ?>" selected><?php print(ucfirst($civilite)); ?></option>
							<option value="monsieur"> Mademoiselle </option>
							<option value="madame"> Madame </option>
							<option value="mademoiselle"> Monsieur </option>
						</select><br/><br/>
	    			<label for="nom">Nom</label>
	    				<input type="text" id="nom" value="<?php print($nom); ?>" class="champ" />
					<label for="prenom">Prénom</label>
						<input type="text" id="prenom" value="<?php print($prenom); ?>" class="champ"/><br />
					<!-- datepicker pour la date de naissance -->
					<label for="ddn"> Date de naissance </label>
						<input type="text" id="datepicker" value="<?php print($dateN); ?>" class="champ" value=""/>
							<div id="erreurddn">
    							<p>date de naissance invalide
    							</p>
							</div>
				</div>
			<!-- partie information adresse -->	
				<div id="mid1form">
						<label for="add1">Adresse</label>
							<input type="text" id="add1" value="<?php print($adresse1); ?>" class="champ"/><br />
						<label for="add2">Complément adresse</label>
							<input type="text" value="<?php print($adresse2); ?>" id="add2"/><br />
						<label for="addfact">Adresse de facturation</label>
							<input type="text" id="addfact" value="<?php print($adresseFact); ?>" class="champ"/><br />
						<label for="cp">Code postal</label>
							<input type="text" id="villecp" value="<?php print($cpVille); ?>" class="champ"/><br />
							<div id="erreurvillecp">
    							<p>code postale invalide
    							</p>
							</div>
						<label for="ville">Ville</label>
							<input type="text" id="ville" value="<?php print($ville); ?>" class="champ"/><br />			
						<label for='pays'>Pays</label>
							<select name="pays" id="pays" class="champ">
								<option value="">Pays</option>
							</select><br />
				</div>
			<!-- partie information mdp -->
				<div id="mid2form">
	    			<label for="mdp">Mot de passe</label>
	    				<input type="password" id="mdp" class="champ" /><br />
	    			<label for="confirmation">Confirmation</label>
	    				<input type="password" id="confirmation" class="champ" /><br />
	    				<div id="erreurpwd">
    					<p> Le mot de passe doit contenir
   							• Au moins une lettre minuscule
   							• Au moins une lettre majuscule
   							• Au moins un chiffre
   							• Au moins huit caractères
   						</p>
					</div>
	   		 	</div>
 
	   		 <!-- partie information contact -->
	   		 	<div id="basform">
	    			<label for="tel">Téléphone</label>
	    				<input type="tel" id="tel" value="<?php print($tel); ?>" class="champ"/>
	    				<div id="erreurtel">
    						<p>numéro de télépone invalide
    						</p>
						</div>
	    			<label for="mail">E-mail</label>
	    				<input type="text" id="mail" value="<?php print($email); ?>" class="champ" /><br />
    					<div id="erreurmail">
    						<p>adresse e-mail invalide
    						</p>
						</div>
	   			</div>

	   		 <!-- partie client pro -->
	   		 	<div id="proform">
	   		 		<label for="raisonSociale">Raison sociale</label>
	    				<input type="text" id="raisonSociale" value="<?php print($raison); ?>" class="champ"/>
	    			<label for="siret">Numéro SIRET</label>
	    				<input type="text" id="siret" value="<?php print($siret); ?>" class="champ" /><br />
	    			<label for="nomCSociete">Nom contact société</label>
	    				<input type="text" id="nomCSociete" value="<?php print($nomS); ?>" class="champ" /><br />
	    		</div>
	   			<!-- boutons -->
	    			<input class='btn' type="submit" id="envoi" value="Envoyer" /> <input class='btn' type="reset" id="reset" value="Reset" />
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
    <script src="js/inscription.js"></script>
       <script src="js/datepicker.js"></script>
</html>