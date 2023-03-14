<html>
	<head>
	<meta charset="utf-8">
	<title>Airpay Payment Gateway</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,700;1,600&family=Roboto:wght@300;400;700&display=swap"
		rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="style.css">
	</head>

<?php
date_default_timezone_set('Asia/Kolkata');

header( 'Expires: Sat, 26 Jul 1997 05:00:00 GMT' );
header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' );
header( 'Cache-Control: no-store, no-cache, must-revalidate' );
header( 'Cache-Control: post-check=0, pre-check=0', false );
header( 'Pragma: no-cache' );

include('config.php');

// This is landing page where you will receive response from airpay. 
// The name of the page should be as per you have configured in airpay system
// All columns are mandatory

$TRANSACTIONID = trim($_POST['TRANSACTIONID']);
$APTRANSACTIONID  = trim($_POST['APTRANSACTIONID']);
$AMOUNT  = trim($_POST['AMOUNT']);
$TRANSACTIONSTATUS  = trim($_POST['TRANSACTIONSTATUS']);
$MESSAGE  = trim($_POST['MESSAGE']);
$ap_SecureHash = trim($_POST['ap_SecureHash']);
$CUSTOMVAR  = trim($_POST['CUSTOMVAR']);
$CHMOD ="";
if(isset($_POST["CHMOD"])){
$CHMOD = trim($_POST['CHMOD']);
}
$error_msg = '';
if(empty($TRANSACTIONID) || empty($APTRANSACTIONID) || empty($AMOUNT) || empty($TRANSACTIONSTATUS) || empty($ap_SecureHash)){
// Reponse has been compromised. So treat this transaction as failed.
if(empty($TRANSACTIONID)){ $error_msg = 'TRANSACTIONID '; } 
if(empty($APTRANSACTIONID)){ $error_msg .=  ' APTRANSACTIONID'; }
if(empty($AMOUNT)){ $error_msg .=  ' AMOUNT'; }
if(empty($TRANSACTIONSTATUS)){ $error_msg .=  ' TRANSACTIONSTATUS'; }
if(empty($ap_SecureHash)){ $error_msg .=  ' ap_SecureHash'; }
$error_msg .= '<tr><td>Variable(s) '. $error_msg.' is/are empty.</td></tr>';
//exit();
}

//THIS IS ADDITIONAL VALIDATION, YOU MAY USE IT.
//$SYSTEM_AMOUNT is amount you will fetch from your database/system against $TRANSACTIONID
//if( $AMOUNT != $SYSTEM_AMOUNT){
// Reponse has been compromised. So treat this transaction as failed.
//$error_msg .= '<tr><td>Amount mismatch in the system.</td></tr>';
//exit();
//}

// Generating Secure Hash
// $mercid = 	Merchant Id, $username = username
// You will find above two keys on the settings page, which we have defined here in config.php
$Hash_data = $TRANSACTIONID.':'.$APTRANSACTIONID.':'.$AMOUNT.':'.$TRANSACTIONSTATUS.':'.$MESSAGE.':'.$mercid.':'.$username;
if($CHMOD == "upi"){
	$Hash_data = $Hash_data.':'.trim($_POST["CUSTOMERVPA"]);
}
$merchant_secure_hash = sprintf("%u", crc32 ($Hash_data));
//comparing Secure Hash with Hash sent by Airpay
if($ap_SecureHash != $merchant_secure_hash){
// Reponse has been compromised. So treat this transaction as failed.
$error_msg .= '<tr><td>Secure Hash mismatch.</td></tr>';
}

if($error_msg){
 echo '<table><font color="red"><b>ERROR:</b> '.$error_msg.'</font></table>';
 '<table>
<tr><td><b>Variable Name</b></td><td><b>Value</b></td></tr>
<tr><td>TRANSACTIONID:</td><td> '.$TRANSACTIONID.'</td></tr>
<tr><td>APTRANSACTIONID:</td><td> '.$APTRANSACTIONID.'</td></tr>
<tr><td>AMOUNT:</td><td> '.$AMOUNT.'</td></tr>
<tr><td>TRANSACTIONSTATUS:</td><td> '.$TRANSACTIONSTATUS.'</td></tr>
<tr><td>CUSTOMVAR:</td><td> '.$CUSTOMVAR.'</td></tr>
</table>';

exit();
}//if($error_msg)

echo '<script type="text/javascript">
function submitForm(){
			var form = document.forms[0];
			form.submit();
		}
</script>';
 echo '<html><body onload="javascript:submitForm();">
 <form target="_parent" name="frmresponse" name="frmresponse" action="thankyou.php" method="POST"> 
 <table id="success"></table>
<table>
	
<tr><td><input type="hidden" name="TRANSACTIONID" value="'.$TRANSACTIONID.'" /></td></tr>
<tr><td><input type="hidden" name="APTRANSACTIONID" value="'.$APTRANSACTIONID.'" /></td></tr>
<tr><td><input type="hidden" name="AMOUNT" value="'.$AMOUNT.'" /></td></tr>
<tr><td><input type="hidden" name="TRANSACTIONSTATUS" value="'.$TRANSACTIONSTATUS.'" /></td></tr>
<tr><td><input type="hidden" name="MESSAGE" value="'.$MESSAGE.'" /></td></tr>
<tr><td><input type="hidden" name="CUSTOMVAR" value="'.$CUSTOMVAR.'" /></td></tr>
</table></form></body></html>';
// Process Successfull transaction <tr><td align="center" valign="middle">Please wait....</td></tr>

?>
</html>