<?php

function format_text($text) {

	//enable htmlspecialchars to text
	htmlspecialchars($text);

	//trim text
	trim($text);

	//remove slashes
	stripslashes($text);

	//return validated text 
	return $text;
}

function format_decimal($input) {
	$number = intval($input);
	if (is_int($number)) {
		$number = number_format($input, 2);
		return $number;	
	}
}

function format_money($input) {
	$result = "€ " . format_decimal($input) . ",-";
	return $result;
}

function validate_date($date)
{
	$timestamp = strtotime($date);
	return $timestamp ? $date : null;
}

//get de diff between check-in date and the check-out date
//source: http://stackoverflow.com/questions/2040560/finding-the-number-of-days-between-two-dates
function get_daydiff($checkinDate, $checkoutDate) {
	$splitCheckinDate = explode('-', $checkinDate);
	$splitCheckoutDate = explode('-', $checkoutDate);
	$dayDiff = $splitCheckoutDate[2] - $splitCheckinDate[2];
	return $dayDiff;
}

function total_transportcost($buscost, $flightcost) {
	if (is_numeric($buscost) && is_numeric($flightcost)) {
		$total = $buscost + $flightcost;
		return $total;	
	}
	return null;
}



 ?>