<?php
	include '../db/connection.php';
	include '../helpers/functions.php';

	session_start();
	$_SESSION['account'] = "tobiasschiphorst@live.nl"; 
	//check if login session exist
	if (!empty($_SESSION['account']) && isset($_SESSION['account'])) {
		$account = $_SESSION['account'];
		$sqlquery = ("SELECT account.email, customer.first_name, customer.last_name, customer.address, customer.city, customer.country, customer.phonenumber, customer.zipcode, booking.booking_id, booking.city AS bookingCity, booking.date_of_arrival, booking.date_of_departure 
			FROM account
			JOIN customer ON customer.customer_id = account.customer_id 
			JOIN booking ON booking.customer_id = customer.customer_id 
			WHERE account.email = 'tobiasschiphorst@live.nl'");
		
	}
	else {
		Header("refresh:0; URL=../login/index.html");
		exit();	
	}
?>	
<!DOCTYPE html>
<html>
<head>
	<title>Booking overview</title>
	<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
	<script src="../js/jquery.min.js"></script>
	<link href="../css/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

    <header style="position: relative;">
        <div class="container-fluid">
            <div class="row">
                <img src="../images/banner.jpg" class="img-responsive" width="100%" height="100%"/>
            </div>
        </div>
    </header>

	<div class="container-fluid">
		<div class="row text-center">
			<h1>Bookinglist</h1>
			<p>List of your bookings</p> 
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<table class="table table-hover table-responsive table-striped">
					<tr>
						<th>E-mail</th>
						<th>Customername</th>
						<th>Address</th>
						<th>Country</th>
						<th>Phonenumber</th>
					</tr> 
					<?php	
						$result = mysqli_query($db, $sqlquery);
						if (mysqli_num_rows($result) > 0) {
							while ($row = mysqli_fetch_assoc($result)) {
							 	echo "<tr>";
								 	echo "<td>" . $row["email"] . "</td>";
								 	echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
								 	echo "<td>" . $row["address"] . ", ". $row["zipcode"] . ", " . $row["city"] . "</td>";
								 	echo "<td>" . $row["country"] . "</td>";
								 	echo "<td>" . $row["phonenumber"] . "</td>";
							 	echo "</tr>";
						 	}
							echo " </table>";
						} else {
							$noBooking = "<span class=\"text-danger\"><?php echo "- " . $error; ?></span>";
						}
			 		?>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-6">
			 		<table class="table table-hover table-responsive table-striped">
					<tr>
						<th>Booking number</th>
						<th>Booking city</th>
						<th>Booking date of arrival</th>
						<th>Booking date of departure</th>
					</tr> 
					<?php	
						$result = mysqli_query($db, $sqlquery);
						if (mysqli_num_rows($result) > 0) {
							while ($row = mysqli_fetch_assoc($result)) {
							 	echo "<tr>";
								 	echo "<td>" . $row["booking_id"] . "</td>";
								 	echo "<td>" . $row["bookingCity"] . " " . $row["last_name"] . "</td>";
								 	echo "<td>" . $row["date_of_arrival"] . "</td>";
								 	echo "<td>" . $row["date_of_departure"] . "</td>";
							 	echo "</tr>";
						 	}
							echo " </table>";
						} else {
							$noBooking = "<span class=\"text-danger\"><?php echo "- " . $error; ?></span>";
						}
			 		?>
				</div>
				<div class="col-md-6">
					
				</div>
			</div>
		</div>
 	</div>
</body>
</html>

					 	
					 	

