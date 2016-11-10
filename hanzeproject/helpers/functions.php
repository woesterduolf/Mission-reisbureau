<?php
    
    // In de class functions bevinden zich alle functies die worden gebruikt bij het verwerken van de webpagina
    class functions {
        // Deze functie telt hoeveel hotels er zijn met een bepaald aantal sterren
        public function Getnumber($aantalsterren) {
            $city_name = $_SESSION['booking_city'];
            $db = new database;
            $db->query("Select count(*) FROM hotel WHERE stars='$aantalsterren' AND city='$city_name'"); // De Query die het aantal bepaald
            $db->execute();
            $aantal = $db->resultset();
            $db->reset();
            $ster=  $aantal[0]['count(*)']; // De resultaten worden in de variable $ster geeplaatst
            echo "($ster)"; // De echo van het aantal sterren
        }
        
        
          // Deze functie telt hoeveel hotels er zijn met een aangegeven rating
          public function Getrating($rating) {
            $city_name = $_SESSION['booking_city'];
            $db = new database;
            $minimum = $rating - 20;
            $db->query("Select count(*) FROM hotel WHERE rating BETWEEN $minimum AND $rating AND city = '$city_name'");
            $db->execute();
            $aantal = $db->resultset();
            $db->reset();
            $ster=  $aantal[0]['count(*)']; //Het resultaat van het aantal word in de variable $ster geplaats
            echo "($ster)"; // De echo van de rating
        }
        
        
        
        //Dit is de functie die er voor zorgt dat alle hotels worden weergegeven die in de database staan
        public function Viewhotels() {
                $city_name = $_SESSION['booking_city'];
                $db = new database;
                $db->query("SELECT * FROM hotel WHERE city = '$city_name'"); // De query voor de resultaten in database
                $db->execute(); // Uitvoeren query
                $hotels = $db->resultset(); // De resultaten van deze query worden in een multiple array gezet, genaamd hotels
                $db->reset();// De functie reset zorgt er voor dat de connectie weer leeg is.
                
                // De foreach loop print alle gegevens over de hotels op de pagina
                foreach ($hotels as $hotel) {
                    echo '<form action="" method="POST">';
                    $hotel_id = $hotel['hotel_id'];
                    $naam = $hotel['hotel_name'];
                    $sterren = $hotel['stars'];
                    $rating = $hotel["rating"];
                    $phone = $hotel["phonenumber"];
                    $adress = $hotel["adress"];
                    $contact = $hotel["contact_person"];
                    $image = str_replace(" ", "", strtolower($naam));
                    
                    echo"   <div class='resultblock resultaten1 col-md-8' data=$rating data-tag=$sterren>";// de data-tag is voor het filteren van de resultaten
                    echo'   <div class="desc">';
                    echo'   <div class="desc_text">';
                    echo"   <div class='col-md-5'><img src='images/hotels/$image.jpg' height='200' ></div>";// De foto die bij het hotel hoort, word hier geprint.
                    echo"   <div class='col-md-3'>";
                    echo"   <strong>Hotel name:</strong> $naam  "; // De echo van hotel namen
                    echo"<br>";
                    echo"   <strong>Stars:</strong> $sterren"; // De echo van het aantal sterren
                    echo "<br>";
                    echo"   <strong>Phone number:</strong> $phone"; // De echo van het telefoon nummer
                    echo"<br>";
                    echo"   <strong>Adress:</strong> $adress"; // De echo van het adress
                    echo"<br>";
                    echo"   <strong>Contact person:</strong> $contact"; // De echo van de contactpersonen
                    echo"</br><br>";
                    echo"<input name='hotelid' type='text' value=$hotel_id hidden>"; // Geeft verborgen het hotel ID mee zodat, deze in het latere stadium weer kan worden gebruikt
                    echo"<input class='submit' type='submit' value='Choose this hotel' name='hotelkeuze'> "; // De button om verder te gaan
                    echo'   </div></div></div></div><br></form>';
                    
                }

        }

    }

   
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

function validate_text($text) {
	format_text($text);
	if (!is_numeric($text)) {
		return true;
	}
	return false;
}

function validate_zipcode($text) {
	format_text($text);
	if (preg_match("/^[1-9][0-9]{3}\s?([a-zA-Z]{2})?$/", $text)) {
		if (strlen($text) == 6) {
			return true;
		}
	}
	return false;
}

function validate_phone($input) {
	
	if (is_numeric($input)) {
		if (strlen($input) <= 20) {
			return true;
		}
	}
	return false;
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
	$splitCheckinDate = explode('/', $checkinDate);
	$splitCheckoutDate = explode('/', $checkoutDate);
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