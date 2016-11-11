<?php 
	require 'db/connection.php';
	session_start();
	if(isset($_POST['submit'])){
		
		$_SESSION['flight_from'] = $_POST['pickedFlightFrom'];
		$_SESSION['flight_to'] = $_POST['pickedFlightTo'];
		$_SESSION['flight_id']=rand(1,1000);
		$_SESSION['flight_Price']= $flightTo+$flightFrom;
		$_SESSION['flight_seat']=rand(100,200);
		
		header("refresh:0;url=includes/booking.php");
	}
	if(isset($_GET['pickedRoom'])){
		$_SESSION['room_id'] = $_GET['pickedRoom'];
	}else{
		header("refresh:0;url=pickRoom.php");
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
													<input type="radio" name="pickedFlightFrom" value="<?php echo "pickedFlightFrom"; ?>" checked=""/>	
											</td>
											<td>
												<p>flight: KL<?php echo rand(0,200);?></p>
											</td>
											<td>
												<p>date: <?php echo $_SESSION['booking_date_of_arrival'];?></p>
											</td>
											<td>
												<p>time: <?php echo randTime(); ?></p>
											</td>	
											<td>
												<p>price: <?php echo $flightTo = rand(150,300);?></p>
											</td>
										</tr>
										<tr>
											<td>
													<input type="radio" name="pickedFlightFrom" value="<?php echo "pickedFlightFrom;" ?>" />	
											</td>
											<td>
                                                <p>
                                                    flight: KL<?php echo rand(0,200);?>
                                                </p>
											</td>
											<td>
                                                <p>
                                                    date: <?php echo $_SESSION['booking_date_of_arrival'];?>
                                                </p>
											</td>
											<td>
												<p>time: <?php echo randTime();  ?></p>
											</td>	
											<td>
                                                <p>
                                                    price: <?php echo $flightTo = rand(150,300);?>
                                                </p>
											</td>
										</tr>
										<tr>
											<td>
													<input type="radio" name="pickedFlightFrom" value="<?php echo "flightFrom"; ?>" />	
											</td>
											<td>
                                                flight: KL<?php echo rand(0,200);?>
											</td>
											<td>
                                                <p>
                                                    date: <?php echo $_SESSION['booking_date_of_arrival'];?>
                                                </p>
											</td>
											<td>
												<p>time: <?php echo randTime(); ?></p>
											</td>	
											<td>
                                                price: <?php echo $flightTo = rand(150,300);?>
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
													<input type="radio" name="pickedFlightTo" value="<?php echo "flightFrom" ?>" checked=""/>	
											</td>
											<td>
                                                flight: KL<?php echo rand(0,200);?>
											</td>
											<td>
                                                date: <?php echo $_SESSION['booking_date_of_departure'];?>
											</td>
											<td>
												<p>time: <?php echo randTime(); ?></p>
											</td>	
											<td>
                                                price: <?php echo $flightFrom = rand(150,300);?>
											</td>
										</tr>
										<tr>
											<td>
												<input type="radio" name="pickedFlightTo" value="<?php echo "flightTo" ?>" />	
											</td>
											<td>
                                                flight: KL<?php echo rand(0,200);?>
											</td>
											<td>
                                                date: <?php echo $_SESSION['booking_date_of_departure'];?>
											</td>
											<td>
												<p>time: <?php echo randTime(); ?></p>
											</td>	
											<td>
                                                price: <?php echo $flightFrom = rand(150,300);?>
											</td>
										</tr>
                                        
									</table>
								</div>
                            
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

