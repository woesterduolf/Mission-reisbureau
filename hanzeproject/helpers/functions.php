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

function validate_date($text) {
	//check if input text is a date
	$d = DateTime::createFromFormat('Y-m-d', $text);
    return $d && $d->format('Y-m-d') === $date;
}

 ?>