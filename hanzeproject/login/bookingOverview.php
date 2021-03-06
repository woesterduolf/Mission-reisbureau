<?php
error_reporting(0);
	include '../db/connection.php';
	include '../helpers/functions.php';
	session_start();
	$_SESSION["booking_id"] = 2347;
	$_SESSION["transporttype"] = "By bus and plane";

	$error = "";
	//check if SESSIONS have a value
	if (!empty($_SESSION["booking_id"]) && !empty($_SESSION["transporttype"])) {
		//get de booking_id from the session
		$id = $_SESSION["booking_id"];
		$transportType = format_text($_SESSION["transporttype"]);

		//make a SELECT statement for the db
		$sql = "SELECT *
                        FROM `booking`
                        LEFT JOIN `customer` ON `booking`.`customer_id` = `customer`.`customer_id` 
                        LEFT JOIN `room` ON `booking`.`room_id` = `room`.`room_id` 
                        LEFT JOIN `account` ON `customer`.`customer_id` = `account`.`customer_id` 
                        LEFT JOIN `bus_reservation` ON `booking`.`booking_id` = `bus_reservation`.`booking_id` 
                        LEFT JOIN `flight_reservation` ON `booking`.`booking_id` = `flight_reservation`.`booking_id` 
                        LEFT JOIN `flight` ON `flight_reservation`.`flight_id` = `flight`.`flight_id` 
                        LEFT JOIN `hotel` ON `room`.`hotel_id` = `hotel`.`hotel_id` 
                        LEFT JOIN `facilities` ON `hotel`.`hotel_id` = `facilities`.`hotel_id` WHERE booking.booking_id = '$id'";
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
			$customerName = format_text($row["first_name"]) . " " . format_text($row["last_name"]);
			$customerAddress = format_text($row["adress"]);
			$customerZipcode = format_text($row["zipcode"]);
			$customerCity = format_text($row["city"]);
			$customerCountry = format_text($row["country"]);
			$customerPhone = format_text($row["phonenumber"]);

			$hotelName = format_text($row["hotel_name"]);
			$roomType = format_text($row["type"]);
			$roomPrice = format_decimal($row["price"]);
			$busPrice = $row["price"];
			$flightPrice = $row["price"];
			
			//calculate room price roomprice * days
			$days = get_daydiff($arrivalDate, $departureDate);
			$hotelPrice = $roomPrice * $days;
			$transportationPrice = total_transportcost($busPrice, $flightPrice);
			$totalPrice = $transportationPrice + $hotelPrice;
		}
		else {
			$error = "No results have been found.";
                        //header("Refresh:0; URL=home.php");
		}
	} else {
		$error = "No booking_id found";
	}
?>
<html>
<head>
	<title>Booking overview!</title>
	<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
	<script src="../js/jquery.min.js"></script>
	<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

    <header style="position: relative;">
        <div class="container-fluid">
            <div class="row">
                <img src="../images/banner.jpg" class="img-responsive" width="100%" height="100" />
            </div>
        </div>
    </header>

<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>Your booking!</h1><!--
				<p class="lead">Thank you for choosing Ancient Travels</p>-->
				<span class="text-danger"><?php echo "- " . $error; ?></span>
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
                                <td><?php $getal = rand(200, 500); echo $getal; ?></td>
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
                                <td><?php $getal = rand(200, 500); echo $getal; ?></td>
				
			</tr>
			<tr>
				<td>Transportation</td>
				<td><?php echo $transportType ?></td>
			</tr>
			<tr class="active">
				<td>Transportation cost</td>
				<td><?php $getal = rand(200, 500); echo $getal; ?></td>
			</tr>
			<tr class="active">
				<td>Total:</td>
				<td><?php $getal = rand(200, 500); echo $getal; ?></td>
			</tr>
		</table>

		<a href="home.php" class="btn btn-default">Back to index</a>
	</div>
</div>
</body>
</html>


<?php

mysqli_close($db);

?>
