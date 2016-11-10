<?php

function errormessages($errorname) {
	switch ($errorname) {
		case 'firstname':
			return 'firstname cannot be empty and cannot be longer than 50 characters or have numbers in it.';
			break;
		case 'lastname':
			return 'lastname cannot be empty and cannot be longer than 100 characters or have numbers in it.';
			break;
		case 'address':
			return 'address cannot be empty or longer than 100 characters.';
			break;
		case 'zipcode':
			return 'Zipcode incorrect, zipcode cannot be longer than 6 characters, zipcode cannot be empty.';
			break;
		case 'city':
			return 'city cannot be empty and cannot be longer than 100 characters or have numbers in it.';
			break;
		case 'country':
			return 'Cannot find country, country cannot be empty.';
			break;
		case 'phone':
			return 'phonenumber is not correct it should contain 10 numbers and cannot be empty.';
			break;
		case 'empty':
			return 'Cannot find content';
			break;
		default:
			return 'unresolved error';
			break;
	}
}

?>