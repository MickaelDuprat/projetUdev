<?php 
session_start();

include_once('root.php');
include_once(ROOT.'/controller/AuthentificationController.php');
include_once(ROOT.'/controller/ContratController.php');

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
    </head>

    <!-- Corps général de la page -->
    <body>

	<!-- Barre de naviguation du site -->
	<?php include_once('include/nav.php'); ?>
                
	<!-- Première section de page -->
	<div id="head-black">
        <a href="search.php">Sélection du véhicule</a> - <a href="fiche.php">Choix des options</a> - <a class="checked" href="paiement.php">Paiement</a>
    </div>

		<div id="section-white">
            </div>     
        
        <!--page paiement-->

        <form id="formulairePaiement" method="POST" onsubmit="verification()" action="remerciement.php">

                <input type="hidden" name="dateNow" value="<?php print($_POST['dateNow']); ?>"/>
                <input type="hidden" name="dateDepart" value="<?php print($_POST['dateDepart']); ?>"/>
                <input type="hidden" name="dateArrivee" value="<?php print($_POST['dateArrivee']); ?>"/>
                <input type="hidden" name="idClient" value="<?php print($_POST['idClient']); ?>"/>
                <input type="hidden" name="idVehicule" value="<?php print($_POST['idVehicule']); ?>"/>
                <input type="hidden" name="agence" value="<?php print($_POST['agence']); ?>"/>

            

                <div class="panel panel-info">
                    <div class="panel-heading" style="margin-top: 40px;"><span><i class="fa fa-lock fa-2x"></i></span> <span class="title">Paiement sécurisé</span></div>
                    <div class="panel-body">
                        
                        <div class="form-group">
                            <div class="col-md-12">
                                 <label>Type de carte</label>
                                <select id="CreditCardType" name="CreditCardType" class="form-control" onchange="verificationCreditCardType()">
                                    <option value="" align="center" selected>/</option>
                                    <option value="2">Visa</option>
                                    <option value="3">MasterCard</option>
                                    <option value="4">American Express</option>
                                    <option value="5">Discover</option>
                                </select>
                                <span id="erreur_CreditCardType" style="visibility: visible" > Veuillez choisir un type de carte bancaire !</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Titulaire de la carte bancaire</label>
                            <div class="col-md-12"><input type="text" class="form-control" id="car_owner" placeholder="Nom du titulaire de la carte bancaire" value="" onchange="verification_titulaire()"/> </div>
                            <span id="erreur_car_owner" style="visibility:hidden" > Vous avez mal saisi le nom du titulaire de la carte bancaire !</span>
                            <label>Numéro de la carte</label>
                            <div class="col-md-12"><input type="text" class="form-control" id="car_number" placeholder="Numéro de carte bancaire" value="" onchange="verification_carte()"/> </div>
                            <span id="erreur_car_number" style="visibility: hidden" > Vous avez mal saisi le numéro de la carte bancaire !</span>
                        </div>
                        
                        <div class="form-group">
                            <label>Date d'expiration</label>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" id="mois" onchange="verificationMois()">
                                   <option value="Mois">Mois</option>
                                    <?php 
                                        for ($i= 1; $i < 13; $i++) {
                                          print('<option value='.$i.'>'.$i.'</option>');
                                        }
                                    ?>
                                </select>
                                <span id="erreur_mois" style="visibility: visible"> Veuillez choisir un mois !</span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" id="annee"  onchange="verificationAnnee()">
                                    <option value="Année">Année</option>
                                    <?php 
                                    for ($i= 2017; $i < 2032; $i++) {
                                    print('<option value='.$i.'>'.$i.'</option>');
                                    }
                                    ?>
                                </select>
                                <span id="erreur_annee" style="visibility: visible" > Veuillez choisir une année !</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Cryptogramme CVV</label>
                            <div class="col-md-12"><input type="text" class="form-control" id="car_crypto" placeholder="Cryptogramme visuel" value="" onchange="verification_crypto()"/></div>
                            <span id="erreur_car_crypto" style="visibility: hidden" > Vous avez mal saisi le cryptogramme visuel !</span>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <span style="color:black">Paiement sécurisé avec.</span>
                            </div>
                            <div class="col-md-12">
                                <ul class="cards">
                                    <li class="visa hand">Visa</li>
                                    <li class="mastercard hand">MasterCard</li>
                                    <li class="Amex">Amex</li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <a href="remerciement.php"> <button type="submit" class="btn btn-primary btn-submit-fix" onclick="verification()">Paiement</button> <input type="hidden" name="recuptotal" value="<?php print($_POST['recuptotal']); ?>" id="recuptotal"></a>

                            </div>
                        </div>
                    </div>
                    </div>
                  
                </div>
                
            </form>
            </div>
            <div class="row cart-footer">
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
<!--
    <script type="text/javascript">

