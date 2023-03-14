<?php
$TRANSACTIONID = trim($_POST['TRANSACTIONID']);
$APTRANSACTIONID  = trim($_POST['APTRANSACTIONID']);
$AMOUNT  = trim($_POST['AMOUNT']);
$TRANSACTIONSTATUS  = trim($_POST['TRANSACTIONSTATUS']);
$MESSAGE  = trim($_POST['MESSAGE']);

$strhtmlmsg = '';
//  $strhtmlmsg = '<table><tr><td class="tdfail">';
if($TRANSACTIONSTATUS == 200){
	 $strhtmlmsg .= '<table><tr><td class="tdsuccess"><b>SUCCESS TRANSACTION</b></td></tr></table>';
}
else
{
   $strhtmlmsg .= '<table><tr><td class="tdfail"><b>FAILED TRANSACTION</b></td></tr></table>';
}
 $strhtmlmsg .='</td></tr></table>
<table>
<tr><td><b>Variable Name</b></td><td><b>Value</b></td></tr>
<tr><td>TRANSACTIONID:</td><td>'.$TRANSACTIONID.'</td></tr>
<tr><td>APTRANSACTIONID:</td><td> '.$APTRANSACTIONID.'</td></tr>
<tr><td>AMOUNT:</td><td> '.$AMOUNT.'</td></tr>
<tr><td>TRANSACTIONSTATUS:</td><td> '.$TRANSACTIONSTATUS.'</td></tr>
<tr><td>MESSAGE:</td><td> '.$MESSAGE.'</td></tr>
</table>';
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
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
<style>
table {
  border-collapse: collapse;
  width: 50%;
}

th, td {
  text-align: left;
  padding: 8px;
}
.tdfail{
	color:red;
}
.tdsuccess{
	color:green;
}
	</style>
<body>
<div class="wrapper">
		<div class="contentbody">
			<div class="lside">

				<div class="lsidewrap">
					<div class="logo"><img src="airpay-text-wh.svg"></div>
					<div class="coverimg"><img src="coverimg.png"></div>
				</div>
			</div>
         <div class="rside">
				<div class="formwrap container-fluid">
               <?php echo $strhtmlmsg; ?>
            </div>
         </div>
      </div>
   </div>
</body>
</html>