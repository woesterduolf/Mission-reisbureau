<?php
session_start();

/* 
 * Deze website is gemaakt door Henk-Jan Huls
 * Het gebruik maken van deze code is tenstrengste verboden.
 * tenzij hier toestemming voor is gegeven.
 */
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['username'] = $username;
    $_SESSION['password'] = hash('sha512', $password); 
    require 'include/DB.php';
   // require 'functions.php';
   
    
      $db = new database();
      $db->query("Select email, password FROM account WHERE email = '$username' ");
      $db->execute();
      $users = $db->single();
      $user = $users['email'];
      $pass = $users['password'];
      $db->reset();
      
   
    if($pass == $_SESSION['password'] && $user == $_SESSION['username']){
        $_SESSION['account'] = $_SESSION['username'];
        header("refresh:0; URL=home.php");
        
    }
 else {
        echo '<h1>Incorrect Email or Password</h1>';   
        header("Refresh:3; URL=index.html");
    }
    
}
else{
    header("Refresh:0; Url=index.html");
    
    
}
?>