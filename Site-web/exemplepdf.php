<?php
require('C:\MAMP\htdocs\GIT\Site-web\fpdf.php');

class PDF extends FPDF
{
// En-tête
    function Header()
    {
	// Logo
        $this->Image('C:\MAMP\htdocs\GIT\Site-web\img\logo.png',10,2,40);
    // Police Arial gras 15
        $this->SetFont('Arial','B',24);
    // Décalage à droite
        $this->Cell(100);
    // Titre

        $this->SetTextColor(220,50,50);
        $this->Cell(50,10,'Contrat de location',0,'C');
        $this->SetTextColor(0,0,0);
    // Saut de ligne
        $this->Ln(12);
        $this->SetFont('Arial','',12);
        $this->SetX(15);
        $this->Cell(10,10,'$lib_agence',0,'C'); 
        $this->Ln(8);
        $this->SetX(15);
        $this->Cell(50,10,'$addresse_agence',0,'C'); $this->Cell(45); $this->SetFont('Arial','I',14); $this->Cell(80,10,'
         n°XXXXXXX du $datedujour','LRT','R');
        $this->SetFont('Arial','',12);
        $this->Ln(10);
        $this->SetX(15);
        $this->SetFillColor(125,125,125);
        $this->Cell(30,10,'$cp_villecp',0,'C');
        $this->Cell(30,10,'$ville_villecp',0,'C'); $this->Cell(35); $this->Cell(40,10,'Type de véhicule','LRTB',0, 'C', true);$this->Cell(40,10,'Immatriculation','LRTB',0, 'C', true);
        $this->Ln(10);
        $this->SetX(15);
        $this->Cell(20,10,'$tel_agence',0,'C');$this->Cell(75); $this->Cell(40,10,'$marque $modele','LRB', 0, 'C', true);$this->Cell(40,10,'$immat_veh','LRB', 0, 'C', true);
        $this->Ln(10);
        $this->SetX(15);
        $this->Cell(20,10,'$fax_agence',0, 'C');
        $this->Ln(13);
    }



function TableauClient()
{
     // Couleurs du cadre, du fond et du texte
    $this->SetDrawColor(80,115,135); // marche pas 
    $this->SetFillColor(80,115,135); // marche pas 
    $this->SetTextColor(0,0,0);
    // Epaisseur du cadre (1 mm)
    $this->SetLineWidth(0.5);
    $this->SetFont('Times','',12);

    $this->Cell(190,10,'Client',1,1,'C', true);
    $w = array(35, 60, 35, 60);
    $this->Cell($w[0],8,'Nom :','L');
    $this->Cell($w[1],8,'$Nom','R');
    $this->Cell($w[2],8,'Adresse :','L');
    $this->Cell($w[3],8,'$adresse','R');
    $this->Ln(8);
    $this->Cell($w[0],8,'Prénom :','L');
    $this->Cell($w[1],8,'$prenom','R');
    $this->Cell($w[2],8,'Code postal :','L');
    $this->Cell($w[3],8,'$cp_villecp','R');
    $this->Ln(8);
    $this->Cell($w[0],8,'N° téléphone :','L');
    $this->Cell($w[1],8,'$tel','R');
    $this->Cell($w[2],8,'Ville :','L');
    $this->Cell($w[3],8,'$ville','R');
    $this->Ln(8);
    $this->Cell($w[0],8,'E-mail :','L');
    $this->Cell($w[1],8,'$adressemail','R');
    $this->Cell($w[2],8,'Société :','L');
    $this->Cell($w[3],8,'$raison sociale','R');
    $this->Ln(8);
    $this->Cell(array_sum($w),0,'','T');
    $this->Ln(12);
}

function TableauContratLoc()
{
     // Couleurs du cadre, du fond et du texte
    $this->SetDrawColor(20,0,0); // marche pas 
    $this->SetFillColor(255, 255, 255); // marche pas 
    $this->SetTextColor(0,0,0);
    // Epaisseur du cadre (1 mm)
    $this->SetLineWidth(0.3);
    $this->SetFont('Arial','',13);
    $this->Cell(190, 10,'Informations sur le contrat',1,1,'C', true);
    $w = array(100, 55, 35);
     $this->SetFont('Arial','',11);
    $this->Cell($w[0],8,'', 'LTR', 0, 'LR', true);
    $this->Cell($w[1],8,'Nbre de jours / Quantité','LRt', 0, 'C', true);
    $this->Cell($w[2],8,'Prix en € :','LRt', 0, 'C', true);
    $this->Ln(8);
    $this->Cell($w[0],8,'Location du $debut au $fin', 'LR', 0, 'L', true);
    $this->Cell($w[1],8,'$interval','LR', 0, 'C', true);
    $this->Cell($w[2],8,'$prixjourna *','LR', 0, 'C', true);
    $this->Ln(8);
    $this->Cell($w[0],8,'$accesoire1', 'LR', 0, 'L', true);
    $this->Cell($w[1],8,'$qtite1','LR', 0, 'C', true);
    $this->Cell($w[2],8,'$prixoption1','LR', 0, 'C', true);
    $this->Ln(8);
    $this->Cell($w[0],8,'$accesoire2', 'LR', 0, 'L', true);
    $this->Cell($w[1],8,'$qtite2','LR', 0, 'C', true);
    $this->Cell($w[2],8,'$prixoption2','LR', 0, 'C', true);
    $this->Ln(8);
    $this->Cell($w[0],8,'$accesoire3', 'LR', 0, 'L', true);
    $this->Cell($w[1],8,'$qtite3','LR', 0, 'C', true);
    $this->Cell($w[2],8,'$prixoption3','LR', 0, 'C', true);
    $this->Ln(8);
    $this->Cell($w[0],8,'$accesoire4', 'LR', 0, 'L', true);
    $this->Cell($w[1],8,'$qtite4','LR', 0, 'C', true);
    $this->Cell($w[2],8,'$prixoption4','LR', 0, 'C', true);
    $this->Ln(8);
    $this->Cell($w[0],8,'$accesoire5', 'LR', 0, 'L', true);
    $this->Cell($w[1],8,'$qtite5','LR', 0, 'C', true);
    $this->Cell($w[2],8,'$prixoption5','LR', 0, 'C', true);
    $this->Ln(8);
    $this->Cell($w[0],8,'$accesoire6', 'LR', 0, 'L', true);
    $this->Cell($w[1],8,'$qtite6','LR', 0, 'C', true);
    $this->Cell($w[2],8,'$prixoption6','LR', 0, 'C', true);
    $this->Ln(8);
    $this->Cell($w[0],8,'Total Facturé TTC', 'LRT', 0, 'L', true);
    $this->Cell($w[1],8,'','LRT', 0, 'C', true);
    $this->Cell($w[2],8,'$prixtotalTTC','LRT', 0, 'C', true);
    $this->Ln(8);
    $this->Cell($w[0],8,'dont TVA', 'LRT', 0, 'L', true);
    $this->Cell($w[1],8,'','LRT', 0, 'C', true);
    $this->Cell($w[2],8,'$TVA','LRT', 0, 'C', true);
    $this->Ln(8);
    $this->Cell(array_sum($w),0,'','T', 0, true);
    $this->Ln(20);    
}

function BasPage()//$client)
{       
    $this->SetFont('Times','B',16);
    $this->SetX(130);
    $this->SetTextColor(0,0,0);
    $this->Cell(20,10,'Fait à',0,'C'); $this->Cell(30,10,'$ville_villecp',0,'C'); 
    $this->Ln(10);
    $this->SetX(130);
    $this->Cell(20,10,'Le ',0,'C'); $this->Cell(30,10,'$datedujour',0,'C'); 
    $this->Ln(10);  
 }

// Pied de page
function Footer()
{
    $this->SetFont('Times','B',6);
    $this->SetTextColor(0,0,0);
    $this->SetX(15);   
    $this->SetY(-22);
    $this->Cell(160,8,"* Ce tarif inclut le forfait kilométrage illimité hors rendu d'option et rendu du plein d'essence qui seront facturés en plus lors de l'état-lieux en cas de manquement.",0,'L');
    $this->Ln(3); 
    $this->Cell(180,8,"Toute personne en situation de retard de paiement est redevable de plein droit, d'une indemnité forfaitaire de recouvrement (art. L.441-3 et art. L.441-6 du Code de commerce)",0,'L');
	// Positionnement à 1,5 cm du bas
	$this->SetY(-15);
	// Police Arial italique 8
	$this->SetFont('Arial','I',8);
	// Numéro de page
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation de la classe dérivée
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->TableauClient();
$pdf->TableauContratLoc();
$pdf->BasPage();
//for($i=1;$i<=40;$i++)
//	$pdf->Cell(0,10,'Impression de la ligne numéro '.$i,0,1);
$pdf->Output();
?>
