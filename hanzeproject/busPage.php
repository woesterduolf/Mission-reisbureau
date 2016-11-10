<?php 
	require 'db/connection.php';
	session_start();
	$_SESSION['pickedHotel'] = '5';
	$hotel = $_SESSION['pickedHotel'];
	$query = ("SELECT city FROM booking "); 
	$result = mysqli_query($db, $query) or die('Error querying from database.');
	
	if(!isset($_GET['pickedRoom'])){
		header("refresh:0;url=index.php");
	}else{
		$_SESSION['roomType'] = $_GET['pickedRoom'];
	}
	if (mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)) {
			$cityName = $row["city"];
		}
	}else{
		echo "0 results";
	}
	
	if(isset( $_SESSION['booking_city'])){
		$cityName = $_SESSION['booking_city'];
	}else{
		header("refresh:0;url=index.php");
	}
	
	
	print_r($_POST);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>pick bus</title>
		<meta charset="utf-8">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<!--topbanner spanning whole width on top of page-->
		<center><div class="topbanner">
			<img class="img-responsive" src="images/banner-project.jpg"/>
			<br />
		</div></center>
		
		<!--the rest of the page-->
		<div class="container-fluid">
			<div class="row">
				<!--leftbanner-->
				<div class="col-sm-2">
					<img class="img-responsive" src="images/ARNAbanner.PNG"/>
				</div>

				<!--pickBusPart-->
				<div class="col-sm-10">
					<div class="busPage" style="border:solid 1px black;border-radius:2px;">
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-5">
									<br />
									<p>Please pick a boarding point for your bustrip and pick a time.</p>
									<form action="booking.php" method="post" id="busPageForm">
										<input type="radio" name="pickedBusFrom" value="Groningen" checked=""/>Groningen <br />
										<input type="radio" name="pickedBusFrom" value="Nijmegen"/>Nijmegen <br />
										<input type="radio" name="pickedBusFrom" value="Utrecht" />Utrecht <br />
										<input type="radio" name="pickedBusFrom" value="Amsterdam"/>Amsterdam <br />
										<input type="radio" name="pickedBusFrom" value="Eindhoven" />Eindhoven	<br />
								</div>
								<div class="col-sm-1">
									<br />
									<img class="img-responsive" src="images/bus"/>
								</div>	
								<div class="col-sm-5">
									<br />
									<p>Please pick a boarding point for you bustrip back and pick a time.</p>
										<input type="radio" name="pickedBusTo" value="<?php echo $cityName; ?>" checked=""/><?php echo $cityName; ?> <br />
								</div>
								<div class="col-sm-1">
								</div>	
							</div>
							<div class="row">
								<div class="col-sm-5">
									<p>Please select the time you want to go with the bus:</p>
									<select name="timeBusTo" form="busPageForm">
										<option selected="" value="9:00">9:00</option>
										<option value="12:00">12:00</option>
										<option value="15:00">15:00</option>
										<option value="18:00">18:00</option>
									</select>
								</div>
								<div class="col-sm-1">
								</div>
								<div class="col-sm-5">
									<p>Please select the time you want to go back with the bus:</p>
									<select name="timeBusFrom" form="busPageForm">
										<option selected="" value="9:00">9:00</option>
										<option value="12:00">12:00</option>
										<option value="15:00">15:00</option>
										<option value="18:00">18:00</option>
									</select>
								</div>
	

								<div class="col-sm-1">
								</div>
							</div>	
							<br />
							<div style="float:right; margin-right:5%; margin-bottom:1%;" >
									<input type="submit" name="submit" value="Send" />
								</form>
							</div>	
						</div>			
					</div>
				</div>
			
			</div>	
		</div>
	</body>
</html>

