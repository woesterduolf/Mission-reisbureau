<?php
	include '../db/connection.php';
	include '../helpers/functions.php';
	//check if GET has a value
	if (!empty($_GET["bookingscode"])) {
		$id = htmlspecialchars($_GET["bookingscode"]);
		$sql = "SELECT * FROM booking WHERE bookingID = '$id'";
		$result  = mysqli_query($db, $sql);
		var_dump($result);
		if (mysql_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			$city = validate_text($row["city"]); 
			$arrivalDate = validate_date($row["date_of_arrival"]);
			$departureDate = validate_date($row["date_of_departure"]);
		}
		else {
			echo "no results have been found.";
		}
	} else {
		echo "No bookingscode found";
	}
	
	


	

	
?>

<html>
<head>
	<title>Booking geslaagd!</title>
	<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
	<script src="../js/jquery.min.js"></script>
	<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<legend>
	

	<div class="container-fluid">
	<fieldset>Booking <?php echo $id; ?></fieldset>
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>Your booking has been completed!</h1>
				<p class="small">Thank you for choosing Ancient Travels</p>
				<hr>
				<div class="container">
					<table class="table table-sm table-condensed table-responsive">
						<tr>
							<td>Date of arrival:</td>
							<td><?php echo $arrivalDate; ?></td>
						</tr>
						<tr>
							<td>Date of departure:</td>
							<td><?php echo $departureDate; ?></td>
						</tr>
						<tr>
							<td>City:</td>
							<td><?php echo $city; ?></td>
						</tr>
						<tr>
							<td>Hotel:</td>
							<td>***</td>
						</tr>
						<tr>
							<td>Room:</td>
							<td>***</td>
						</tr>
						<tr>
							<td>Hotel costs:</td>
							<td>***</td>
						</tr>
						<tr>
							<td>Transportation</td>
							<td>***</td>
						</tr>
						<tr>
							<td>Transportation cost</td>
							<td>***</td>
						</tr>
						<tr class="active">
							<td>Total:</td>
							<td>***</td>
						</tr>
					</table>
				</div>
				
			</div>
		</div>
		</legend>
	</div>

</body>
</html>