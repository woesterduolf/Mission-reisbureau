<?php

function errormessages($errorname) {
	switch ($errorname) {
		case 'firstname':
			return 'firstname cannot be longer than 20 characters or have numbers in it.';
			break;
		case 'lastname':
			return 'lastname cannot be longer than 20 characters or have numbers in it.';
			break;
		case 'address':
			return 'address cannot be longer than 20 characters.';
			break;
		case 'zipcode':
			return 'Zipcode incorrect, zipcode cannot be longer than 6 characters';
			break;
		case 'city':
			return 'lastname cannot be longer than 20 characters or have numbers in it.';
			break;
		case 'country':
			return 'Cannot find country';
			break;
		case 'phone':
			return 'phonenumber is not correct it should contain 10 numbers';
			break;
		default:
			return 'unresolved error';
			break;
	}
}

?>