<?php 
	//inludes for the page...
	include_once '../db/connection.php';
	include_once '../helpers/functions.php';
	include_once '../helpers/errors.php';
	
	//starting the session
	session_start();
	
	$validationErrors = array();
	
	$_SESSION['customer_first_name'] = "";
	$_SESSION['customer_last_name'] = "";
	$_SESSION['customer_address'] = "";
	$_SESSION['customer_zipcode'] = "";
	$_SESSION['customer_city'] = "";
	$_SESSION['customer_phonenumber'] = "";
	$_SESSION['customer_country']  = "";
	
	$hotel_id = $_SESSION['hotelid'];
	
	
	$sql = "SELECT hotel_name
			FROM hotel
			where hotel_id = '$hotel_id'";
	
	$result = mysqli_query($db, $sql);
	
	$row = mysqli_fetch_assoc($result);
	
	$_SESSION['hotel_name'] = $row['hotel_name'];
	
	
	mysqli_close($db);
	
	
	IF (!empty($_POST)) {
		//check filled in customerdata and add validated userdata to session
		!empty($_POST['firstname']) && validate_text($_POST['firstname']) && strlen($_POST['firstname']) <= 50 ? $_SESSION['customer_first_name'] = $_POST['firstname'] : $validationErrors[] = errormessages('firstname');

		!empty($_POST['lastname']) && validate_text($_POST['lastname']) && strlen($_POST['lastname']) <= 100 ? $_SESSION['customer_last_name'] = $_POST['lastname'] : $validationErrors[] = errormessages('lastname');

		!empty($_POST['phone']) && validate_phone($_POST['phone']) ? $_SESSION['customer_phonenumber'] = $_POST['phone'] : $validationErrors[] = errormessages('phone');

		!empty($_POST['address']) && validate_text($_POST['address']) && strlen($_POST['address']) <= 100 ? $_SESSION['customer_address'] = $_POST['address'] : $validationErrors[] = errormessages('address');

		!empty($_POST['zipcode']) && validate_zipcode($_POST['zipcode']) ? $_SESSION['customer_zipcode'] = $_POST['zipcode'] : $validationErrors[] = errormessages('zipcode');

		!empty($_POST['city']) && validate_text($_POST['city']) && strlen($_POST['city']) <= 100 ? $_SESSION['customer_city'] = $_POST['city'] : $validationErrors[] = errormessages('city');

		!empty($_POST['country']) && validate_text($_POST['country']) && strlen($_POST['country']) <= 100 ? $_SESSION['customer_country'] = $_POST['country'] : $validationErrors[] = errormessages('country');

		$_SESSION['customer_payment'] = $_POST['paymentmethode'];
		if (empty($validationErrors)) {
			//check which payment option was selected and redirect to page
			if ($_SESSION['customer_payment'] == 'ideal') {
				Header("refresh:0; URL=Ideal.php");
				exit();
			}
			if ($_SESSION['customer_payment'] == 'credit') {
				Header("refresh:0; URL=creditcard.php");
				exit();	
			}
			if ($_SESSION['customer_payment'] == 'paypal') {
				Header("refresh:0; URL=paypal.php");
				exit();
			}
			Header("refresh:0; URL=booking.php");
		}
	}
	
	// filling the session with testdata
	/*$_SESSION['booking_city'] = "Athens";
	$_SESSION['booking_date_of_arrival'] = "2016-11-08";
	$_SESSION['booking_date_of_departure'] = "2016-11-28";
	$_SESSION['hotel_name'] = "Het zoentje";
	$_SESSION['room_type'] = "luxe";
	$_SESSION['room_price'] = 500;
	$_SESSION['bus_price'] = 20;
	$_SESSION['flight_Price'] = 10;
	$_SESSION['transport_type'] = "Bus";*/
	
	// Getting data from the session
	$city = $_SESSION['booking_city'];
	$arrivalDate = $_SESSION['booking_date_of_arrival'];
	$departureDate = $_SESSION['booking_date_of_departure'];
	$hotelName = $_SESSION['hotel_name'];
	$roomType = $_SESSION['room_type'];
	$roomPrice = $_SESSION['room_price'];
	$busPrice = $_SESSION['bus_price'];
	$flightPrice = $_SESSION['flight_Price'];
	$transport_type = $_SESSION['transport_type'];

	//get customerdata from the sessions
	$firstname = $_SESSION['customer_first_name'];
	$lastname = $_SESSION['customer_last_name'];
	$phone = $_SESSION['customer_phonenumber'];
	$address = $_SESSION['customer_address'];
	$zipcode = $_SESSION['customer_zipcode'];
	$customer_city = $_SESSION['customer_city'];
	$country = $_SESSION['customer_country'];

	$getImageUrl = "../images/cities/" . str_replace(' ', '', strtolower($city)) . ".jpg";
	$getHotelImageUrl = "../images/hotels/" . str_replace(' ', '', strtolower($hotelName)) . ".jpg";
	
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
	<link href="../css/main.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="../css/thumbnail-gallery.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/image-overlay-booking.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

    <header style="position: relative; top: -70px;">
        <div class="container-fluid">
            <div class="row">
                <img src="../images/banner.jpg" class="img-responsive" width="100% height="100% />
            </div>
        </div>
    </header>

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
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <div class="hovereffect">
                    <a class="thumbnail">
                        <img class="img-responsive" src="<?php echo $getImageUrl; ?>" alt="" width="400" height="300">
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
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <div class="hovereffect">
                    <a class="thumbnail">
                        <img class="img-responsive" src="<?php echo $getHotelImageUrl; ?>" alt="" width="400" height="300">
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
		<div class="row" id="mr-validation-summary">
			<div class="col-md-12 text-center">
				<?php
					foreach ($validationErrors as $error) {
						echo "<span class=\"text-danger\">- $error </span><br>";
					}
				?>
			</div>
		</div>
		<form method="POST" action="">
			<div class="row">
				<div class="col-md-8">
					<div class="form-group">
						<label for="mr-firstname">First name</label>
						<input type="text" name="firstname" class="form-control" value="<?php echo $firstname; ?>" id="mr-firstname" placeholder="Tobias">
					</div>
					<div class="form-group">
						<label for="mr-lastname">Last name</label>
						<input type="text" name="lastname" class="form-control" value="<?php echo $lastname; ?>" id="mr-lastname" placeholder="Schiphorst">
					</div>
					<div class="form-group">
						<label for="mr-phone">Phonenumber</label>
						<input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>" id="mr-phone" placeholder="065879224">
					</div>
					<div class="form-group">
						<label for="mr-address">Address</label>
						<input type="text" name="address" class="form-control" value="<?php echo $address; ?>" id="mr-address" placeholder="Naalrand 19">
					</div>
					<div class="form-group">
						<div class="col-md-2 mr-col-no-padding">
							<label for="mr-zipcode">Zipcode</label>
							<input type="text" name="zipcode" size="6" max="6" class="form-control" value="<?php echo $zipcode; ?>" id="mr-zipcode" placeholder="1797AM">
						</div>
					</div>
					<div class="form-group">
					 	<div class="col-md-5">
					 		<label for="mr-city">City</label>
							<input type="text" name="city" class="form-control" value="<?php echo $customer_city ?>" id="mr-city" placeholder="Den Hoorn">
					 	</div>
					</div>
					<div class="form-group">
						<div class="col-md-5 mr-col-no-padding">
							<label for="mr-country">Country</label>
							<input type="text" name="country" class="form-control" value="<?php echo $country; ?>" id="mr-country" placeholder="The Netherlands">
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
