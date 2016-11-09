<?php 
	require 'db/connection.php';
	
	$query = ("SELECT city FROM booking "); 
	$result = mysqli_query($db, $query) or die('Error querying from database.');
	if (mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)) {
			$cityName = $row["city"];
		}
	}else{
		echo "0 results";
	}
	function randTime(){
		$num = rand(0,23);
		$num2 = rand(0,59);
		if ($num < 10){
			$num = "0".$num;
		}
		if($num2 < 10){
			$num2 = "0".$num2;
		}
		return $num.":".$num2;
	}
	
	//get date for site rows and data for every flight
	$rows = 0;
	$arrayData = array();
			//querying db/filling $arrayData
	$query = ("SELECT * FROM flightreservation GROUP BY flightID"); 
	$result = mysqli_query($db, $query) or die('Error querying from database.');
	if (mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)) {
			$arrayData[$rows] =  array($row["flightID"], $row["departure_time"], $row["BOOKING_bookingID"], $row["price"], $row["AIRPORT_airportID"]);
			$rows++;
		} 
	}else{
		echo "0 results";
	}
	print_r($_POST);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>pick flight</title>
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

				<!--pickFlightPart-->
				<div class="col-sm-10">
					<div class="bookingflight" style="border:solid 1px black;">
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-11">
									<table>
										<tr>
											<th></th>
											<th style="width:200px;height:100px;">Flight from <?php echo $cityName;?></th>
											<th style="width:200px;height:100px;"><img class="img-responsive" src="images/airplane1.png" /></th>
											<th style="width:125px;height:100px;"></th>
											<th style="width:125px;height:100px;"></th>
										</tr>
										<tr><td></td></tr>
										<tr>
											<td>
												<form action="" method="post">
													<input type="radio" name="pickedFlightFrom" value="<?php echo $arrayData[0][2]; ?>" checked=""/>	
											</td>
											<td>
												<p>flight: <?php  echo "(" .$arrayData[0][4]. ")-(" .$arrayData[0][0].")"; ?></p>
											</td>
											<td>
												<p>date: <?php echo $arrayData[0][1]; ?></p>
											</td>
											<td>
												<p>time: <?php echo randTime(); ?></p>
											</td>	
											<td>
												<p>price: <?php echo $arrayData[0][3]; ?></p>
											</td>
										</tr>
										<tr>
											<td>
													<input type="radio" name="pickedFlightFrom" value="<?php echo $arrayData[1][2]; ?>" />	
											</td>
											<td>
												<p>flight: <?php  echo "(" .$arrayData[1][4]. ")-(" .$arrayData[1][0].")"; ?></p>
											</td>
											<td>
												<p>date: <?php echo $arrayData[1][1]; ?></p>
											</td>
											<td>
												<p>time: <?php echo randTime();  ?></p>
											</td>	
											<td>
												<p>price: <?php echo $arrayData[1][3]; ?></p>
											</td>
										</tr>
										<tr>
											<td>
													<input type="radio" name="pickedFlightFrom" value="<?php echo $arrayData[2][2]; ?>" />	
											</td>
											<td>
												<p>flight: <?php  echo "(" .$arrayData[2][4]. ")-(" .$arrayData[2][0].")"; ?></p>
											</td>
											<td>
												<p>date: <?php echo $arrayData[2][1]; ?></p>
											</td>
											<td>
												<p>time: <?php echo randTime(); ?></p>
											</td>	
											<td>
												<p>price: <?php echo $arrayData[2][3]; ?></p>
											</td>
										</tr>
									</table>
									<hr>
									<table>
										<tr>
											<th></th>
											<th style="width:200px;height:100px;">Flight to <?php echo $cityName;?></th>
											<th style="width:200px;height:100px;"><img class="img-responsive" src="images/airplane2.png" /></th>
											<th style="width:125px;height:100px;"></th>
											<th style="width:125px;height:100px;"></th>
										</tr>
										<tr></tr>
										<tr>
											<td>
													<input type="radio" name="pickedFlightTo" value="<?php echo $arrayData[3][2]; ?>" checked=""/>	
											</td>
											<td>
												<p>flight: <?php  echo "(" .$arrayData[3][4]. ")-(" .$arrayData[3][0].")"; ?></p>
											</td>
											<td>
												<p>date: <?php echo $arrayData[3][1]; ?></p>
											</td>
											<td>
												<p>time: <?php echo randTime(); ?></p>
											</td>	
											<td>
												<p>price: <?php echo $arrayData[3][3]; ?></p>
											</td>
										</tr>
										<tr>
											<td>
												<input type="radio" name="pickedFlightTo" value="<?php echo $arrayData[4][2]; ?>" />	
											</td>
											<td>
												<p>flight: <?php  echo "(" .$arrayData[4][4]. ")-(" .$arrayData[4][0].")"; ?></p>
											</td>
											<td>
												<p>date: <?php echo $arrayData[4][1]; ?></p>
											</td>
											<td>
												<p>time: <?php echo randTime(); ?></p>
											</td>	
											<td>
												<p>price: <?php echo $arrayData[4][3]; ?></p>
											</td>
										</tr>
									</table>
								</div>
								<div class="col-sm-1" style="position: absolute; bottom: 0; right: 5%;">
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

