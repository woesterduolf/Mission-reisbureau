<?php 
	require 'db/connection.php';
	session_start();
	$_SESSION['pickedHotel'] = '55';
	$hotel = $_SESSION['pickedHotel'];
	
	$query = ("SELECT count(*) FROM room WHERE Hotel_hotelID = $hotel"); 
	$result = mysqli_query($db, $query) or die('Error querying from database.');
	if (mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)) {
				$amountRooms=$row["count(*)"];
			}	
	}else{
		echo "0 results";
	}
	$query = ("SELECT name FROM hotel WHERE hotelID = $hotel"); 
	$result = mysqli_query($db, $query) or die('Error querying from database.');
	if (mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)) {
			$hotelName = $row["name"];
		}
	}else{
		echo "0 results";
	}
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>pickRoom</title>
		<meta charset="utf-8">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<!--topbanner spanning whole width on top of page-->
		<div class="topbanner">
			<img class="img-responsive" src="images/banner-project.jpg"/>
			<br />
		</div>
		
		<!--the rest of the page-->
		<div class="container-fluid">
			<div class="row">
				<!--leftbanner-->
				<div class="col-sm-2">
					<img class="img-responsive" src="images/ARNAbanner.PNG"/>
				</div>

				<!--mainroompickpart-->
				<div class="col-sm-10">
					<div class="container-fluid" style="border:solid 1px black;">
						<div class="row">
							<div class="col-sm-3">
								<h4><?php echo $hotelName; ?><!--insert hotel name--></h4>
								<!--image of the hotel(now it is the logo)-->
								<img class="img-responsive" src="images/logo.png">
								<h4>Facilities:</h4>
								<ul>
									<li>hotel fac 1...</li>
									<li>hotel fac 2...</li>
									<li>hotel fac 3...</li>
									<li>hotel fac 4...</li>
								</ul>
							</div>	
								
							<div class="col-sm-9">
								<!--insert rooms etc here-->
								<!--get amount of rooms in hotel, then go print this for every room -->
								<div class="container-fluid" style="border:solid 1px black;">
									<div class="row">
										<div class="col-sm-3">
											<?php
												$query = ("SELECT * FROM room WHERE Hotel_hotelID = $hotel"); 
												$result = mysqli_query($db, $query) or die('Error querying from database.');
												if (mysqli_num_rows($result)>0){
													while($row = mysqli_fetch_assoc($result)) {
														echo "<p>Roomname: " .$row["TYPE"]. "</p>".
																"<p>Beds: " .$row["beds"]. "</p>".
																"<p>Price: ".$row["price"]. "</p>";
													}
												}else{
													echo "0 results";
												}
												mysqli_close($db); 
											?>
										</div>
										<div class="col-sm-6">
											get images for room from /images
										</div>
										<div class="col-sm-3">
											<p></p>
											<a href="index.php" class="confirmation"><button>Book now!</button></a>								<script type="text/javascript">
											    $('.confirmation').on('click', function () {
											        return confirm('Are you sure?\nDo you want to confirm this room and hotel?');
											    });
											</script>
										</div>
									</div>
								</div>
								
								
								
								
								
								
								
								<br />
								<div class="container-fluid" style="border:solid 1px black;">
									<div class="row">
										<div class="col-sm-3">
											<p>Roomname:</p>
											<p>Type:</p>
											<p>Beds:</p>
											<p>Price:</p>
										</div>
										<div class="col-sm-6">
											get images for room from /images
										</div>
										<div class="col-sm-3">
											<p></p>
											<a href="index.php" class="confirmation"><button>Book now!</button></a>								<script type="text/javascript">
											    $('.confirmation').on('click', function () {
											        return confirm('Are you sure?\nDo you want to confirm this room and hotel?');
											    });
											</script>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</body>
</html>

