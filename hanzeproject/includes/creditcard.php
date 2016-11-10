<?php

	include_once '../db/connection.php';
	include_once '../helpers/functions.php';
	include_once '../helpers/payment_complete.php';
	$cardholder = $cardnumber = $expiredate = $cvvcode
	if (!empty($_POST)) {
		if (empty($_POST['name-cardholder'])) {
			$
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Creditcard payment</title>
	<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
	<script src="../js/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1>Pay save and easy with creditcard</h1>
				<p class="lead">You can pay with creditcard</p>
			</div>
		</div>
		<div class="container">
			<form method="POST" action="">
				<div class="form-group">
					<label for="mr-name-cardholder">Name cardholder</label>
					<input type="text" name="name-cardholder" class="form-control" required="true" value="<?php echo $cardholder; ?>" id="mr-name-cardholder">
				</div>
				<div class="form-group">
					<label for="mr-creditcard-number">Creditcard number</label>
					<input type="text" name="cardnumber" class="form-control" required="true" value="<?php echo $cardnumber; ?>" id="mr-creditcard-number">
				</div>	
				<div class="form-group">
					<label for="mr-expiredate">Expire date</label>
					<input type="text" name="expiredate" class="form-control" required="true" value="<?php echo $ ?>" id="mr-expiredate">
				</div>
				<div class="form-group">
					<label for="mr-cvv">CVV-code</label>
					<input type="text" name="cvv-code" class="form-control" required="true" value="<?php echo $_POST['cvv-code'] ?>" id="mr-cvv">
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="text-center">
							<button type="submit" value="Complete payment" class="btn btn-succes btn-lg">Complete payment</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>

