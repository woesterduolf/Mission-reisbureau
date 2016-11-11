<?php

/*
 * Deze website is gemaakt door Henk-Jan Huls
 * Het gebruik maken van deze code is tenstrengste verboden.
 * tenzij hier toestemming voor is gegeven.
 */
if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $adress = $_POST['adress'];
    $zipcode = $_POST['zipcode'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];

    if ($email != "" && $password != "" && $firstname != "" && $lastname != "" && $adress != "" && $zipcode != "" && $city != "" && $country != "" && $phone != "") {
        //Check alle variabelen op geldigheid
        session_start();
        require 'include/DB.php';
        //selecteer hoogst id in database en maak de variable aan met plus 1
      $db = new database();
      $db->query("select max(customer_ID) from customer");
      $db->execute();
      $maxid= $db->single();
      $db->reset();
      $userid = $maxid['max(customer_ID)'];
      $customer_ID   = $userid + 1;
      
      $_SESSION['customer_id'] = $customer_ID;   //set session voor customer id   
      
      
      $password = hash('sha512', $password);//hash password
      //insert de gegevens in de datbase customer
      $db = new database();
      $db->query('INSERT INTO customer (customer_id, first_name, last_name, adress, zipcode, city, country, phonenumber  ) VALUES(:customer_id, :first_name,:last_name, :adress, :zipcode, :city, :country, :phonenumber)');                
      $db->bind(':customer_id', $customer_ID);                                                                
      $db->bind(':first_name', $firstname);  
      $db->bind(':last_name', $lastname);  
      $db->bind(':adress', $adress);  
      $db->bind(':zipcode', $zipcode);  
      $db->bind(':city', $city);  
      $db->bind(':country', $country);  
      $db->bind(':phonenumber', $phone); 
      $db->execute(); 
      
      $newsletter = 0;
      if (isset($_POST['newsletter'])) {
          $newsletter = 1;
        }
      $travel = rand(1, 400);
      $db = new database();
      $db->query("INSERT INTO account (email, password, is_subscribed_to_newsletter, travel_points, customer_id) VALUES ('$email','$password','$newsletter','$travel','$customer_ID')");
      $db->execute();
    header("Refresh:0; URL=index.html");
       echo '<script  type="text/javascript">alert("Your account is ready, thankyou for being with us!")</script>';
    
     
    } else {
        header("Refresh:0; URL=register.php");
    }
} else {
    header("Refresh:0; URL=register.php");
}
?>