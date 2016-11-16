<?php
require 'DB.php';
/* 
 * Deze website is gemaakt door Henk-Jan Huls
 * Het gebruik maken van deze code is tenstrengste verboden.
 * tenzij hier toestemming voor is gegeven.
 */
class login{
   
    
    public function getname(){
      global $id1;
        //  $id = $_SESSION['cust_id'];
      $db = new database();
      $db->query("select * from customer where customer_id= 1 ");
      $db->execute();
      $id= $db->single();
      $db->reset();
      $naam = $id['first_name'];
      $achternaam = $id['last_name'];
      echo"<br>";
      echo"<h1>Welcome back to this page ";
      echo "$naam ";
      echo $achternaam;
      echo"</h1>";
      echo"<br>";
      
//      <table>
//          <tr>
//              <td>Your name:</td><td>           
//                  
//                  
//              </td>
//          </tr>
//          <tr>
//              <td>
//                  Your adress:
//              </td>
//              <td>
//                  
//              </td>
//          </tr>
//      </table>
        
        
}

}
