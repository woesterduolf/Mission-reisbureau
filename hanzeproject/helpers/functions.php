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

function format_decimal($number) {
	if (is_float($number)) {
		//format to decimal
		number_format($number, 2, ',', '.');
		return $number;
	}
}

function validate_date($date)
{
	$timestamp = strtotime($date);
	return $timestamp ? $date : null;
}

//get de diff between check-in date and the check-out date
//source: http://stackoverflow.com/questions/2040560/finding-the-number-of-days-between-two-dates
function get_datediff($checkinDate, $checkoutDate) {
	$splitCheckinDate = explode('-', $checkinDate);
	$splitCheckoutDate = explode('-', $checkoutDate);

	$dayDiff = $splitCheckoutDate[2] - $splitCheckinDate[2];
	return $dayDiff;
}

 ?>