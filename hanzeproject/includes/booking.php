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
	$_SESSiON['flight_Price'] = 10;
	$_SESSiON['transport_type'] = "trein";
	
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
	<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../css/thumbnail-gallery.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/image-overlay.css">
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
                    <div class="overlay">
                        <h2><?php echo $city; ?></h2>
                    </div>
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
                    <div class="overlay">
                        <h2><?php echo $hotelName; ?></h2>
                    </div>
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
	<!-- Input form -->
		<form method="post" action="">
		<table class="table">
			<tr class="text-center">
				<td>
					<h3>Your personal info</h3><br>
					<p>Fill in your personal info to complete the booking.</p>
				</td>
			<tr>
				<td>First name:</td> 
				<td><input type="text" name="first_name"></td>
			</tr>
			<tr>
			
				<td>Last name:</td> 
				<td><input type="text" name="last_name"></td>
			</tr>
			<tr>
				
				<td>Telephone number:</td> 
				<td><input type="text" name="phone_number"></td>
				
			</tr>
			<tr>
				
				<td>Adress:</td>
				<td><input type="text" name="adress"></td>
			
			</tr>
			<tr>
				
				<td>Zip code:</td> 
				<td><input type="text" name="zip_code"></td>
				
			</tr>
			<tr>
				
				<td>City:</td> 
				<td><input type="text" name="city"></td>
			
			</tr>
			<tr>
				
				<td>Country:</td> 
				<td><input type="text" name="country"></td>
				
			</tr>
			<!--  <tr>
			
				<td>comment</td>
				<td><textarea name="comment" rows="5" cols="40"></textarea></td>
			
			</tr>
			-->
			<tr>
			</tr>
			
			<tr>
			
				<td></td>
				
			
			</tr>
		</table>
		<button type="button" class="btn btn-default" data-toggle="collapse" data-target="#creditcard">Creditcard</button>
		<div id="creditcard" class ="collapse">
		Dit is een test verhaal
		</div>
		<br>
		<br>
		<input type="submit" value="Book now" class="btn btn-success">
		</form>
	
</div>
</body>
</html>