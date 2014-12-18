<?php
extract($_REQUEST);

debug($_REQUEST);

if(!($_REQUEST["page"])) {

?>
<body>
	<form action="https://eps.banorte.com/secure3d/Solucion3DSecure.htm" name="payworks_form" method="post">
	    <input type="hidden" value="N" name="Mode">
	    <input type="hidden" value="Auth" name="TransType">
	    <input type="hidden" value="http://sandbox.obelit-crm.com/pages/banorteAPI?page=1" name="ResponsePath">
	    <input type="hidden" value="4111111111111111" name="Card">
	    <input type="hidden" value="visa" name="CardType">
	    <input type="hidden" value="03" name="CERT3D">
	    <input type="hidden" value="1" name="MerchantId">
	    <input type="hidden" value="Super Store" name="MerchantName">
	    <input type="hidden" value="Monterrey" name="MerchantCity">
	    <input type="hidden" value="http://sandbox.obelit-crm.com/pages/banorteAPI?page=2" name="ForwardPath">
		<input type="hidden" value="http://www.obelit.com" name="MerchantURL">
	    <input type="hidden" value="01" name="PlanType">
	    <input type="hidden" value="1" name="NumberOfPayments">
	    <input type="hidden" value="<?=rand(0,999);?>" name="OrderId">
	    <input type="hidden" value="12/16" name="Expires">
	    <input type="hidden" value="1" name="Total">   
	<input type="submit" value="Call Banorte"> 
</form>
	<div align="center">Procesando transacción</div>
</body>

<?php

} else {

	if($_REQUEST['page'] == 1) {

		if ($_REQUEST['Status'] == 200) {
		    ?>
			<html>
			<head></head>
			<body>
			<form action="https://eps.banorte.com/recibo" method="POST" name="payworks">
			    <input type="hidden" name="Name" value="<?=$_REQUEST['Name']?>">
			    <input type="hidden" name="Password" value="<?=$_REQUEST['Password']?>">
			    <input type="hidden" name="ClientId" value="<?=$_REQUEST['ClientId']?>"/>
			    <input type="hidden" name="Mode" value="<?=$_REQUEST['Mode']?>"/>
			    <input type="hidden" name="TransType" value="<?=$_REQUEST['TransType']?>"/>
			    <input type="hidden" name="Number" value="<?=$_REQUEST['Number']?>">
			    <input type="hidden" name="Expires" value="<?=$_REQUEST['Expires']?>">
			    <input type="hidden" name="OrderId" value="<?=$_REQUEST['OrderId']?>">
			    <input type="hidden" name="Cvv2Indicator" value="<?=$_REQUEST['Cvv2Indicator']?>">
			    <input type="hidden" name="Cvv2Val" value="<?=$_REQUEST['Cvv2Val']?>">
			    <input type="hidden" name="Total" value="<?=$_REQUEST['Total']?>">
			    <input type="hidden" name="Mode" value="<?=$_REQUEST['Mode']?>">
			    
			    <input type="hidden" name="XID" value="<?=$_REQUEST['XID']?>">
			    <input type="hidden" name="CAVV" value="<?=$_REQUEST['CAVV']?>">
			    <input type="hidden" name="CardType" value="<?=$_REQUEST['CardType']?>">
			    <input type="hidden" name="Status" value="<?=$_REQUEST['Status']?>">
			    <input type="hidden" name="ECI" value="<?=$_REQUEST['ECI']?>">
			    
			    <input type="hidden" name="E1" value="<?=$_REQUEST['BookedTourID']?>">
			 	<input type="hidden" name="E2" value="response">
			
			
			    <input type="hidden" name="InitialDeferment" value="<?=$_REQUEST['InitialDeferment']?>">
			    <input type="hidden" name="NumberOfPayments" value="<?=$_REQUEST['NumberOfPayments']?>">
			    <input type="hidden" name="PlanType" value="<?=$_REQUEST['PlanType']?>">
			
			    <input type="hidden" value="http://www.merchant/index.php" name="ResponsePath"/>
			 
			
			
			    <!--<input type="hidden"  name="Card" value="<?/*=$_REQUEST['Card']*/?>">
			    <input type="hidden"  name="MerchantId" value="<?/*=$_REQUEST['MerchantId']*/?>">
			    <input type="hidden"  name="CardType" value="<?/*=$_REQUEST['CardType']*/?>">
			    <input type="hidden"  name="MerchantCity" value="<?/*=$_REQUEST['MerchantCity']*/?>">
			    <input type="hidden"  name="ClientId" value="<?/*=$_REQUEST['ClientId']*/?>">
			
			    <input type="hidden"  name="ForwardPath" value="<?/*=$_REQUEST['ForwardPath']*/?>">
			    <input type="hidden"  name="BillToLastName" value="<?/*=$_REQUEST['BillToLastName']*/?>">-->
			
			    <!--<input type="hidden" name="3DStatus" value="<?/*=$_REQUEST['Status']*/?>">
			    <input type="hidden" name="3DMessage" value="<?/*=$_REQUEST['Message']*/?>">-->
			</form>
			</body>
			</html>
		<?php
			} 
			else {
				die($_REQUEST['Status'].' '.$_REQUEST['Status'].' '.$_REQUEST['Message'].' Unknown Error...');
			}
		}
}
?>