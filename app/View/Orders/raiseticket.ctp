<?php
App::import('Vendor','tcpdf/config/lang/eng');
App::import('Vendor','tcpdf/tcpdf');
App::uses('CakeNumber', 'Utility');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Prollux Software Solutions');
$pdf->SetTitle('Ticket ' . 'ProSales');
$pdf->SetSubject('Subject');
$pdf->SetKeywords('PDF, prosales, ticket, Prosales, Prosales');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(5, 5, 5);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);


// set auto page breaks
$pdf->SetAutoPageBreak(false,0);
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (file_exists(dirname(__FILE__).'/lang/eng.php'))
{
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 48);

// add a page
$resolution= array(250, 100);
$pdf->AddPage('P', $resolution);
$pdf->SetFont('helvetica', '', 9);

$loggedUser = CakeSession::read('Auth.User');

// Products
$products = '';
foreach($orderProduct as $product)
{
    $prodQty 	= $product["OrderProduct"]["product_qty"];
    $prodDisc 	= $product["OrderProduct"]["product_disc"];
    $prodTax    = $product["OrderProduct"]["product_tax"];
    $prodPrice 	= $product["OrderProduct"]["product_price"];
    $prodSum 	=  $prodQty * $prodPrice;
    $prodDiscAmt = 0;
    $prodTaxAmt = 0;
    if($prodTax > 0)
    {
        $prodTaxAmt = (($prodSum * $prodTax) / 100);
    }
    if($prodDisc > 0)
    {
        $prodDiscAmt = (($prodSum * $prodDisc) / 100);
    }
    $prodSum = $prodSum + $prodTaxAmt;
    $prodSubAmt = $prodSum - $prodDiscAmt;

    $prodSubAmt = CakeNumber::currency($prodSubAmt, "USD");

    $products .= '<tr><td width="20%">&nbsp;' . $product["Product"]["name"] . '</td>';
    $products .= '<td width="20%">&nbsp;' . CakeNumber::currency($product["OrderProduct"]["product_price"],"USD") . '</td>';
    $products .= '<td width="20%">&nbsp;' . $product["OrderProduct"]["product_qty"] . '</td>';
    $products .= '<td width="20%">&nbsp;' . $product["OrderProduct"]["product_tax"] . '%</td>';
    $products .= '<td width="20%" align="right">&nbsp;' . $prodSubAmt .'</td></tr>';
}

$paidAmtSum = 0;

foreach($orderPayment as $payment)
{
    $payAmount      = $payment["OrderPayment"]["total_amt"];
    $payType        = $payment["OrderPayment"]["type"];
    $paidAmtSum     +=  $payAmount;
    $payments       .= '<tr><td width="60%">&nbsp;' . $payment["OrderPayment"]["folio"] . '</td>';
    $payments       .= '<td width="20%">&nbsp;' . $payType  . '</td>';
    $payments       .= '<td width="20%" align="right">&nbsp;' . CakeNumber::currency($payAmount,"USD") . '</td></tr>';
}

$disc_amt = 0; //CakeNumber::currency($order[0]["Order"]["disc_amt"],"USD");
$tax_amt = 0; //CakeNumber::currency($order[0]["Order"]["tax_amt"],"USD");
$subtotal_amt = 0; // CakeNumber::currency($order[0]["Order"]["subtotal_amt"],"USD");
$total_amt = CakeNumber::currency($order["Order"]["total_amt"],"USD");
$paid_amt = 0; //CakeNumber::currency($paidAmtSum,"USD");
$change_amt = 0; //CakeNumber::currency(($paidAmtSum - $order[0]["Order"]["total_amt"]),"USD");

//$bgcolor = $config["Config"]["quote_color"];

$bgcolor = "#000000";

//date_default_timezone_set($config["Config"]["timezone"]);
setlocale(LC_ALL, 'ES');
$now= date('d/m/Y h:i:s A');
if(isset($store["Store"]["cover"]))
{
    $urlImage = "<img src='".$store["Store"]["cover"]."' />";
}

$companyName = $config["Config"]["usercompanyname"];

// Table with rowspans and THEAD
$tbl = <<<EOD
<table>
<tr><td align="center" colspan="2">{$$urlImage}</td></tr>
<tr><td align="center" colspan="2"><h2>{$companyName}</h2></td></tr>
<tr><td align="center" colspan="2">&nbsp;</td></tr>
<tr><td width="30%"><b>Cliente:</b></td><td>{$order["Account"]["firstname"]} {$order["Account"]["lastname"]}</td></tr>
<tr><td width="30%"><b>Sucursal:</b></td><td>{$store["Store"]["name"]}</td></tr>
<tr><td width="30%"><b>Folio Pedido:</b></td><td>{$order["Order"]["folio"]}</td></tr>
<tr><td align="center" colspan="2">&nbsp;</td></tr>
</table>
<table border="1" cellpadding="5" cellspacing="0">
  <tr style="background-color:{$bgcolor};color:#FFFFFF;">
  	<td width="20%">&nbsp;<b>Producto</b></td>
   	<td width="20%">&nbsp;<b>Precio</b></td>
   	<td width="20%">&nbsp;<b>Cantidad</b></td>
   	<td width="20%">&nbsp;<b>Impuesto</b></td>
   	<td align="right" width="20%"><b>Total</b></td>
  </tr>
  {$products}
  <tr><td width="80%" align="right"><b>Total</b></td><td align="right" width="20%">{$total_amt}</td></tr>
  <tr style="background-color:{$bgcolor};color:#FFFFFF;">
  	<td width="60%">&nbsp;<b>Pago</b></td>
   	<td width="20%">&nbsp;<b>Tipo</b></td>
   	<td align="right" width="20%">&nbsp;<b>Monto</b></td>
  </tr>
  {$payments}
</table>
<table>
	<tr><td align="center" colspan="2">&nbsp;</td></tr>
	<tr><td width="30%"><b>Fecha/Hora:</b></td><td>{$now}</td></tr>
	<tr><td width="30%"><b>Le Atendió:</b></td><td>{$user["User"]["firstname"]} {$user["User"]["lastname"]}</td></tr>
	<tr><td align="center" colspan="2">&nbsp;</td></tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

$pdf->SetFont('helvetica', '', 8);

/*$html = array2ul($loggedUser);
$pdf->writeHTML($html, true, false, false, false, '');
*/
//http://stackoverflow.com/questions/13913457/how-to-get-rid-off-this-error-with-tcpdf-tcpdf-error-some-data-has-already-be
ob_end_clean();

//Close and output PDF document
$pdf->Output('ticketProsales.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

function array2ul($array)
{
    $out="<ul>";
    foreach($array as $key => $elem){
        if(!is_array($elem)){
            $out=$out."<li><span>$key:[$elem]</span></li>";
        }
        else $out=$out."<li><span>$key</span>".array2ul($elem)."</li>";
    }
    $out=$out."</ul>";
    return $out;
}