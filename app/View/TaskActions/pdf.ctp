<?php

App::import('Vendor', 'xtcpdf');


$pdf = new xtcpdf();

// set document information
$pdf->SetAuthor('Obelit');
$pdf->SetTitle('Clientes');
$pdf->SetSubject('Listado de Clientes');



$pdf->setPrintHeader(false);
$pdf->setPrintFooter(true);
// set color for background

$pdf->SetAutoPageBreak(true);
$pdf->AddPage();
//create header
$pdf->createHeader('Listado de Clientes');

//$pdf->SetFillColor(220, 255, 260);
//create body
$pdf->createTable($headers, $data);


echo $pdf->Output('Reporte.pdf', 'D');
?>