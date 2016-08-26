<?php
	require('fpdf/fpdf.php');
	require_once 'init.php';
	
	$PDO = db_connect();
	$sql = "SELECT nome FROM Cliente ORDER BY nome ASC";
	$stmt= $PDO->prepare($sql);
    $stmt->execute();
	
	$pdf = new FPDF('P','pt','A4');
	$pdf->SetTitle('TestePDF1');
	$pdf->SetTitle('Izabela e Larissa');
	$pdf->SetCreator('php'.phpversion());
	$pdf->SetKeywords('php','php');
	$pdf->SetSubject('como criar um PDF');
	
	while($cliente = $stmt->fetch(PDO::FETCH_ASSOC)){
	$pdf->AddPage();

//Espaçamento vertical
	$pdf->Ln(20);
	$pdf->SetFont('arial', '', 12);
	$pdf->SetTextcolor('#ffff');
	$pdf->SetY(70);
	$pdf->SetX(400);
	
	$data='Varginha, '.date("d/m/Y");
	$data = utf8_decode($data);
	$pdf->Write(50,$data);
	$pdf->Ln(50);
	$pdf->SetX(30);
	
	$cabecalho = 'Prezado(a) Sr(a) '.$cliente['nome'];
	$cabecalho = utf8_decode($cabecalho);
	$pdf->Write(50,$cabecalho);
	$pdf->Ln(50);
	$pdf->SetX(60);
	
	$txt= 'Neste mês de aniversário, nossa loja está com promoções imperdíveis e selecionadas especialmente para você.';
	$txt = utf8_decode($txt);
	$pdf->Write(15,$txt);
	$pdf->Ln(15);
	$pdf->SetX(60);
	
	$txt='Não perca essa oportunidade de realizar bons negócios.' ;
	$txt = utf8_decode($txt);
	$pdf->Write(15,$txt);
	$pdf->Ln(15);
	$pdf->SetX(60);
	
	$txt='Faça-nos uma visita.';
	$txt = utf8_decode($txt);
	$pdf->Write(15,$txt);
	$pdf->Ln(15);
	$pdf->SetX(30);
	
	$txt='Cordialmente,';
	$txt = utf8_decode($txt);
	$pdf->Write(80,$txt);
	$pdf->Ln(80);
	$pdf->SetX(230);
	
	$txt='Izabela e Larissa';
	$txt = utf8_decode($txt);
	$pdf->Write(15,$txt);
	$pdf->Ln(15);
	$pdf->SetX(220);
	
	$txt='Gerentes Comerciais';
	$txt = utf8_decode($txt);
	$pdf->Write(15,$txt);
	$pdf->Ln(15);
}
	
	$pdf->Output();
?>
