<?php 
	require 'db/connection.php';
	session_start();
	if(isset($_POST['submit'])){
		
		$_SESSION['flight_from'] = $_POST['pickedFlightFrom'];
		$_SESSION['flight_to'] = $_POST['pickedFlightTo'];
		$_SESSION['flight_id']=21235436;
		$_SESSION['flight_Price']=9999;
		$_SESSION['flight_seat']=321;
		
		header("refresh:0;url=includes/booking.php");
	}
	
	if (isset($_SESSION['booking_city'])){
		$cityName = $_SESSION['booking_city'];
	}else{
		header("refresh:0;url=index.php");
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
		<center><div class="topbanner">
			<img class="img-responsive" src="images/banner.jpg"/>
			<br />
		</div></center>
		
		<!--the rest of the page-->
		<div class="container-fluid">
			<div class="row">
				<!--leftbanner-->
				<div class="col-sm-2">
					<img class="img-responsive" src="images/ARNAbanner.PNG"/>
				</div>

				<!--pickFlightPart-->
				<div class="col-sm-10">
					<div class="bookingflight" style="border:solid 1px black;border-radius:2px;">
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-12">
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
													<input type="radio" name="pickedFlightFrom" value="<?php echo "Ikbenboos"; ?>" checked=""/>	
											</td>
											<td>
												<p>flight: bullshit-meerbullshit</p>
											</td>
											<td>
												<p>date: 11-11-11</p>
											</td>
											<td>
												<p>time: <?php echo randTime(); ?></p>
											</td>	
											<td>
												<p>price: ONE MILLION DOLLAR</p>
											</td>
										</tr>
										<tr>
											<td>
													<input type="radio" name="pickedFlightFrom" value="<?php echo "IKBENBOOS;" ?>" />	
											</td>
											<td>
												<p>flight:COMPANY-NUMBER</p>
											</td>
											<td>
												<p>date: ANDERE KUTDATUM</p>
											</td>
											<td>
												<p>time: <?php echo randTime();  ?></p>
											</td>	
											<td>
												<p>price: $1354364325</p>
											</td>
										</tr>
										<tr>
											<td>
													<input type="radio" name="pickedFlightFrom" value="<?php echo "aaesgdf"; ?>" />	
											</td>
											<td>
												<p>flight: company2-42</p>
											</td>
											<td>
												<p>date: 99-99-9999</p>
											</td>
											<td>
												<p>time: <?php echo randTime(); ?></p>
											</td>	
											<td>
												<p>price: $42525436</p>
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
													<input type="radio" name="pickedFlightTo" value="<?php echo "andnad" ?>" checked=""/>	
											</td>
											<td>
												<p>flight: company2-number4</p>
											</td>
											<td>
												<p>date: 12-12-12</p>
											</td>
											<td>
												<p>time: <?php echo randTime(); ?></p>
											</td>	
											<td>
												<p>price: $2143</p>
											</td>
										</tr>
										<tr>
											<td>
												<input type="radio" name="pickedFlightTo" value="<?php echo "adsfaf" ?>" />	
											</td>
											<td>
												<p>flight: kutcompany-kutflight</p>
											</td>
											<td>
												<p>date: 12-12-19</p>
											</td>
											<td>
												<p>time: <?php echo randTime(); ?></p>
											</td>	
											<td>
												<p>price: $3452431</p>
											</td>
										</tr>
									</table>
								</div>
								<br />
								<div style="float:right; margin-right:5%;  margin-bottom:1%;">
										<input type="submit" name="submit" value="Send" />
									</form>
								</div>
								<br />
									
							</div>
					</div>
				</div>
			
			</div>	
		</div>
	</body>
</html>