function verification_titulaire() {
    var car_owner = document.getElementById('car_owner');
    var car_owner_value = car_owner.value;
    var saisie_owner = /^[a-zéèàùûêâôë]{1}[a-zéèàùûêâôë \'-]*[a-zéèàùûêâôë]$/; //regex testé 
    var resultat_owner = saisie_owner.test(car_owner_value);
    
    if(car_owner_value == "" || resultat_owner == false) {
        document.getElementById('erreur_car_owner').style.visibility = "visible";
        car_owner.focus();
        return false;
    }
    document.getElementById('erreur_car_owner').style.visibility = "hidden";
    return true;
}

function verification_carte() {
    var car_number = document.getElementById('car_number');
    var car_number_value = car_number.value;
    var saisie_number = /^[0-9]{16}/; //regex testé 
    var resultat_number = saisie_number.test(car_number_value);
    
    if(car_number_value == "" || resultat_number == false) {
        document.getElementById('erreur_car_number').style.visibility = "visible";
        car_number.focus();
        return false;
    }
    document.getElementById('erreur_car_number').style.visibility = "hidden";
    return true;
}

function verification_crypto() {
    var car_crypto = document.getElementById('car_crypto');
    var car_crypto_value = car_crypto.value;
    var saisie_crypto = /^[0-9]{3}$/; //regex testé 
    var resultat_crypto = saisie_crypto.test(car_crypto_value);

    if(car_crypto_value == "" || resultat_crypto == false) {
        document.getElementById('erreur_car_crypto').style.visibility = "visible";
        car_crypto.focus();
        return false;
    }
    document.getElementById('erreur_car_crypto').style.visibility = "hidden";
    return true;
}


function verificationCreditCardType() {
    // récupération des informations des <select>
    var credit_card_type = document.getElementById('CreditCardType');
    if(credit_card_type.value != "") {
        document.getElementById('erreur_CreditCardType').style.visibility = "hidden";
        return true;
    }
    document.getElementById('erreur_CreditCardType').style.visibility = "visible";
    return false;
}

function verificationMois() {
    // récupération des informations des <select>
    var mois = document.getElementById('mois');
    if(mois.value != "Mois") {
        document.getElementById('erreur_mois').style.visibility = "hidden";
        return true;
    }
    document.getElementById('erreur_mois').style.visibility = "visible";
    return false;
}

function verificationAnnee() {
    // récupération des informations des <select>  
    var annee = document.getElementById('annee');
    if(annee.value != "Année") {
        document.getElementById('erreur_annee').style.visibility = "hidden";
        return true;
    }
    document.getElementById('erreur_annee').style.visibility = "visible";
    return false;
}

function verification() {
    // récupération des informations des <input>
    var car_owner = document.getElementById('car_owner');
    var car_owner_value = car_owner.value;
    var saisie_owner = /^[a-zéèàùûêâôë]{1}[a-zéèàùûêâôë \'-]*[a-zéèàùûêâôë]$/; //regex testé 
    var resultat_owner = saisie_owner.test(car_owner_value);

    var car_number = document.getElementById('car_number');
    var car_number_value = car_number.value;
    var saisie_number = /^[0-9]{16}/; //regex testé 
    var resultat_number = saisie_number.test(car_number_value);

    var car_crypto = document.getElementById('car_crypto');
    var car_crypto_value = car_crypto.value;
    var saisie_crypto = /^[0-9]{3}/; //regex testé 
    var resultat_crypto = saisie_crypto.test(car_crypto_value);
    // on teste les différentes conditions et on affiche ou non les messages d'erreurs
    //
    if(credit_card_type.value == "") {
        credit_card_type.focus();
        return false;
    }
    if(mois.value == "Mois") {
        mois.focus();
        return false;
    }
    if(annee.value == "Année") {
        annee.focus();
        return false;
    }

    if(car_owner == "" || resultat_owner == false) {
        car_owner.focus();
        return false;
    }
    
    if(car_number == "" || resultat_number == false) {
        car_number.focus();
        return false;
    }

    if(car_crypto == "" || resultat_crypto == false) {
        car_crypto.focus();
        return false;
    }
alert('coucou!');
return true;
}
    </script>

-->
</html>
