<?php

function validate_text($text) {

	//enable htmlspecialchars to text
	htmlspecialchars($text);

	//trim text
	trim($text);

	//remove slashes
	stripslashes($text);

	//return validated text 
	return $text;
}

function validate_Date($date)
{
	$timestamp = strtotime($date);
	return $timestamp ? $date : null;
	  
}

 ?>