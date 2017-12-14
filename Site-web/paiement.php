<?php 
session_start();

include_once('root.php');
include_once(ROOT.'/controller/AuthentificationController.php');
include_once(ROOT.'/controller/ContratController.php');

if (isset($_GET['action']) && $_GET['action'] == 'deconnexion') {
	session_destroy();
	header('Location: index.php');    
}

if (isset($_SESSION['id'])) {
    
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
                            <option value="" selected>&nbsp;&nbsp;&nbsp;&nbsp;/</option>
                            <option value="2">Visa</option>
                            <option value="3">MasterCard</option>
                            <option value="4">American Express</option>
                            <option value="5">Discover</option>
                        </select>
                        <span id="erreur_CreditCardType" style="visibility:hidden" > Veuillez choisir un type de carte bancaire !</span>
                    </div>
                </div>
                <div class="form-group">
                    <label>Titulaire de la carte bancaire</label>
                    <div class="col-md-12"><input type="text" class="form-control" id="car_owner" placeholder="Nom du titulaire de la carte bancaire" value="" onchange="verification_titulaire()"/> </div>
                    <span id="erreur_car_owner" style="visibility:hidden" > Vous avez mal saisi le nom du titulaire de la carte bancaire !</span>
                    <label>Numéro de la carte</label>
                    <div class="col-md-12"><input type="text" class="form-control" id="car_number" placeholder="Numéro de carte bancaire" value="" onchange="verification_carte()"/> </div>
                    <span id="erreur_car_number" style="visibility:hidden" > Vous avez mal saisi le numéro de la carte bancaire !</span>
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
                  <span id="erreur_mois" style="visibility:hidden"> Veuillez choisir un mois !</span>
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
                <span id="erreur_annee" style="visibility:hidden" > Veuillez choisir une année !</span>
            </div>
        </div>

        <div class="form-group">
            <label>Cryptogramme CVV</label>
            <div class="col-md-12"><input type="text" class="form-control" id="car_crypto" placeholder="Cryptogramme visuel" value="" onchange="verification_crypto()"/></div>
            <span id="erreur_car_crypto" style="visibility:hidden" > Vous avez mal saisi le cryptogramme visuel !</span>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <span style="color:black">Paiement sécurisé avec.</span>
            </div>
            <div class="col-md-12">
                <ul class="cards">
                    <li style="list-style:none" class="visa hand">Visa</li>
                    <li style="list-style:none" class="mastercard hand">MasterCard</li>
                    <!--<li style="list-style:none" class="Amex">Amex</li>-->
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12">

                <button type="submit" id="paye" name="paye" class="btn btn-primary btn-submit-fix">Paiement</button>

            </div>
        </div>

        <!-- La boîte "Modale" -->
        <div id="myModal" class="modal">
            <!-- Le contenu de la boîte "Modale" -->
            <div class="modal-content">
            <span style="color:white" class="close">&times;</span>
            <p> Vous avez mal renseigné l'un des champs du formulaire !</p>
            </div>
        </div>

        </form>
    </div>

</div>

</body>

<!-- Footer section du bas de page -->
<?php include_once('include/footer.php'); ?>
<script src="~/Scripts/jquery-2.0.3.min.js"></script>
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

<script type="text/javascript">

    // Attribue le bouton de validation de paiement
    var btn = document.getElementById('paye');
    // Attribué la boite "Modale"
    var modal = document.getElementById('myModal');
    // Attribué le span de fermeture de la boîte "Modale"
    var span = document.getElementsByClassName('close')[0];

    btn.onclick = function() {
    var car_owner = document.getElementById('car_owner');
    var car_owner_value = car_owner.value;
    var saisie_owner = /^[a-zA-Zéèàùûêâôë]{1}[a-zA-Zéèàùûêâôë \'-]*[a-zA-Zéèàùûêâôë]$/; //regex testé 
    var resultat_owner = saisie_owner.test(car_owner_value);

    var car_number = document.getElementById('car_number');
    var car_number_value = car_number.value;
    var saisie_number = /^[0-9]{16}$/;
    var resultat_number = saisie_number.test(car_number_value);

    var car_crypto = document.getElementById('car_crypto');
    var car_crypto_value = car_crypto.value;
    var saisie_crypto = /^[0-9]{3}$/;
    var resultat_crypto = saisie_crypto.test(car_crypto_value);

    var credit_card_type = document.getElementById('CreditCardType');
    var mois = document.getElementById('mois');
    var annee = document.getElementById('annee');

    if(credit_card_type.value == "") {
        modal.style.display = "block";
        return false;
    }
    if(mois.value == "Mois") {
        modal.style.display = "block";
        return false;
    }
    if(annee.value == "Année") {
        modal.style.display = "block";
        return false;
    }
    if(car_owner_value == "" || resultat_owner == false) {
        modal.style.display = "block";
        return false;
    }
    if(car_number_value == "" || resultat_number == false) {
        modal.style.display = "block";
        return false;
    }
    if(car_crypto_value == "" || resultat_crypto == false) {
        modal.style.display = "block";
        return false;
    }
    modal.style.display = "none";
    return true
}

// Quand l'utilisateur appuie sur le span <X>, on cache la boîte "Modale"
span.onclick = function() {
    modal.style.display = "none";
}
// quand l'utilisateur appuie autre part sur la page, on cache la boîte "Modale"
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// méthode qui vérifie les données rentrées pour le formulaire titulaire de la CB
function verification_titulaire() {
    var car_owner = document.getElementById('car_owner');
    var car_owner_value = car_owner.value;
    var saisie_owner = /^[a-zA-Zéèàùûêâôë]{1}[a-zA-Zéèàùûêâôë \'-]*[a-zA-Zéèàùûêâôë]$/; //regex testé 
    var resultat_owner = saisie_owner.test(car_owner_value);

    if(car_owner_value == "" || resultat_owner == false) {
        document.getElementById('erreur_car_owner').style.visibility = "visible";
        return false;
    }
    document.getElementById('erreur_car_owner').style.visibility = "hidden";
    return true;
}

// méthode qui vérifie les données rentrées pour le numéro de la CB
function verification_carte() {
    var car_number = document.getElementById('car_number');
    var car_number_value = car_number.value;
    var saisie_number = /^[0-9]{16}$/;
    var resultat_number = saisie_number.test(car_number_value);

    if(car_number_value == "" || resultat_number == false) {
        document.getElementById('erreur_car_number').style.visibility = "visible";
        return false;
    }
    document.getElementById('erreur_car_number').style.visibility = "hidden";
    return true;
}

// méthode qui vérifie les données rentrées pour le numéro de la CB
function verification_crypto() {
    var car_crypto = document.getElementById('car_crypto');
    var car_crypto_value = car_crypto.value;
    var saisie_crypto = /^[0-9]{3}$/;
    var resultat_crypto = saisie_crypto.test(car_crypto_value);

    if(car_crypto_value == "" || resultat_crypto == false) {
        document.getElementById('erreur_car_crypto').style.visibility = "visible";
        return false;
    }
    document.getElementById('erreur_car_crypto').style.visibility = "hidden";
    return true;
}

// méthode qui affiche ou cache le meesage d'erreur selon si le select est sur / ou non
function verificationCreditCardType() {

    if(credit_card_type.value == "") {
        document.getElementById('erreur_CreditCardType').style.visibility = "visible";
        return false;
    }
    document.getElementById('erreur_CreditCardType').style.visibility = "hidden";
    return true;
}

// méthode qui affiche ou cache le meesage d'erreur selon si le select est sur "Mois" ou non
function verificationMois() {

    if(mois.value == "Mois") {
        document.getElementById('erreur_mois').style.visibility = "visible";
        return false;
    }
    document.getElementById('erreur_mois').style.visibility = "hidden";
    return true;
}

// méthode qui affiche ou cache le meesage d'erreur selon si le select est sur  "Année" ou non
function verificationAnnee() {

    if(annee.value == "Année") {
        document.getElementById('erreur_annee').style.visibility = "visible";
        return false;
    }
    document.getElementById('erreur_annee').style.visibility = "hidden";
    return true;
}

</script>


</html>

<?php 
    } else {
        header('Location: index.php');
    }  
?>