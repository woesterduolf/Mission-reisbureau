<?php 
	//inludes for the page...
	include '../db/connection.php';
	include '../helpers/functions.php';
	
	//starting the session
	session_start();
	
	// filling the session with testdata
	$_SESSION['city'] = "Athens";
	$_SESSION['date_of_arrival'] = "2016-11-08";
	$_SESSION['date_of_departure'] = "2016-11-28";
	$_SESSION['hotel_name'] = "Het zoentje";
	$_SESSION['room_type'] = "luxe";
	$_SESSION['room_price'] = 500;
	$_SESSION['bus_price'] = 20;
	$_SESSION['flight_Price'] = 10;
	$_SESSION['transport_type'] = "Bus";
	
	// Getting data from the session
	$city = $_SESSION['city'];
	$arrivalDate = $_SESSION['date_of_arrival'];
	$departureDate = $_SESSION['date_of_departure'];
	$hotelName = $_SESSION['hotel_name'];
	$roomType = $_SESSION['room_type'];
	$roomPrice = $_SESSION['room_price'];
	$busPrice = $_SESSION['bus_price'];
	$flightPrice = $_SESSiON['flight_Price'];
	$transport_type = $_SESSION['transport_type'];

	$getImageUrl = "../images/cities/" . strtolower($city) . ".jpg";
	$getHotelImageUrl = "../images/hotels/" . strtolower($hotelName) . ".jpg";
	$standardImage = "../images/hotels/standard.jpg";
	
	
	//calculate room price roomprice * days
	$days = get_daydiff($arrivalDate, $departureDate);
	$hotelPrice = $roomPrice * $days;
	$transportationPrice = total_transportcost($busPrice, $flightPrice);
	$totalPrice = $transportationPrice + $hotelPrice;

?>

<html>
<head>
	<title>Your booking</title>
	<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
	<script src="../js/jquery.min.js"></script>
	<script src="../js/main.js"></script>
	<link href="../css/main.css" rel="stylesheet" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>Your booking</h1>
				<p class="lead">This is your dream holiday only 2 steps left.</p>
				<hr>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-6 thumb">
                <div class="hovereffect">
                    <a class="thumbnail">
                        <img class="img-responsive" src="<?php echo $getImageUrl; ?>" alt="<?php echo $city; ?>">
                    </a>
                </div>
            </div>
			<div class="col-md-6">
				<div class="text-left">
					<h2>General data</h2>
					<p>Under you will find your information about date of arrival, date of departure and the city.</p>
				</div>
				<br>
				<table class="table table-responsive">
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
				</table>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-6">
				<div>
					<h2>Hotel information</h2>
					<p>Here you will find information about your hotel and room</p>
				</div>
				<br>
				<table class="table table-responsive table-condensed">
					<tr>
						<td>Hotel:</td>
						<td><?php echo $hotelName; ?></td>
					</tr>
					<tr>
						<td>Room:</td>
						<td><?php echo $roomType; ?></td>
					</tr>
					<tr>
						<td>Room costs:</td>
						<td><?php echo format_money($roomPrice); ?></td>
					</tr>
				</table>
			</div>
			<div class="col-md-6 thumb">
                <div class="hovereffect">
                    <a class="thumbnail">
                        <img class="img-responsive" src="<?php echo $standardImage; ?>" alt="<?php echo $hotelName; ?>">
                    </a>
                </div>
            </div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<div class="text-center">
					<h2>Transport and hotel cost</h2>
					<p>Here you will find information about the transport and hotelcost.</p>
				</div>
				<br>
				<table class="table table-responsive table-condensed">
					<tr>
						<td>Total hotel costs:</td>
						<td><?php echo format_money($hotelPrice); ?></td>
						
					</tr>
					<tr>
						<td>Transportation</td>
						<td><?php echo $transport_type ?></td>
					</tr>
					<tr>
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
	</div>	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="text-center">
					<h3>Your personal information</h3>
					<p>Fill in your personal infomation to complete the booking.</p>
					<hr>
				</div>
			</div>
		</div>
		<form method="POST" action="#">
			<div class="row">
				<div class="col-md-8">
					<div class="form-group">
						<label for="mr-firstname">First name</label>
						<input type="text" name="firstname" class="form-control" id="mr-firstname" placeholder="Tobias">
					</div>
					<div class="form-group">
						<label for="mr-lastname">Last name</label>
						<input type="text" name="lastname" class="form-control" id="mr-lastname" placeholder="Schiphorst">
					</div>
					<div class="form-group">
						<label for="mr-phone">Phonenumber</label>
						<input type="text" name="phonenumber" class="form-control" id="mr-phone" placeholder="065879224">
					</div>
					<div class="form-group">
						<label for="mr-address">Address</label>
						<input type="text" name="address" class="form-control" id="mr-address" placeholder="Naalrand 19">
					</div>
					<div class="form-group">
						<div class="col-md-2 mr-col-no-padding">
							<label for="mr-zipcode">Zipcode</label>
							<input type="text" name="zipcode" size="6" max="6" class="form-control" id="mr-zipcode" placeholder="1797AM">
						</div>
					</div>
					<div class="form-group">
					 	<div class="col-md-5">
					 		<label for="mr-city">City</label>
							<input type="text" name="city" class="form-control" id="mr-city" placeholder="Den Hoorn">
					 	</div>
					</div>
					<div class="form-group">
						<div class="col-md-5 mr-col-no-padding">
							<label for="mr-country">Country</label>
							<input type="text" name="country" class="form-control" id="mr-country" placeholder="The Netherlands">
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group" id="mr-payment-options-container">
						<label for="mr-payment">Paymentoptions:</label>
						<select name="paymentmethode" class="form-control" id="mr-payment">
						    <option value="ideal" selected>Ideal</option>
						    <option value="credit">Creditcard</option>
						    <option value="paypal">Paypal</option>
						</select>
						<p>We accept <a href="https://www.ideal.nl" target="_blank">Ideal</a>, Creditcard and <a href="https://www.paypal.com" target="_blank">Paypal</a></p>
					</div>
					<div id="mr-ideal-wrapper" hidden="true">
						<div class="form-group">
							<label for="mr-ideal">IBAN number</label>
							<input type="text" name="iban" class="form-control" id="mr-ideal" placeholder="INGB0001234567">
						</div>
						<div class="form-group">
							<label for="mr-cardnumber">Card number</label>
							<input type="text" name="cardnumber" class="form-control" id="mr-ideal-cardnumber" placeholder="154">
						</div>
					</div>
					<div id="mr-creditcard-wrapper" hidden="true">
						<div class="form-group">
							<label for="mr-creditcard">Creditcard</label>
							<input type="text" name="creditcard" class="form-control" id="mr-creditcard" placeholder="84158541515">
						</div>
						<div class="form-group">
							<label for="mr-creditcard-confirmnumber">Confirmnumber</label>
							<input type="text" name="confirmnumber" class="form-control" id="mr-creditcard-confirmnumber" placeholder="515">
						</div>						
					</div>
					<div id="mr-paypal-wrapper" hidden="true">
						<div class="form-group">
							<label for="mr-paypal-email">Paypal e-mail address</label>
							<input type="text" name="paypal-email" class="form-control" id="mr-paypal-email" placeholder="t.paypal@amazing.com">
							
						</div>
						<div class="form-group">
							<label for="mr-paypal-password">Password</label>
							<input type="password" name="paypal-password" class="form-control" id="mr-paypal-password" placeholder="password">
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					<div class="text-center">
						<button type="submit" value="Book now" class="btn btn-succes btn-lg">Book now!</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
</body>
</html>