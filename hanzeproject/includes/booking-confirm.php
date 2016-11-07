<?php
	include '../db/connection.php';
	include '../helpers/functions.php';
	session_start();
	$_SESSION["bookingscode"] = 2347;
	$_SESSION["transporttype"] = "By bus and plane";
	//check if SESSIONS have a value
	if (!empty($_SESSION["bookingscode"]) && !empty($_SESSION["transporttype"])) {
		//get de bookingscode from the session
		$id = $_SESSION["bookingscode"];
		$transportType = format_text($_SESSION["transporttype"]);

		//make a SELECT statement for the db
		$sql = "SELECT booking.date_of_arrival, booking.date_of_departure, booking.city AS bookingcity, room.TYPE, room.price, hotel.name, busreservation.price AS busPrice, 
			flightreservation.price AS flightPrice, customer.first_name, customer.last_name, customer.adress, customer.zipcode, customer.city AS customercity, customer.country, customer.phonenumber 
		FROM booking 
		JOIN room ON room.BOOKING_bookingID = booking.bookingID
		JOIN hotel ON hotel.hotelID = room.HOTEL_hotelID
		JOIN flightreservation ON flightreservation.BOOKING_bookingID = booking.bookingID 
		JOIN busreservation ON busreservation.BOOKING_bookingID = booking.bookingID
		JOIN customer ON booking.CUSTOMER_customer_ID = customer.customer_ID 
		WHERE bookingID = '$id'";
		//run de SELECT statement on the db
		$result  = mysqli_query($db, $sql);

		//check if result has rows
		if (mysqli_num_rows($result) > 0) {

			//fetch result array
			$row = mysqli_fetch_assoc($result);

			//get data
			$city = format_text($row["bookingcity"]); 
			$arrivalDate = validate_date($row["date_of_arrival"]);
			$departureDate = validate_date($row["date_of_departure"]);
			$customerName = format_text($row["first_name"]) . " " . format_text($row["last_name"]);
			$customerAddress = format_text($row["adress"]);
			$customerZipcode = format_text($row["zipcode"]);
			$customerCity = format_text($row["customercity"]);
			$customerCountry = format_text($row["country"]);
			$customerPhone = format_text($row["phonenumber"]);

			$hotelName = format_text($row["name"]);
			$roomType = format_text($row["TYPE"]);
			$roomPrice = format_decimal($row["price"]);
			$busPrice = $row["busPrice"];
			$flightPrice = $row["flightPrice"];
			
			//calculate room price roomprice * days
			$days = get_daydiff($arrivalDate, $departureDate);
			$hotelPrice = $roomPrice * $days;
			$transportationPrice = total_transportcost($busPrice, $flightPrice);
			$totalPrice = $transportationPrice + $hotelPrice;
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
	<title>Booking confirm!</title>
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
				<h1>Your booking has been completed!</h1>
				<p class="lead">Thank you for choosing Ancient Travels</p>
			</div>
		</div>
	
		<table class="table">
			<tr>
				<td><h3>General data</h3><br>
				<p>Under you will find your information about date of arrival, date of departure and the city.</p>
				</td>
				<td></td>
			</tr>
			<tr>
				<td>Your bookingcode:</td>
				<td><?php echo $id; ?></td>
			</tr>
			<tr>
				<td>Booked by</td>
				<td><?php echo $customerName; ?></td>
			</tr>
			<tr>
				<td>Invoice address</td>
				<td><?php echo $customerAddress . ", " . $customerZipcode . "<br>" . $customerCity . ", " . $customerCountry; ?></td>
			</tr>
			<tr>
				<td>Your phonenumber</td>
				<td><?php echo $customerPhone; ?></td>
			</tr>
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
				<td>
					<h3>Hotel information</h3>
					<p>Here you will find information about your hotel and room</p>
				</td>
				<td></td>
			</tr>
			<tr>
				<td>Hotel:</td>
				<td><?php echo $hotelName; ?></td>
			</tr>
			<tr>
				<td>Room:</td>
				<td><?php echo $roomType; ?></td>
			</tr>
			<tr class="active">
				<td>Room costs:</td>
				<td><?php echo format_money($roomPrice); ?></td>
			</tr>
			<tr>
				<td>
					<h3>Transport and hotel cost</h3><br>
					<p>Here you will find information about the transport and hotelcost.</p>
				</td>
				<td></td>
			</tr>
			<tr class="active">
				<td>Total hotel costs:</td>
				<td><?php echo format_money($hotelPrice); ?></td>
				
			</tr>
			<tr>
				<td>Transportation</td>
				<td><?php echo $transportType ?></td>
			</tr>
			<tr class="active">
				<td>Transportation cost</td>
				<td><?php echo format_money($transportationPrice); ?></td>
			</tr>
			<tr class="active">
				<td>Total:</td>
				<td><?php echo format_money($totalPrice); ?></td>
			</tr>
		</table>
	</div>
</div>
</body>
</html>