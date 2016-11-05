<?php
	include '../db/connection.php';
	include '../helpers/functions.php';
	//check if GET has a value
	if (!empty($_GET["bookingscode"])) {
		//get de bookingscode from the url
		$id = htmlspecialchars($_GET["bookingscode"]);

		//make a SELECT statement for the db
		$sql = "SELECT booking.date_of_arrival, booking.date_of_departure, booking.city, room.TYPE, room.price, hotel.name FROM booking 
		JOIN room ON room.BOOKING_bookingID = booking.bookingID
		JOIN hotel ON hotel.hotelID = room.HOTEL_hotelID
		WHERE bookingID = '$id'";

		//run de SELECT statement on the db
		$result  = mysqli_query($db, $sql);

		//check if result has rows
		if (mysqli_num_rows($result) > 0) {

			//fetch result array
			$row = mysqli_fetch_assoc($result);

			//get data
			$city = format_text($row["city"]); 
			$arrivalDate = validate_date($row["date_of_arrival"]);
			$departureDate = validate_date($row["date_of_departure"]);
			$hotelName = format_text($row["name"]);
			$roomType = format_text($row["TYPE"]);
			$roomPrice = format_decimal($row["price"]);
			//calculate room price roomprice * days
			$days = get_datediff($arrivalDate, $departureDate);
			

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
							<td><?php echo $hotelName; ?></td>
						</tr>
						<tr>
							<td>Room:</td>
							<td><?php echo $roomType; ?></td>
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