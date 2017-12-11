<?php
require('../fpdf.php');

class PDF extends FPDF
{
// En-tête
function Header()
{
	// Logo
    $this->Image('logoerror.png',10,2,40);
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
    $this->Cell(50,10,'$addresse_agence',0,'C'); $this->Cell(45); $this->SetFont('Arial','I',14); $this->Cell(80,8,'
    	n°XXXXXXX du $datedujour',1,'C');
    $this->SetFont('Arial','',12);
    $this->Ln(8);
    $this->SetX(15);
    $this->Cell(30,10,'$cp_villecp',0,'C');
    $this->Cell(30,10,'$ville_villecp',0,'C'); $this->Cell(35); $this->Cell(40,8,'Type de véhicule',1,'C');$this->Cell(40,8,'Immatriculation',1,'C');
    $this->Ln(8);
    $this->SetX(15);
    $this->Cell(20,10,'$tel_agence',0,'C');$this->Cell(75); $this->Cell(40,8,'Renault Twingo',1,'C');$this->Cell(40,8,'123-AS-694',1,'C');
    $this->Ln(8);
    $this->SetX(15);
    $this->Cell(20,10,'$fax_agence',0,'C');
}



function TableauClient()//$client)
{
     // Couleurs du cadre, du fond et du texte
    $this->SetDrawColor(65,105,230);
    $this->SetFillColor(80,115,135);
    $this->SetTextColor(80,115,135);
    // Epaisseur du cadre (1 mm)
    $this->SetLineWidth(1);
    $this->SetFont('Times','',14);
    $this->SetY(68);
    $this->Cell(185,10,'Client',1,1,'C');
    
}


// Pied de page
function Footer()
{
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
$pdf->TableauClient(1);
//for($i=1;$i<=40;$i++)
//	$pdf->Cell(0,10,'Impression de la ligne numéro '.$i,0,1);
$pdf->Output();
?>
