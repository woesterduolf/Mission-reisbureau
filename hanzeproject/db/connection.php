<?php
	// Database connectie met localhost
	$dbhost = "localhost"; 
	$dbuser = "root"; 
	$dbpass = ""; 
	$dbname = "mission-reisbureau"; 
	$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	
	// Test of de verbinding werkt! 
	if (mysqli_connect_errno()) {
		die("Error in connection: " .
			mysqli_connect_error() .
			" (" . mysqli_connect_errno() . ")"
		);
	} 
	
?>