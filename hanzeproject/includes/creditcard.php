<?php

	include_once '../db/connection.php';
	include_once '../helpers/functions.php';
	include_once '../helpers/errors.php';
	include_once '../helpers/payment_complete.php';
	
	session_start();

	//12 char


	//fill form after $_POST
	$cardholder = $cardnumber = $expiredate = $cvvcode = "";
	$validationErrors = array();
	if (!empty($_POST)) {
		//validate form
		if (!validate_text($_POST['name-cardholder'])) {
			$validationErrors[] = errormessages("cardholder");
		}
		if (strlen($_POST['cardnumber']) > 20)  {
			$validationErrors[] = errormessages("cardnumber");
		}
		if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $_POST['expiredate']))  {
			$validationErrors[] = errormessages("expiredate");
		}
		if (strlen($_POST['cvv-code']) > 4) {
			$validationErrors[] = errormessages('cvv');
		}

		//check if there are error if not start insert into db and redirect to booking confirm page.
		if (empty($validationErrors)) {
			payment_complete();
			Header("refresh:2; URL=booking-confirm.php");
			exit();
		}

		//refill form	
		if (empty($_POST['name-cardholder'])) {
			$cardholder = "";
		} else {
			$cardholder = $_POST['name-cardholder'];
		}
		if (empty($_POST['cardnumber'])) {
			$cardnumber = "";
		} else {
			$cardnumber = $_POST['cardnumber'];
		}
		if (empty($_POST['expiredate'])) {
			$expiredate = "";
		} else {
			$expiredate = $_POST['expiredate'];
		}
		if (empty($_POST['cvv-code'])) {
			$cvvcode = "";
		} else {
			$cvvcode = $_POST['cvv-code']; 
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
			<div class="col-md-12 text-center">
				<h1>Pay save and easy with creditcard</h1>
				<p class="lead">You can pay with creditcard</p>
				<?php
					foreach ($validationErrors as $error) {
						echo "<span class=\"text-danger\">- $error </span><br>";
					}
				?>
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
					<input type="number" name="cardnumber" class="form-control" required="true" value="<?php echo $cardnumber; ?>" id="mr-creditcard-number">
				</div>	
				<div class="form-group">
					<label for="mr-expiredate">Expire date</label>
					<input type="date" name="expiredate" class="form-control" required="true" value="<?php echo $expiredate; ?>" id="mr-expiredate">
				</div>
				<div class="form-group">
					<label for="mr-cvv">CVV-code</label>
					<input type="number" name="cvv-code" class="form-control" required="true" value="<?php echo $cvvcode; ?>" id="mr-cvv">
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="text-center">
							<button type="submit" value="Complete payment" class="btn btn-succes btn-lg">Complete payment</button><br><br>
							<a class="btn btn-success btn-lg" href="/mission-reisbureau/hanzeproject/includes/booking.php"><- Back to booking</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>

