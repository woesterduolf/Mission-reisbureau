<?php
session_start();
if(!isset($_GET['city'])){
   header("Refresh: 0; URL=city.php");
}
else{$_SESSION['booking_city'] = $_GET['city'];
}
require 'includes/DB.php'; // Include DB bestand, deze is noodzakelijk voor het functioneren van de website
require 'helpers/functions.php'; // Include functie bestand, deze is noodzakelijk voor het functioneren van de website

//Controleer of er op de knop is gedrukt om een hotel te kiezen
 if (isset($_POST['hotelkeuze'])) {
     
     $hotel_id= $_POST['hotelid'];
     // als er op de knop is gedrukt, maak dan een session variable met hierin het hotel ID
     $_SESSION['hotelid'] = $hotel_id;
     // Wanneer er op de knop is gedrukt en de variable is in de sessie geplaats, stuur de klant door naar de volgende website
     header("Refresh: 0; URL=pickRoom.php");
 }
 
?>
<html lang="en">
<head>
    <meta charset="utf-8">
<!--    <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>-->
    <link rel="stylesheet" href="assets/style.css">
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <script src="js/jquery.min.js"></script>
    <title>Choose hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    
<script>
        //Script checks if a checkbox is checked, when true filter results
    $(document).ready(function(){
      $('.category').on('change', function(){
        var category_list = [];
        $('#filters :input:checked').each(function(){
        var category = $(this).val();
        category_list.push(category);
       
    });
  
        if(category_list.length == 0)
          $('.resultblock').fadeIn();
        else {
          $('.resultblock').each(function(){
            var item = $(this).attr('data-tag') ;
            if(jQuery.inArray(item,category_list) > -1)
              $(this).fadeIn('slow');
          else
              $(this).hide();
          });
                   
        }   
      });
      /// tweede filters
       $('.rating').on('change', function(){
        var ratinglist = [];
        $('#filters :input:checked').each(function(){
        var rating = $(this).val();
        ratinglist.push(rating);
            });
       
      if(ratinglist.length == 0)
          $('.resultblock').fadeIn();
        else {
                $('.resultblock').each(function(){
            var item = $(this).attr('data') ;
            if(jQuery.inArray(item,ratinglist) > -1)
              $(this).fadeIn('slow');
          
            else
              $(this).hide();
          });
         }
      
         
      });
      
      
      
      
      
      
    }); 
    </script>
    <style>
        .filterdeel{
            height: 100%;
            }
        
            .resultaten1{
                background-color: #C4BFBF;
                border: 1px solid black;
                border-radius: 20px;
                padding: 15;
                margin: 15px;
            }
        
    </style>


</head>

<body>
    <div class="banner">
        <img src="images/banner.jpg">
    </div>
    <div class="col-md-3 filterdeel " >
        <div class="panel-heading">
            <H2>Filter results</h2>
        </div>
        <div id="filters">
            <h3 class="panel-title">Amount of stars</h3>
            <div class="filterblock">
                <input id="check1" type="checkbox" name="check" value="1" class="category">
                <label for="check1"><strong>1</strong><?php
                    $count = new functions();
                    $count->Getnumber(1);
                    ?></label>
            </div>

            <div class="filterblock">
                <input id="check2" type="checkbox" name="check" value="2" class="category">
                <label for="check2"><strong>2</strong><?php
                    $count = new functions();
                    $count->Getnumber(2);
                    ?></label>
            </div>
            <div class="filterblock">
                <input id="check3" type="checkbox" name="check" value="3" class="category">
                <label for="check3"><strong>3</strong><?php
                    $count = new functions();
                    $count->Getnumber(3);
                    ?></label>
            </div>
            <div class="filterblock">
                <input id="check4" type="checkbox" name="check" value="4" class="category" class="checkbox">
                <label for="check4"><strong>4</strong><?php
                    $count = new functions();
                    $count->Getnumber(4);
                    ?></label>
            </div>
            <div class="filterblock">
                <input id="check5" type="checkbox" name="check" value="5" class="category">
                <label for="check5"><strong>5</strong><?php
                    $count = new functions();
                    $count->Getnumber(5);
                    ?></label>
            </div>
            <br>
            <h3 class="panel-title">Rating</h3>

            <div class="filterblock">
                <input id="check6" type="checkbox" name="check" value="100" class="rating">
                <label for="check6"><strong>Super</strong><?php
                    $count = new functions();
                    $count->Getrating('100');
                    ?></label>
            </div>

            <div class="filterblock">
                <input id="check7" type="checkbox" name="check" value="80" class="rating">
                <label for="check7"><strong>Goed</strong><?php
                    $count = new functions();
                    $count->Getrating('80');
                    ?></label>
            </div>
            <div class="filterblock">
                <input id="check8" type="checkbox" name="check" value="60" class="rating">
                <label for="check8"><strong>Voldoende</strong><?php
                    $count = new functions();
                    $count->Getrating('60');
                    ?></label>
            </div>
            <div class="filterblock">
                <input id="check9" type="checkbox" name="check" value="40" class="rating">
                <label for="check9"><strong>Niet geweldig</strong><?php
                    $count = new functions();
                    $count->Getrating('40');
                    ?></label>
            </div>
            <div class="filterblock">
                <input id="check10" type="checkbox" name="check" value="20" class="rating">
                <label for="check10"><strong>Zeer slecht</strong><?php
                    $count = new functions();
                    $count->Getrating('20');
                    ?></label>

            </div>
        </div>   
    </div>
 	<div class="searchresults" class='col-md-8' >
            <div class="panel-heading  ">
            <h1>Please select your favorite hotel 
                <?php  if (isset($_SESSION['booking_city'])) {$location = $_SESSION['booking_city']; echo "in $location";}  ?> <!-- geeft de plaats naam aan die geselecteerd is op de vorige pagina -->
            </h1>
            </div>
            <?php
            // Functie aanroepen voor hotel weergave, deze functie staat in functions.php
            $view = new functions();
            $view->Viewhotels()
            ?>

       </div>
</body>
</html>