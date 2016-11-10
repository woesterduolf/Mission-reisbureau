<?php
	include '../db/connection.php';
	include '../helpers/functions.php';
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

	<div class="container">

		<div class="row text-center">
			<h1>Bookinglist</h1>
			<p>List of your bookings</p>
		</div>
		<br>
			<table class="table table-hover table-responsive table-striped">
				<tr>
					<th>Name</th>
					<th>Address</th>
					<th>Zipcode</th>
					<th>City</th>
					<th>Country</th>
					<th>Phonenumber</th>
				</tr> 
				<?php	
					 $sqlquery = ("SELECT * FROM products");
					 $result = mysqli_query($db, $sqlquery);

					 if (mysqli_num_rows($result) > 0) {
					 	while ($row = mysqli_fetch_assoc($result)) {
					 		echo "<tr>";
					 		echo "<td>" . $row["productNumber"] . "</td>";
					 		echo "<td>" . $row["description"] . "</td>";
					 		echo "<td>" . $row["category"] . "</td>";
					 		echo "<td>" . "€ " . $row["sellingPrice"] . ",-" . "</td>";
					 		echo "<td>" . 
					 		"<a href='details.php?number=" . $row['productNumber'] . "'>Details</a> " .
					 		"<a href='update.php?number=" . $row['productNumber'] . "'>Update</a> " .
					 		"<a href='delete.php?number=" . $row['productNumber'] . "'>Delete</a>" 
					 		. "</td>";
					 		echo "</tr>";
					 	}
					 } else {
					 	echo "no result";
					 }
					echo " </table>";	
			 	?>
			 	<div class="text-center">
			 		<a class="btn btn-default btn-group-lg" href="/sportchoice/index.php">Back to index</a>
			 	</div>
			 	
			 
 	</div>
</body>
</html>
