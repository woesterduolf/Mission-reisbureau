<?php

function payment_complete(){
	
	include '../db/connection.php';
	include_once '../helpers/functions.php';
	include_once '../helpers/create_uniqid.php';
	
	//customer data everything comes from the session except the customerID that is generated here.
	$customer_id = create_uniqid();
	$customer_first_name = $_SESSION['customer_first_name'];
	$customer_last_name = $_SESSION['customer_last_name'];
	$customer_address = $_SESSION['customer_address'];
	$customer_zipcode = $_SESSION['customer_zipcode'];
	$customer_city = $_SESSION['customer_city'];
	$customer_country = $_SESSION['customer_country'];
	$customer_phonenubmer = $_SESSION['customer_phonenumber'];
	
	//booking data
	$booking_id = create_uniqid();
	$booking_city = $_SESSION['booking_city'];
	$booking_arrivalDate = $_SESSION['booking_date_of_arrival'];
	$booking_departureDate = $_SESSION['booking_date_of_departure'];
	$roomID = $_SESSION['room_id'];
	$customer_id;
	
	
	//bus data
	If ($_SESSION['transport'] == "busPage"){
		$bus_resevation_id = create_uniqid();
		$bus_boarding_point = $_SESSION['bus_boarding_point'];
		$bus_price = $_SESSION['bus_price'];
		$bus_boarding_point_return = $_SESSION['bus_boarding_point_return'];
		$booking_id;
	}
	// fligth data
	IF ($_SESSION['transport'] == "flightPage"){
		$flight_reservation_id = "create_uniqid()";
		$flight_seat = $_SESSION['flight_seat'];
		$flight_price = $_SESSION['flight_Price'];
		$flight_id = $_SESSION['flight_id'];
		$booking_id;
	}
	
	$_SESSION['booking_id'] = $booking_id;
	
	$sql_customer = "INSERT INTO customer (customer_id, first_name, last_name, address, zipcode, city, country, phonenumber)
					VALUES	('$customer_id', '$customer_first_name', '$customer_last_name', '$customer_address', '$customer_zipcode', '$customer_city', '$customer_country', $customer_phonenubmer)";
	
	$sql_booking = "INSERT INTO booking (booking_id, city, date_of_arrival, date_of_departure, customer_id, room_id)
					VALUES ('$booking_id', '$booking_city', '$booking_arrivalDate', '$booking_departureDate', '$customer_id', $roomID)";
	
	/*mysqli_query($db, $sql_customer);
	mysqli_query($db, $sql_booking);*/
	
	if ($db->query($sql_customer) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql_customer . "<br>" . $db->error;
	}
	if ($db->query($sql_booking) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql_booking. "<br>" . $db->error;
	}
	
	If ($_SESSION['transport'] == "busPage"){
		$sql_bus = "INSERT INTO bus_reservation (bus_reservation_id, boarding_point, price, boarding_point_return, booking_id)
					VALUES ('$bus_resevation_id', '$bus_boarding_point', $bus_price, '$bus_boarding_point_return', '$booking_id')";
		if ($db->query($sql_bus) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql_bus . "<br>" . $db->error;
		}
	}
	
	IF ($_SESSION['transport'] == "flightPage"){
		$sql_flight = "INSERT INTO flight_reservation (flight_reservation_id, seat, price, booking_id, flight_id)
						VALUES ('$flight_reservation_id', '$flight_seat', $flight_price,  '$booking_id', '$flight_id')";
		if ($db->query($sql_flight) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql_flight . "<br>" . $db->error;
		}
	}
	

	
	mysqli_close($db);
}	
?>