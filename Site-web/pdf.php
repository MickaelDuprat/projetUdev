<?php 

session_start();

include_once('root.php');
include_once(ROOT.'/controller/AuthentificationController.php');
include_once(ROOT.'/controller/PdfController.php');

if (isset($_GET['action']) && $_GET['action'] == 'deconnexion') {
    session_destroy();
    header('Location: index.php');    
}

/*
<!--
<!doctype html>
<html>
    <head>
        <body> 
        <?php var_dump($jsonTab); 
        var_dump($datedujour);
        var_dump($prix_journalier_veh);
        var_dump($email_client);
        ?>
        </body>*
    </head>
</html> 
*/

require('fpdf.php');

class PDF extends FPDF
{
    
// En-tête
    function HeaderAgence($lib_agence, $add_agence, $num_contrat_loc, $cpagence, $villeagence, $tel_agence, $lib_marque, $lib_modele, $immat_veh, $fax_agence)
    {

$datedujour = date("d-m-Y");       
	// Logo
        $this->Image('C:\MAMP\htdocs\GIT\Site-web\img\logo.png', 10, 2, 50);
    // Police Arial gras 15
        $this->SetFont('Arial','B',24);
    // Décalage à droite
        $this->Cell(100);
    // Titre

        $this->SetTextColor(220, 50, 50);
        $this->Cell(50, 10, 'Contrat de location', 0, 'C');
        $this->SetTextColor(0, 0, 0);
    // Saut de ligne
        $this->Ln(12);
        $this->SetFont('Arial', '', 12);
        $this->SetX(15);
        $this->Cell(10, 10, utf8_decode($lib_agence), 0, 'C'); 
        $this->Ln(8);
        $this->SetX(15);
        $this->Cell(50, 8, utf8_decode($add_agence), 0, 'C'); $this->Cell(25); $this->SetFont('Arial', 'I', 14); $this->Cell(100, 8,'
         n°'.$num_contrat_loc.' du '.$datedujour,'LRT', 'C');
        $this->SetFont('Arial', '', 12);
        $this->Ln(8);
        $this->SetX(15);
        $this->SetFillColor(125, 125, 125);
        $this->Cell(15, 8, $cpagence, 0,'C'); $this->Cell(35, 8, utf8_decode($villeagence), 0,'C')
        ; $this->Cell(25); $this->Cell(60, 8, 'Type de véhicule','LRTB',0, 'C', true);$this->Cell(40, 8,'Immatriculation','LRTB',0, 'C', true);
        $this->Ln(8);
        $this->SetX(15);
        $this->Cell(20, 8,'N° tél : '.$tel_agence, 0,'C');$this->Cell(55); $this->Cell(30, 8, utf8_decode($lib_marque), 'LB', 0, 'C', true); $this->Cell(30, 8, $lib_modele, 'RB', 0, 'C', true);$this->Cell(40, 8, $immat_veh, 'LRB', 0, 'C', true);
        $this->Ln(8);
        $this->SetX(15);
        $this->Cell(20, 8, 'Fax : '.$fax_agence, 0, 'C');
        $this->Ln(13);
    }



function TableauClient($nom_client, $add_facturation, $prenom_client, $tel_client,  $villeclient, $cpclient, $email_client, $raisonS_societe)
{
     // Couleurs du cadre, du fond et du texte
    $this->SetDrawColor(80, 115, 135); // marche pas 
    $this->SetFillColor(80, 115, 135); // marche pas 
    $this->SetTextColor(0, 0, 0);
    // Epaisseur du cadre (1 mm)
    $this->SetLineWidth(0.5);
    $this->SetFont('Times', '', 12);

    $this->Cell(190, 10, 'Client', 1, 1, 'C', true);
    $w = array(35, 60, 35, 60);
    $this->Cell($w[0], 8, 'Nom :', 'L');
    $this->Cell($w[1], 8, utf8_decode($nom_client), 'R');
    $this->Cell($w[2], 8, 'Adresse :', 'L');
    $this->Cell($w[3], 8, utf8_decode($add_facturation), 'R');
    $this->Ln(8);
    $this->Cell($w[0], 8, 'Prénom :', 'L');
    $this->Cell($w[1], 8, utf8_decode($prenom_client), 'R');
    $this->Cell($w[2], 8, 'Code postal :', 'L');
    $this->Cell($w[3], 8, $cpclient, 'R');
    $this->Ln(8);
    $this->Cell($w[0], 8, 'N° téléphone :','L');
    $this->Cell($w[1], 8, $tel_client, 'R');
    $this->Cell($w[2], 8, 'Ville :', 'L');
    $this->Cell($w[3], 8, utf8_decode($villeclient), 'R');
    $this->Ln(8);
    $this->Cell($w[0], 8, 'E-mail :', 'L');
    $this->Cell($w[1], 8, utf8_decode($email_client), 'R');
    $this->Cell($w[2], 8, 'Société :', 'L');
    $this->Cell($w[3], 8, utf8_decode($raisonS_societe), 'R');
    $this->Ln(8);
    $this->Cell(array_sum($w),0,'','T');
    $this->Ln(12);
}

function TableauContratLoc($prix_journalier_veh, $date_debut, $date_fin, $interval) {
    $prixtotal = $prix_journalier_veh;
     // Couleurs du cadre, du fond et du texte
    $this->SetDrawColor(20, 0, 0); // marche pas 
    $this->SetFillColor(255, 255, 255); // marche pas 
    $this->SetTextColor(0, 0, 0);
    // Epaisseur du cadre (1 mm)
    $this->SetLineWidth(0.3);
    $this->SetFont('Arial', '', 13);
    $this->Cell(190, 10, 'Informations sur le contrat', 1, 1, 'C', true);
    $w = array(100, 55, 35);
    $this->SetFont('Arial', '', 11);
    $this->Cell($w[0], 8, '', 'LTR', 0, 'LR', true);
    $this->Cell($w[1], 8, 'Nbre de jours / Quantité','LRT', 0, 'C', true);
    $this->Cell($w[2], 8, 'Prix unitaire (en €) ','LRT', 0, 'C', true);
    $this->Ln(8);
    $this->Cell($w[0], 8, 'Location du '. $date_debut.' au '.$date_fin, 'LR', 0, 'L', true);
    $this->Cell($w[1], 8, $interval,'LR', 0, 'C', true);
    $this->Cell($w[2], 8, $prix_journalier_veh.'*', 'LR', 0, 'C', true);
    $this->Ln(8);
    $num_contrat_loc = 497;
    $accessoirectrl = new PdfController();
    $jsonTabAccessoire = json_decode($accessoirectrl->tabAccessoire($num_contrat_loc), true);

  if ($jsonTabAccessoire['success'] == true) {

    foreach ($jsonTabAccessoire['result'] as $value) {
    $lib_accessoire = $value['lib_accessoire'];
    $prix_journaHT_accessoire = $value['prix_journaHT_accessoire'];
    $qtite = $value['qtite'];
    $prixtotal += $prix_journaHT_accessoire *  $qtite;
    $this->Cell($w[0], 8, utf8_decode($lib_accessoire), 'LR', 0, 'L', true);
    $this->Cell($w[1], 8, $qtite, 'LR', 0, 'C', true);
    $this->Cell($w[2], 8, $prix_journaHT_accessoire, 'LR', 0, 'C', true);
    $this->Ln(8);
    }
  } 

    $this->Cell($w[0], 8, 'Prix total TTC', 'LR', 0, 'L', true);
    $this->Cell($w[1], 8, '', 'LR', 0, 'C', true);
    $this->Cell($w[2], 8, $prixtotal, 'LR', 0, 'C', true);
    $this->Ln(8);

    $this->Cell(array_sum($w), 0, '', 'T', 0, true);
    $this->Ln(20);  
}

function BasPage($villeagence)//$client)
{       
    $datedujour = date("d-m-Y");
    $this->SetFont('Times', 'B', 16);
    $this->SetX(130);
    $this->SetTextColor(0, 0, 0);
    $this->Cell(20, 10, 'Fait à', 0, 'C'); $this->Cell(30, 10, utf8_decode($villeagence), 0, 'C'); 
    $this->Ln(10);
    $this->SetX(130);
    $this->Cell(20, 10, 'Le ', 0, 'C'); $this->Cell(30, 10, $datedujour, 0, 'C'); 
    $this->Ln(10);  
 }

// Pied de page
function FooterPdf()
{
    $this->SetFont('Times', 'B', 6);
    $this->SetTextColor(0, 0, 0);
    $this->SetX(15);   
    $this->SetY(-22);
    $this->Cell(160, 8, "* Ce tarif inclut le forfait kilométrage illimité hors rendu d'option et rendu du plein d'essence qui seront facturés en plus lors de l'état-lieux en cas de manquement.", 0, 'L');
    $this->Ln(3); 
    $this->Cell(180, 8, "Toute personne en situation de retard de paiement est redevable de plein droit, d'une indemnité forfaitaire de recouvrement (art. L.441-3 et art. L.441-6 du Code de commerce)", 0, 'L');
	// Positionnement à 1,5 cm du bas
	$this->SetY(-15);
	// Police Arial italique 8
	$this->SetFont('Arial', 'I', 8);
	// Numéro de page
	$this->Cell(0, 10,'Page '.$this->PageNo().'/{nb}', 0, 0, 'C');
}
}

// Instanciation de la classe dérivée
$pdf = new PDF('P', 'mm','A4');
$pdf->SetAutoPageBreak(false);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);
$pdf->HeaderAgence($lib_agence, $add_agence, $num_contrat_loc, $cpagence, $villeagence, $tel_agence, $lib_marque, $lib_modele, $immat_veh, $fax_agence);
$pdf->TableauClient($nom_client, $add_facturation, $prenom_client, $tel_client, $villeclient, $cpclient, $email_client, $raisonS_societe);
$pdf->TableauContratLoc($prix_journalier_veh, $date_debut, $date_fin, $interval);
$pdf->BasPage($villeagence);
$pdf->FooterPdf();
$pdf->Output(); 
?> 
-->