<?php 
session_start();

include_once('root.php');
include_once(ROOT.'/controller/AuthentificationController.php');
include_once(ROOT.'/controller/SearchController.php');
include_once(ROOT.'/controller/AccessoireController.php');
	
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
      <a href="search.php">Sélection du véhicule</a>  - <a class="checked" href="fiche.php">Choix des options</a> - <a href="paiement.php">Paiement</a>
    </div>

	
	<div id="section-white">
	    <aside id="resume-voiture">
	        <img id="vehselect" src="img/bmw-1.png" alt="bmw-1">
	        <h3> Départ </h3>
	        <p> <?php 
	        $agence = $_GET['agence'];

		switch ($agence) {
			case 1:
				$agence = "Agence de Bordeaux";
				break;
			case 2:
				$agence = "Agence de Niort";
				break;
			case 3:
				$agence = "Agence de Courçon";
				break;
			case 4:
				$agence = "Agence de Châtellerault";
				break;
			case 5:
				$agence = "Agence de Poey D'oloron";
				break;
			default:
				$agence = "";
				break;
		}

		print($agence); ?></p>
	        <h3> Retour </h3>
	        <p> <?php print($agence); ?> </p>
	        <h3> Période de location </h3>
	        <p> <?php print("Du : ". $_GET['dateDebut']. " au : ". $_GET['dateArrivee']); ?> </p>
	        <h3> Equipement du véhicule </h3>
	            <p><img id="iconeporte" src="ico/voiture.png" alt="Porte"> <?php $nbreportes=5; print($nbreportes);?> portes</p>
	            <p><img id="iconeboitev" src="ico/boiteVitesse.png" alt="BoiteVitesse"> <?php $boiteV="Manuelle"; print($boiteV);?></p>
	            <p><img id="iconeclim" src="ico/clim.png" alt="Climatisation"> <?php $clim="Climatisation"; print($clim);?></p>
	        <h3> Capacité </h3>
	            <p><img id="iconenbpers" src="ico/personne.png" alt="Personne"> <?php $nbrepersonnes=5; print($nbrepersonnes);?> personnes
	            <p><img id="iconebagage" src="ico/bagage.png" alt="Bagage"> <?php $nbrebagages=3; print($nbrebagages);?> bagages</p>
	        <h3> Conditions générales </h3>
	        <p> informations relatives à la location chez Error 404 </p>     
	    </aside>

	    <div id="liste-option">
	        <p> Tarif de base de la location* : </p> <b> <?php $prixloc=115.00; print($prixloc);?> € </b>
	            <ul>
	                <li> <img id="conducteur-supp" src="img/conducteur-supp.png" alt="Conducteur Supplémentaire">
	                <p> <?php $option1="Conducteur Supplémentaire"; print($option1);?> </p> <span> <?php $prixoption1=11.00; print($prixoption1);?> € </span>
	                    <select id="NbcondcteurSupp" onchange="calcul_avec_accesoire()">
	                        <option value='0' selected>0</option>                       
	                        <option value='1'>1</option>
	                        <option value='2'>2</option>
	                        <option value='3'>3</option>
	                        <option value='4'>4</option>
	                        <option value='5'>5</option>                       
	                     </select>
	                </li>

	                <li> <img id="gps" src="img/GPS.png" alt="GPS">
	                 <p> <?php $option2="GPS"; print($option2);?> </p> <span> <?php $prixoption2=13.00; print($prixoption2);?> € </span>
	                    <select id="NbGPS" onchange="calcul_avec_accesoire()">
	                        <option value='0' selected>0</option>                        
	                        <option value='1'>1</option>
	                     </select>
	                </li>  

	                <li> <img id="siege-enfant" src="img/siege-enfant.png" alt="Siège enfant">
	                 <p> <?php $option3="Siège enfant"; print($option3);?> </p> <span> <?php $prixoption3=10.99; print($prixoption3);?> € </span>
	                    <select id="NbSiegeEnfant" onchange="calcul_avec_accesoire()">
	                        <option value='0' selected>0</option>  
	                        <option value='1'>1</option>
	                        <option value='2'>2</option>
	                        <option value='3'>3</option>
	                        <option value='4'>4</option>
	                    </select>
	                </li>  

	                 <li> <img id="nacelle-bebe" src="img/nacelle-bebe.png" alt="Nacelle bébé">
	                <p> <?php $option4="Nacelle bébé"; print($option4);?> </p> <span> <?php $prixoption4=10.00; print($prixoption4);?> € </span>
	                    <select id="NbNacelleBebe" onchange="calcul_avec_accesoire()">
	                        <option value='0' selected>0</option> 
	                        <option value='1'>1</option>
	                        <option value='2'>2</option>
	                        <option value='3'>3</option>
	                        <option value='4'>4</option>   
	                        </select>	                 
	                </li>

	                <li> <img id="rehausseur-integral" src="img/rehausseur-integral.png" alt="Réhausseur intégral">
	                 <p> <?php $option5="Réhausseur intégral"; print($option5);?> </p> <span> <?php $prixoption5=7.99; print($prixoption5);?> € </span>
	                    <select id="NbRehausseurIntegral" onchange="calcul_avec_accesoire()">
	                        <option value='0' selected>0</option> 
	                        <option value='1'>1</option>
	                        <option value='2'>2</option>
	                        <option value='3'>3</option>
	                        <option value='4'>4</option>
	                        </select>
	                </li>

	                <li> <img id="fact-courrier" src="img/fact-courrier.png" alt="Facturation par courrier">
	                <p> <?php $option6="Facturation par courrier"; print($option6);?> </p> <span> <?php $prixoption6=2.99; print($prixoption6);?> € </span>
	                        <select id="subscribefactcourrier" onchange="calcul_avec_accesoire()">
	                        <option value='0' selected>Non</option> 
	                        <option value='1'>Oui</option>
	                        </select>
	                </li>
	            </ul>
		</div>

	   		<form method="POST" action="paiement.php">
	    <div id="section-paiement">
	        <p>  Prix Total* : </p> <input id="total" value = "<?php print($prixloc);?>"/> <b> € </b>
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

    <script type="text/javascript" language="javascript">

     function calcul_sans_accessoire()  {
			var prixloc = <?php echo($prixloc) ?>;
			var	total = prixloc
			alert(total);
			document.getElementById("total").value = total;	
	}

