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
        <link rel="stylesheet" href="css/formInscription.css">
        <!-- Importation de la librairie d'icônes "Font Awesome" -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<!-- Importation des polices de caractères "Dosis", Poppins" et "Quicksand" via Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Dosis|Poppins|Quicksand" rel="stylesheet">
		<!-- Importation de la police de caractère "Didact" via Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet"> 
		<!-- Importation de la librairie css concernant le datepicker -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datedropper/2.0/datedropper.css" />
    </head>

    <!-- Corps général de la page -->
    <body>

	<!-- Barre de naviguation du site -->
	<nav>
		<img src="img/logo.png" alt="Logo"/>
		<ul>
		    <li>Accueil</li>
		    <li>Types de véhicules</li>
		    <li>Partenaires</li>
		    <li>Contact</li>
		    <li><a href="#" id="loginform">Connexion</a> | <a href="#">Inscription</a>
			    <div class="login">
			      <div class="formholder">
			        <div class="randompad">
			           <fieldset>
			             <label name="email">Email</label>
			             <input type="email" placeholder="example@example.com" />
			             <label name="password">Password</label>
			             <input type="password" placeholder="••••••••••" />
			             <input type="submit" value="Connexion" />
			           </fieldset>
			        </div>
			      </div>
			    </div>
			</li>
		</ul>
	</nav>	

	<div class="formulaire">
		<div class="infoPerso">
			<h3> informations personnels </h3>
			<form method="post" name="infoperso">
   			 	<select id="civ" name="Civilité">
    				<option> civilité* </option><br />
     				<option value="">Mademoiselle</option>
      				<option value="">Madame</option>
     				<option value="">Monsieur</option>
    			</select><br/>

				<label>Nom*:</label><input type="text" name="Nom" placeholder="Entrez votre nom ici.." value="" /><br/>

				<label>Prenom*:</label><input type="text" name="Prenom" placeholder="Entrez votre prénom ici.."value="" /><br/>

				<label for="dateNaissance">Date de naissance*:</label>
					<select> Jour 
						<option> Jour </option>
					</select>

					<select> Mois 
						<option> Mois </option>
					</select>
						
					<select> Années
						<option> Années </option>
					</select>
			</form>
		</div>

		<div class="infoMdp">
			<form method="post" name="infoMdp">
				<h3> choix mot de passe </h3>
					<label>Mot de passe*</label><input type="password" name="mdp" placeholder="Choisir un mot de passe (6/15 caractères)" value=""></input><br/>
					<label>Confirmation mot de passe</label><input type="password" name="mdp" placeholder="Confirmer votre mot de passe"  value=""><br/>
			</form>
		</div>
			
		<div class="infoAdresse">
			<form method="post" name="infoAdresse">
				<h3> adresse </h3>
					<label>Adresse1*</label><input type="text" name="Add1" placeholder="Entrez votre adresse ici..." value=""><br/>
					<label>Adresse2</label><input type="text" name="Add2" placeholder="complément d'adresse (facultatif)" value=""><br/>
					<label> Code Postal*</label><input type="text" name="Codecp" placeholder="Votre code postal ici.." value=""><br/>
					<label> Ville*</label><input type="text" name="Ville" placeholder="Ville"  value=""><br/>
					<label>Pays*</label><input type="text" name="Pays" placeholder="Pays" value="" /><br/>
			</form>
		</div>

		<div class="infoContact">
			<form method="post" name="infoContact">
				<h3> contact </h3>
					<label>E-mail*</label><input type="text" name="email" placeholder= "example@mail.com" value=""><br/>
					<label>Telephone*</label><input type="text" name="tel" placeholder="xx.xx.xx.xx.xx" value="">
			</form>
		</div>		
	</div>
	</body>
</html>