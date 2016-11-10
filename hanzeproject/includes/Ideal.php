<?php

	include_once '../db/connection.php';
	include_once '../helpers/functions.php';
	include_once '../helpers/payment_complete.php';
	
	session_start();
	
	if (empty($_SESSION['bank'])){
		$_SESSION['bank'] = "Best Bank";
	}
	
	$bank = $_SESSION['bank'];
	$text = "The " .$bank. " is proccessing your payment";
	
	payment_complete();
	
?>
<html>
<head>
	<title>Processing!</title>
	<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
	<script src="../js/jquery.min.js"></script>
	<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

	<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
			<h3><?php echo "$text"?></h3>
			</div>
		</div>
	</div>
	</div>
</body>
<!--  <meta http-equiv="refresh" content="5;/mission-reisbureau/hanzeproject/includes/booking-confirm"/> -->
</html>