function calcul_avec_accesoire()  {
			var prixloc = <?php echo($prixloc) ?>;

    		var choix1 = $("#NbcondcteurSupp").val();
    		var prixoption1 = <?php echo($prixoption1) ?>;
    		var coutoption1 = choix1 * prixoption1;
 
    		var choix2 = $("#NbGPS").val();
    		var prixoption2 = <?php echo($prixoption2) ?>;
    		var coutoption2 = choix2 * prixoption2;
 
    		var choix3 = $("#NbSiegeEnfant").val();
    		var prixoption3 = <?php echo($prixoption3) ?>;
    		var coutoption3 = choix3 * prixoption3;

 
    		var choix4 = $("#NbNacelleBebe").val();
    		var prixoption4 = <?php echo($prixoption4) ?>;
    		var coutoption4 = choix4 * prixoption4;
 
    		var choix5 = $("#NbRehausseurIntegral").val();
    		var prixoption5 = <?php echo($prixoption5) ?>;
    		var coutoption5 = choix5 * prixoption5;

     		var choix6 = $("#subscribefactcourrier").val();
    		var prixoption6 = <?php echo($prixoption6) ?>;
    		var coutoption6 = choix6 * prixoption6;		  		

			var	total = prixloc + coutoption1 + coutoption2 + coutoption3 + coutoption4 + coutoption5 + coutoption6;
			alert(coutoption6);
			alert(total);
			document.getElementById("total").value = total;			
	}
</script>
   
</html>